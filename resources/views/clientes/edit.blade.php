@extends('layouts.base')

@section('contenido')
<h2>EDITAR CLIENTES</h2>
<form action="/clientes/{{$cliente->id}}" method="POST">
@csrf
@method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">CLIENTES</label>
        <input type="text" id="cli_nombre" name="cli_nombre" class="form-control" value="{{$cliente->cli_nombre}}" tabindex="1">
    </div>
    <a href="/clientes" class="btn btn-secondary" tabindex="2">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="3">Guardar</button>
</form>
@endsection