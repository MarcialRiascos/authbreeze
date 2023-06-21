<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts._partials.head')
</head>

<body>
    @include('layouts._partials.nav')
    @yield('content')
    @yield('table')
    @include('layouts._partials.scripts')
</body>

</html>
