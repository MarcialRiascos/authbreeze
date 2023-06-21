<!DOCTYPE html>
<html lang="en">

<head>
 @include('layouts._partials.dashboardhead')
</head>

<body>
 @include('layouts._partials.dashboardnav')
 @include('layouts._partials.dashboardmenu')
 @include('layouts._partials.message')
 @include('sweetalert::alert')
 @yield('content')
 @include('layouts._partials.dashboardfooter')
 @include('layouts._partials.dashboardscripts')
</body>

</html>
