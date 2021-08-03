@extends('layouts.main')

@section('title', 'AdotaPet Dashboard')
    
@section('content')
    <div id="search">
        <a href="/pet/create">Publicar pet para adoção</a>
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
    @foreach($pets as $pet)
        <div id="petContent" class="container">
            <div class="row" id="infoUser">
                <div class="col s3 m2">
                <img src="/img/logo.png" alt="logo" width="70"> 
                </div>
                <div class="col s9 m10">
                    <p> <span>00/00/0000</span></p>
                </div>
            </div>
            <div id="infoPet">
                <div id="name-pet">
                    <h5 class="center">{{$pet->name}}</h5>
                </div>
                <div class="description">
                    <p class="center">{{$pet->description}}</p>
                </div>
                <div class="imagePet">
                    <img src="/img/pets/{{$pet->image}}" class="responsive-img" alt="pet">
                </div>
                <div class="contact">
                    <p><strong>Cidade: </strong> {{$pet->city}} - {{$pet->UF}}</p>
                    <p><strong>Whatsapp: </strong> </p>
                </div>
            </div>
        </div>
    @endforeach
@endsection
