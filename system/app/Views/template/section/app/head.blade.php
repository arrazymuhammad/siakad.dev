<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Siakad Teknik Informatika</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta name="robots" content="all,follow">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{url('public/plugins/bootstrap/css/bootstrap.css')}}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
        <link rel="stylesheet" href="{{url('public/css/style.default.css')}}">
        <link rel="stylesheet" href="{{url('public/css/custom.css')}}">
        <link rel="shortcut icon" href="{{url('public/img/favicon.png')}}">
        <link rel="stylesheet" href="{{url('public/plugins/font-awesome/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{url('public/plugins/icons-reference/styles.css')}}">
        {{-- <link rel="stylesheet" href="https://file.myfontastic.com/da58YPMQ7U5HY8Rb6UxkNf/icons.css"> --}}
        <link href="{{url('public/plugins/datatables/datatables.css')}}" rel="stylesheet" type="text/css" />

        @yield('custom_css')