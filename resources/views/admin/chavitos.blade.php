@extends('layouts.admin')

@section('content')

<div class="card container w-75" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">Chavitos</h5>
      <h6 class="card-subtitle mb-2 text-muted">Controle de Chavitos</h6>
      <a class="btn btn-primary mt-3 mb-5 justify-end" href="/admin/chavitos/novo">Novo Chavito</a>
      <table class="table table-hover container">
          <thead>
            <tr>
              <th scope="col">Modelo</th>
              <th scope="col">Descrição</th>
              <th scope="col">Valor</th>
              <th scope="col">Exemplo</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($chavitos as $c)
                <tr>
                <th scope="row">{{ $c->title }}</th>
                <td>{{ $c->descricao }}</td>
                <td>R$ {{ $c->valor }},00</td>
                <td><img src="{{ asset($c->image_name) }}" alt="" style="width:25%"></td>
                <td>
                    <a class="btn btn-success mb-1 mt-2" href="/admin/chavitos/editar-{{ $c->id }}">Editar</a>
                    <form action="{{ route('chavitos-apagar', $c->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-danger" type="submit">Apagar</button>
                    </form>
                </td>
                </tr>               
            @endforeach
          </tbody>
      </table>
    </div>
</div>

@endsection