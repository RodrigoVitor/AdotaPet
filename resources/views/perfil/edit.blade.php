@extends('layouts.main')

@section('title', 'AdotaPet Editar meu perfil')
@section('content')
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <form action="/user/delete/{{$user->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" href="#" class="red-text">Excluir conta</button>
            </form>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="/user/update/{{$user->id}}">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nome')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$user->name}}" required autofocus />
            </div>

             <!-- Last Name -->
             <div class="mt-4">
                <x-label for="lastname" :value="__('Sobrenome')" />
                <x-input id="sobrenome" class="block mt-1 w-full" type="text" name="lastname" value="{{$user->lastname}}" required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$user->email}}" required />
            </div>

             <!-- Email Address -->
             <div class="mt-4">
                <x-label for="telehpone" :value="__('Whatsapp')" />

                <x-input id="telephone" class="block mt-1 w-full" type="text" name="telephone" value="{{$user->telephone}}" placeholder="Ex: (11 0000-0000)" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Atualizar') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
@endsection