<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Employee Track') }}</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../../css/all.min.css"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>



    <header>
        @yield('header')
       
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        @extends('comm.footer')
    </footer>




</body>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/bootstrap.bundle.min.js"></script>
<script src="../../js/jquery-3.7.1.min.js"></script>
<script src="../../js/jquery.bs.calendar.js"></script>
<script src="../../js/location.js"></script>
</html>