<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap"
          rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet">
    <link href="{{asset('css/admin/phoenix.min.css')}}" rel="stylesheet" id="style-default">
    <style>
        body {
            opacity: 0;
        }
    </style>
</head>
<body>
    <main class="main" id="top">
        <div class="container-fluid px-0">

            @yield('content')
        </div>
    </main>

    <script src="{{ asset('js/admin/phoenix.js') }}"></script>
    <script src="{{ asset('js/admin/ecommerce-dashboard.js') }}"></script>
</body>
</html>
