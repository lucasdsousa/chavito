<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="{{ route('admin') }}">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('chavitos-novo') }}" enctype="multipart/form-data">
            @csrf

            <div class="mt-5">
                <x-label for="modelo" :value="__('Modelo')" />

                <x-input id="modelo" class="block mt-1 w-full"
                                type="text"
                                name="modelo"
                                required autocomplete="current-modelo"
                                placeholder="Ex.: Chavito Duplo" />
            </div>

            <div class="mt-5">
                <x-label for="descricao" :value="__('Descrição')" />

                <x-input id="descricao" class="block mt-1 w-full"
                                type="text"
                                name="descricao"
                                required autocomplete="current-descricao" />
            </div>

            <div class="mt-5">
                <x-label for="valor" :value="__('Valor')" />

                <x-input id="valor" class="block mt-1 w-full"
                                type="text"
                                name="valor"
                                required autocomplete="current-valor"
                                placeholder="Ex.: 20.00" />
            </div>

            <div class="mt-5">
                <x-label for="slug" :value="__('Slug')" />

                <x-input id="slug" class="block mt-1 w-full"
                                type="text"
                                name="slug"
                                required autocomplete="current-slug"
                                placeholder="Ex.: chavito-duplo" />
            </div>

            <div class="mt-5">
                <x-label for="image" :value="__('Imagem Exemplo')" />

                <input id="image" class="block mt-1 w-full" type="file" name="image" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3" style="background: #ff4d94; font-weight:bold">
                    {{ __('Cadastrar') }}</a>
                </x-button>
            </div>
        </form>
        
        <form method="GET" action="{{ route('admin.chavitos') }}">

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3" style="background: #00ffff; font-weight:bold">
                    {{ __('Cancelar') }}
                </x-button>
            </div>
        </form>
        <br><br>

    </x-auth-card>
</x-guest-layout>