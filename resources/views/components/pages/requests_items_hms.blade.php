<?php

use Livewire\Component;

new class extends Component
{
    public $user;
    
    public function mount()
    {
        $this->user = auth()->user();
    }
};
?>

<div class="container-fluid px-0">
    <div class="mb-3">
        <h2 class="mb-1">Riwayat Permintaan Barang</h2>
    </div>

    <div class="card table-card border-1 rounded-3 shadow-sm">
        <div class="card-header bg-light border-bottom">
            <h6 class>Status Riwayat Permintaan Barang</h6>
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
            </div>
        </div>
    </div>

</div>

