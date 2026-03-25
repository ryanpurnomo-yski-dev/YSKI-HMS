<?php

use Livewire\Component;
<<<<<<< HEAD
use Livewire\WithPagination;

new class extends Component
{

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
                                <th>Note</th>
                                <th>Acc</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            
        </div>
=======

new class extends Component
{
    
};
?>

<div class="container-fluid px-0">
    <h2>Form Keluhan</h2>
    <!-- <div style="display:flex"><p>Home / Barang /&nbsp;</p><p style="color:#009dff">Kategori</p></div> -->
    
    <div class="card table-card border-1 shadow-sm">
        <div class="card-header bg-light border-bottom">
            <h6>Formulir Keluhan</h6>
        </div>
        <form class="card-body p-3">
            <label>Kategori</label>
            <select class="form-control">
                <option>-- Pilih Kategori --</option>
                <option>Hardware</option>
                <option>Software</option>
                <option>Pengadaan Aset</option>
            </select>
            
            <label class="mt-2">Tanggal</label>
            <input class="form-control" type="date" placeholder="mm/dd/yyyy">

            <label class="mt-2">Keterangan</label>
            <textarea class="form-control"></textarea>

            <label class="mt-2">Lampiran</label>
            <input class="form-control" type="file">

            <div class="mt-3 d-flex flex-row gap-2 align-items-center justify-content-center">
                <button class="btn bg-primary text-white">Simpan</button>
                <button class="btn bg-secondary text-white">Batal</button>
            </div>
        </form>
>>>>>>> 9e39529edd00ba79e18ba96778cfddf5e57a23cf
    </div>
</div>