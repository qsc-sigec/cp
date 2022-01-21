@extends('adminlte::page')

@section('title', 'cpi')

@section('content_header')

@stop

@section('content')

<form action="/actividades/{{$actividad->id}}" method="POST">
@csrf
@method('PUT')

<div class="row">
        <div class="col">
            <label for="" class="form-label">Servicio #{{$actividad->id}}</label>
            <input type="text" id="act_titulo" name="act_titulo" class="form-control" value="{{$actividad->act_titulo}}" tabindex="1">
        </div>
        <div class="col">
            <i class="fa fa-user"></i>    
            <label for="" class="form-label">Responsable Actual: </label>
            <select name="act_responsable" id="act_responsable" class="form-control" tabindex="2" required>
                @foreach ($usuarios as $usuario)
                    @if($usuario->id==$actividad->act_responsable)
                    <option value="{{$usuario->id}}" selected>{{$usuario->name}}</option>
                    @else
                    <option value="{{$usuario->id}}">Reasignar a {{$usuario->name}}</option>
                    @endif
                @endforeach

                        
            </select>
        </div>
        <div class="col">
            <label for="" class="form-label">Cliente: </label><br>{{$clientes->cli_nombre}}
            <input type="text" id="act_cli_id" name="act_cli_id" class="form-control" value="{{$clientes->id}}" tabindex="3" hidden>
        </div>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Descripción</label>
        <textarea id="act_descripcion" name="act_descripcion" class="form-control" tabindex="2">{{$actividad->act_descripcion}}</textarea>
    </div>
    <div class="row">
        <div class="col">
            <label for="" class="form-label">Categoría</label>
            <select name="act_cat_id" id="act_cat_id" class="form-control" tabindex="4" required>
                <option value="{{$categoria->id}}">{{$categoria->cat_descripcion}}</option>
                @foreach ($categorias as $categoria)
                    @if($actividad->act_cat_id!=$categoria->id)
                        <option value="{{$categoria->id}}">{{$categoria->cat_descripcion}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="col">
            <label for="" class="form-label">Status</label>
            <select name="act_status" id="act_status" class="form-control" tabindex="5" required>
            <option value="{{$actividad->act_status}}">{{$actividad->act_status}}</option>
            @if($actividad->act_status==="Open")
                    <option value="Pending">Pending</option>
                    <option value="Estimating">Estimating</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Waiting">Waiting</option>
                    <option value="Closed">Closed</option>
                @elseif($actividad->act_status==="Pending")
                    <option value="In Progress">In Progress</option>
                    <option value="Estimating">Estimating</option>
                    <option value="Waiting">Waiting</option>
                    <option value="Closed">Closed</option>
                @elseif($actividad->act_status==="Estimating")
                    <option value="In Progress">In Progress</option>
                    <option value="Pending">Pending</option>
                    <option value="Waiting">Waiting</option>
                    <option value="Closed">Closed</option>
                @elseif($actividad->act_status==="In Progress")
                    <option value="Pending">Pending</option>
                    <option value="Estimating">Estimating</option>
                    <option value="Waiting">Waiting</option>
                    <option value="Closed">Closed</option>
                @elseif($actividad->act_status==="Waiting")
                    <option value="Pending">Pending</option>
                    <option value="Estimating">Estimating</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Closed">Closed</option>
                @elseif($actividad->act_status==="Closed")
                    <option value="Re-Open">Re-Open</option>
                @elseif($actividad->act_status==="Re-Open")
                    <option value="Pending">Pending</option>
                    <option value="Estimating">Estimating</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Waiting">Waiting</option>
                    <option value="Closed">Closed</option>
                    @endif
            </select>
        </div>
        <div class="col">
            <label for="" class="col">Prioridad</label>
            <select name="reg_prioridad" id="reg_prioridad" class="form-control" tabindex="5" required>
                @if($registros->reg_prioridad==="1")
                    <option value="P1" selected>Alta</option>
                    <option value="P2">Media</option>
                    <option value="P3">Baja</option>
                @elseif($registros->reg_prioridad)==="2")
                    <option value="P1">Alta</option>
                    <option value="P2" selected>Media</option>
                    <option value="P3">Baja</option>
                @else
                    <option value="P1">Alta</option>
                    <option value="P2">Media</option>
                    <option value="P3" selected>Baja</option>                                    
                @endif

        </select>            
        </div>
        <div class="col">
            <label for="" class="col">Complejidad</label>
            <select name="reg_complejidad" id="reg_complejidad" class="form-control" tabindex="5" required>
                @if($registros->reg_complejidad==="1")
                    <option value="1" selected>Alta</option>
                    <option value="2">Media</option>
                    <option value="3">Baja</option>
                @elseif($registros->reg_complejidad)==="2")
                    <option value="1">Alta</option>
                    <option value="2" selected>Media</option>
                    <option value="3">Baja</option>
                @else
                    <option value="1">Alta</option>
                    <option value="2">Media</option>
                    <option value="3" selected>Baja</option>                                    
                @endif
            </select>            
        </div>
        <div class="col">
            <label for="" class="form-label">Horas Estimadas (siguiente acción)</label>
            <input type="number" id="reg_estimado" name="reg_estimado" class="form-control" tabindex="2" value="{{$registros->reg_estimado}}"/>
        </div>
        <div class="col">
            <label for="" class="form-label">Fecha Creación</label>
            {{$actividad->created_at}}
            <input type="text" id="created_at" name="created_at" class="form-control" tabindex="2" value="{{$registros->created_at}}" hidden/>
        </div>

        <div class="col">
            <label for="" class="form-label">Fecha Propuesta</label>
            {{$registros->reg_fechaPropuesta}}
            <input type="text" id="reg_fechaPropuesta" name="reg_fechaPropuesta" class="form-control" tabindex="2" value="{{$registros->reg_fechaPropuesta}}" hidden/>
        </div>
    </div>
    <div>
            <label for="" class="form-label">Acciones Siguientes o Solución</label>
            <textarea id="reg_acciones" name="reg_acciones" class="form-control" tabindex="2">{{$registros->reg_acciones}}</textarea>
        </div>
        @if($registros->reg_lastUpdate=="N/A")
            <input id="reg_lastUpdate" name="reg_lastUpdate" class="form-control" tabindex="2" value="Primera Respuesta" hidden/>
        @else
        <div>
            <label for="" class="form-label">Last Update</label>
            <textarea id="reg_lastUpdate" name="reg_lastUpdate" class="form-control" tabindex="2">{{$registros->reg_lastUpdate}}</textarea>
        </div>
        @endif
    <br>
    <a href="/actividades" class="btn btn-secondary" tabindex="9">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="10">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop