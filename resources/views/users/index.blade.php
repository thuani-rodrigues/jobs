@extends('layout')

@section('content')

<h1>usuarios</h1>

<div class="d-flex justify-content-end my-4">
    <a href="{{ route('users.create') }}" class="btn btn-primary">cadastrar usuario</a>
</div>


<table class="table table-houver">
    <thead>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Opções</th>
        </tr>
    </thead>

    <tbody>
        @foreach ( $users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route( 'users.edit', [$user]) }}" class="btn btn-info">Editar</a>
                <form action="{{ route('users.destroy', [$user]) }}" class="d-inline-block" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>

@endsection