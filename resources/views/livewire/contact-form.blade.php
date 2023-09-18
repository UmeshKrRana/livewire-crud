<div class="container my-2">
    <div class="row">
        <div class="col-xl-6 m-auto">

            {{-- form starts --}}
            <form wire:submit.prevent="submitForm">
                <div class="card shadow">
                    <div class="card-header">
                        <h4 class="card-title fw-bold">Livewire Form Validation </h4>
                    </div>

                    <div class="card-body">

                        {{-- name --}}
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" wire:model="name" placeholder="Name" aria-describedby="name-error" aria-required="true" @error('name') aria-invalid="true" @enderror class="form-control @error('name') is-invalid @enderror">

                            {{-- Display name validation error message --}}
                            @error('name')
                                <span id="name-error" class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- email --}}
                        <div class="form-group my-3">
                            <label for="email">Email</label>
                            <input type="text" id="email" wire:model="email" placeholder="Email" aria-describedby="email-error" @error('email') aria-invalid="true" @enderror class="form-control @error('email') is-invalid @enderror">

                            {{-- Display email validation error message --}}
                            @error('email')
                                <span id="email-error" class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- message --}}
                        <div class="form-group my-3">
                            <label for="message">Message</label>
                            <textarea id="message" wire:model="message" placeholder="Message" aria-describedby="message-error" @error('message') aria-invalid="true" @enderror class="form-control @error('message') is-invalid @enderror"></textarea>

                            {{-- Display message validation error message --}}
                            @error('message')
                                <span id="message-error" class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
            {{-- form ends --}}
        </div>
    </div>
</div>
