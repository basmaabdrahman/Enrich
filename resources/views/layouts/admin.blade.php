<!DOCTYPE >
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @extends('layouts.head')
    @section('title')
        Dashboard
    @endsection
</head>

<body class="">
<div class="wrapper">
    @include('layouts.main-sidebar')
    <div class="main-panel">
        @include('layouts.navbar')
        <div class="content">

            @yield('content')
        </div>
        @include('layouts.footer')

    </div>
</div>
@include('layouts.scripts')
</body>
</html>
