@extends('layouts.main')

@section('title', 'AdotaPet Dashboard')
    
@section('content')
    <div id="search">
        <a href="#">Publicar pet para adoção</a>
        <form action="" method="GET">
            @csrf 
            <div class="row">
                <div class="col l6 m6 s12">
                    <input type="text" name="namePet" id="" placeholder="Nome do animal. Ex(gato, cachorro)">
                </div>
                <div class="col l6 m6 s12">
                    <input type="text" name="nameCity" id="" placeholder="nome da cidade">
                </div>
                <div class="col l12 m12 s12">
                    <button type="submit" class="waves-effect waves-light btn-small">Pesquisar</button>
                </div>
            </div>
        </form>
    </div>

    <div id="petContent" class="container">
        <div class="row" id="infoUser">
            <div class="col s3 m2">
             <img src="/img/logo.png" alt="logo" width="70"> 
            </div>
            <div class="col s9 m10">
                <p>Rodrigo Vitor <span>00/00/0000</span></p>
            </div>
        </div>
        <div id="infoPet">
            <div class="description">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam minus quia eligendi quo inventore, quas ipsa explicabo molestiae voluptas reiciendis maxime veritatis vitae quisquam doloremque ut fugit dolorem maiores sit?</p>
            </div>
            <div class="imagePet">
                <img src="/img/pet.jpg" class="responsive-img" alt="pet">
            </div>
            <div class="contact">
                <p><strong>Cidade: </strong> Santa Rita do Sapucai - MG</p>
                <p><strong>Whatsapp: </strong> 35998752410</p>
            </div>
        </div>
    </div>
@endsection
