@extends('layouts.main')

@section('content')

<div class="container" style="margin-bottom:100px">
    <form method="POST" action="{{ route('comprar') }}" enctype="multipart/form-data">
    @csrf

    @forelse($items as $i)

        <table class="highlight responsive-table centered" style="margin-bottom:25px">
            <thead>
            <tr>
                <th>Item</th>
                <th>Preço</th>
            </tr>
            </thead>

            <tbody>

                    <tr>
                            <td>{{ $i->modelo }}</td>
                            <!-- <td>
                                <p id="qty" name="qty">1</p>
                                <a href="#" onclick="addtocart()"><i class="bi bi-plus-circle"></i></a>
                                <a href="#" onclick="removefromcart()"><i class="bi bi-dash-circle"></i></a>
                            </td> -->
                            <td id="price">R$ {{ $i->valor }},00</td>

                            <input  type="text" name="image" value="{{ $i->image }}" hidden>
                            <input  type="text" name="chav_id" value="{{ $i->id }}" hidden>
                            <input  type="text" name="modelo" value="{{ $i->modelo }}" hidden>
                            <input  type="text" name="quantidade" id="qtd" hidden>
                            <input  type="text" name="valor" id="value" hidden>
                    </tr>
            
            </tbody>
        </table>

            <button class="submit btn right" style="background: #ff4d94; font-weight: bold;">
                Finalizar Compra</a>
            </button>

        @empty
            <p>Você ainda não adicionou produtos ao seu carrinho.</p>
        @endforelse
    </form>
</div>

@endsection