@extends('adminlte::page')

@section('title', 'cpi')

@section('content_header')
    
@stop

@section('content')
<a href='/actividades' class='btn btn-primary mb-3'>Regresar</a>
Se ha generado un error: {{$msj}}
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