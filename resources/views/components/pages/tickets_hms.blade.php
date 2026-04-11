<?php

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Tickets;
use Illuminate\Support\Facades\DB;

new class extends Component
{
    use WithPagination;
    public $user;
    public $selectedTicket = null;
    
    public function mount()
    {
        $this->user = auth()->user();
    }

    public function setTicket($id)
    {
        $this->selectedTicket = Tickets::with('category')->find($id);
    }

    public function getEnumValues($table, $column)
    {
        $type= DB::select("SHOW COLUMNS FROM $table WHERE Field = '$column'")[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $values = [];
        foreach(explode(',', $matches[1]) as $value){
            $values[] = trim($value, "'");
        }
        return $values;
    }

    public function render()
    {
        if($this->user->role->name == "Staff"){
            $Tickets = Tickets::with('category')
                ->where('user_id', auth()->id())
                ->get();
        }else{
            $Tickets = Tickets::with('category')->get();
        }

        return view('components.pages.tickets_hms',[
            'Tickets' => $Tickets,
            'allStatuses' => $this->getEnumValues('tickets', 'status'),
            'allActions' => $this->getEnumValues('tickets', 'action'),
        ]);
    }
}

?>

<div class="container-fluid px-0">
    <div class="mb-3">
        <h2 class="mb-1">Riwayat Ticketing</h2>
    </div>

    <div class="card table-card border-1 shadow-sm">
        <div class="card-header bg-light border-bottom">
            <h6 class="h6 mb-1 fw-semibold">Status Riwayat Ticketing</h6>
        </div>

        <div class="card-body p-3">

            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                <div class="d-flex align-items-center gap-2 small text-secondary">
                    <select class="form-select form-select-sm w-auto entry-select" wire:model="perPage">
                        <option value="10">10</option>
                        <option value="5">5</option>
                    </select>
                    <span>entries per page</span>
                    @switch($user->role->name)
                        @case("Staff")
                            <button type="button" style="margin-left: 30px;" class="btn btn-sm btn-outline-primary me-1" onclick="window.location.href='/user/tickets/forms';">Buat Ticket</button>
                        @break
                        @case("Admin")
                            <button type="button" style="margin-left: 30px;" class="btn btn-sm btn-outline-warning me-1" onclick="window.location.href='/';">Tinjau Ticket</button>
                        @break
                        @case("SuperAdmin")
                            <button type="button" style="margin-left: 30px;" class="btn btn-sm btn-outline-warning me-1" onclick="window.location.href='/';">Tinjau Ticket</button>
                        @break
                    @endswitch
                </div>

                <div class="d-flex gap-2">
                    <input
                        type="text"
                        id="tableSearch"
                        class="form-control form-control-sm search-input"
                        placeholder="Search..."
                        wire:model.defer="searchInput"
                    />
                    <button type="button" class="btn btn-sm btn-primary" wire:click="applySearch">Cari</button>
                </div>
            </div>

                
                <div class="table-responsive">
                    <table id="itemsTable" class="table table-sm align-middle mb-0 items-table">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Note</th>
                                <th>Tgl</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th>Acc</th>
                                @if($user->role->name == "Admin" || $user->role->name == "SuperAdmin")
                                    <th class="text-center">Detail</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Tickets as $index)
                            <tr>
                                <td>{{ $index->id }}</td>
                                <td>{{ $index->category->kategori ?? 'N/A' }}</td>
                                <td>{{ $index->sub_kategori }}</td>
                                <td>{{ $index->created_at }}</td>
                                <td>{{ $index->status }}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary">{{ $index->action }}</button>
                                </td>
                                <td>{{ $index->updated_at !== null ? "-" : "-" }}</td>
                                @if($user->role->name == "Admin" || $user->role->name == "SuperAdmin")
                                <td class="text-center">
                                    <div class="justify-content-center align-items-center gap-2">
                                        <a href="" class="btn btn-sm btn-primary w-10">
                                            <i class="fas fa-info"></i>
                                        </a>
                                        <button type="button" 
                                                class="btn btn-sm btn-success w-10" 
                                                wire:click="setTicket({{ $index->id }})"
                                                data-bs-toggle="modal" 
                                                data-bs-target="#approvalReview">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </div>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="modal fade" id="approvalReview" tabindex="-1" arialabelledby="approvalReviewLabel" aria-hidden="true" wire:ignore.self>
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Review Approval</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    
                                </button>
                            </div>

                            <div class="modal-body">
                                @if($selectedTicket)
                                    <div class="mb-3">
                                        <h6><strong>Status </strong></h6>
                                        <select class="form-select">
                                            <option value="{{ $selectedTicket->status }}">{{ $selectedTicket->status }}</option>
                                            @foreach($allStatuses as $status)
                                                @if($status !== $selectedTicket->status)
                                                    <option value="{{ $status }}">{{ $status }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <strong>Action </strong> 
                                        <select class="form-select">
                                            <option value="$selectedTicket->action">{{ $selectedTicket->action }}</option>
                                            @foreach($allActions as $action)
                                                @if($action !== $selectedTicket->action)
                                                    <option value="{{ $status }}">{{ $action }}</option>
                                                @endif
                                            @endforeach
                                        </select>   
                                    </div>
                                @else
                                    <div class="text-center">
                                        <span class="spinner-border spinner-border-sm"></span> Loading...
                                    </div>
                                @endif

                                <h5 class="text-center">Apakah Anda Yakin Ingin Menyetujui ini</h5>
                                <div class="d-flex gap-3 justify-content-center align-items-center">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-success" wire:click="approveTicket">Ya, Setujui</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
</div>