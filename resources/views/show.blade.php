@extends('layouts.app')
@section('metatags')

@endsection
@section('css')
<style>
    .main-body {
        height: 105vh;
    }

    .span-img {
        background-color: white;
        width: 100px;
        height: 100px;
    }

    #residentImage {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    #residentImage[src=""] {
        display: none;
    }
</style>
@endsection

<header>
    <nav class="py-2 top-bar">
        {{-- Acesso Rápido do Header --}}
        <div class="container">
            <div class="row">
                <a href="{{ route('home') }}" class="col-4 text-start"><img src="{{ asset('img/voltar.png') }}"
                        class="img-top"></a>
                <h3 class="col-4 text-center pt-2">Visualizar</h3>
                <a class="col-4 text-end" href="{{ route('index') }}"><img src="{{ asset('img/logo.png') }}"
                        class="logo-top" alt="Logo da MaxControl"></a>
            </div>
        </div>
    </nav>
</header>

@section('content')
<main class="my-0 main-body">
    <div class="d-flex flex-column align-items-center">
        <div class="form-box p-3">
            <!-- Nome do Residente -->
            <div class="mb-3 d-flex align-items-center border border-black rounded-4 p-1 form-group span-input">
                <span class="input-group-text border-0 span-input">
                    <i class="fa-solid fa-hands-holding-child icon-input"></i>
                </span>
                {{ $agenda->relResident->nome_residente ?? 'Residente não informado' }}
            </div>
            
            <!-- Imagem e Observações -->
            <div class="row m-1">
                <div class="col-12 mb-3 rounded-4 span-img mx-1">
                    <img id="residentImage" src="{{ asset('storage/' . $agenda->relResident->foto)  ?: asset('img/default-avatar.png') }}" alt="Imagem do residente">
                </div>
                <div class="col mb-3 rounded-4 span-input text-center mx-1">
                    {{ $agenda->relResident->observacao ?? 'Sem observações disponíveis' }}
                </div>
            </div>

            <!-- Medicamento -->
            <div class="mb-3 d-flex align-items-center border border-black rounded-4 p-1 form-group span-input">
                <span class="input-group-text border-0 span-input">
                    <i class="fa-solid fa-tablets icon-input"></i>
                </span>
                {{ $agenda->relMedicine->nome_medicamento ?? 'Medicamento não informado' }}
            </div>

            <!-- Quantidade -->
            <div class="mb-3 d-flex align-items-center border border-black rounded-4 p-1 form-group span-input">
                <span class="input-group-text border-0">
                    <i class="fa-solid fa-arrow-up-wide-short icon-input"></i>
                </span>
                {{ $agenda->quantidade ?? '0' }}
            </div>

            <!-- Unidade de Medida -->
            <div class="mb-3 d-flex align-items-center border border-black rounded-4 p-1 form-group span-input">
                <span class="input-group-text border-0 span-input">
                    <i class="fa-solid fa-scale-unbalanced-flip icon-input"></i>
                </span>
                {{ $agenda->relMedicine->unidade_medida ?? 'Unidade não especificada' }}
            </div>

            <!-- Frequência e Repetições -->
            <div class="mb-3 d-flex align-items-center border border-black rounded-4 p-1 form-group span-input">
                <span class="input-group-text border-0">
                    <i class="fa-solid fa-repeat icon-input"></i>
                </span>
                {{ $agenda->frequencia ?? 'Frequência não definida' }}
            </div>
            <div class="mb-3 d-flex align-items-center border border-black rounded-4 p-1 form-group span-input">
                <span class="input-group-text border-0">
                    <i class="fa-solid fa-calendar-plus icon-input"></i>
                </span>
                {{ $agenda->repeticoes ?? 'Sem repetições' }}
            </div>

            <!-- Horário -->
            <div class="mb-3 d-flex align-items-center border border-black rounded-4 p-1 form-group span-input">
                <span class="input-group-text border-0">
                    <i class="fa-solid fa-clock icon-input"></i>
                </span>
                {{ \Carbon\Carbon::createFromFormat('H:i:s', $agenda->horario)->format('H:i') ?? 'Horário não definido' }}
            </div>
        </div>
    </div>
</main>

<body>
    @endsection

    @section('js')

    @endsection