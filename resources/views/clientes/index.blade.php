@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
<a href='clientes/create' class='btn btn-primary mb-3'>Crear Cliente</a>
<table class='table table-dark table-striped mt-4' id="clientes">
    <thead>
        <tr>
            <th scope='col'>ID</th>
            <th scope='col'>CLIENTE</th>
            <th scope='col'>CREACIÓN</th>
            <th scope='col'>ACTUALIZACIÓN</th>
            <th scope='col'>ACCIONES</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clientes as $cliente)
        <tr>
            <td>{{$cliente->id}}</td>
            <td>{{$cliente->cli_nombre}}</td>
            <td>{{$cliente->created_at}}</td>
            <td>{{$cliente->updated_at}}</td>
            <td>
                <form action="{{ route ('clientes.destroy',$cliente->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="/clientes/{{$cliente->id}}/edit" class="btn btn-info">
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
        $('#clientes').DataTable({
            "lengthMenu":[[10,15,50,-1],[10,15,50,"All"]]
        });
    } );
    </script>
@stop

