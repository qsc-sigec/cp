
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
<form action="/clientes/{{$cliente->id}}" method="POST">
@csrf
@method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Nombre del cliente</label>
        <input type="text" id="cli_nombre" name="cli_nombre" class="form-control" value="{{$cliente->cli_nombre}}" tabindex="1">
    </div>
    <a href="/clientes" class="btn btn-secondary" tabindex="2">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="3">Guardar</button>
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
