<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials._head')
</head>

<body>
    @include('partials._nav')

    <div class="container">
        @yield('content')
    </div>
    <hr>
    @include('partials._footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    @yield('scripts')
</body>
</html>
