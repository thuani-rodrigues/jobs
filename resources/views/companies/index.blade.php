@extends ('layout')

@section ('content')
<h1>Empresa</h1>
<div class="d-flex justify-content-end my-4">
    <a href="{{ route('companies.create') }}" class="btn btn-primary">criar empresas</a>
</div>

<table class="table table-hover">

    <head>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Nome Fantasia</th>
            <th>Cnpj</th>
            <th>Açoes</th>
        </tr>

        <tbody>
            @foreach ($companies as $company)
            <tr>
                <td>{{$company->id}}</td>
                <td>{{$company->name}}</td>
                <td>{{$company->corporate_name}}</td>
                <td>{{$company->cnpj}}</td>
                <td>
                    <a href="{{ route( 'companies.edit', [$company]) }}" class="btn btn-info">Editar</a>
                    <form action="{{ route('companies.destroy', [$company]) }}" class="d-inline-block" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </head>
</table>

@endsection