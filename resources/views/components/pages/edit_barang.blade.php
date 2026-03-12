<?php

use App\Models\Barang;
use Illuminate\Validation\Rule;
use Livewire\Component;

new class extends Component
{
    public int $barang_id;
    public string $kode_barang = '';
    public string $kategori_barang = '';
    public string $nama_barang = '';
    public string $merk_barang = '';

    public function mount(int $id): void
    {
        $barang = Barang::findOrFail($id);

        $this->barang_id = $barang->id;
        $this->kode_barang = $barang->kode_barang;
        $this->kategori_barang = $barang->kategori_barang;
        $this->nama_barang = $barang->nama_barang;
        $this->merk_barang = $barang->merk_barang;
    }

    protected function rules(): array
    {
        return [
            'kode_barang' => [
                'required',
                'string',
                'max:50',
                Rule::unique('barang', 'kode_barang')->ignore($this->barang_id),
            ],
            'kategori_barang' => ['required', 'string', 'max:255'],
            'nama_barang' => ['required', 'string', 'max:255'],
            'merk_barang' => ['required', 'string', 'max:255'],
        ];
    }

    public function update(): void
    {
        $this->validate();

        Barang::whereKey($this->barang_id)->update([
            'kode_barang' => $this->kode_barang,
            'kategori_barang' => $this->kategori_barang,
            'nama_barang' => $this->nama_barang,
            'merk_barang' => $this->merk_barang,
        ]);

        session()->flash('success', 'Barang berhasil diperbarui.');
    }
};
?>

<div class="container-fluid px-0">
    <div class="mb-3">
        <h2 class="h4 mb-1">Edit Barang</h2>
        <p class="text-secondary small mb-1">Master / Barang / Edit</p>
    </div>

    <div class="card border-1 shadow-sm">
        <div class="card-header bg-light border-bottom">
            <h3 class="h6 mb-1 fw-semibold">Form Edit Barang</h3>
        </div>

        <div class="card-body p-3">
            @if (session('success'))
                    <div class="alert alert-success d-flex align-items-center justify-content-between py-2" role="alert">
                        <span>{{ session('success') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            @endif
            <form wire:submit.prevent="update" class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Kode Barang</label>
                    <input type="text" class="form-control" wire:model.defer="kode_barang" placeholder="Contoh: BRG-001">
                    @error('kode_barang')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Kategori Barang</label>
                    <input type="text" class="form-control" wire:model.defer="kategori_barang" placeholder="Contoh: Elektronik">
                    @error('kategori_barang')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" wire:model.defer="nama_barang" placeholder="Contoh: Laptop">
                    @error('nama_barang')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Merk Barang</label>
                    <input type="text" class="form-control" wire:model.defer="merk_barang" placeholder="Contoh: Lenovo">
                    @error('merk_barang')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="/user/items" class="btn btn-outline-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
