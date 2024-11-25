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
        height: 250px;
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
        width: 700px;
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
                        <li><a class="dropdown-item" href="{{ route('product') }}">Cadastrar Produto <i class="fa-solid fa-cart-plus"></i></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('supplier') }}">Cadastrar Fonercedor <i class="fa-solid fa-store"></i></a></li>
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
<main class="my-0 main-body">
    <div class="d-flex flex-column align-items-center">
        <div class="form-box ">
            <!-- Movement -->
            <div class="m-3 d-grid gap-2 col-8 mx-auto">
                <a href="{{ route('movement') }}" class="btn btn-primary btn-color-three" type="button">Movimentar</a>
            </div>
            <!-- Movement -->
            <!-- Barra de pesquisa -->
            <form action="{{route('home')}}" method="get"
                class="mb-3 d-flex align-items-center border border-black rounded-4 p-1 span-input">
                @csrf
                <input type="text" id="search" name="search" class="form-control shadow-none border-0"
                    placeholder="Procurar produto">
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
                    <h1>Estoque</h1>
                </div>
                <div class="mb-3 d-flex flex-column align-items-center p-1 table-person" id="tcontainer">
                    <table>
                        <thead>
                            <tr class="table-thead">
                                <th scope="col" class="text-center border border-black px-5">Produto</th>
                                <th scope="col" class="text-center border border-black px-5">Marca</th>
                                <th scope="col" class="text-center border border-black px-5">Quantidade Atual</th>
                                <th scope="col" class="text-center border border-black px-5">Quantidade Mínima</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productsEstoque as $product)
                                <tr>
                                    <td class="text-center border border-black">{{ $product->nome_produto }}</td>
                                    <td class="text-center border border-black">{{ $product->marca }}</td>
                                    <td class="text-center border border-black">
                                        {{ $product->total > 0 ? $product->total : '0' }}
                                    </td>
                                    <td class="text-center border border-black">{{ $product->qtd_minima }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mb-3 d-flex flex-column align-items-center border border-black rounded-4">
                <div class="d-flex flex-column align-items-center border border-black rounded-top-4 titulo">
                    <h1>Alerta</h1>
                </div>
                <div class="mb-3 d-flex flex-column align-items-center p-1 table-person" id="tcontainer">
                    <table>
                        <thead>
                            <tr class="table-thead">
                                <th scope="col" class="text-center border border-black px-5">Produto</th>
                                <th scope="col" class="text-center border border-black px-5">Marca</th>
                                <th scope="col" class="text-center border border-black px-5">Quantidade Atual</th>
                                <th scope="col" class="text-center border border-black px-5">Quantidade Mínima</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($productsAlerta as $product)
                                <tr>
                                    <td class="text-center border border-black">{{ $product->nome_produto }}</td>
                                    <td class="text-center border border-black">{{ $product->marca }}</td>
                                    <td class="text-center border border-black">
                                        {{ $product->total > 0 ? $product->total : '0' }}
                                    </td>
                                    <td class="text-center border border-black">{{ $product->qtd_minima }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center border border-black text-primary">
                                        Quantidade de atual tem 4 ou mais produtos em estoque
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
</main>

<body>
    @endsection

    @section('js')

    @endsection