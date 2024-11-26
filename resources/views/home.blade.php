@extends('layouts.app')
@section('metatags')

@endsection
@section('css')
<style>
    .main-body {
        height: auto;
    }

    .img-entrance-exit {
        width: 20px;
        height: 20px;
    }

    div#tcontainer {
        overflow-y: scroll;
        height: 300px;
        overflow-x: auto;
    }

    .logo-tops {
        width: 100%;
        max-width: 150px;
        display: block;
        margin-left: 480px;
        border-radius: 10px;
    }

    .table-person {
        background-color: white;
    }

    .table-thead {
        background-color: grey;
    }

    .titulo {
        background-color: #F05A28;
        width: 670px;
    }
</style>
@endsection

<header>
    <nav class="py-2 top-bar">
        {{-- Acesso Rápido do Header --}}
        <div class="container">
            <div class="row">
                <div class="flex-shrink-0 dropdown col-6 text-start">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser2"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('img\config.png') }}" alt="config" class="img-top">
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                        <li><a class="dropdown-item" href="{{ route('agendas') }}">Agendar <i
                                    class="fa-solid fa-book"></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('residents') }}">Cadastrar Residente <i
                                    class="fa-solid fa-person-cane"></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('medicines') }}">Cadastrar Medicamento <i
                                    class="fa-solid fa-pills"></i></a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ route('index') }}">Sair</a></li>
                    </ul>
                </div>
                <a class="col-6 text-end" href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}"
                        class="logo-tops" alt="Logo da MaxControl"></a>
            </div>
        </div>
    </nav>
</header>

@section('content')
<main class="mt-3 my-0 main-body">
    <div class="d-flex flex-column align-items-center">
        <div class="form-box ">
            <!-- Barra de pesquisa -->
            <form action="{{route('home')}}" method="get"
                class="mb-3 d-flex align-items-center border border-black rounded-4 p-1 span-input">
                @csrf
                <input type="text" id="search" name="search" class="form-control shadow-none border-0"
                    placeholder="Procurar Residente">
                <button type="submit" class="btn border-0 p-0">
                    <i class="fa-solid fa-magnifying-glass icon-input"></i>
                </button>
            </form>
            <div class="mb-3 d-flex flex-column align-items-center border border-black rounded-4">
                @if($search)
                    <p class="mb-1 d-flex align-items-start text-light">Buscando por: {{$search}}</p>
                    <a href='{{route('home')}}' class="mb-1 d-flex align-items-start text-light">Limpar filtros</a>
                @else
                    <p class="mb-1 d-flex align-items-start text-light"></p>
                @endif
            </div>
            <!-- Barra de pesquisa -->
            <div class="mb-3 d-flex flex-column align-items-center border border-black rounded-4">
                <div class="d-flex flex-column align-items-center border border-black rounded-top-4 titulo">
                    <h1>Agenda</h1>
                </div>
                <div class="mb-3 d-flex flex-column align-items-center p-1 table-person" id="tcontainer">
                    <table>
                        <thead>
                            <tr class="table-thead">
                                <th scope="col" class="text-center border border-black px-5">Nome</th>
                                <th scope="col" class="text-center border border-black px-5">Medicamento</th>
                                <th scope="col" class="text-center border border-black px-5">Horario</th>
                                <th scope="col" class="text-center border border-black px-5">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($agendas as $agenda)
                                <tr>
                                    <td class="text-center border border-black">
                                        {{ $agenda->relResident->nome_residente ?? 'N/A' }}
                                    </td>
                                    <td class="text-center border border-end-0 border-black">
                                        {{ $agenda->relMedicine->nome_medicamento ?? 'N/A' }}
                                        {{ $agenda->quantidade }}
                                        {{ $agenda->relMedicine->unidade_medida ?? 'N/A' }}
                                    </td>
                                    <td class="text-center border border-black">
                                        {{ $agenda->horario }}
                                    </td>
                                    <td class="text-center border border-black gap-0 column-gap-3">
                                        <a href="{{ route('home.show', $agenda->id) }}" class="d-inline-block">
                                            <i class="fa-solid fa-eye p-2 g-col-6 text-black"></i>
                                        </a>
                                        <a href="">
                                            <i class="fa-solid fa-check p-2 g-col-6 text-success"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
</main>

<body>
    @endsection

    @section('js')

    @endsection