<?php

use Livewire\Component;

new class extends Component
{

};
?>

<style>
    table{
        border-collapse:collapse;
        width:100%
    }
    td{
        border-collapse:collapse;
        padding: 5px 20px 5px 10px;
    }
    th{
        border-collapse:collapse;
        padding: 5px 20px 5px 10px;
    }
    tr{
        border-bottom: 1.5px solid #ddd;
    }
    tr:nth-child(even) {
        background-color: #D6EEEE;
    }
    tr:nth-child(1) {
       border-bottom: 3px solid #ddd;
    }
</style>
<div> 
    <h1>Kategori</h1>
    <div style="display:flex"><p>Home / Barang /&nbsp;</p><p style="color:#009dff">Kategori</p></div>
    <div class="pt-4 pb-4" style="padding-left:1.5vw;padding-right:1.5vw;background-color:#fafafa;border-radius:30px;box-shadow:1px 2px 1px 2px  rgba(0, 0, 0, 0.2)">
        <div style="display: block; margin-bottom:3vh"><h4 style="color:#009dff">Master Data Kategori</h4></div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="margin-bottom:5vh">Tambah Kategori</button>

        <table id="Category">
            <tr>
                <th style="width:10%" onclick="sortTable(0)">No. <i style="font-size: 0.8rem;"></i></th>
                <th style="width:40%" onclick="sortTable(1)">Kategori <i style="font-size: 0.8rem"></i></th>
                <th style="width:10%">Icon</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>3</td>
                <td>C</td>
                <td><img src="{{ asset('images/logo_yski.png') }}" alt="" style="width: 100%;height: 100%;object-fit: contain"></td>
                <td><button class="btn btn-primary">Edit</button><button class="btn btn-outline-danger" style="margin-left:5px">Hapus</button></td>
            </tr>
            <tr>
                <td>1</td>
                <td>B</td>
                <td><img src="{{ asset('images/logo_yski.png') }}" alt="" style="width: 100%;height: 100%;object-fit: contain"></td>
                <td><button class="btn btn-primary">Edit</button><button class="btn btn-outline-danger" style="margin-left:5px">Hapus</button></td>
            </tr>
            <tr>
                <td>4</td>
                <td>A</td>
                <td><img src="{{ asset('images/logo_yski.png') }}" alt="" style="width: 100%;height: 100%;object-fit: contain"></td>
                <td><button class="btn btn-primary">Edit</button><button class="btn btn-outline-danger" style="margin-left:5px">Hapus</button></td>
            </tr>
        </table>
    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/barang/kategori/tambah" method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="categories" class="form-label">Nama Kategori : </label>
                            <input name="category" class="form-control" id="categories" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="icon" class="form-label">Icon : </label>
                            <input name="icons" type="file" class="form-control" id="icon" placeholder="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
            </form>
            </div>
        </div>
    </div>

    <script>
        function sortTable(n) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = document.getElementById("Category");
        switching = true;
        // Set the sorting direction to ascending:
        dir = "asc";
        /* Make a loop that will continue until
        no switching has been done: */
        while (switching) {
            // Start by saying: no switching is done:
            switching = false;
            rows = table.rows;
            /* Loop through all table rows (except the
            first, which contains table headers): */
            for (i = 1; i < (rows.length - 1); i++) {
            // Start by saying there should be no switching:
            shouldSwitch = false;
            /* Get the two elements you want to compare,
            one from current row and one from the next: */
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            /* Check if the two rows should switch place,
            based on the direction, asc or desc: */
            if (dir == "asc") {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                // If so, mark as a switch and break the loop:
                shouldSwitch = true;
                break;
                }
            } else if (dir == "desc") {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                // If so, mark as a switch and break the loop:
                shouldSwitch = true;
                break;
                }
            }
            }
            if (shouldSwitch) {
            /* If a switch has been marked, make the switch
            and mark that a switch has been done: */
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            // Each time a switch is done, increase this count by 1:
            switchcount ++;
            } else {
            /* If no switching has been done AND the direction is "asc",
            set the direction to "desc" and run the while loop again. */
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
            }
        }
        }
    </script>
</div>