<?php

use Livewire\Component;
use App\Models\Barang;
use App\Models\KategoriBarang;

new class extends Component
{
    public $user;
    public $selectedCategory = '';
    public $selectedSubCategory = '';
    public $kuantitas = 1;

    public function render()
    {
        $filteredItems = Barang::query()
            ->when($this->selectedCategory, function ($query) {
                $query->where('kategori_barang', $this->selectedCategory);
            })
            ->get();

        return view('components.pages.form_items_hms', [
            'user' => $this->user = auth()->user(),
            'itemsCategory' => KategoriBarang::all(),
            'items' => $filteredItems
        ]);
    }
}

?>

<div class="container-fluid px-0">
    <h2>Form Permintaan Pengadaan Barang</h2>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <div class="card table-card border-1 shadow-sm">
        <div class="card-header bg-light border-bottom">
            <h6>Formulir Permintaan Pengadaan Barang</h6>
        </div>
        <form class="card-body p-3" action="{{ route('items.itemsTransaction.post') }}" method="POST" class="row g-3">
            @csrf
            <input type="text" name="user" value="{{ $user }}" hidden>
            <label>Kategori</label>
            <select class="form-control" name="kategori_barang" wire:model.live="selectedCategory">
                <option value="">-- Pilih Kategori Barang --</option>
                @foreach($itemsCategory as $iC)
                    <option value="{{ $iC->kategori }}">{{ $iC->kategori }}</option>
                @endforeach 
            </select>

            <div>
                <label class="mt-2">Nama Barang</label>
                <select class="form-control" name="kode_barang" wire:model="selectedItem">
                    <option value="">-- Pilih Nama Barang --</option>
                    @foreach($items as $itms)
                        <option value="{{ $itms->kode_barang }}">
                            {{ $itms->nama_barang }} ({{ $itms->kode_barang }}) - {{ $itms->merk_barang }}
                        </option>
                    @endforeach 
                </select>
                @error('selectedItem') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div>
                <label class="mt-2">Kuantitas Barang</label>
                <input type="number" min="1" class="form-control" name="kuantitas_barang" wire:model="kuantitas"
                    placeholder="-- Masukkan Kuantitas Barang --">
                @error('kuantitas') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mt-3 d-flex flex-row gap-2 align-items-center">
                <button type="submit" class="btn bg-primary text-white"><i class="fas fa-save"></i> Simpan</button>
                <a href="/user/items/requests" class="btn bg-secondary text-white"><i class="fas fa-times"></i> Batal</a>
            </div>
        </form>
    </div>
</div>