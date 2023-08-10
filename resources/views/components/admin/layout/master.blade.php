<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>


    <link rel="icon" href="{{ asset('admin/assets/img/logo.png') }}" type="image/x-icon">

    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet">



</head>

<body class="sb-nav-fixed">
    <x-admin.layout.partials.topbar />


    <x-admin.layout.partials.sidebar />

    {{ $slot }}

    <x-admin.layout.partials.footer />
    </div>

    </div>


  <script src="https://kit.fontawesome.com/496c26838e.js" crossorigin="anonymous"></script>
    
    {{-- <script src="{{ asset('js/boostrap.min.js') }}"></script> --}}
    @stack('data')
 
</body>

</html>
