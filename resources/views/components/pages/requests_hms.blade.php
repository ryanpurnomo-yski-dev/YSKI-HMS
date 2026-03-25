<?php

use Livewire\Component;
use Livewire\WithPagination;

new class extends Component
{

}

?>

<div class="container-fluid px-0">
    <div class="mb-3">
        <h2 class="mb-1">Riwayat Permintaan</h2>
    </div>

    <div class="card table-card border-1 shadow-sm">
        <div class="card-header bg-light border-bottom">
            <h6 class="h6 mb-1 fw-semibold">Status Riwayat Permintaan</h6>
        </div>

        <div class="card-body p-3">

            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                <div class="d-flex align-items-center gap-2 small text-secondary">
                    <select class="form-select form-select-sm w-auto entry-select" wire:model="perPage">
                        <option value="10">10</option>
                        <option value="5">5</option>
                    </select>
                    <span>entries per page</span>
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
                                <th>Kode</th>
                                <th>Barang</th>
                                <th>Qty</th>
                                <th>Tgl</th>
                                <th>Note</th>
                                <th>User</th>
                                <th>Acc</th>
                                <th>By</th>
                                <th>Tgl</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            
        </div>
    </div>
</div>