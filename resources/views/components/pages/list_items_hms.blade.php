<?php

use Livewire\Component;

new class extends Component
{
};
?>

<div class="container-fluid px-0">
    <div class="mb-3">
        <h2 class="h4 mb-1">Barang</h2>
        <p class="text-secondary small mb-1">Master / Barang</p>
    </div>

    <div class="card table-card border-1 shadow-sm">
        <div class="card-header bg-light border-bottom">
            <h3 class="h6 mb-1 fw-semibold">Master Data Barang</h3>
        </div>

        <div class="card-body p-3">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                <div class="d-flex align-items-center gap-2 small text-secondary">
                    <select class="form-select form-select-sm w-auto entry-select">
                        <option>10</option>
                    </select>
                    <span>entries per page</span>
                    <button type="button" style="margin-left: 30px;" class="btn btn-sm btn-outline-primary me-1">Tambahkan Barang</button>
                </div>

                <input type="text" id="tableSearch" class="form-control form-control-sm search-input" placeholder="Search..." oninput="filterItemsTable()"/>
            </div>

            <div class="table-responsive">
                <table id="itemsTable" class="table table-sm align-middle mb-0 items-table">
                    <thead class="table-light">
                        <tr>
                            <th>Kode</th>
                            <th>Kategori</th>
                            <th>Nama</th>
                            <th>Merk</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="code">Data Kode1</td>
                            <td>Data Kategori1</td>
                            <td>Data Nama3</td>
                            <td>Data Merk1</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-outline-warning me-1">Edit</button>
                                <button type="button" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="code">Data Kode2</td>
                            <td>Data Kategori2</td>
                            <td>Data Nama2</td>
                            <td>Data Merk3</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-outline-warning me-1">Edit</button>
                                <button type="button" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="code">Data Kode3</td>
                            <td>Data Kategori3</td>
                            <td>Data Nama1</td>
                            <td>Data Merk1</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-outline-warning me-1">Edit</button>
                                <button type="button" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="code">Data Kode4</td>
                            <td>Data Kategori1</td>
                            <td>Data Nama3</td>
                            <td>Data Merk2</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-outline-warning me-1">Edit</button>
                                <button type="button" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="code">Data Kode5</td>
                            <td>Data Kategori2</td>
                            <td>Data Nama2</td>
                            <td>Data Merk2</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-outline-warning me-1">Edit</button>
                                <button type="button" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="code">Data Kode6</td>
                            <td>Data Kategori3</td>
                            <td>Data Nama1</td>
                            <td>Data Merk3</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-outline-warning me-1">Edit</button>
                                <button type="button" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="code">Data Kode7</td>
                            <td>Data Kategori1</td>
                            <td>Data Nama1</td>
                            <td>Data Merk3</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-outline-warning me-1">Edit</button>
                                <button type="button" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="code">Data Kode8</td>
                            <td>Data Kategori2</td>
                            <td>Data Nama2</td>
                            <td>Data Merk1</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-outline-warning me-1">Edit</button>
                                <button type="button" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="code">Data Kode9</td>
                            <td>Data Kategori3</td>
                            <td>Data Nama3</td>
                            <td>Data Merk2</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-outline-warning me-1">Edit</button>
                                <button type="button" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="code">Data Kode10</td>
                            <td>Data Kategori1</td>
                            <td>Data Nama2</td>
                            <td>Data Merk1</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-outline-warning me-1">Edit</button>
                                <button type="button" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <script>
                    function filterItemsTable() {
                        const input = document.getElementById("tableSearch");
                        const table = document.getElementById("itemsTable");
                        if (!input || !table) return;

                        const keyword = input.value.trim();
                        const rows = table.querySelectorAll("tbody tr");

                        rows.forEach((row) => {
                        const cells = row.querySelectorAll("td");
                        const searchableText = Array.from(cells)
                            .slice(0, 4)
                            .map((cell) => cell.textContent)
                            .join(" ");

                        row.style.display = searchableText.includes(keyword) ? "" : "none";
                    });
                }
                </script>
            </div>
        </div>

        <div class="card-footer bg-white d-flex flex-wrap justify-content-between align-items-center gap-2">
            <p class="small text-secondary mb-0">Showing 1 to 10 of 31 entries</p>
            <div class="btn-group btn-group-sm" role="group">
                <button class="btn btn-outline-secondary">&lsaquo;</button>
                <button class="btn btn-secondary">1</button>
                <button class="btn btn-outline-secondary">2</button>
                <button class="btn btn-outline-secondary">3</button>
                <button class="btn btn-outline-secondary">4</button>
                <button class="btn btn-outline-secondary">&rsaquo;</button>
            </div>
        </div>
    </div>
</div>

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


