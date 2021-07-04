@extends('layouts.main')

@section('content')

<h3 class="center-align">Bem vindo, {{ Auth::user()->name }}!</h3>

<br><br>

<ul class="collapsible popout">
    <li>
      <div class="collapsible-header"><h5>Dados Cadastrais</h5></div>
        <div class="collapsible-body">
            <p style="font-weightopacity: bold">{{ Auth::user()->name }}</p>
            <p style="font-weight: bold">{{ Auth::user()->email }}</p>
            <p style="font-weight: bold">{{ Auth::user()->tel }}</p>

            <a href="{{ route('alterar-cadastro', Auth::id()) }}">Alterar</a>
        </div>
    </li>
    <li>
      <div class="collapsible-header"><h5>Endereços</h5></div>
        <div class="collapsible-body">
        
            @php
              $endereco = DB::table('enderecos')->where('user_id', Auth::id())->get()
            @endphp

            @foreach($endereco as $end)

              <p style="font-weight:bold">{{ $end->rua }}</p>
              <p style="font-weight:bold">{{ $end->numero }}</p>
              <p style="font-weight:bold">{{ $end->bairro }}</p>
              <p style="font-weight:bold">{{ $end->cidade }}</p>
              <p style="font-weight:bold">{{ $end->uf }}</p>
              <a href="{{ route('alterar-endereco', $end->id) }}">Alterar</a>
              <a href="{{ route('apagar-endereco', $end->id) }}">Excluir</a>
              <br><br><br>

            @endforeach

            <a class="btn-small" href="/endereco" style="background: #ff4d94; font-weight: bold;">Novo Endereço</a>
        </div>
    </li>
    <li>
      <div class="collapsible-header"><h5>Pedidos</h5></div>
      <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
    </li>
</ul>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems);
  });
</script>

@endsection
