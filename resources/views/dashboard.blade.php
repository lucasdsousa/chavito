@extends('layouts.main')

@section('content')

<h3 class="center-align">Bem vindo, {{ Auth::user()->name }}!</h3>

<br><br>

<div class="row container" style="margin:auto">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s4"><a href="#test1" style="color: #d81b60">Cadastro</a></li>
        <li class="tab col s4"><a href="#test2" style="color: #d81b60">Pedidos</a></li>
        <li class="tab col s4"><a href="#test3" style="color: #d81b60">Endereços</a></li>
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
          <a href="#" style="color: #d81b60">Alterar Dados</a>
          <a href="#" style="color: #d81b60">Alterar Senha</a>
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
          <a href="#" style="color: #d81b60">Alterar Dados</a>
        </div>
      </div>
    </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.tabs');
    var instances = M.Tabs.init(elems);
  });
</script>

@endsection
