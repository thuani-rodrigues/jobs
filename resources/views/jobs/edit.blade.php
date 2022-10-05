@extends('layout')

@section('content')
<h1>Editar Vagas</h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{route('jobs.update', [$job])}}" method="post" class="mt-5">
    @csrf
    @method('put')

    <div class="mb3">
        <label for="title">Titulo</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ $job->title }}">

    </div>
    <div class="mb3">
        <label for="description">Descrição</label>
        <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{$job->description}}</textarea>
    </div>


    <button type="submit" class="btn btn-success">salvar</button>
    <button type="reset" class="btn btn-secondary">limpar</button>


</form>

@endsection