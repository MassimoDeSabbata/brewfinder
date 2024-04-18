<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BrewFinder</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/9c6a5c7fa4.js" crossorigin="anonymous"></script>

</head>

<body>
    <!-- Page Content -->
    <main>
        <div class="row pr-4 pl-4 mb-4" style="background-color: rgb(215, 117, 64);">
            <div class="col-10 ">
                <span>
                    <h1 style="color: white;"> <i class="fa-solid fa-beer-mug-empty"></i> BrewFinder</h1>

                </span>
            </div>
            <div class="col-2 text-right pt-2">
                <a href="{{route('logout')}}" style="color: white;" class="mt-4">LogOut</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 pl-4 pr-4">
                {{ $slot }}
            </div>
        </div>
    </main>

</body>

</html>