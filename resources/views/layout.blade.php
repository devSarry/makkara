<!doctype html>

<html lang="en">
    <head>
      <meta charset="utf-8">

      <title>@yield('title')</title>
      <meta name="description" content="Document">
      <meta name="author" content="Jonathan Sarry">

    <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <!-- link -->
        <link rel="stylesheet" href="{{url('/css/app.css')}}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    </head>

    <body>


    <div class="page">

        <!--Header Nav Bar -->
            @include('includes.header')
        <!--/Header Nav Bar -->

            <div id="main" class="main">

                @yield('content')

            </div>
        @yield('foot')
        <!--Footer Bar -->
            @include('includes.footer')
        <!--/Footer Bar -->

    </div>

    </body>
</html>