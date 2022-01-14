@extends('layouts.main')

@section('content')

<div class="row container" style="margin:auto">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3"><a href="#test1">Cadastro</a></li>
        <li class="tab col s3"><a href="#test2">Pedidos</a></li>
        <li class="tab col s3"><a href="#test3">Endereços</a></li>
        <li class="tab col s3"><a href="#test3">Endereços</a></li>
      </ul>
    </div>

    <div id="test1" class="col s12">
      <div class="card">
        <div class="card-content">
          <span class="card-title">Dados Cadastrais</span>
          <p><b>Nome: </b>{{ Auth::user()->name }}</p>
          <p><b>Email: </b>{{ Auth::user()->email }}</p>
          <p><b>Telefone: </b>{{ Auth::user()->tel }}</p>
        </div>
        <div class="card-action">
          <a href="#">Alterar Dados</a>
          <a href="#">Alterar Senha</a>
        </div>
      </div>
    </div>

    <div id="test2" class="col s12">
      <div class="card">
        <div class="card-content">
          <span class="card-title">Pedidos</span>
            @php
              $pedidos = DB::table('pedidos')->get();
            @endphp

              @forelse ($pedidos as $p)
                <p><b>Número do Pedido:</b> {{ $p->id }}</p>
                <p><b>Modelo:</b> {{ $p->modelo }}</p>
                <p><b>Valor:</b> R${{ $p->valor }},00</p>
                <p><b>Imagem:</b> <br> <img src="{{ asset('storage/'.$p->image) }}" alt="" style="width:25%"></p>
                <p><b>Status:</b> {{ $p->status }}</p>
                <br>
                <a class="btn" href="#" style="background: #ff4d94; font-weight: bold;">Cancelar Pedido</a>
                <br><br><br>
              @empty          
                <p>Você ainda não fez nenhum pedido.</p>            
              @endforelse
        </div>
      </div>
    </div>

    <div id="test3" class="col s12">
      <div class="card">
        <div class="card-content">
          <span class="card-title">Endereços</span>
        
          @php
            $endereco = DB::table('enderecos')->where('user_id', Auth::id())->get()
          @endphp

          @foreach($endereco as $end)

            <p><b>Logradouro: </b>{{ $end->rua }}</p>
            <p><b>Nº: </b>{{ $end->numero }}</p>
            <p><b>Bairro: </b>{{ $end->bairro }}</p>
            <p><b>Cidade: </b>{{ $end->cidade }}</p>
            <p><b>Estado: </b>{{ $end->uf }}</p>

          @endforeach
        </div>
        <div class="card-action">
          <a href="#">Alterar Dados</a>
        </div>
      </div>
    </div>
</div>

<h3 class="center-align">Bem vindo, {{ Auth::user()->name }}!</h3>

<br><br>

<ul class="collapsible popout container" style="margin: auto; margin-bottom:100px">
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
      <div class="collapsible-body">
        @php
          $pedidos = DB::table('pedidos')->get();
        @endphp

          @forelse ($pedidos as $p)
            <p style="font-weight:bold">Pedido Número {{ $p->id }}</p>
            <p style="font-weight:bold">Modelo do Chavito: {{ $p->modelo }}</p>
            <p style="font-weight:bold">Valor do pedido: {{ $p->valor }}</p>
            <p style="font-weight:bold">Imagem enviada: <img src="{{ asset('$p->image') }}" alt=""></p>
            <p style="font-weight:bold">Status do Pedido: {{ $p->status }}</p>
            <a class="btn" href="#" style="background: #ff4d94; font-weight: bold;">Cancelar Pedido</a>
            <br><br><br>
          @empty          
            <p>Você ainda não fez nenhum pedido.</p>            
          @endforelse
      </div>
    </li>
</ul>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.tabs');
    var instances = M.Tabs.init(elems);
  });
</script>

@endsection
