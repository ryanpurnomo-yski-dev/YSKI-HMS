<?php

use App\Models\User;
use App\Models\Barang;
use Livewire\Component;

new class extends Component
{
    public string $kode_barang = '';
    public string $kategori_barang = '';
    public string $nama_barang = '';
    public string $merk_barang = '';
    public $user;

    protected function rules(): array
    {
        return [
            'kode_barang' => ['required', 'string', 'max:50', 'unique:barang,kode_barang'],
            'kategori_barang' => ['required', 'string', 'max:255'],
            'nama_barang' => ['required', 'string', 'max:255'],
            'merk_barang' => ['required', 'string', 'max:255'],
        ];
    }

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function save()
    {
        return redirect()->route('items.post',[
            'kode_barang' => $this->kode_barang,
            'kategori_barang' => $this->kategori_barang,
            'nama_barang' => $this->nama_barang,
            'merk_barang' => $this->merk_barang,
        ]);
    }

    public function render()
    {
        return view('components.pages.form_requests_items_hms', [
            'items' => Barang::all()
        ]);
    }
};
?>

<div class="container-fluid px-0">
    <div class="mb-3">
        <h2 class="h4 mb-1">Form Permintaan Pengadaan Barang</h2>
    </div>

    <div class="card border-1 shadow-sm">
        <div class="card-header bg-light border-bottom">
            <h3 class="h6 mb-1 fw-semibold">Form Permintaan Pengadaan Barang</h3>
        </div>

        <div class="card-body p-3">
            @if (session('success'))
                    <div class="alert alert-success d-flex align-items-center justify-content-between py-2" role="alert">
                        <span>{{ session('success') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            @endif

            @if($user->role->name === "Staff")
            <form wire:submit.prevent="save" class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Kategori Barang</label>
                    <select class="form-control" 
                        wire:model.live="selectedCategory">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($items as $itms => $item)
                            <option value="{{ $item->id }}">{{ $item->kategori_barang }}</option>
                        @endforeach
                    </select>
                    @error('kategori_barang')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nama Barang</label>
                    <select class="form-control" 
                        wire:model.live="selectedCategory">
                        <option value="">-- Pilih Barang --</option>
                        @foreach($items as $ctgrs => $item)
                            <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                        @endforeach
                    </select>
                    @error('nama_barang')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Merk Barang</label>
                    <select class="form-control" 
                        wire:model.live="selectedCategory">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($items as $ctgrs => $item)
                            <option value="{{ $item->id }}">{{ $item->merk_barang }}</option>
                        @endforeach
                    </select>
                    @error('merk_barang')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Kode Barang</label>
                    <select class="form-control" 
                        wire:model.live="selectedCategory">
                        <option value="">-- Pilih Kode Barang --</option>
                        @foreach($items as $itms => $item)
                            <option value="{{ $item->id }}">{{ $item->kode_barang }}</option>
                        @endforeach
                    </select>
                    @error('kode_barang')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="/user/items" class="btn btn-outline-secondary">Kembali</a>
                </div>
            </form>
            @else 
            <form wire:submit.prevent="save" class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Kategori Barang</label>
                    <input type="text" class="form-control" name="kategori_barang">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Merk Barang</label>
                    <input type="text" class="form-control" name="merk_barang">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Kode Barang</label>
                    <input type="text" class="form-control" name="kode_barang">
                </div>

                <div class="col-12 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="/user/items" class="btn btn-outline-secondary">Kembali</a>
                </div>
            </form>
            @endif

        </div>
    </div>
</div>
