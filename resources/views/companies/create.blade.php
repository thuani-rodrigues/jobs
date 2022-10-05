@extends('layout')
@section('content')
<h1>Criar Empresa</h1>

<form action="{{route('companies.store')}}" method="post">
    @csrf

    <div class="mb3">
        <label for="name">nome</label>
        <input type="text" name="name" id="name" class="form-control">

    </div>
    <div class="mb3">
        <label for="corporate_name">nome fantasia</label>
        <input type="text" name="corporate_name" id="corporate_name" class="form-control">

    </div>
    <div class="mb3">
        <label for="cnpj">cnpj</label>
        <input type="text" name="cnpj" id="cnpj" class="form-control">

    </div>

    <button type="submit" class="btn btn-success">salvar</button>
    <button type="reset" class="btn btn-secondary">limpar</button>


</form>
@endsection