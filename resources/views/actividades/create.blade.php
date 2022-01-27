@extends('adminlte::page')

@section('title', 'cpi')

@section('content_header')
    <h1>CPI</h1>
@stop

@section('content')
<form action="/actividades" method="POST">
@csrf
    <div class="mb-3">
        <label for="" class="form-label">Título de la actividad</label>
        <input type="text" id="act_titulo" name="act_titulo" class="form-control" tabindex="1" required>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Detalle (Objetivo, descripción, entregable final)</label>
        <textarea id="act_descripcion" name="act_descripcion" class="form-control" tabindex="2" required></textarea>
    </div>
    <div class="row">
        <div class="col">
            <label for="" class="form-label">Cliente relacionado</label>
            <select name="act_cli_id" id="act_cli_id" class="form-control" tabindex="3" required>
            @foreach ($clientes as $cliente)
            <option value="{{$cliente->id}}">{{$cliente->cli_nombre}}</option>
            @endforeach
            </select>
        </div>
        <div class="col">
            <label for="" class="form-label">Categoría</label>
            
            <select name="act_cat_id" id="act_cat_id" class="form-control" tabindex="4" required onchange="estimar()">
            <option value="">Seleccione</option>
            @foreach ($categorias as $categoria)
            <option value="{{$categoria->id}}">{{$categoria->cat_descripcion}}</option>
            @endforeach
            </select>
        </div>
        <div class="col">
            <label for="" class="form-label">Responsable</label>
            <select name="reg_usr_id" id="reg_usr_id" class="form-control" tabindex="5" required>
            @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
            </select>
        </div>
    </div>
    <div class="mb-3">
        <input type="text" id="act_status" name="act_status" class="form-control" value="Open" hidden>
        <input type="text" id="reg_status" name="reg_status" class="form-control" value="Open" hidden>
        <input type="text" id="reg_acciones" name="reg_acciones" class="form-control" value="Inicio" hidden>
        <input type="text" id="reg_lastUpdate" name="reg_lastUpdate" class="form-control" value="N/A" hidden>
    </div>
    <div class="row">
        <div class="col">
            <label for="" class="form-label">Prioridad</label>
            <select name="reg_prioridad" id="reg_prioridad" class="form-control" tabindex="6" required>
                <option value="1">Alta</option>
                <option value="2">Media</option>
                <option value="3">Baja</option>
            </select>        
        </div>
        <div class="col">
            <label for="" class="form-label">Complejidad</label>
            <select name="reg_complejidad" id="reg_complejidad" class="form-control" tabindex="7" required>
                <option value="1">Alta</option>
                <option value="2">Media</option>
                <option value="3">Baja</option>
            </select>          
        </div>
        <div class="col">
            <label for="" class="form-label" id="label">Estimado en horas</label>
            <input type="number" id="reg_estimado" name="reg_estimado" class="form-control" tabindex="8" required>
        </div>
        <div class="col">
            <label for="" class="form-label">Fecha Propuesta de Finalización</label>
            <?php $fechaActual = date('Y-m-d'); ?>
            <input type="date" id="reg_fechaPropuesta" name="reg_fechaPropuesta" class="form-control" tabindex="9" value="<?php echo $fechaActual; ?>" required>
        </div>
    </div>
    <div class="mb-3">
        <input type="text" id="reg_revision" name="reg_revision" class="form-control" value="" hidden>
    </div>        
    <a href="/actividades" class="btn btn-secondary" tabindex="10">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="11">Crear Servicio</button>
</form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    function estimar(){
    var c = document.getElementById('act_cat_id').value;
    if (c==="1" || c==="2" || c===""){
        
    document.getElementById('reg_estimado').style.visibility = 'hidden';
    document.getElementById('reg_estimado').value = '0';
    document.getElementById('msj').style.visibility = 'visible';
        }else{
    document.getElementById('reg_estimado').style.visibility = 'visible';
    document.getElementById('msj').style.visibility = 'hidden';
    }
    return false;
    }
    estimar();
</script>
    
@stop