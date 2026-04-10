<?php

use Livewire\Component;

new class extends Component
{

}

?>

<div class="container-fluid px-0">
    <h2>Form Pengadaan Barang</h2>

    <div class="card table-card border-1 shadow-sm">
        <div class="card-header bg-light border-bottom">
            <h6>Formulir Pengadaan</h6>
        </div>
        <form class="card-body p-3" wire:submit.prevent="submit">
            <label>Kategori</label>
            <select class="form-control" 
                wire:model.live="selectedCategory">
                <option value="">-- Pilih Kategori --</option>
                <option value="">Makanan</option>
            </select>

            <div>
                <label class="mt-2">Sub Kategori</label>
                <select class="form-control" wire:model="selectedSubCategory">
                    <option value="">-- Pilih Sub Kategori --</option>
                </select>
            </div>

            <label class="mt-2">Keterangan</label>
            <textarea class="form-control" wire:model="description"></textarea>

            <label class="mt-2">Lampiran</label>
            <input class="form-control" type="file" wire:model="picture">

            <div class="mt-3 d-flex flex-row gap-2 align-items-center justify-content-center">
                <button type="submit" class="btn bg-primary text-white">Simpan</button>
                <button class="btn bg-secondary text-white">Batal</button>
            </div>
        </form>
    </div>
</div>
