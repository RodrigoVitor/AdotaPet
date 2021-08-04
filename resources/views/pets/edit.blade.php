@extends('layouts.main')

@section('title', 'AdotaPet Editar')

@section('content')
<div class="container" id="create-pet">
    <form action="/pet/update/{{$pet->id}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row container">
        <div class="col-12">
          <label for="namePet">Nome do Pet</label>
          <input type="text" name="name" id="namePet" value="{{$pet->name}}" class="input-text">
        </div>
        <div class="col-8">
          <label for="city">Cidade da adoção</label>
          <input type="text" name="city" id="city" value="{{$pet->city}}" class="input-text">
        </div>
        <div class="col-2">
          <label for="UF">UF</label>
          <input type="text" name="UF" id="UF" class="col-2" value="{{$pet->UF}}">
        </div>
        <div class="col-12">
          <label for="description">Descrição do pet</label>
          <textarea name="description" id="description"> {{$pet->description}} </textarea>
        </div>
        <div class="col-12">
          <label for="image">Imagem do Pet</label>
          <input type="file" name="image" id="image">
        </div>
        <div class="col-12">
          <button type="submit" class="btn blue">Atualizar</button>
        </div>
    </div>
    </form>
@endsection