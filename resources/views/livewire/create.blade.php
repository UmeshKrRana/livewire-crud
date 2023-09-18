<!-- Modal -->
<div wire:ignore.self class="modal fade" id="bookModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="bookModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="bookModalLabel">{{ $isView ? 'Show' : ($isEdit ? 'Update' : 'Create') }} Book</h5>
                <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                {{-- Form starts --}}
                <form wire:submit.prevent="saveBook">

                    {{-- Book title --}}
                    <div class="form-group mb-3">
                        <label for="title">Book Title <span class="text-danger">*</span></label>
                        <input type="text" {{$isView ? 'disabled' : '' }} class="form-control" placeholder="Book Title" wire:model="title" />
                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    {{-- Book author --}}
                    <div class="form-group mb-3">
                        <label for="title">Author <span class="text-danger">*</span></label>
                        <input type="text" {{$isView ? 'disabled' : '' }} class="form-control" placeholder="Book Author" wire:model="author" />
                        @error('author') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    {{-- Book price --}}
                    <div class="form-group mb-3">
                        <label for="price">Price <span class="text-danger">*</span></label>
                        <input type="text" {{$isView ? 'disabled' : '' }} class="form-control" placeholder="Book Price" wire:model="price" />
                        @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    {{-- Book publisher --}}
                    <div class="form-group mb-3">
                        <label for="publisher">Publisher <span class="text-danger">*</span></label>
                        <input type="text" {{$isView ? 'disabled' : '' }} class="form-control" placeholder="Publisher Name" wire:model="publisher" />
                        @error('publisher') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="text-end">
                        <button type="button" wire:click="closeModal" data-bs-dismiss="modal" class="btn btn-secondary">Close</button>

                        {{-- If not view then only show the submit button --}}
                        @if (!$isView)
                            <button type="submit" class="btn btn-success">Save</button>
                        @endif
                    </div>

                </form>
                {{-- Form ends --}}
                
            </div>
        </div>
    </div>
</div>
