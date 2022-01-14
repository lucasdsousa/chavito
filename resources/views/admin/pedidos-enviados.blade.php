@extends('layouts.admin')

@section('content')

<div class="card container w-75" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">Pedidos</h5>
      <h6 class="card-subtitle mb-2 text-muted">Controle de Pedidos</h6>
      <table class="table table-hover container">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Cliente</th>
              <th scope="col">Imagem</th>
              <th scope="col">Modelo</th>
              <th scope="col">Pingente Adicional</th>
              <th scope="col">Quantidade</th>
              <th scope="col">Valor</th>
              <th scope="col">Status</th>
              <th scope="col">Enviado</th>
              <th scope="col">Rastreio</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pedidos as $p)
                <tr>
                    <th scope="row">{{ $p->id }}</th>
                    <td>{{ $p->user_id }}</td>
                    <td><img src="{{ asset($p->image) }}" alt=""></td>
                    <td>{{ $p->modelo }}</td>
                    <td>{{ $p->pingente }}</td>
                    <td>{{ $p->quantidade }}</td>
                    <td>{{ $p->valor }}</td>
                    <td>{{ $p->status }}</td>
                    <td>{{ $p->enviado }}</td>
                    <td>{{ $p->rastreio }}</td>

                    @if ($p->status == "RE")
                        <td>
                            <form action="{{ route('pedidos-aprovar', $p->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-success" type="submit">Aprovar</button>
                            </form>
                        </td>

                    @elseif ($p->status == "AP")
                        <td>
                            <form action="{{ route('pedidos-enviar', $p->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-primary mb-3" type="submit">Enviar</button>
                            </form>
                            <form action="{{ route('pedidos-cancelar', $p->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-danger" type="submit">Cancelar</button>
                            </form>
                        </td>                    
                    @endif
                </tr>               
            @endforeach
          </tbody>
      </table>
    </div>
</div>

@endsection