{{-- Delete Book Modal --}}
<div wire:ignore.self class="modal fade" id="deleteBookModal" tabindex="-1" aria-labelledby="deleteBookModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="deleteBookModalLabel">Delete Book</h5>
                <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            {{-- Form starts --}}
            <form wire:submit.prevent="destroyBook">
                <div class="modal-body py-5">
                    <h5 class="ps-3">Are you sure you want to delete?</h5>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Yes! Delete</button>
                    <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
            {{-- Form ends --}}

        </div>
    </div>
</div>
