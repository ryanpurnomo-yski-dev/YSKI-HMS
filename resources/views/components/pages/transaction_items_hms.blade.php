<?php

use App\Models\Barang;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component
{
    use WithPagination;

    /*
    protected string $paginationTheme = 'bootstrap';
    public string $search = '';
    public string $searchInput = '';

    public function applySearch(): void
    {
        $this->search = trim($this->searchInput);
        $this->resetPage();
    }

    public int $perPage = 10;

    public function updatingPerPage(): void
    {
        $this->resetPage();
    }


    public function render()
    {
        return view('components.pages.list_items_hms', [
            'items' => Barang::query()
                ->when($this->search !== '', function ($query) {
                    $keyword = '%' . $this->search . '%';
                    $query->where(function ($q) use ($keyword) {
                        $q->where('kode_barang', 'like', $keyword)
                            ->orWhere('kategori_barang', 'like', $keyword)
                            ->orWhere('nama_barang', 'like', $keyword)
                            ->orWhere('merk_barang', 'like', $keyword);
                    });
                })
                ->orderBy('id', 'desc')
                ->paginate($this->perPage),
        ])->layout('layouts.app');
    }

    public function delete(int $id): void
    {
        Barang::wherekey($id)->delete();
        $this->resetPage();
        session()->flash('success', 'Barang berhasil dihapus.');
    }
    */
};
?>

<style>
    .table-card {
        border-radius: 12px;
    }

    .search-input {
        width: 220px;
        max-width: 100%;
    }

    .entry-select {
        min-width: 72px;
    }

    .items-table th {
        font-size: 12px;
        font-weight: 700;
    }

    .items-table td {
        font-size: 12px;
    }

    .items-table .code {
        color: #8f2e6c;
        font-weight: 700;
    }

    .items-table tbody tr:nth-child(odd) > td {
        background-color: #f1f7fd !important; /* biru muda */
    }

    .items-table tbody tr:nth-child(even) > td {
        background-color: #ffffff !important; /* putih */
    }

    .items-table tbody tr:hover > td {
        background-color: #d8eaff !important;
    }

</style>

<div class="container-fluid px-0">
    <div class="mb-3">
        <h2 class="mb-1">Transaksi Barang</h2>
        <!-- <p class="text-secondary small mb-1">Master / Barang</p> -->
    </div>

    <div class="card table-card border-1 shadow-sm">
        <div class="card-header bg-light border-bottom">
            <h6 class="h6 mb-1 fw-semibold">Transaksi Barang</h6>
        </div>

        <div class="card-body p-3">
            <div class="d-flex align-items-center gap-2 small text-secondary">
                <button type="button" class="btn btn-sm btn-primary">Transaksi In</button>
                <button type="button" class="btn btn-sm btn-warning">Transaksi Out</button>
                <select class="form-select form-select-sm w-auto entry-select" wire:model="perPage">
                    <option>-- Pilih Filter --</option>
                </select>
                <button type="button" class="btn btn-sm btn-danger">Export</button>
            </div>
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mt-4 mb-3">
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
                @if (session('success'))
                    <div class="alert alert-success d-flex align-items-center justify-content-between py-2" role="alert">
                        <span>{{ session('success') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <table id="itemsTable" class="table table-sm align-middle mb-0 items-table">
                    <thead class="table-light">
                        <tr>
                            <th>Kode</th>
                            <th>Kategori</th>
                            <th>Nama</th>
                            <th>Merk</th>
                            <th class="text-center">Kategori</th>
                            <th>Transaksi</th>
                            <th>Qty</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white d-flex justify-content-end">
            
        </div>
    </div>
</div>