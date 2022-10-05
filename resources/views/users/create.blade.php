@extends('layout')

@section('content')

<h1>criar usurarios</h1>
<form action="{{route('users.store')}}" method="post">
    @csrf

    <div class="mb-3">
        <label for="name">nome</label>
        <input type="text" name="name" id="name" class="form-control">

    </div>
    <div class="mb-3">
        <label for="email">e-mail</label>
        <input type="email" name="email" id="email" class="form-control">

    </div>
    <div class="mb-3">
        <label for="password">senha</label>
        <input type="password" name="password" id="password" class="form-control">

    </div>
    <div class="mb-3">
        <label for="password_confirmation">confirme sua senha</label>
        <input type="password" name="password_confirmation" id="password" class="form-control">

    </div>

    <button type="submit" class="btn btn-success">salvar</button>
    <button type="reset" class="btn btn-secondary">limpar</button>

</form>
@endsection