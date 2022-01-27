@extends('adminlte::page')

@section('title', 'SLAs')

@section('content_header')

@stop

@section('content')
<h2>Crear Acuerdo</h2>
<form action="/slas" method="POST">
@csrf
    <div class="mb-3">
        <label for="" class="form-label">Tipo de Acuerdo</label>
        <input name="sla_tipo" id="sla_tipo"  class="form-control" tabindex="1" required/>
    </div>
    <div class="row">
        <div class="col">
            <label for="" class="form-label">Prioridad</label>
            <select name="sla_prioridad" id="sla_prioridad"  class="form-control" tabindex="2" required>
                <option value="P1">P1</option>
                <option value="P2">P2</option>
                <option value="P3">P3</option>
                <option value="P4">P4</option>
            </select>
        </div>
        <div class="col">
            <label for="" class="form-label">Servicio</label>
            <select name="sla_servicio" id="sla_servicio" class="form-control" tabindex="3" required>
                @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->cat_descripcion}}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <label for="" class="form-label">Área</label>
            <select name="sla_area" id="sla_area" class="form-control" tabindex="4" required>
                @foreach ($areas as $area)
                    <option value="{{$area->id}}">{{$area->are_nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="col mb-3">
            <label for="" class="form-label">Tiempo (horas)</label>
            <input type="number" id="sla_tiempo" name="sla_tiempo" class="form-control" tabindex="5" required>
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
@stop