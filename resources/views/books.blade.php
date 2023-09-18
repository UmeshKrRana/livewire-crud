<!doctype html>
<html lang="en">

<head>
    <title>CRUD App Using Livewire in Laravel 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- Bootstrap CSS v5.2.1 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    {{--  Livewire Styles --}}
    @livewireStyles
</head>

<body>
    <main class="pt-3 px-5">
        <div class="container-fluid">
            <h3 class="text-center fw-bold border-bottom pb-2">CRUD App Using Livewire in Laravel 10 </h3>
            <div class="row justify-content-center mt-3">

                {{-- Calling Livewire Component --}}
                @livewire('book-manager')
            </div>
        </div>
    </main>


    {{--  jQuery CDN --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    {{-- Bootstrap JavaScript Libraries --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"></script>

    {{-- Livewire Scripts --}}
    @livewireScripts

</body>

</html>
