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
                                <td><a href="/Carrinho/{{ $i->id }}">Remover</a></td>

                                <input  type="text" name="image" value="{{ $i->image }}" hidden>
                                <input  type="text" name="chav_id" value="{{ $i->id }}" hidden>
                                <input  type="text" name="modelo" value="{{ $i->modelo }}" hidden>
                                <input  type="text" name="quantidade" id="qtd" hidden>
                                <input  type="text" name="valor" id="value" hidden>
                        </tr>

                    @empty
                        <div class="container center">
                            <p class="center">Você ainda não adicionou produtos ao seu carrinho.</p>
                            <br><br>
                            <a class="waves-effect waves-light btn pink" href="/Catalogo">Ver Catálogo</a>
                        </div>
                    @endforelse
                
                </tbody>
            </table>

    </div>
    
    <div class="card-content grey lighten-4">
        <div class="cho-container center" id="cardBottom">
            <p>Subtotal: R$ {{ $items_sum }},00</p>
            <p>Frete: R$ {{ $frete->valor }},00 para {{ $frete->uf }}</p>
            <h5>Total: R$ {{ $total }},00</h5>
            <a href="{{ $preference->init_point }}" target="_blank">Pagar</a>
        </div>

        <script>
            // Adicione as credenciais do SDK
            const mp = new MercadoPago('{{ $public_key }}', {
                    locale: 'pt-BR'
            });

            // Inicialize o checkout
            mp.checkout({
                preference: {
                    id: '{{ $preference->id }}'
                }
            });
        </script>
    </div>

    @if(sizeof($items) < 1)
        <script>
            document.getElementById("tableCarrinho").style.display = "none";
            document.getElementById("cardBottom").style.display = "none";
        </script>
    @endif

</div>

@endsection