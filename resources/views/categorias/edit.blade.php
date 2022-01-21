@extends('layouts.base')

@section('contenido')
<h2>EDITAR CATEGORIAS</h2>
<form action="/categorias/{{$categoria->id}}" method="POST">
@csrf
@method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Categoria</label>
        <input type="text" id="cat_descripcion" name="cat_descripcion" class="form-control" value="{{$categoria->cat_descripcion}}" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Equipo</label>
        <input type="text" id="cat_equipo" name="cat_equipo" class="form-control" value="{{$categoria->cat_equipo}}" tabindex="2">
    </div>
    <a href="/categorias" class="btn btn-secondary" tabindex="3">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>
@endsection