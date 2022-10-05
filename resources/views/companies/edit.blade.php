@extends('layout')

@section('content')
<h1>editar empresas</h1>

<form action="{{route('companies.update', [$company])}}" method="post" class="mt-5">
    @csrf
    @method('put')

    <div class="mb3">
        <label for="name">nome</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $company->name }}">

    </div>
    <div class="mb3">
        <label for="corporate_name">nome fantasia</label>
        <input type="text" name="corporate_name" id="corporate_name" class="form-control"
            value="{{ $company->corporate_name }}">


    </div>
    <div class="mb3">
        <label for="cnpj">cnpj</label>
        <input type="text" name="cnpj" id="cnpj" class="form-control" value="{{ $company->cnpj }}">

    </div>

    <button type="submit" class="btn btn-success">salvar</button>
    <button type="reset" class="btn btn-secondary">limpar</button>


</form>

@endsection