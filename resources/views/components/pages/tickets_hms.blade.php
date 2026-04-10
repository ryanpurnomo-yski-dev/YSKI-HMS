<?php

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Tickets;

new class extends Component
{
    use WithPagination;
    public $user;
    
    public function mount()
    {
        $this->user = auth()->user();
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
            'Tickets' => $Tickets
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
                                <td>{{ $index->accepted }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            
        </div>
    </div>
</div>