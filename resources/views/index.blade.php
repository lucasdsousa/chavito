@extends('layouts.main')

@section('content')

<div class="carousel container" style="margin-top: -300px; height:750px">
    @foreach($chav as $i)
    
        <a class="carousel-item" href="#two!" style="width: 30%"><img src="{{ asset($i->image_name) }}" style="border-radius: 5%"></a>

    @endforeach
    <!-- <a class="carousel-item" href="#one!" style="width: 30%"><img src="{{ asset('images/chavito_casal.jpg') }}" style="border-radius: 50%"></a>
    <a class="carousel-item" href="#two!" style="width: 30%"><img src="{{ asset('images/chavito_casal.jpg') }}" style="border-radius: 50%"></a>
    <a class="carousel-item" href="#three!" style="width: 30%"><img src="{{ asset('images/chavito_casal.jpg') }}" style="border-radius: 50%"></a>
    <a class="carousel-item" href="#four!" style="width: 30%"><img src="{{ asset('images/chavito_casal.jpg') }}" style="border-radius: 50%"></a>
    <a class="carousel-item" href="#five!" style="width: 30%"><img src="{{ asset('images/chavito_casal.jpg') }}" style="border-radius: 50%"></a> -->
</div>

<div class="container center-align">
    <a class="btn-large" href="/Catalogo" style="background: #ff4d94; font-weight: bold;">Confira nosso catálogo</a>
</div>

<br><br><br>
      
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.carousel');
    var instances = M.Carousel.init(elems);
  });
</script>
@endsection