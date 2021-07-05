@extends('layouts.main')

@section('content')

<div class="container" style="margin-bottom:100px">
    <form method="POST" action="{{ route('comprar') }}" enctype="multipart/form-data">
    @csrf
        <table class="highlight responsive-table centered" style="margin-bottom:25px">
            <thead>
            <tr>
                <th>Item</th>
                <th>Quantidade</th>
                <th>Preço</th>
            </tr>
            </thead>

            <tbody>

                    <tr>
                        <td>{{ $produto->title }}</td>
                        <td>
                            <p id="qty" name="qty">1</p>
                            <a href="#" onclick="addtocart()"><i class="bi bi-plus-circle"></i></a>
                            <a href="#" onclick="removefromcart()"><i class="bi bi-dash-circle"></i></a>
                        </td>
                        <td id="price">R$ {{ $produto->valor }},00</td>

                        <input  type="text" name="image" value="{{ $pedido_img }}">
                        <input  type="text" name="chav_id" value="{{ $produto->id }}">
                        <input  type="text" name="modelo" value="{{ $produto->title }}">
                        <input  type="text" name="quantidade" id="qtd">
                        <input  type="text" name="valor" id="value">
                    </tr>
            
            </tbody>
        </table>

            <button class="submit btn right" style="background: #ff4d94; font-weight: bold;">
                Finalizar Compra</a>
            </button>
        </button>
    </form>
</div>

<script>
    var i = document.getElementById("qty").innerText;
    var p = document.getElementById("price").innerText;
    
    document.getElementById('qtd').value = i;
    document.getElementById('value').value = p.replace('R$', '').replace(',00', '');
    
    function addtocart() {
        i++;
        p = {{ $produto->valor }} * i;
        document.getElementById('qty').innerText = i;
        document.getElementById('price').innerText = "R$ " + p + ",00";
        document.getElementById('qtd').value = i;
        document.getElementById('value').value = p;
     }

    function removefromcart() {
        i--;
        p = {{ $produto->valor }} * i;
        document.getElementById('qty').innerText = i;
        document.getElementById('price').innerText = "R$ " + p + ",00";
        document.getElementById('qtd').value = i;
        document.getElementById('value').value = p;
    }
 </script>

@endsection