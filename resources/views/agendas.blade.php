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
                <a href="{{ route('index') }}" class="col-4 text-start"><img src="{{ asset('img/voltar.png') }}"
                        class="img-top"></a>
                <h3 class="col-4 text-center pt-2">Agendar</h3>
                <a class="col-4 text-end" href="{{ route('index') }}"><img src="{{ asset('img/logo.png') }}"
                        class="logo-top" alt="Logo da MaxControl"></a>
            </div>
        </div>
    </nav>
</header>

@section('content')
<main class="my-0 main-body">
    <form id="formAgendas" name="formAgendas" action="{{route('agendas.submit')}}" method="POST">
        @csrf
        <div class="d-flex flex-column align-items-center">
            <div class="form-box p-3">
                <!-- Formulario -->
                <div class="mb-3 d-flex align-items-center border border-black rounded-4 p-1 form-group span-input">
                    <span class="input-group-text border-0 span-input">
                        <i class="fa-regular fa-building icon-input"></i>
                    </span>
                    <select id="resident_name" name='resident_name' class="form-control shadow-none border-0">
                        <option value="" disabled selected hidden>Nome do residente</option>
                        @foreach ($residents as $resident)
                            <option value="{{ $resident->id }}" data-observacoes="{{ $resident->observacao }}"
                                data-foto="{{ asset('storage/' . $resident->foto) }}">
                                {{ $resident->nome_residente }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="row m-1">
                    <div class="col-12 mb-3 rounded-4 span-img mx-1">
                        <img id="residentImage" src="" alt="Imagem do residente">
                    </div>
                    <div class="col mb-3 rounded-4 span-input text-center mx-1" id="residentObservation">
                        <!-- A observação será exibida aqui -->
                    </div>
                </div>
                <div class="mb-3 d-flex align-items-center border border-black rounded-4 p-1 form-group span-input">
                    <span class="input-group-text border-0 span-input">
                        <i class="fa-regular fa-building icon-input"></i>
                    </span>
                    <select id="medicine_name" name='medicine_name' class="form-control shadow-none border-0">
                        <option value="" disabled selected hidden>Medicamento
                        </option>
                        @foreach ($medicines as $medicine)
                            <option value="{{$medicine->id}}">{{$medicine->nome_medicamento}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 d-flex align-items-center border border-black rounded-4 p-1 form-group span-input">
                    <span class="input-group-text border-0">
                        <i class="fa-solid fa-arrow-up-wide-short icon-input"></i>
                    </span>
                    <input type="number" id="amount" min="1" name="amount" class="form-control border-0 shadow-none"
                        placeholder="Quantidade" required>
                </div>
                <div class="mb-3 d-flex align-items-center border border-black rounded-4 p-1 form-group span-input">
                    <span class="input-group-text border-0 span-input">
                        <i class="fa-solid fa-scale-unbalanced-flip icon-input"></i>
                    </span>
                    <select id="unit_measurement" name='unit_measurement' class="form-control shadow-none border-0"
                        required>
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
                        <i class="fa-solid fa-repeat icon-input"></i>
                    </span>
                    <input type="number" min="1" max="4" class="form-control border-0 shadow-none" id="repetitions"
                        name="repetitions" placeholder="Quantas vezes ao dia ?">
                </div>
                <div class="mb-3 d-flex align-items-center border border-black rounded-4 p-1 form-group span-input">
                    <span class="input-group-text border-0">
                        <i class="fa-solid fa-calendar-plus icon-input"></i>
                    </span>
                    <input type="number" id="duration" min="1" name="duration" class="form-control border-0 shadow-none"
                        placeholder="Duração do tratamento" required>
                </div>
                <div class="mb-3 d-flex align-items-center border border-black rounded-4 p-1 form-group span-input">
                    <span class="input-group-text border-0">
                        <i class="fa-solid fa-clock icon-input"></i>
                    </span>
                    <input type="time" id="hours" name="hours" class="form-control border-0 shadow-none"
                        placeholder="HH:mm" required>
                </div>

                <!-- Formulario -->
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
    <script>
        document.getElementById('resident_name').addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];

            // Atualiza a imagem do residente
            const imageElement = document.getElementById('residentImage');
            const imageUrl = selectedOption.getAttribute('data-foto');
            if (imageUrl) {
                imageElement.src = imageUrl; // Atualiza o caminho da imagem
                imageElement.style.display = 'block'; // Exibe a imagem
            } else {
                imageElement.style.display = 'none'; // Esconde a imagem se não houver URL
            }

            // Atualiza a observação do residente
            const observation = selectedOption.getAttribute('data-observacoes');
            document.getElementById('residentObservation').innerText = observation;
        });


    </script>

    @endsection