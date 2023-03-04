@extends('layouts.main')

@section('content')

<style>
    #img {
        border: 2px solid black;
        width: 90%;
        display:block;
        margin-top:25px;
        margin-bottom:25px;
    }

#div_card {
    border: 3px solid #000;
    border-radius:3%
}

#div_card:hover {
    border: 3px solid #18ffff;
    border-radius:3%
}

    #div_card #conteudo .card-title {
        display:none;
    }

    #div_card:hover #conteudo .card-title {
        display:block;
    }

    #div_card #conteudo p {
        display: none;
    }

    #div_card:hover #conteudo p {
        display: block;
    }

    #div_card:hover #conteudo span i {
        display: none;
    }

    #div_card #personalize {
        background-color: #18ffff;
        display: none;
    }

    #div_card:hover #personalize {
        display: block;
    }
</style>

<div class="container" style="margin-bottom:100px">
    <h1>Catálogo</h1>
    <div class="row">
        @foreach($chav as $i)
                <div class="col s6 m7 l4">
                    <div id="div_card" class="card">
                        <div id="imagem" class="card-image" style="display: flex; justify-content: center;">
                            <img id="img" src="{{ asset($i->image_name) }}">
                        </div>
                        <div id="conteudo" class="card-content">
                            <span class="card-title" style="color:#ff4d94;"><h5 style="font-weight: bold">{{ $i->title }}</h5></span>
                            <p style="font-weight: bold">Por: R${{ $i->valor }}</p>
                            <span><i class="fa-regular fa-heart fa-2xl"></i></span>
                            <span><i class="fa-regular fa-comment fa-2xl"></i></span>
                            <span><i class="fa-regular fa-paper-plane fa-2xl"></i></span>
                            <span><i class="fa-solid fa-bookmark fa-2xl" style="float: right"></i></span>
                        </div>
                        <div id="personalize" class="card-action" style="height: 85px;">
                            <a href="#modal" style="text-decoration: none;"><h5 class="center-align" style="color: #ff4d94; font-weight: bold">PERSONALIZE</h5></a>
                        </div>
                    </div>
                </div>  
        @endforeach
                
        <div id="modal" class="modal">
            <div class="row">
                <form class="col s12">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="frase" name type="text" class="validate">
                        <label for="frase">Frase que deseja</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="info" type="text" class="validate">
                        <label for="info">Informações do pingente</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6">
                        Cor do acrílico:
                        <div class="input-field inline">
                            <input id="cor_acrilico" name="cor_acrilico" type="text" class="validate">
                        </div>
                    </div>
                    <div class="col s6">
                        Cor do pingente:
                        <div class="input-field inline">
                            <input id="cor_pingente" name="cor_pingente" type="text" class="validate">
                        </div>
                    </div>
                </div>
                </form>
            </div> 
        </div>  
    </div>  
</div> 

<script>
     document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);
  });
</script>

@endsection