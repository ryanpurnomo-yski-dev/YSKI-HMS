<?php

use Livewire\Component;
use App\Models\Barang;
use App\Models\Tickets;
use App\Models\Approvals;
use App\Models\User;
use Illuminate\Support\Facades\DB;

new class extends Component
{
    public $user, $Barang, $Tickets, $Approvals, $currentStatus;
    public $allStatuses = [];

    public function mount()
    {
        $this->user = auth()->user();
        $this->Barang = session('Barang') ?? Barang::all();
        $this->Tickets = session('Tickets') ?? Tickets::all();
        // Approvals::syncFromTickets();
        // $this->Approvals = session('Approvals') ?? Approvals::all();
        $this->Approvals = Tickets::with('approvals')->get();
        $this->allStatuses = $this->getEnumValues('tickets', 'status');
        $this->currentStatus = $this->allStatuses[0] ?? null;
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

    public function switchStatus()
    {
        $currentIndex = array_search($this->currentStatus, $this->allStatuses);
        $nextIndex = ($currentIndex + 1) % count($this->allStatuses);
        $this->currentStatus = $this->allStatuses[$nextIndex];
    }
};
?>
<style>
    .status-btn {
        transition: box-shadow 0.15s ease, transform 0.15s ease;
    }

    .status-btn:active {
        box-shadow: 0 0 0 4px rgba(13, 110, 253, 0.25), inset 0 2px 6px rgba(0,0,0,0.2) !important;
        transform: scale(0.93);
    }
</style>
<div> 
    <div class="content" style="display: flex; flex-direction: column;">
        
        <div style="padding: 10px 20px; border-radius: 3px; box-shadow: 2px 4px 2px 4px rgba(0, 0, 0, 0.2);">
            <h3>Dashboard</h3>
        </div>

        <br>

        <div class="alert alert-warning p-2 rounded-1">
            Selamat Datang <b>{{ $user->name }}</b>!
        </div>
        @switch($user->role->name)
            @case("Staff")
                @include("components.pages.dashboard_layouts.staff_layout", [

                ])
            @break
            @case("SuperAdmin")
                @include("components.pages.dashboard_layouts.superadmin_layout", [
                    'User' => $user,
                    'Barang' => $Barang,
                    'Tickets' => $Tickets,
                    'Approvals' => $Approvals
                ])
            @break
            @case("Admin")
                @include("components.pages.dashboard_layouts.admin_layout", [
                    'User' => $user,
                    'Barang' => $Barang,
                    'Tickets' => $Tickets,
                    'Approvals' => $Approvals
                ])
            @break
        @endswitch
    </div>
</div>