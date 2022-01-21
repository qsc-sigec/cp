@extends('adminlte::page')

@section('title', 'Areas')

@section('content_header')

@stop

@section('content')
<h2>Editar áreas</h2>
<form action="/areas/{{$area->id}}" method="POST">
@csrf
@method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">areas</label>
        <input type="text" id="are_nombre" name="are_nombre" class="form-control" value="{{$area->are_nombre}}" tabindex="1">
    </div>
    <a href="/areas" class="btn btn-secondary" tabindex="2">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="3">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
@stop