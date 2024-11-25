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
                <h3 class="col-4 text-center pt-2">Cadastro medicamentos</h3>
                <a class="col-4 text-end" href="{{ route('index') }}"><img src="{{ asset('img/logo.png') }}"
                        class="logo-top" alt="Logo da MaxControl"></a>
            </div>
        </div>
    </nav>
</header>

@section('content')
<main class="my-0 main-body">
    <form id="formMedicines" name="formMedicines" action="{{route('medicines.submit')}}" method="POST">
        @csrf
        <div class="d-flex flex-column align-items-center">
            <div class="form-box p-3">
                <!-- Formulario -->
                <div class="mb-3 d-flex align-items-center border border-black rounded-4 p-1 form-group span-input">
                    <span class="input-group-text border-0 span-input">
                    <i class="fa-solid fa-pills icon-input"></i>
                    </span>
                    <input type="text" id="medicine_name" name= "medicine_name" class="form-control border-0 shadow-none" placeholder="Nome do medicamento" required>
                </div>
                <div class="mb-3 d-flex align-items-center border border-black rounded-4 p-1 form-group span-input">
                    <span class="input-group-text border-0 span-input">
                        <i class="fa-solid fa-scale-unbalanced-flip icon-input"></i>
                    </span>
                    <select id="unit_measurement" name='unit_measurement' class="form-control shadow-none border-0" required>
                        <option selected style="display: none" value="" disabled="disabled">Unidade de medida
                        </option>
                        <option value="mg">Miligramas (mg)</option>
                        <option value="g">Gramas (g)</option>
                        <option value="mcg">Microgramas (mcg)</option>
                        <option value="ml">Mililitros (ml)</option>
                        <option value="l">Litros (L)</option>
                        <option value="mg/ml">Miligramas por Mililitro (mg/ml)</option>
                        <option value="UI">Unidades Internacionais (UI)</option>
                        <option value="mEq">Mili-equivalentes (mEq)</option>
                        <option value="gotas">Gotas (gotas)</option>
                        <option value="mg/kg">Miligramas por peso corporal (mg/kg)</option>
                        <option value="mcg/kg">Microgramas por peso corporal (mcg/kg)</option>
                    </select>
                </div>
                <div class="mb-3 d-flex align-items-center border border-black rounded-4 p-1 form-group span-input">
                    <span class="input-group-text border-0">
                        <i class="fa-solid fa-barcode"></i>
                    </span>
                    <input type="number" id="code" name="code" class="form-control border-0 shadow-none" placeholder="Código" required>
                </div>
            </div>
            <!-- Formulario-->
            <!-- Botões -->
            <div class="d-grid gap-2 col-8 mx-auto">
                <input type="submit" class="btn btn-primary btn-color-one" value="Salvar">
            </div>
            <!-- Botões -->
            @if (session('error'))
                <div class="m-1 d-flex align-items-center border border-black rounded-4 p-1 alert alert-danger">
                    <i class="fa-solid fa-triangle-exclamation"></i> {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="m-1 d-flex align-items-center border border-black rounded-4 p-1 alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </form>
</main>

<body>
@endsection

@section('js')
@endsection