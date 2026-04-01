<?php

use Livewire\Component;
use App\Models\Kategori;
use App\Models\Tickets;

new class extends Component
{
    public $KategoriId, $Kategori, $icon;

    public function render()
    {
        return view('components.pages.form_tickets_hms', [
            'categories' => Kategori::all()
        ]);
    }
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
                @foreach($categories as $ctgrs => $item)
                    <option>{{ $item->kategori }}</option>
                @endforeach
            </select>

            <label class="mt-2">Sub Kategori</label>
            <select class="form-control">
                <option>-- Pilih Sub Kategori --</option>
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
    </div>
</div>