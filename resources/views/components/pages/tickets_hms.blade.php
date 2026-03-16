<?php

use Livewire\Component;

new class extends Component
{
    
};
?>

<div>
    <h1>Form Keluhan</h1>
    <div style="display:flex"><p>Home / Barang /&nbsp;</p><p style="color:#009dff">Kategori</p></div>
    
    <div class="card p-3">
        <h2>Isi Data Formulir Keluhan</h2>
        <form>
            <label>Kategori</label>
            <select class="form-control">
                <option>-- Pilih Kategori --</option>
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