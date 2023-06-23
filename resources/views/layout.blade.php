<!DOCTYPE html>
<html lang="en">
@section('title', 'Начало')
<head>
    @include('partials.header')
</head>

<body class="mb-48">

    @include('partials.navbar')

    @yield('content')

    @include('partials.footer')
</body>
</html>


