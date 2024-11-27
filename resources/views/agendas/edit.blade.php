@extends('layouts.app')
@section('metatags')

@endsection
@section('css')
<style>
    .main-body {
        height: 120vh;
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
                <h3 class="col-4 text-center pt-2">Editar agenda</h3>
                <a class="col-4 text-end" href="{{ route('index') }}"><img src="{{ asset('img/logo.png') }}"
                        class="logo-top" alt="Logo da MaxControl"></a>
            </div>
        </div>
    </nav>
</header>

@section('content')
<main class="my-0 main-body">
    <form action="{{ route('agendas.update', $agenda->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="d-flex flex-column align-items-center">
            <div class="form-box p-3">
                <!-- Formulario -->
                <div class="mb-3 d-flex align-items-center border border-black rounded-4 p-1 form-group span-input">
                    <span class="input-group-text border-0 span-input">
                        <i class="fa-solid fa-hands-holding-child icon-input"></i>
                    </span>
                    <select id="resident_name" name="resident_name" class="form-control shadow-none border-0">
                        <option value="" disabled selected hidden>Nome do residente</option>
                        @foreach($residents as $resident)
                            <option value="{{ $resident->id }}" @if($agenda->resident_id == $resident->id) selected @endif
                                data-foto="{{ asset('storage/' . $resident->foto) }}"
                                data-observacoes="{{ $resident->observacoes }}">
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
                        <i class="fa-solid fa-tablets icon-input"></i>
                    </span>
                    <select id="medicine_name" name='medicine_name' class="form-control shadow-none border-0">
                        <option value="" disabled selected hidden>Medicamento
                        </option>
                        @foreach($medicines as $medicine)
                            <option value="{{ $medicine->id }}" @if($agenda->medicine_id == $medicine->id) selected @endif>
                                {{ $medicine->nome_medicamento }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 d-flex align-items-center border border-black rounded-4 p-1 form-group span-input">
                    <span class="input-group-text border-0">
                        <i class="fa-solid fa-arrow-up-wide-short icon-input"></i>
                    </span>
                    <input type="number" id="amount" name="amount" value="{{ $agenda->quantidade }}"
                        class="form-control border-0 shadow-none">
                </div>
                <div class="mb-3 d-flex align-items-center border border-black rounded-4 p-1 form-group span-input">
                    <span class="input-group-text border-0 span-input">
                        <i class="fa-solid fa-scale-unbalanced-flip icon-input"></i>
                    </span>
                    <select id="unit_measurement" name='unit_measurement' class="form-control shadow-none border-0"
                        required>
                        <option selected style="display: none" value="{{ $agenda->unidade_medida }}"
                            disabled="disabled">Unidade de medida</option>
                        <option value="mg" @if($agenda->unidade_medida == 'mg') selected @endif>Miligramas (mg)</option>
                        <option value="g" @if($agenda->unidade_medida == 'g') selected @endif>Gramas (g)</option>
                        <option value="mcg" @if($agenda->unidade_medida == 'mcg') selected @endif>Microgramas (mcg)
                        </option>
                        <option value="ml" @if($agenda->unidade_medida == 'ml') selected @endif>Mililitros (ml)</option>
                        <option value="l" @if($agenda->unidade_medida == 'l') selected @endif>Litros (L)</option>
                        <option value="mg/ml" @if($agenda->unidade_medida == 'mg/ml') selected @endif>Miligramas por
                            Mililitro (mg/ml)</option>
                        <option value="UI" @if($agenda->unidade_medida == 'UI') selected @endif>Unidades Internacionais
                            (UI)</option>
                        <option value="mEq" @if($agenda->unidade_medida == 'mEq') selected @endif>Mili-equivalentes (mEq)
                        </option>
                        <option value="gotas" @if($agenda->unidade_medida == 'gotas') selected @endif>Gotas (gotas)
                        </option>
                        <option value="mg/kg" @if($agenda->unidade_medida == 'mg/kg') selected @endif>Miligramas por peso
                            corporal (mg/kg)</option>
                        <option value="mcg/kg" @if($agenda->unidade_medida == 'mcg/kg') selected @endif>Microgramas por
                            peso corporal (mcg/kg)</option>
                    </select>
                </div>
                <div class="mb-3 d-flex align-items-center border border-black rounded-4 p-1 form-group span-input">
                    <span class="input-group-text border-0">
                        <i class="fa-solid fa-repeat icon-input"></i>
                    </span>
                    <input type="number" id="repetitions" name="repetitions" value="{{ $agenda->frequencia }}"
                        class="form-control shadow-none border-0">
                </div>
                <div class="mb-3 d-flex align-items-center border border-black rounded-4 p-1 form-group span-input">
                    <span class="input-group-text border-0">
                        <i class="fa-solid fa-calendar-plus icon-input"></i>
                    </span>
                    <input type="number" id="duration" name="duration" value="{{ $agenda->repeticoes }}"
                        class="form-control shadow-none border-0">
                </div>
                <div class="mb-3 d-flex align-items-center border border-black rounded-4 p-1 form-group span-input">
                    <span class="input-group-text border-0">
                        <i class="fa-solid fa-clock icon-input"></i>
                    </span>
                    <input type="time" id="hours" name="hours" value="{{ $agenda->horario }}"
                        class="form-control shadow-none border-0">
                </div>

                <!-- Formulario -->
                <!-- Botões -->
                <div class="d-grid gap-2 col-8 mx-auto">
                    <input type="submit" class="btn btn-primary btn-color-one" value="Atualizar agenda">
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
        document.addEventListener('DOMContentLoaded', function () {
            // Pega o select e a opção selecionada
            const residentSelect = document.getElementById('resident_name');
            const selectedResident = residentSelect.options[residentSelect.selectedIndex];

            // Verifica se a opção selecionada realmente contém o atributo 'data-observacoes'
            const observation = selectedResident.getAttribute('data-observacoes');
            console.log("Observação capturada: ", observation); // Exibe no console a observação para depuração

            // Atualiza a imagem do residente
            const imageElement = document.getElementById('residentImage');
            const imageUrl = selectedResident.getAttribute('data-foto');
            if (imageUrl) {
                imageElement.src = imageUrl;
                imageElement.style.display = 'block';
            } else {
                imageElement.style.display = 'none';
            }

            // Atualiza a observação do residente
            const observationElement = document.getElementById('residentObservation');
            if (observation) {
                observationElement.innerText = observation; // Exibe a observação se houver
            } else {
                observationElement.innerText = "Sem observação"; // Se não houver, exibe uma mensagem padrão
            }
        });
    </script>
    @endsection