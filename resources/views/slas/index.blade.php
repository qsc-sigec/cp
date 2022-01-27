@extends('adminlte::page')

@section('title', 'SLAs')

@section('content_header')

@stop

@section('content')
<a href='slas/create' class='btn btn-primary mb-3'>Crear Acuerdo</a>
<table class='table table-dark table-striped mt-4' id="slas">
    <thead>
        <tr>
            <th scope='col'>ID</th>
            <th scope='col'>Sla</th>
            <th scope='col'>Prioridad</th>
            <th scope='col'>Tipo</th>
            <th scope='col'>Area</th>
            <th scope='col'>Horas</th>
            <th scope='col'>ACCIONES</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($slas as $sla)
        <tr>
            <td>
                {{$sla->id}}
            </td>
            <td>{{$sla->sla_tipo}}</td>
            <td>{{$sla->sla_prioridad}}</td>
            <td>
                @foreach ($categorias as $categoria)
                    @if($sla->sla_servicio==$categoria->id)
                        {{$categoria->cat_descripcion}}
                    @endif
                @endforeach
            </td>
            <td>
                @foreach ($areas as $area)
                    @if($sla->sla_area==$area->id)
                        {{$area->are_nombre}}
                    @endif
                @endforeach
            </td>
            <td>{{$sla->sla_tiempo}}</td>
            <td>
                <form action="{{ route ('slas.destroy',$sla->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="/slas/{{$sla->id}}/edit" class="btn btn-info">
                        <i class="fa fa-eye"></i>
                    </a>
                    @if(auth()->user()->area=="Departamento de TI")
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash-alt"></i>
                        </button>
                    @endif
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
        $('#slas').DataTable({
            "lengthMenu":[[10,15,50,-1],[10,15,50,"All"]]
        });
    } );
    </script>
@stop