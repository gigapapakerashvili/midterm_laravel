<!DOCTYPE html>
<html lang="en">
<head>
    @include('meta')
</head>

<body>

@include('header')

<div class="container">
    @yield('content')
</div>

@include('footer')

@yield('scripts')
</body>
</html>
