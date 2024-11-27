<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.png') }}">
    <title>MaxControl</title>
    @yield('metatags')


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    @yield('css')

    <style>
        .main-body {
            min-height: calc(100vh - 161px - 292.8px - 22.5px) !important;
            background-color: black;
        }

        header {
            background-color: #4DC3C3;
        }

        /* FOOTER */

        .rodape {
            text-align: center;
            background-color: #4DC3C3;
        }

        .rodape__lista {
            display: flex;
            justify-content: center;
            list-style-type: none;
            display: flex;
            justify-content: space-evenly;
            margin: 1em;

        }

        .lista__link a {
            color: black;
            text-decoration: none;
            font-size: 16px;
        }

        .rodape__texto {
            font-size: 14px;
            color: #646161;
        }

        .lista__link a:active {
            color: #800080;
        }

        /* FOOTER */

        .img-top {
            width: 50px;
            height: 50px;
        }

        .logo-top {
            width: 100%;
            max-width: 150px;
            display: block;
            margin-left: 250px;
            border-radius: 10px;
        }

        .btn-color-one {
            background-color: #4DC3C3;
            border: none;
            color: black;
        }

        .btn-color-two {
            background-color: grey;
            border: none;
        }

        .btn-color-three {
            background-color: #F05A28;
            border: none;
        }

        .span-input {
            background-color: white;
        }

        .light-letter {
            color: white;
        }

        .icon-input {
            font-size: 23px;
            color: black;
            background-color: transparent;
        }
    </style>
</head>

<body>
    <main class="my-0 main-body">
        @yield('content')
    </main>


    <footer class="rodape py-2">
        @yield('footer')
        <div class="d-flex justify-content-center">
            <a href="" class="px-3"><i class="fa-brands fa-instagram icon-input"></i></a>
            <a href="" class="px-3"><i class="fa-brands fa-whatsapp icon-input"></i></a>
        </div>
        <ul class="rodape__lista">
            <li class="lista__link">
                <a href="#">Quem somos</a>
            </li>
            <li class="lista__link">
                <a href="#">Politica de Privacidade</a>
            </li>
            <li class="lista__link">
                <a href="#">Termos de uso</a>
            </li>
        </ul>

        <span class="rodape__texto"><i class="bi bi-c-circle"></i> 2024 - Maxwell Rodrigues</span>

    </footer>

    <!-- Bootstrap JavaScript -->
    <script src="{{ asset('bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('bootstrap/popper.min.js') }}"></script>

    <!-- Main JavaScript -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- jQuery Mask Plugin v1.14.15 -->
    <script src="{{ asset('maskJs/mask.js') }}"></script>
    <!-- JS bootstrap-tagsinput v0.8.0  -->
    <script src="{{ asset('tagsinput/tagsinput4.js') }}"></script>
    <script src="{{ asset('validateJs/validate.js') }}"></script>
    <script src="{{ asset('validateJs/validate_pt-BR.js') }}"></script>
    <script>function removeRow(element) {
            // Encontra o elemento pai <tr> da linha onde o ícone foi clicado
            var row = element.closest('tr');

            // Remove a linha da tabela
            row.remove();
        }
    </script>
    @yield('js')
</body>

</html>