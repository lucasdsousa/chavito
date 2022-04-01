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
                            <p style="font-weight:bold">Preço: R$ {{ $i->valor }}</p>
                            <p>{{ $i->descricao }}</p>
                        </div>
                        <div class="card-action">
                            <a class="waves-effect waves-light btn-small pink" href="/Pedido/{{$i->slug}}" style="font-weight: bold">Peça Já o Seu!</a>
                        </div>
                    </div>
                </div>       
        @endforeach
    </div>
    
        <ul class="pagination">
            <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
            
            @for($i=1; $i<8; $i++)
                <li class="active"><a href="/Catalogo?page={{ $i }}">{{ $i }}</a></li>
            @endfor

            <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
        </ul>

</div> 

@endsection