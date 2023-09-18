<div>
    @include('livewire.create')

    <div class="row">
        <div class="col-12 text-end">
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
                                    <td>
                                        {{$book->title}}
                                    </td>
                                    <td>
                                        {{$book->author}}
                                    </td>
                                    <td>
                                        {{$book->price}}
                                    </td>
                                    <td>
                                        {{$book->publisher}}
                                    </td>
                                    <td>
                                        {{-- <button wire:click="editPost({{$book->id}})" class="btn btn-primary btn-sm">Edit</button>
                                        <button onclick="deletePost({{$book->id}})" class="btn btn-danger btn-sm">Delete</button> --}}
                                    </td>
                                </tr>
                        @empty
                            <tr>
                                <td colspan="3" align="center">
                                    No Posts Found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
