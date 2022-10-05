@extends('layout')

@section('content')
<h1>Criar Vagas</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('jobs.store')}}" method="post">
    @csrf

    <div class="mb-3">
        <label for="title">Titulo</label>
        <input type="text" name="title" id="title" class="form-control">

    </div>
    <div class="mb-3">
        <label for="description">Descrição</label>
        <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>

    </div>

    <div class="mb-3">
        <label for="company">Empresa</label>
        <select class="form-select" name="company_id" id="company">
            @foreach($companies as $company)
            <option value="{{$company->id}}">{{$company->name}}</option>

            @endforeach
        </select>

    </div>


    <button type="submit" class="btn btn-success">salvar</button>
    <button type="reset" class="btn btn-secondary">limpar</button>


</form>
@endsection