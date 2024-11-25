@extends('layouts.app')
@section('metatags')

@endsection
@section('css')
<style>
    .main-body {
        height: 76vh;
    }
    input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }
</style>
@endsection

<header>
    <nav class="py-2 top-bar">
        {{-- Acesso Rápido do Header --}}
        <div class="container">
            <div class="row">
                <a href="{{ route('index') }}" class="col-4 text-start"><img src="{{ asset('img/voltar.png') }}"
                        class="img-top"></a>
                <h3 class="col-4 text-center pt-2">Cadastro</h3>
                <a class="col-4 text-end" href="{{ route('index') }}"><img src="{{ asset('img/logo.png') }}"
                        class="logo-top" alt="Logo da MaxControl"></a>
            </div>
        </div>
    </nav>
</header>

@section('content')
<main class="my-0 main-body">
    <form id="formRegisters" name="formRegisters" action="{{route('registers.submit')}}" method="POST">
        @csrf
        <div class="d-flex flex-column align-items-center">
            <div class="form-box p-3">
                <!-- Email e senha -->
                <div class="mb-3 d-flex align-items-center border border-black rounded-4 p-1 form-group span-input">
                    <span class="input-group-text border-0 span-input">
                        <i class="fa-solid fa-signature icon-input"></i>
                    </span>
                    <input type="text" id="all_name" name= "all_name" class="form-control border-0 shadow-none" placeholder="Nome completo" required>
                </div>
                <div class="mb-3 d-flex align-items-center border border-black rounded-4 p-1 form-group span-input">
                    <span class="input-group-text border-0 span-input">
                        <i class="fa-regular fa-building icon-input"></i>
                    </span>
                    <input type="text" id="company_name" name= "company_name" class="form-control border-0 shadow-none" placeholder="Razão social" required>
                </div>
                <div class="mb-3 d-flex align-items-center border border-black rounded-4 p-1 form-group span-input">
                    <span class="input-group-text border-0 span-input">
                        <i class="fa-solid fa-hashtag icon-input"></i>
                    </span>
                    <input type="text" id="cnpj" name="cnpj" class="form-control cnpj border-0 shadow-none" placeholder="CNPJ" required>
                </div>
                <div class="mb-3 d-flex align-items-center border border-black rounded-4 p-1 form-group span-input">
                    <span class="input-group-text border-0">
                        <i class="fa-solid fa-at icon-input"></i>
                    </span>
                    <input type="email" id="email" name="email" aria-describedby="emailHelp" class="form-control border-0 shadow-none" placeholder="Email" required>
                </div>
                <div class="mb-3 d-flex align-items-center border border-black rounded-4 p-1 form-group span-input">
                    <span class="input-group-text border-0">
                        <i class="fa-solid fa-key icon-input"></i>
                    </span>
                    <input type="password" id="password" name="password" class="form-control border-0 shadow-none" placeholder="Senha" required>
                </div>
                <div class="mb-3 d-flex align-items-center border border-black rounded-4 p-1 form-group span-input">
                    <span class="input-group-text border-0">
                        <i class="fa-solid fa-key icon-input"></i>
                    </span>
                    <input type="password" id="repeatpassword" name="repeatpassword" class="form-control border-0 shadow-none" placeholder="Repita a senha" required>
                </div>
            </div>
            <!-- Email e senha -->
            <!-- Botões -->
            <div class="d-grid gap-2 col-8 mx-auto">
                <input type="submit" class="btn btn-primary btn-color-one" value="CADASTRAR">
            </div>
            <!-- Botões -->
        </div>
    </form>
</main>

<body>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
    $(document).ready(function() {
        $('#cnpj').mask('00.000.000/0000-00', { reverse: true });
    });
</script>
@endsection