@extends('layouts.main')

@section('title', 'AdotaPet - MEeus Pets')

@section('content')
    <h3 class="center-align">Meus Pets</h3>
    <table class="striped">
        <thead>
          <tr>
              <th>#</th>
              <th>Nome</th>
              <th>Cidade - UF</th>
          </tr>
        </thead>

        <tbody>
        @foreach ($pets as $pet)
            <tr>
                <td><img src="/img/pets/{{$pet->image}}" alt="{{$pet->name}}" width="90"></td>
                <td>{{$pet->name}}</td>
                <td>{{$pet->city}} - {{$pet->UF}}</td>
                <th>
                    <a href="#" class="btn green">Editar</a>
                    <form action="/pet/delete/{{$pet->id}}" method="POST">
                        @csrf 
                        @method('DELETE')
                        <button type="submit" class="btn red">Deletar</button> 
                    </form>
                </th>
            </tr>
        @endforeach
        </tbody>
      </table>
            
@endsection