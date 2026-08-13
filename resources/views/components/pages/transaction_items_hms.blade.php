<?php

use App\Models\Barang;
use App\Models\BarangTransaction;
use Livewire\Component;

new class extends Component
{
    public string $filter = '';
    public int $perPage = 10;

    public function mount(): void
    {
        $filter = request()->query('filter', '');

        if (in_array($filter, ['total', 'all', 'in', 'out'])) {
            $this->filter = $filter;
        } else {
            $this->filter = '';
        }

        $perPage = (int) request()->query('perPage', 10);

        if (in_array($perPage, [5, 10])) {
            $this->perPage = $perPage;
        } else {
            $this->perPage = 10;
        }
    }

    public function render()
    {
        if ($this->filter === 'total') {
            $items = Barang::query()
                ->withSum(
                    [
                        'transactions as total_in' => function ($query) {
                            $query->where('jenis_transaksi', 'in');
                        }
                    ],
                    'kuantitas_barang'
                )
                ->withSum(
                    [
                        'transactions as total_out' => function ($query) {
                            $query->where('jenis_transaksi', 'out');
                        }
                    ],
                    'kuantitas_barang'
                )
                ->orderBy('id', 'desc')
                ->paginate($this->perPage)
                ->withQueryString();

            $mode = 'total';
        } else {
            $items = BarangTransaction::query()
                ->with('barang')
                ->when(
                    in_array($this->filter, ['in', 'out']),
                    function ($query) {
                        $query->where('jenis_transaksi', $this->filter);
                    }
                )
                ->orderBy('created_at', 'desc')
                ->paginate($this->perPage)
                ->withQueryString();

            $mode = 'transaksi';
        }

        return view(
            'components.pages.transaction_items_hms',
            [
                'items' => $items,
                'mode' => $mode,
            ]
        );
    }
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
        background-color: #f1f7fd !important;
    }
    .items-table tbody tr:nth-child(even) > td {
        background-color: #ffffff !important;
    }
    .items-table tbody tr:hover > td {
        background-color: #d8eaff !important;
    }
</style>

<div class="container-fluid px-0">

    <div class="mb-3">
        <h2 class="mb-1">Transaksi Barang</h2>
    </div>

    <div class="card table-card border-1 shadow-sm">

        <div class="card-header bg-light border-bottom">
            <h6 class="h6 mb-1 fw-semibold">Transaksi Barang</h6>
        </div>

        <div class="card-body p-3">

            <div class="d-flex flex-wrap align-items-center gap-2">
                <select
                    class="form-select form-select-sm w-auto"
                    onchange="
                        if (this.value) {
                            window.location.href =
                            '{{ request()->url() }}?filter=' + this.value + '&perPage={{ $perPage }}';
                        }
                    "
                >
                    <option value="all" {{ $filter === '' || $filter === 'all' ? 'selected' : '' }}>
                        Total Transaksi
                    </option>
                    <option value="total" {{ $filter === 'total' ? 'selected' : '' }}>
                        Total Barang
                    </option>
                    <option value="in" {{ $filter === 'in' ? 'selected' : '' }}>
                        Transaksi In
                    </option>
                    <option value="out" {{ $filter === 'out' ? 'selected' : '' }}>
                        Transaksi Out
                    </option>
                </select>

                <livewire:button.pdf />
                <livewire:button.excel />

            </div>

            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mt-4 mb-3">
                <div class="d-flex align-items-center gap-2 small text-secondary">
                    <span>Tampilkan</span>
                    <select
                        class="form-select form-select-sm w-auto entry-select"
                        onchange="
                            window.location.href =
                            '{{ request()->url() }}?filter={{ $filter ?: 'all' }}&perPage='
                            + this.value;
                        "
                    >
                        <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                        <option value="5" {{ $perPage == 5 ? 'selected' : '' }}>5</option>
                    </select>
                    <span>entries per page</span>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success d-flex align-items-center justify-content-between py-2" role="alert">
                    <span>{{ session('success') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">

                @if ($mode === 'total')

                    <table id="itemsTable" class="table table-sm align-middle mb-0 items-table">
                        <thead class="table-light">
                            <tr>
                                <th>Kode</th>
                                <th>Kategori</th>
                                <th>Nama</th>
                                <th>Merk</th>
                                <th>Total In</th>
                                <th>Total Out</th>
                                <th>Sisa Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $itms)
                                @php
                                    $totalIn = $itms->total_in ?? 0;
                                    $totalOut = $itms->total_out ?? 0;
                                    $sisaQty = $totalIn - $totalOut;
                                @endphp
                                <tr>
                                    <td>{{ $itms->kode_barang }}</td>
                                    <td>{{ $itms->kategori_barang }}</td>
                                    <td>{{ $itms->nama_barang }}</td>
                                    <td>{{ $itms->merk_barang }}</td>
                                    <td>{{ $totalIn }}</td>
                                    <td>{{ $totalOut }}</td>
                                    <td>{{ $sisaQty }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">Tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                @else

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
                            @forelse ($items as $trx)
                                <tr>
                                    <td>{{ $trx->barang->kode_barang ?? '-' }}</td>
                                    <td>{{ $trx->barang->kategori_barang ?? '-' }}</td>
                                    <td>{{ $trx->barang->nama_barang ?? '-' }}</td>
                                    <td>{{ $trx->barang->merk_barang ?? '-' }}</td>
                                    <td>{{ $trx->jenis_transaksi }}</td>
                                    <td>{{ $trx->kuantitas_barang }}</td>
                                    <td>{{ \Carbon\Carbon::parse($trx->created_at)->format('Y-m-d') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">Tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                @endif

                <div class="mt-3">
                    {{ $items->links() }}
                </div>

            </div>

        </div>

        <div class="card-footer bg-white d-flex justify-content-end"></div>

    </div>

</div>