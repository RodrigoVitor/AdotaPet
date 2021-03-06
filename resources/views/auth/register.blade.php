<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> --}}
                <img src="/img/logo.png" alt="logo" class="w-40 h-40 fill-current text-gray-500" > 
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nome')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

             <!-- Last Name -->
             <div class="mt-4">
                <x-label for="lastname" :value="__('Sobrenome')" />

                <x-input id="sobrenome" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

             <!-- Whatsapp -->
             <div class="mt-4">
                <x-label for="telehpone" :value="__('Whatsapp')" />

                <x-input id="telephone" class="block mt-1 w-full" type="text" name="telephone" :value="(old('telephone'))" placeholder="Ex: (11 0000-0000)" maxlength="15" required />
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
            {{-- Image --}}
            <div class="mt-4">
                <x-label for="image" :value="__('Foto Perfil')" />

                <x-input id="image" class="block mt-1 w-full" type="file" name="image" :value="(old('image'))" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('J?? ?? cadastrado? Fa??a o Login!') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Cadastrar') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

<script> 
    /* M??scaras ER */
    function mascara(o,f){
        v_obj=o
        v_fun=f
        setTimeout("execmascara()",1)
    }
    function execmascara(){
        v_obj.value=v_fun(v_obj.value)
    }
    function mtel(v){
        v=v.replace(/\D/g,""); //Remove tudo o que n??o ?? d??gito
        v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca par??nteses em volta dos dois primeiros d??gitos
        v=v.replace(/(\d)(\d{4})$/,"$1-$2"); //Coloca h??fen entre o quarto e o quinto d??gitos
        return v;
    }
    function id( el ){
        return document.getElementById( el );
    }
    window.onload = function(){
        id('telephone').onkeyup = function(){
            mascara( this, mtel );
        }
    }
</script>
