@extends('layouts.main')

@section('content')

<style>
.container-img {
  position: relative;
  width: 25%;
  left:100px;
  margin-bottom:50px;
}

.image {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.container-img:hover .image {
  opacity: 0.3;
}

.container-img:hover .middle {
  opacity: 1;
}

.text {
  background-color: #04AA6D;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
}
</style>


<div class="row">
@foreach($cats as $i)
    @if(substr($i->imagemExemplo, 7, -1) != '')
      <div class="container-img col s3">
        <img class="image z-depth-4" src="{{ asset($i->imagemExemplo) }}" alt="" style="width:100%">
        <div class="middle">
          <a class="btn-large" href="/Categoria/{{ $i->id }}" style="background: #ff4d94; font-weight: bold; width:100%">{{ $i->nomeCategoria }}</a>
        </div>
      </div>
    @endif
@endforeach
</div>

<div class="container center-align">
    <a class="btn-large" href="/Catalogo" style="background: #ff4d94; font-weight: bold;">Confira nosso catálogo</a>
</div>

<br><br><br>

<div class="container center">
  <h3>Bem Vindo(a)!</h3>
  <h5>Apresentamos o nosso site. Totalmente interativo, moderno e de fácil navegação. Tem como objetivo mostrar a diversidade dos produtos e serviços oferecidos, nele, você também poderá solicitar orçamentos on-line. Sem dúvida é um canal que nos aproxima dos nossos atuais e futuros clientes. Aproveite</h5>
</div>

<br><br>

<li class="divider"></li>

<div class="container center">
  <h3>Quem é a Chavito?</h3>
  <h5>A chavito é uma loja online de presentes personalizados feitos à mão para você. Aqui sua criatividade faz toda diferença!</h5>
</div>

<br><br><br>

<li class="divider"></li>

<div class="container center">
  <h3>Economize no frete indo ao nosso ponto de entrega!*</h3>
  <p>*15 dias úteis após aprovação do pedido.</p>
  <iframe class="center" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1094.0713414341308!2d-38.944774746202214!3d-12.259991422199821!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x71437766abe0b0f%3A0xbcc2e36c509a224c!2sR.%20S%C3%A3o%20Domingos%2C%20505%20-%20Capuchinhos%2C%20Feira%20de%20Santana%20-%20BA%2C%2044076-200!5e0!3m2!1spt-BR!2sbr!4v1636651821559!5m2!1spt-BR!2sbr" width="1000" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>

<br><br><br>
      
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.carousel');
    var instances = M.Carousel.init(elems);
  });
</script>
@endsection
