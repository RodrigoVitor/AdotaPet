@extends('layouts.main')


@section('title', 'AdotaPet')

@section('content')
{{-- Info --}}
    <div id="info">
        <h5>TA A PROCURO DE UM BICHINHO DE ESTIMAÇÃO?</h5>
        <h5>VEM PARA O ADOTAPET, AQUI VOCÊ ENCONTRA DIVERSOS TIPOS DE PETS ESPERANDO PARA SEREM ADOTADOS.</h5>
        <h5> É PROIBIDO VENDA DE PETS NESSA PLATAFORMA</h5>
        <a href="{{ route('pet.dashboard')}}">Ver pets para adoção</a>
    </div>

{{-- Why dog? --}}
    <hr>
    <div class="row" id="whydog">
        <div class="col s12 m6 l6">
            <img src="/img/pet.jpg" class="responsive-img" alt="pet">
        </div>

        <div class="col s12 m6 l6">
            <p>Dividir a vida com um pet costuma melhorar a qualidade de vida das pessoas em muitos sentidos: reduz a sensação de solidão, favorece as relações sociais, ajuda a manter a forma, incentiva o sorriso etc.</p>
        </div>
    </div>

{{--Live with pet  --}}
    <hr>
    <div id="living">
        <h4>Como é a convivencia? </h4>
        <p>Muitas pessoas aproveitam a companhia de um animal de estimação e não pensariam nem por um segundo na possibilidade de se desfazer do seu cachorro ou gato, que, frequentemente, é considerado como parte da família. Entretanto, a convivência entre pessoas e animais nem sempre é um sucesso e em alguns casos a relação fracassa</p>
    </div>

{{-- leave pet --}}
    <hr>
    <div id="leave">
        <h4>MOTIVOS POR QUAIS UM PET É ABANDONADO:</h4>
        <p>Alguns estudos mostram que os principais motivos de abandono de cachorros e gatos sâo: ninhadas inesperadas, mudança de casa, fatores econômicos, perda de interesse pelo animal, comportamento problemático do animal de estimação e entre outros...</p>
    </div>
    
@endsection
    
