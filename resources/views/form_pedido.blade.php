<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('carrinho_add') }}" enctype="multipart/form-data">
            @csrf

            <div>
                <x-label for="image" :value="__('Imagem')" />

                <input id="image" class="block mt-1 w-full" type="file" name="image" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="observacoes" :value="__('Observações')" />

                <x-input id="observacoes" class="block mt-1 w-full"
                                type="observacoes"
                                name="observacoes"
                                autocomplete="current-observacoes" />
            </div>

            <div class="mt-4">
                <x-label for="modelo" :value="__('Modelo')" />

                <x-input id="modelo" class="block mt-1 w-full"
                                type="modelo"
                                name="modelo"
                                required autocomplete="current-modelo"
                                readonly
                                value="{{$slug}}" />
            </div>

            <div class="mt-4">
                <x-label for="valor" :value="__('Valor')" />

                <x-input id="valor" class="block mt-1 w-full"
                                type="valor"
                                name="valor"
                                required autocomplete="current-valor"
                                readonly
                                value="{{$chav->valor}}" />
            </div>

            <div class="flex items-center justify-end mt-4">
                
                <input type="text" name="chav_id" readonly hidden value={{ $chav->id }}>

                <x-button class="ml-3" style="background: #ff4d94; font-weight:bold">
                    {{ __('Comprar') }}</a>
                </x-button>
            </div>
        </form>
        
        <form method="GET" action="/">

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3" style="background: #00ffff; font-weight:bold">
                    {{ __('Cancelar') }}
                </x-button>
            </div>
        </form>
        <br><br>
    <p style="text-align: center">*Os pagamentos são realizados pelo MercadoPago.</p>

    </x-auth-card>
</x-guest-layout>