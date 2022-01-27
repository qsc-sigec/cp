@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')

@stop

@section('content')
<a href='categorias/create' class='btn btn-primary mb-3'>Crear Categoría</a>
<table class='table table-dark table-striped mt-4' id="categorias">
    <thead>
        <tr>
            <th scope='col'>ID</th>
            <th scope='col'>CATEGORIA</th>
            <th scope='col'>EQUIPO</th>
            <th scope='col'>CREACIÓN</th>
            <th scope='col'>ACTUALIZACIÓN</th>
            <th scope='col'>ACCIONES</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categorias as $categoria)
        <tr>
            <td>{{$categoria->id}}</td>
            <td>{{$categoria->cat_descripcion}}</td>
            <td>{{$categoria->cat_equipo}}</td>
            <td>{{$categoria->created_at}}</td>
            <td>{{$categoria->updated_at}}</td>
            <td>
                <form action="{{ route ('categorias.destroy',$categoria->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="/categorias/{{$categoria->id}}/edit" class="btn btn-info">
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
        $('#categorias').DataTable({
            "lengthMenu":[[10,15,50,-1],[10,15,50,"All"]]
        });
    } );
    </script>
@stop