@extends('layouts.main')

@section('content')

<div class="container" style="margin-bottom:100px">
    <h1>Catálogo</h1>
    <div class="row">
        @foreach($chav as $i)
                <div class="col s6 m7 l4">
                    <div class="card hoverable">
                        <div class="card-image">
                            <img src="{{ asset($i->image_name) }}">
                        </div>
                        <div class="card-content">
                            <span class="card-title">{{ $i->title }}</span>
                            <p style="font-weight:bold">Preço: R$ {{ $i->valor }}</p>
                            <p>{{ $i->descricao }}</p>
                        </div>
                        <div class="card-action">
                            <a class="waves-effect waves-light btn-small pink" href="/Pedido/{{$i->slug}}" style="font-weight: bold">Personalize Aqui</a>
                        </div>
                    </div>
                </div>       
        @endforeach
    </div>  
</div> 

@endsection