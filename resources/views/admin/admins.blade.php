@extends('layouts.admin')

@section('content')

<div class="card container w-75" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">Administradores</h5>
      <h6 class="card-subtitle mb-2 text-muted">Controle de Administradores</h6>
      <a class="btn btn-primary mt-3 mb-5 justify-end" href="/admin/administradores/novo">Novo Administrador</a>
      <table class="table table-hover container">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">E-mail</th>
              <th scope="col">Cargo</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($admins as $a)
                <tr>
                <th scope="row">{{ $a->name }}</th>
                <td>{{ $a->email }}</td>
                <td>{{ $a->user_type }}</td>
                <td>
                    <a class="btn btn-success mb-1 mt-2" href="/admin/administradores/editar-{{ $a->id }}">Editar</a>
                    <form action="{{ route('admin-apagar', $a->id) }}" method="POST">
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