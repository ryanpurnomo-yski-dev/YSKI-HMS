<?php

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Kategori;
use App\Models\Tickets;
use Illuminate\Support\Facades\Http;

new class extends Component
{
    use WithFileUploads;

    public $KategoriId, $Kategori, $icon;
    public $selectedCategory;
    public $subCategories = [];
    public $selectedSubCategory, $description, $picture;


    public function updatedSelectedCategory($value)
    {
        $category = Kategori::find($value);
        $this->subCategories = $category ? array_filter(array_map('trim', explode(',', $category->subkategori))) : [];
        $this->selectedSubCategory = null;
    }

    public function submit()
    {
        //dd($this->selectedCategory);
        
        // Http::post(route('tickets.post'), [
        //     'category_id' => $this->selectedCategory,
        //     'sub_category' => $this->selectedSubCategory
        // ]);
        if ($this->picture === null) {
            $this->addError('picture', 'File lampiran harus diisi');
            return;
        }
        return redirect()->route('tickets.post',[
            'category_id' => $this->selectedCategory,
            'sub_category' => $this->selectedSubCategory,
            'description' => $this->description,
            'picture' => $this->picture->getClientOriginalName()
            // base64_encode($this->picture)
        ]);
        //dd($response->status(), $response->body());
    }

    public function render()
    {
        return view('components.pages.form_tickets_hms', [
            'categories' => Kategori::all()
        ]);
    }
};
?>

<div class="container-fluid px-0">
    <h2>Form Laporan</h2>
    <!-- <div style="display:flex"><p>Home / Barang /&nbsp;</p><p style="color:#009dff">Kategori</p></div> -->
    
    <div class="card table-card border-1 shadow-sm">
        <div class="card-header bg-light border-bottom">
            <h6>Formulir Laporan</h6>
        </div>
        <form class="card-body p-3" wire:submit.prevent="submit">
            <label>Kategori</label>
            <select class="form-control" 
                wire:model.live="selectedCategory">
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $ctgrs => $item)
                    <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                @endforeach
            </select>

            @if(!empty($subCategories))
            <div>
                <label class="mt-2">Sub Kategori</label>
                <select class="form-control" wire:model="selectedSubCategory">
                    <option value="">-- Pilih Sub Kategori --</option>
                    @foreach($subCategories as $subCat)
                        <option value="{{ $subCat }}">{{ $subCat}}</option>
                    @endforeach
                </select>
            </div>
            @endif

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