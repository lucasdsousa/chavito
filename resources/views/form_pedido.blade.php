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

            @if ($slug == "chavito-frase" || $slug == "chavito-nome" || $slug == "chavito-musica")

              <div>
                <x-label for="frase" :value="__('Digite o texto do seu Chavito')" />

                <input id="frase" class="block mt-1 w-full" type="text" name="frase" required autofocus />
              </div>

            @else
              <div>                      
                <x-label for="image" :value="__('Escolha a imagem do seu Chavito')" />

                <input id="image" class="block mt-1 w-full" type="file" name="image" autofocus required/>
              </div>
            
            <ul class="collapsible" style="margin-top: 50px">
                <li>
                  <div class="collapsible-header">Adicionar Verso</div>
                  <div class="collapsible-body">                      
                    <x-label for="verso" :value="__('Escolha a imagem do verso do seu Chavito')" />
    
                    <input id="verso" class="block mt-1 w-full" type="file" name="verso" autofocus />

                    <br>
                    <h4>Ou</h4>
                    <br>
                                       
                    <x-label for="fraseVerso" :value="__('Escolha a frase do verso do seu Chavito')" />
    
                    <input id="fraseVerso" class="block mt-1 w-full" type="text" name="fraseVerso" autofocus />
                  </div>
                </li>
                <li>
                  <div class="collapsible-header">Adicionar Pingente</div>
                  <div class="collapsible-body">                      
                    <x-label for="pingente" :value="__('Escolha a imagem do pingente do seu Chavito')" />
    
                    <input id="pingente" class="block mt-1 w-full" type="file" name="pingente" autofocus />

                    <br>
                    <h4>Ou</h4>
                    <br>
                                       
                    <x-label for="frasePingente" :value="__('Escolha a frase do pingente do seu Chavito')" />
    
                    <input id="frasePingente" class="block mt-1 w-full" type="text" name="frasePingente" autofocus />
                  </div>
                </li>
            </ul>

            <div class="mt-4" hidden>
                <x-label for="modelo" :value="__('Modelo')" />

                <x-input id="modelo" class="block mt-1 w-full"
                                type="modelo"
                                name="modelo"
                                required autocomplete="current-modelo"
                                readonly
                                value="{{$slug}}" />
            </div>

            <div class="mt-4" hidden>
                <x-label for="valor" :value="__('Valor')" />

                <x-input id="valor" class="block mt-1 w-full"
                                type="valor"
                                name="valor"
                                required autocomplete="current-valor"
                                readonly
                                value="{{$chav->valor}}" />
            </div>

            <div class="mt-4" hidden>
                <x-label for="quantidade" :value="__('Quantidade')" />

                <x-input id="quantidade" class="block mt-1 w-full"
                                type="quantidade"
                                name="quantidade"
                                required autocomplete="current-quantidade"
                                readonly
                                value="1" />
            </div>                
            @endif

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

    <script>
         document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.collapsible');
            var instances = M.Collapsible.init(elems);
        });
    </script>

    </x-auth-card>
</x-guest-layout>
