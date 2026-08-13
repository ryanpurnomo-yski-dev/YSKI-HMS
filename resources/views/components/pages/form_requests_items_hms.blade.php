<?php

use App\Models\Barang;
use Livewire\Component;

new class extends Component
{
    public $user;
    
    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render(){
        return view('components.pages.form_requests_items_hms', [
            // 'items' => Barang::all()
            'items' => Barang::with('transactions')->get()
        ]);
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
                            <button type="button" style="margin-left: 30px;" class="btn btn-sm btn-outline-primary me-1" onclick="window.location.href='/user/items/forms';"><i class="fas fa-box"></i> Buat Permintaan Barang</button>
                        @break
                        @case("Admin")
                            <button type="button" style="margin-left: 30px;" class="btn btn-sm btn-outline-warning me-1" onclick="window.location.href='/';">Tinjau Barang</button>
                        @break
                        @case("SuperAdmin")
                            <button type="button" style="margin-left: 30px;" class="btn btn-sm btn-outline-warning me-1" onclick="window.location.href='/';">Tinjau Barang</button>
                        @break
                    @endswitch
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
                            <th>Transaksi</th>
                            <th>Qty</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $itms)
                            @foreach($itms->transactions as $trx)
                                @if($trx->jenis_transaksi === 'out')
                                    <tr>
                                        <td>{{ $itms->kode_barang }}</td>
                                        <td>{{ $itms->kategori_barang }}</td>
                                        <td>{{ $itms->nama_barang }}</td>
                                        <td>{{ $itms->merk_barang }}</td>
                                        <td>{{ $trx->jenis_transaksi }}</td>
                                        <td>{{ $trx->kuantitas_barang }}</td>
                                        <td>{{ Carbon\Carbon::parse($trx->created_at)->format('Y-m-d') }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

