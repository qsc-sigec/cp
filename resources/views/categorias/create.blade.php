@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')

@stop

@section('content')
<form action="/categorias" method="POST">
@csrf
    <div class="mb-3">
        <label for="" class="form-label">Categoria</label>
        <input type="text" id="cat_descripcion" name="cat_descripcion" class="form-control" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Equipo</label>
        <input type="text" id="cat_equipo" name="cat_equipo" class="form-control" tabindex="2">
    </div>
    <a href="/categorias" class="btn btn-secondary" tabindex="3">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#actividades').DataTable({
            "lengthMenu":[[10,15,50,-1],[10,15,50,"All"]]
        });
    } );
    </script>
@stop
