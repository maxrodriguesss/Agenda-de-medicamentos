<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" type="image/x-icon" href="@yield('favicon', asset('favicon.png'))">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">
    
    <!-- Bootstrap Icones -->
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">

    <!-- CSS Main -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <style>
            .main-body {
                height: 100vh;
                background-color: black;
            }
            .login-logo{
                width: 100%;
                max-width: 300px;
                display: block;
                margin: -50px auto;
                border-radius: 10px;
            }
            .login-form{
                display: block;
                margin: 60px auto;
            }
            .btn-color-one{
                background-color: #4DC3C3;
                border: none;
                color: black;
            }
            .btn-color-two{
            background-color: grey;
            border:none;
            }
            .span-input{
            background-color: white;
            }
            .light-letter{
            color: white;
            }
            .transparent{
                background: transparent;
            }
        </style>
    </head>

    <body>
    <div class="main-body">
        <div class="form-box p-3">
            <video autoplay loop muted id="logo-video" class="login-logo">
                <source src="{{ asset('img\logo.mp4')}}">
            </video>
            <form action="{{route('index.submit')}}" class="login-form" method="POST">
                @csrf
                <div class="mb-3 d-flex align-items-center border border-black rounded-4 p-1 span-input">
                    <span class="input-group-text border-0 transparent" id="enterprise-addon">
                        <i class="fa-solid fa-building icon-input"></i>
                    </span>
                    <input 
                    type="text" 
                    id="usuario" 
                    name="usuario" 
                    :value="__('usuario')"
                    class="form-control border-0 shadow-none"
                    placeholder="Usuário" 
                    aria-label="usuario da empresa" 
                    aria-describedby="enterprise-addon">
                </div>
    
                <div class="d-flex align-items-center border border-black rounded-4 p-1 span-input">
                    <span class="input-group-text border-0 transparent" id="password-addon">
                        <i class="fa-solid fa-key icon-input"></i>
                    </span>
                    <input 
                    type="password" 
                    id="password" 
                    name="password"
                    :value="__('Password')" 
                    class="form-control border-0 shadow-none"
                    placeholder="Senha" 
                    aria-label="Senha do usuário" 
                    aria-describedby="password-addon" 
                    required>
                    <button class="btn btn-outline-secondary border-0" type="button" id="show_password" onmousedown="showPassword()"
                        onmouseup="hidePassword()"><i class="fa-regular fa-eye-slash icon-input"></i>
                </div>
                <!-- Opções de Manter  conectado e esqueceu a senha -->
                <div class="form-check d-flex justify-content-between mt-0 conexao">
                    <div class="mb-3">
                        <input type="checkbox" class="form-check-input border border-black rounded-0" id="exampleCheck1">
                        <label class="form-check-label light-letter" for="exampleCheck1">Manter
                            conectado</label>
                    </div>
                    <a href="#" class="no-decoration">Esqueceu a senha?</a>
                </div>
                <!-- Opções de Manter  conectado e esqueceu a senha -->
                <!-- Botões -->
                <div class="d-grid gap-2 col-8 mx-auto">
                    <button class="btn btn-primary btn-color-one" type="submit">
                        LOGIN <i class="fa-solid fa-right-to-bracket"></i>
                    </button>
                </div>
                    <div class="d-flex justify-content-between">
                        <hr width="40%">
                        <p class="my-2 light-letter">OU</p>
                        <hr width="40%">
                    </div>
                <div class="d-grid gap-2 col-8 mx-auto">
                    <a href="{{ route('registers') }}" class="btn btn-primary btn-color-two" type="button">Solicitar acesso</a>
                </div>
                <!-- Botões -->
                @if(session('error'))
                    <div class="input-group mb-3">
                        {{ session('error') }}
                    </div>
                @endif
            </form>
        </div>
    </div>
    @section('js')
    @endsection
    </body>
</html>

   