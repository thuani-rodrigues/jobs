@extends('layout')

@section('content')
<h1>Vagas</h1>    

<div class="d-flex justify-content-end my-4">
<a href="{{ route('jobs.create') }}" class="btn btn-primary">Criar vagas</a>
</div>

<table class="table table-houver">
    <head>
        <tr>
            <th>Titulo</th>
            <th>Descrição</th>
            <th>Empresa</th>
            <th>Ações</th>
        </tr>
    </head>

    <tbody>
        @foreach ($jobs as $job)

        <tr>
            <td>{{ $job->title}}</td>
            <td>{{$job->description}}</td>
            <td>{{$job->company->name}}</td>
            <td>
                <a href="{{ route( 'jobs.edit', [$job]) }}" class="btn btn-info">Editar</a>
                <form action="{{ route('jobs.destroy', [$job]) }}" class="d-inline-block" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tr>
    </tbody>

</table>

@endsection