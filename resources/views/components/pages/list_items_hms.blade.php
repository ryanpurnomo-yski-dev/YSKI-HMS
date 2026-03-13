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
                        <tr>
                            <td class="code">Data Kode11</td>
                            <td>Data Kategori1</td>
                            <td>Data Nama3</td>
                            <td>Data Merk1</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-outline-warning me-1">Edit</button>
                                <button type="button" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="code">Data Kode12</td>
                            <td>Data Kategori2</td>
                            <td>Data Nama2</td>
                            <td>Data Merk3</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-outline-warning me-1">Edit</button>
                                <button type="button" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="code">Data Kode13</td>
                            <td>Data Kategori3</td>
                            <td>Data Nama1</td>
                            <td>Data Merk1</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-outline-warning me-1">Edit</button>
                                <button type="button" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="code">Data Kode14</td>
                            <td>Data Kategori1</td>
                            <td>Data Nama3</td>
                            <td>Data Merk2</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-outline-warning me-1">Edit</button>
                                <button type="button" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="code">Data Kode15</td>
                            <td>Data Kategori2</td>
                            <td>Data Nama2</td>
                            <td>Data Merk2</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-outline-warning me-1">Edit</button>
                                <button type="button" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="code">Data Kode16</td>
                            <td>Data Kategori3</td>
                            <td>Data Nama1</td>
                            <td>Data Merk3</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-outline-warning me-1">Edit</button>
                                <button type="button" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="code">Data Kode17</td>
                            <td>Data Kategori1</td>
                            <td>Data Nama1</td>
                            <td>Data Merk3</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-outline-warning me-1">Edit</button>
                                <button type="button" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="code">Data Kode18</td>
                            <td>Data Kategori2</td>
                            <td>Data Nama2</td>
                            <td>Data Merk1</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-outline-warning me-1">Edit</button>
                                <button type="button" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="code">Data Kode19</td>
                            <td>Data Kategori3</td>
                            <td>Data Nama3</td>
                            <td>Data Merk2</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-outline-warning me-1">Edit</button>
                                <button type="button" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="code">Data Kode20</td>
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
                
                    const keyword = input.value.trim().toLowerCase();
                    const rows = table.querySelectorAll("tbody tr");
                
                    rows.forEach((row) => {
                        const firstCell = row.querySelector("td");
                        if (!firstCell) return;
                
                        const kode = firstCell.textContent.trim().toLowerCase();
                
                        if (keyword === "") {
                            // kalau kosong, hanya tampil Data Kode1 - Data Kode10
                            const match = /^data kode([1-9]|10)$/.test(kode);
                            row.style.display = match ? "" : "none";
                            return;
                        }
                
                        // kalau ada keyword, cari di 4 kolom pertama
                        const cells = row.querySelectorAll("td");
                        const searchableText = Array.from(cells)
                            .slice(0, 4)
                            .map((cell) => cell.textContent.toLowerCase())
                            .join(" ");
                
                        row.style.display = searchableText.includes(keyword) ? "" : "none";
                    });
                }
                
                
                document.addEventListener("DOMContentLoaded", filterItemsTable);
                </script>
            </div>
        </div>

        <div class="card-footer bg-white d-flex flex-wrap justify-content-between align-items-center gap-2">
            <p id="entriesInfo" class="small text-secondary mb-0">Showing 1 to 10 of 31 entries</p>
            <div class="btn-group btn-group-sm" id="paginationBtns" role="group">
                <button class="btn btn-outline-secondary" data-nav="prev">&lsaquo;</button>
                <button class="btn btn-secondary" data-page="1">1</button>
                <button class="btn btn-outline-secondary" data-page="2">2</button>
                <button class="btn btn-outline-secondary" data-page="3">3</button>
                <button class="btn btn-outline-secondary" data-page="4">4</button>
                <button class="btn btn-outline-secondary" data-nav="next">&rsaquo;</button>
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

<script>
(() => {
    const perPage = 10; // sementara fix 10
    let currentPage = 1;

    const table = document.getElementById("itemsTable");
    const rows = Array.from(table.querySelectorAll("tbody tr"));
    const info = document.getElementById("entriesInfo");
    const btnWrap = document.getElementById("paginationBtns");

    function render() {
        const total = rows.length;
        const totalPages = Math.max(1, Math.ceil(total / perPage));
        currentPage = Math.min(Math.max(currentPage, 1), totalPages);

        const start = (currentPage - 1) * perPage;
        const end = start + perPage;

        rows.forEach((row, i) => {
            row.style.display = (i >= start && i < end) ? "" : "none";
        });

        const from = total ? start + 1 : 0;
        const to = Math.min(end, total);
        info.textContent = `Showing ${from} to ${to} of ${total} entries`;

        btnWrap.querySelectorAll("[data-page]").forEach(btn => {
            const p = Number(btn.dataset.page);
            btn.classList.toggle("btn-secondary", p === currentPage);
            btn.classList.toggle("btn-outline-secondary", p !== currentPage);
        });
    }

    btnWrap.addEventListener("click", (e) => {
        const btn = e.target.closest("button");
        if (!btn) return;

        if (btn.dataset.page) {
            currentPage = Number(btn.dataset.page);
            render();
        }

        if (btn.dataset.nav === "prev") {
            currentPage--;
            render();
        }

        if (btn.dataset.nav === "next") {
            currentPage++;
            render();
        }
    });

    render();
})();
</script>



