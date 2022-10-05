@extends('layout')

@section('content')

<h1>editar usuarios</h1>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{route('users.update', [$user])}}" method="post" class="mt-5">
    @csrf
    @method('put')

    <div class="mb3">
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">

    </div>
    <div class="mb3">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">


    </div>
    <div class="mb3">
        <label for="password">Senha</label>
        <input type="password" name="password" id="password" class="form-control">
            

    </div>

    <div class="mb3">
        <label for="password_confirmation">Confirmação de senha</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            
    </div>


    <button type="submit" class="btn btn-success">salvar</button>
    <button type="reset" class="btn btn-secondary">limpar</button>


</form>
@endsection