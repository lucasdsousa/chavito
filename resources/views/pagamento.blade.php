@extends('layouts.main')

@section('content')
<div class="container">
    <h3>Pagamento em andamento...</h3>
    <h5>Caso a página do pagamento não tenha carregado, clique no botão abaixo:</h5>
    <br><br>
    <a class="btn" target="_blank" href="{{ $preference->init_point }}" style="margin:0 auto; margin-bottom: 100px">Pagar com Mercado Pago</a>
</div>
        
<script src="https://sdk.mercadopago.com/js/v2"></script>
<script>
            // Adicione as credenciais do SDK
              const mp = new MercadoPago('TEST-21a7edf5-cac8-4dec-99ae-7ae6924d03fa', {
                    locale: 'pt-BR'
              });
              // Inicializa o checkout
                const checkout = mp.checkout({
                    preference: {
                        id: '{{$preference->id}}'
                    },
                    theme: {
                        elementsColor: '#ff4d94'
                    },
                    //autoOpen: true, // Habilita a abertura automática do Checkout Pro
                });
  
</script>

@endsection