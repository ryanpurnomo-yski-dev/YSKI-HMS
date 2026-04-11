<?php

use Livewire\Component;
use App\Models\Kategori;

new class extends Component
{
    public $KategoriId, $Kategori, $icon;
    public $isEditMode = false; // Penanda mode

    public function render()
    {
        return view('components.pages.Kategori_hms', [
            'categories' => Kategori::all() 
        ]);
    }

    // Fungsi untuk Mode TAMBAH
    public function create()
    {
        $this->isEditMode = false;
        $this->reset(['Kategori', 'icon', 'KategoriId']);
        $this->dispatch('openModal');
    }

    // Fungsi untuk Mode EDIT
    public function edit($id)
    {
        $this->isEditMode = true;
        $data = Kategori::findOrFail($id);
        $this->KategoriId = $data->id;
        $this->Kategori = $data->Kategori;
        $this->icon = $data->icon;
        
        $this->dispatch('openModal'); 
    }

    // Fungsi Simpan (Menangani keduanya)
    public function save()
    {
        $this->validate([
            'Kategori' => 'required',
            'icon' => 'required',
        ]);

        if ($this->isEditMode) {
            Kategori::find($this->KategoriId)->update([
                'Kategori' => $this->Kategori,
                'icon' => $this->icon,
            ]);
        } else {
            Kategori::create([
                'Kategori' => $this->Kategori,
                'icon' => $this->icon,
            ]);
        }

        $this->dispatch('closeModal');
        $this->reset(['Kategori', 'icon', 'KategoriId']);
    }

    public function close()
    {
        $this->dispatch('closeModal');
        $this->reset(['Kategori', 'icon', 'KategoriId']);
    }

    public function delete($id = null, $layer = 0){
        if($layer == 1){
            Kategori::findOrFail($this->KategoriId)->delete();
            $this->dispatch('closeModal');
        }else{
            $data = Kategori::findOrFail($id);
            $this->KategoriId = $data->id;
            
        }
    }
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
        tbody tr:nth-of-type(odd) {
            background-color: #ffffff;
        }

        tbody tr:nth-of-type(even) {
            background-color: #D6EEEE;
        }
        thead{
        border-bottom: 3px solid #ddd;
        }
</style>

<div class="container-fluid px-0">
    <div class="mb-3">
        <h2 class="mb-1">Kategori</h2>
    </div>

    <div class="card table-card border-1 shadow-sm">
        <div class="card-header bg-light border-bottom">
            <h6 class="h6 mb-1 fw-semibold">Master Data Kategori</h6>
        </div> 
    
    <div class="card-body p-3">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
            <div class="d-flex align-items-center gap-2 small text-secondary">
                <select class="form-select form-select-sm w-auto entry-select" wire:model="perPage">
                    <option value="10">10</option>
                    <option value="5">5</option>
                </select>
                <span>entries per page</span>
                <button type="button" style="margin-left: 30px;" class="btn btn-primary me-1" wire:click="create" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Tambah Kategori</button>
            </div>

            <div class="input-group flex-nowrap" style="width:20em">
                <span class="input-group-text" id="addon-wrapping"><i class="fa fa-search" aria-hidden="true"></i></span>
                <input type="text" class="form-control" id="Category_lookup" onkeyup="Entries()" placeholder="Search for names.." aria-label="Username" aria-describedby="addon-wrapping">
            </div>
        </div>

        <table id="Category">
            <thead>
                <tr>
                    <th style="width:10%" onclick="sortTable(0)">No.</th>
                    <th style="width:40%" onclick="sortTable(1)">Kategori</th>
                    <th style="width:10%">Sub Kategori</th>
                    <th style="width:10%">Icon</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $ctgrs => $item)
                <tr>
                    <td>{{ $ctgrs + 1}}</td>
                    <td>{{ $item->kategori }}</td>
                    <td>
                        @if($item->subkategori)
                            <details class="custom-details">
                                <summary class="text-black" style="cursor: pointer; font-weight: 400;">
                                    Lihat Sub Kategori({{ count(explode(',', $item->subkategori)) }})
                                </summary>
                                <div class="mt-2 d-flex flex-wrap gap-1">
                                    @foreach(explode(',', $item->subkategori) as $sub)
                                        <span class="badge border text-dark bg-light">
                                            {{ trim($sub) }}
                                        </span>
                                    @endforeach
                                </div>
                            </details>
                        @else
                            <span class="text-muted small">-</span>
                        @endif
                    </td>
                    <td><i class="{{ $item->icon }}" style="font-size: 50px;"></i></td>
                    <td>
                        <button wire:click="edit({{ $item->id }})">Edit</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="staticBackdrop" wire:ignore.self data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{$isEditMode ? 'Ubah Kategori' : 'Tambah Kategori Baru'}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="categories" class="form-label">Nama Kategori : </label>
                        <input name="category" class="form-control" id="categories" placeholder="Example" wire:model="Kategori">
                    </div>
                    <div class="mb-3">
                        <label for="categories" class="form-label">Nama Sub Kategori : </label>
                        <input name="category" class="form-control" id="categories" placeholder="Example1,Example2" wire:model="Kategori">
                    </div>
                    <div class="mb-3">
                        <label for="Ikon" class="form-label">Icon : </label>
                        <input name="icons" class="form-control" id="Ikon" placeholder="fa fa-object" wire:model="icon">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="close">Tutup</button>
                    <button type="button"  wire:click="save" data-bs-dismiss="modal" class="btn btn-primary">{{$isEditMode ? 'Simpan Perubahan' : 'Tambahkan'}}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="staticBackdropdelete" wire:ignore.self data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Apakah kamu yakin?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="close"></button>
                </div>
                <div class="modal-body">
                    Kategori yang yang dihapus tidak dapat diurungkan
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" wire:click="close">Batalkan</button>
                    <button type="button" data-bs-dismiss="modal" class="btn btn-danger" wire:click="delete(null, 1)">Hapus</button>
                </div>
            </div>
        </div>
    </div>
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        // Tunggu sampai Livewire siap
        document.addEventListener('livewire:init', () => {
            
            // 1. Dengar event 'openModal'
            Livewire.on('openModal', (event) => {
                console.log("Sinyal openModal diterima!");
                let myModal = document.getElementById('staticBackdrop');
                let modalInstance = bootstrap.Modal.getInstance(myModal);
                if (!modalInstance) {
                    modalInstance = new bootstrap.Modal(myModal);
                }
                modalInstance.show();
            });

            // 2. Dengar event 'closeModal'
            Livewire.on('closeModal', (event) => {
                let modalElement = document.getElementById('staticBackdrop');
                let modalInstance = bootstrap.Modal.getInstance(modalElement);
                if (modalInstance) {
                    modalInstance.hide();
                }
            });

            Livewire.hook('morph.updated', ({ component }) => {
                Entries();
            });

        });

        window.onload =  Entries();
        function Entries() {
            const input = document.getElementById("Category_lookup");
            var filter = input.value.toUpperCase();
            const table = document.getElementById('Category');
            const rows = table.getElementsByTagName('tr');
            const rowsToShow = Number(document.getElementById("entries").value);
            let visibleRowIndex = 0;
            let entriesshown = 0; 

            // Start index from 1 to skip the table header row (thead)
            for (let i = 1; i < rows.length; i++) {
                td = rows[i].getElementsByTagName("td")[1];
                if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1){
                    rows[i].style.display = "";
                    rows[i].style.backgroundColor = (visibleRowIndex % 2 == 0) ? "#ffffff" : "#D6EEEE";
                    entriesshown++;
                    visibleRowIndex++;
                }else{
                    rows[i].style.display = "none";
                }
                if (entriesshown > rowsToShow) {
                    rows[i].style.display = "none";
                }
            }
        }
    }


        function sortTable(n) {
        if(n != 0){
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
        }else{
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
                x = rows[i].getElementsByTagName("TD")[0];
                y = rows[i + 1].getElementsByTagName("TD")[0];
                /* Check if the two rows should switch place,
                based on the direction, asc or desc: */
                if (dir == "asc") {
                    if (Number(x.innerHTML) > Number(y.innerHTML)) {
                    // If so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                    }
                } else if (dir == "desc") {
                    if (Number(x.innerHTML) < Number(y.innerHTML)) {
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
    }
    </script>
</div>