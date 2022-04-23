@extends('layouts.main')
@section('content')

<div class="container" style="margin-bottom:100px">
    <h1>Nosso Catálogo</h1>
    <div class="row">
        @foreach($chav as $i)
                <div class="col s12 m7 l4">
                    <div class="card hoverable">
                        <div class="card-image">
                            <img src="{{ asset($i->image_name) }}">
                        </div>
                        <div class="card-content">
                            <span class="card-title">{{ $i->title }}</span>
                            <p>{{ $i->descricao }}</p>
                            <p style="font-weight:bold">Preço: R$ {{ $i->valor }}</p>
                        </div>
                        <div class="card-action">
                            <a class="waves-effect waves-light btn-small pink" href="/Pedido/{{$i->slug}}" style="font-weight: bold">Peça Já o Seu!</a>
                        </div>
                    </div>
                </div>       
        @endforeach
    </div>

    @if($uri[-1] == 3)
    <div class="row">
        @foreach($chav3 as $j)
                <div class="col s12 m7 l4">
                    <div class="card hoverable">
                        <div class="card-image">
                            <img src="{{ asset($j->image_name) }}">
                        </div>
                        <div class="card-content">
                            <span class="card-title">{{ $j->title }}</span>
                            <p>{{ $j->descricao }}</p>
                            <p style="font-weight:bold">Preço: R$ {{ $j->valor }}</p>
                        </div>
                        <div class="card-action">
                            <a class="waves-effect waves-light btn-small pink" href="/Pedido/{{$j->slug}}" style="font-weight: bold">Peça Já o Seu!</a>
                        </div>
                    </div>
                </div>       
        @endforeach
    </div>
    @elseif($uri[-1] == 4)
    <div class="row">
        @foreach($chav4 as $k)
                <div class="col s12 m7 l4">
                    <div class="card hoverable">
                        <div class="card-image">
                            <img src="{{ asset($k->image_name) }}">
                        </div>
                        <div class="card-content">
                            <span class="card-title">{{ $k->title }}</span>
                            <p>{{ $k->descricao }}</p>
                            <p style="font-weight:bold">Preço: R$ {{ $k->valor }}</p>
                        </div>
                        <div class="card-action">
                            <a class="waves-effect waves-light btn-small pink" href="/Pedido/{{$k->slug}}" style="font-weight: bold">Peça Já o Seu!</a>
                        </div>
                    </div>
                </div>       
        @endforeach
    </div>
    @elseif($uri[-1] == 5)
    <div class="row">
        @foreach($chav5 as $l)
                <div class="col s12 m7 l4">
                    <div class="card hoverable">
                        <div class="card-image">
                            <img src="{{ asset($l->image_name) }}">
                        </div>
                        <div class="card-content">
                            <span class="card-title">{{ $l->title }}</span>
                            <p>{{ $l->descricao }}</p>
                            <p style="font-weight:bold">Preço: R$ {{ $l->valor }}</p>
                        </div>
                        <div class="card-action">
                            <a class="waves-effect waves-light btn-small pink" href="/Pedido/{{$l->slug}}" style="font-weight: bold">Peça Já o Seu!</a>
                        </div>
                    </div>
                </div>       
        @endforeach
    </div>
    @endif
    
        <ul class="pagination">

            @for($i=1; $i<6; $i++)
                <li><a href="/Catalogo?page={{ $i }}">{{ $i }}</a></li>
            @endfor

        </ul>

</div> 

@endsection