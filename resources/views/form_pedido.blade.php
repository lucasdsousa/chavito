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

        <form method="POST" action="/Pedido/{{$image->slug}}" enctype="multipart/form-data">
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
                                value="{{$image->valor}}" />
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-3" style="background: #ff4d94">
                    {{ __('Finalizar') }}
                </x-button>
            </div>
        </form>
        
        <form method="GET" action="/">

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3" style="background: #ff4d94">
                    {{ __('Cancelar') }}
                </x-button>
            </div>
            
        </form>

        <script
        src="https://www.mercadopago.com.br/integrations/v1/web-payment-checkout.js"
        data-preference-id="{{$preference->id}}">
        </script>

    </x-auth-card>
</x-guest-layout>
