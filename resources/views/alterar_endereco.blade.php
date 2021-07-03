<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="/alterar-endereco/{{ DB::table('enderecos')->where('user_id', Auth::id())->get()->first()->id }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="cep" :value="__('CEP')" />

                <x-input id="cep" class="block mt-1 w-full" maxlength="8" type="text" name="cep" :value="old('cep')" required autofocus placeholder="Apenas números" value="{{ DB::table('enderecos')->where('user_id', Auth::id())->get()->first()->cep }}"/>
            </div>

            <div>
                <x-label for="rua" :value="__('Rua')" />

                <x-input id="rua" class="block mt-1 w-full" type="text" name="rua" :value="old('rua')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="numero" :value="__('Número')" />

                <x-input id="numero" class="block mt-1 w-full" type="text" name="numero" :value="old('numero')" required value="{{ DB::table('enderecos')->where('user_id', Auth::id())->get()->first()->numero }}" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="bairro" :value="__('Bairro')" />

                <x-input id="bairro" class="block mt-1 w-full" type="text" maxlength="17" name="bairro" :value="old('bairro')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="cidade" :value="__('Cidade')" />

                <x-input id="cidade" class="block mt-1 w-full"
                                type="text"
                                name="cidade"
                                required />
            </div>

            <div class="mt-4">
                <x-label for="uf" :value="__('Estado')" />

                <x-input id="uf" class="block mt-1 w-full" type="text" maxlength="2" name="uf" :value="old('uf')" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="/dashboard">
                    {{ __('Cancelar') }}
                </a>

                <x-button class="ml-4" style="background: #ff4d94">
                    {{ __('Alterar') }}
                </x-button>
            </div>
        </form>
		<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
		<script>
			/*
			 * Para efeito de demonstração, o JavaScript foi
			 * incorporado no arquivo HTML.
			 * O ideal é que você faça em um arquivo ".js" separado. Para mais informações
			 * visite o endereço https://developer.yahoo.com/performance/rules.html#external
			 */
			
			// Registra o evento blur do campo "cep", ou seja, a pesquisa será feita
			// quando o usuário sair do campo "cep"
			$("#cep").blur(function(){
				// Remove tudo o que não é número para fazer a pesquisa
				var cep = this.value.replace(/[^0-9]/, "");
				
				// Validação do CEP; caso o CEP não possua 8 números, então cancela
				// a consulta
				if(cep.length != 8){
					return false;
				}
				
				// A url de pesquisa consiste no endereço do webservice + o cep que
				// o usuário informou + o tipo de retorno desejado (entre "json",
				// "jsonp", "xml", "piped" ou "querty")
				var url = "https://viacep.com.br/ws/"+cep+"/json/";
				
				// Faz a pesquisa do CEP, tratando o retorno com try/catch para que
				// caso ocorra algum erro (o cep pode não existir, por exemplo) a
				// usabilidade não seja afetada, assim o usuário pode continuar//
				// preenchendo os campos normalmente
				$.getJSON(url, function(dadosRetorno){
					try{
						// Preenche os campos de acordo com o retorno da pesquisa
						$("#rua").val(dadosRetorno.logradouro);
						$("#bairro").val(dadosRetorno.bairro);
						$("#cidade").val(dadosRetorno.localidade);
						$("#uf").val(dadosRetorno.uf);
					}catch(ex){}
				});
			});
		</script>
    </x-auth-card>
</x-guest-layout>
