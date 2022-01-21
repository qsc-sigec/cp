@extends('adminlte::page')

@section('title', 'cpi')

@section('content_header')

@stop

@section('content')
<!--a href='registros/create' class='btn btn-primary'>CREAR</a-->
<a href='/actividades' class='btn btn-primary'>Regresar</a>
<table class='table table-dark table-striped mt-4' id='registros'>
    <thead>
        <tr>
            <th scope='col'>ID</th>
            <th scope='col'>ACTIVIDAD</th>
            <th scope='col'>ACCIONES SIGUIENTES</th>
            <th scope='col'>LAST UPDATE</th>
            <th scope='col'>RESPONSABLE</th>
            <th scope='col'>STATUS</th>
            <th scope='col'>PRIORIDAD</th>
            <th scope='col'>COMPLEJIDAD</th>
            <th scope='col'>ESTIMADO</th>
            <th scope='col'>FECHA PROPUESTA</th>
            <th scope='col'>ULTIMA REVISIÓN</th>
            <th scope='col'>CREACIÓN</th>
            <th scope='col'>ACTUALIZACIÓN</th>
            <th scope='col'>ACCIONES</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($registros as $registro)
        
        <tr>
            <td>{{$registro->id}}</td>
            <td>{{$registro->reg_act_id}}</td>
            <td>{{$registro->reg_acciones}}</td>
            <td>{{$registro->reg_lastUpdate}}</td>
            <td>{{$registro->reg_usr_id}}</td>
            <td>{{$registro->reg_status}}</td>
            <td>{{$registro->reg_prioridad}}</td>
            <td>{{$registro->reg_complejidad}}</td>
            <td>{{$registro->reg_estimado}}</td>
            <td>{{$registro->reg_fechaPropuesta}}</td>
            <td>{{$registro->reg_revision}}</td>
            <td>{{$registro->created_at}}</td>
            <td>{{$registro->updated_at}}</td>
            <td>
                <form action="{{ route ('registros.destroy',$registro->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="/registros/{{$registro->id}}/edit" class="btn btn-info">Editar</a>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        
        @endforeach
    </tbody>
</table>
    
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
    $('#registros').DataTable({
        "lengthMenu":[[10,15,50,-1],[10,15,50,"All"]]
    });
} );
</script>

@stop