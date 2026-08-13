<div class="modal fade" id="itemsCategoryModal" tabindex="-1" arialabelledby="ItemsCategoryModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Items Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label for="categories" class="form-label">Nama Kategori : </label>
                    <input
                        name="category"
                        class="form-control"
                        id="categories"
                        placeholder="-- Masukkan Kategori Barang --"
                        wire:model="kategori">

                    @error('kategori')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <button
                    type="button"
                    class="btn btn-primary"
                    wire:click="store">
                    Submit
                </button>
            </div>
        </div>
    </div>
</div>