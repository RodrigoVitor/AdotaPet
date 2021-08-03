@extends('layouts.main')

@section('title', 'AdotaPet Adicionar Pet')

@section('content')
  <div class="container" id="create-pet">
    <form action="/pet/create" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row container">
        <div class="col-12">
          <label for="namePet">Nome do Pet</label>
          <input type="text" name="name" id="namePet" placeholder="Nome do animal de estimação: (Cachorro, gato, etc)" class="input-text">
        </div>
        <div class="col-8">
          <label for="city">Cidade da adoção</label>
          <input type="text" name="city" id="city" class="input-text">
        </div>
        <div class="col-2">
          <label for="UF">UF</label>
          <input type="text" name="UF" id="UF" class="col-2" placeholder="MG, SP, etc">
        </div>
        <div class="col-12">
          <label for="description">Descrição do pet</label>
          <textarea name="description" id="description" placeholder="Pode passas qualquer tipo de informação"></textarea>
        </div>
        <div class="col-12">
          <label for="image">Imagem do Pet</label>
          <input type="file" name="image" id="image">
        </div>
        <div class="col-12">
          <button type="submit" class="btn blue">Enviar</button>
        </div>
    </div>
    </form>
  </div>
@endsection