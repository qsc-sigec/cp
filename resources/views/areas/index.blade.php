@extends('adminlte::page')

@section('title', 'Áreas')

@section('content_header')

@stop

@section('content')
<a href='areas/create' class='btn btn-primary mb-3'>Crear area</a>
<table class='table table-dark table-striped mt-4' id="areas">
    <thead>
        <tr>
            <th scope='col'>Id</th>
            <th scope='col'>Área</th>
            <th scope='col'>Creación</th>
            <th scope='col'>Actualización</th>
            <th scope='col'>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($areas as $area)
        <tr>
            <td>{{$area->id}}</td>
            <td>{{$area->are_nombre}}</td>
            <td>{{$area->created_at}}</td>
            <td>{{$area->updated_at}}</td>
            <td>
                <form action="{{ route ('areas.destroy',$area->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="/areas/{{$area->id}}/edit" class="btn btn-info">
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
        $('#areas').DataTable({
            "lengthMenu":[[10,15,50,-1],[10,15,50,"All"]]
        });
    } );
    </script>
@stop

