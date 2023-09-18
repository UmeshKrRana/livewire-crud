<div>
    @include('livewire.create')
    @include('livewire.delete-book')

    <div class="row">

        {{-- Alert --}}
        <div class="col-xl-6 col-md-6 col-6">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <strong>Success!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                        aria-label="Danger:">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    <strong>Alert!</strong> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>

        {{-- Add New Book --}}
        <div class="col-xl-6 col-md-6 col-6 text-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookModal">
                Add New Book
            </button>
        </div>
    </div>

    <div class="card shadow mt-3">
        <div class="card-body">
            <div class="table-responsive mt-3">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Price</th>
                            <th>Publisher</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($books as $book)
                            <tr>
                                <td>{{ $book->id }}</td>
                                <td>
                                    {{ $book->title }}
                                </td>
                                <td>
                                    {{ $book->author }}
                                </td>
                                <td>
                                    {{ $book->price }}
                                </td>
                                <td>
                                    {{ $book->publisher }}
                                </td>
                                <td>
                                    <button wire:click="showBook({{ $book->id }})" data-bs-toggle="modal"
                                        data-bs-target="#bookModal" class="btn btn-info btn-sm">View</button>
                                    <button wire:click="editBook({{ $book->id }})" data-bs-toggle="modal"
                                        data-bs-target="#bookModal" class="btn btn-success btn-sm">Edit</button>
                                    <button wire:click="deleteBook({{ $book->id }})" data-bs-toggle="modal"
                                        data-bs-target="#deleteBookModal" class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" align="center">
                                    <span class="text-danger"> No Records Found </span>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('close-modal', event => {
            $('#bookModal').modal('hide');
            $('#deleteBookModal').modal('hide');
        });
    </script>
</div>
