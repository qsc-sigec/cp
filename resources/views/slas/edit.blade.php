@extends('adminlte::page')

@section('title', 'SLAs')

@section('content_header')

@stop

@section('content')
<h2>Editar Acuerdos</h2>
<form action="/slas/{{$sla->id}}" method="POST">
@csrf
@method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Tipo de Acuerdo</label>
        <input type="text" id="sla_tipo" name="sla_tipo" class="form-control" value="{{$sla->sla_tipo}}" tabindex="1">
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="" class="form-label">Prioridad</label>
            <select type="text" id="sla_prioridad" name="sla_prioridad" class="form-control" tabindex="2">
            @if($sla->sla_prioridad=="P1")    
                <option value="P1" selected>P1</option>    
                <option value="P2">P2</option>
                <option value="P3">P3</option>
                <option value="P4">P4</option>
            @elseif($sla->sla_prioridad=="P2")
                <option value="P1">P1</option>    
                <option value="P2" selected>P2</option>
                <option value="P3">P3</option>
                <option value="P4">P4</option>
            @elseif($sla->sla_prioridad=="P3")
                <option value="P1">P1</option>    
                <option value="P2">P2</option>
                <option value="P3" selected>P3</option>
                <option value="P4">P4</option>
            @else
                <option value="P1">P1</option>        
                <option value="P2">P2</option>
                <option value="P3">P3</option>
                <option value="P4" selected>P4</option>
            
            @endif
            
            </select>
        </div>
        <div class="col">
            <label for="" class="form-label">Servicio vinculado</label>
            <select name="sla_servicio" id="sla_servicio" class="form-control" tabindex="3" required>
                @foreach ($categorias as $categoria)
                    @if($sla->sla_servicio==$categoria->id)
                        <option value="{{$categoria->id}}" selected>{{$categoria->cat_descripcion}}</option>
                    @else
                        <option value="{{$categoria->id}}">{{$categoria->cat_descripcion}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="col">
            <label for="" class="form-label">Área</label>
            {{$sla->area}}
            <select name="sla_area" id="sla_area" class="form-control" tabindex="4" required>
                @foreach ($areas as $area)
                    @if($sla->sla_area==$area->id)
                        <option value="{{$area->id}}" selected>{{$area->are_nombre}}</option>
                    @else
                        <option value="{{$area->id}}">{{$area->are_nombre}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="col">
            <label for="" class="form-label">Horas</label>
            <input type="number" id="sla_tiempo" name="sla_tiempo" class="form-control" value="{{$sla->sla_tiempo}}" tabindex="5">
        </div>
    </div>
    <a href="/slas" class="btn btn-secondary" tabindex="6">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="7">Guardar</button>
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
