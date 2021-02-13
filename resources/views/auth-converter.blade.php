@extends('layouts.layout')
@section('header')
    <header class="container-fluid">
        <div class="my-4"><h1 class="text-center my-3">{{$titlePage ?? 'Conversor de Moedas'}}</h1></div>
    </header>
@endsection
@section('content')
<article class="row">
    <div class="col-sm-12 col-md-6 col-lg-4 mx-auto">
        <form action="{{$target}}" class="card text-center" method="post">
            <fieldset class="card-body">
                @csrf
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuário</label>
                    <input type="text" name="usuario" class="form-control" id="usuario" placeholder="Admin">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="admin">
                </div>
                <div class="d-grid gap-2 mb-3">
                    <input type="submit" class="btn btn-primary" name="submit" value="Enviar">
                </div>
            </<fieldset>
        </form>
    </div>
</article>

@endsection
