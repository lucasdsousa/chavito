@extends('layouts.main')

@section('content')

<div class="card container" style="margin:auto; margin-bottom:75px">

    <div class="card-content">
        <h4 class="center">Seu carrinho de compras</h4>

        
            <table class="highlight responsive-table container" style="margin-bottom:25px" id="tableCarrinho">
                <thead>
                <tr>
                    <th>Item</th>
                    <th>Preço</th>
                </tr>
                </thead>

                <tbody>
                    @forelse($items as $i)

                        <tr>
                                <td>
                                    <p>{{ $i->modelo }}</p>
                                    <br>
                                    <img src="{{ asset('storage/'.$i->image) }}" alt="" style="width:25%">
                                </td>
                                <!-- <td>
                                    <p id="qty" name="qty">1</p>
                                    <a href="#" onclick="addtocart()"><i class="bi bi-plus-circle"></i></a>
                                    <a href="#" onclick="removefromcart()"><i class="bi bi-dash-circle"></i></a>
                                </td> -->
                                <td id="price">R$ {{ $i->valor }},00</td>
                                <td><a href="/cu/{{ $i->id }}">Remover</a></td>

                                <input  type="text" name="image" value="{{ $i->image }}" hidden>
                                <input  type="text" name="chav_id" value="{{ $i->id }}" hidden>
                                <input  type="text" name="modelo" value="{{ $i->modelo }}" hidden>
                                <input  type="text" name="quantidade" id="qtd" hidden>
                                <input  type="text" name="valor" id="value" hidden>
                        </tr>

                    @empty
                        <p class="center">Você ainda não adicionou produtos ao seu carrinho.</p>

                        <script>
                            document.getElementById("tableCarrinho").style.display = "none";
                        </script>
                        
                    @endforelse
                
                </tbody>
            </table>

    </div>
    
    <div class="card-content grey lighten-4">
        <div class="cho-container center">
            <p>Subtotal: R$ 1,00</p>
            <p>Frete: R$ 1,00</p>
            <h5>Total: R$ 1,00</h5>
        </div>

        <script>
            // Adicione as credenciais do SDK
            const mp = new MercadoPago('{{$public_key}}', {
                    locale: 'pt-BR'
            });

            // Inicialize o checkout
            mp.checkout({
                preference: {
                    id: '{{$preference->id}}'
                },
                render: {
                        container: '.cho-container', // Indica onde o botão de pagamento será exibido
                        label: 'Comprar', // Muda o texto do botão de pagamento (opcional)
                }
            });

            // Invocando a função posteriormente
            checkout.render({
                container: '.cho-container',
                label: 'Pagar'
            })
        </script>
    </div>

</div>

@endsection