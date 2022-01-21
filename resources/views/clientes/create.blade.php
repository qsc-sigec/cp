@extends('layouts.base')

@section('contenido')
<h2>CREAR CLIENTES</h2>
<form action="/clientes" method="POST">
@csrf
    <div class="mb-3">
        <label for="" class="form-label">CLIENTE</label>
        <input type="text" id="cli_nombre" name="cli_nombre" class="form-control" tabindex="1">
    </div>
    <a href="/clientes" class="btn btn-secondary" tabindex="2">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="3">Guardar</button>
</form>
@endsection