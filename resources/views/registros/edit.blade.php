@extends('layouts.base')

@section('contenido')
<h2>EDITAR REGISTROS</h2>
<form action="/registros/{{$registro->id}}" method="POST">
@csrf
@method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">REGISTRO</label>
        <input type="text" id="reg_act_id" name="reg_act_id" class="form-control" value="{{$registro->reg_act_id}}" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">ACCIONES SIGUIENTES</label>
        <input type="text" id="reg_acciones" name="reg_acciones" class="form-control" value="{{$registro->reg_acciones}}" tabindex="2">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">ULTIMA ACTUALIZACIÓN</label>
        <input type="text" id="reg_lastUpdate" name="reg_lastUpdate" class="form-control" value="{{$registro->reg_lastUpdate}}" tabindex="3">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">RESPONSABLE</label>
        <input type="text" id="reg_usr_id" name="reg_usr_id" class="form-control" value="{{$registro->reg_usr_id}}" tabindex="4">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">STATUS</label>
        <input type="text" id="reg_status" name="reg_status" class="form-control" value="{{$registro->reg_status}}" tabindex="5">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">PRIORIDAD</label>
        <input type="text" id="reg_prioridad" name="reg_prioridad" class="form-control" value="{{$registro->reg_prioridad}}" tabindex="6">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">COMPLEJIDAD</label>
        <input type="text" id="reg_complejidad" name="reg_complejidad" class="form-control" value="{{$registro->reg_complejidad}}" tabindex="7">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">ESTIMACIÓN</label>
        <input type="text" id="reg_estimado" name="reg_estimado" class="form-control" value="{{$registro->reg_estimado}}" tabindex="8">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">FECHA PROPUESTA</label>
        <input type="text" id="reg_fechaPropuesta" name="reg_fechaPropuesta" class="form-control" value="{{$registro->reg_fechaPropuesta}}" tabindex="9">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">ÚLTIMA REVISIÓN</label>
        <input type="text" id="reg_revision" name="reg_revision" class="form-control" value="{{$registro->reg_revision}}" tabindex="10">
    </div>        
    <a href="/registros" class="btn btn-secondary" tabindex="11">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="12">Guardar</button>
</form>
@endsection