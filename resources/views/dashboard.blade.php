@extends('adminlte::page')

@section('title', 'CPI')

@section('content_header')
    
@stop

@section('content')

Hola {{auth()->user()->name}} , tienes los siguientes servicios:

<table class='table table-light table-striped table-bordered shadow-lg mt-4' id='board'>
    <thead class="bg-primary text-white">
        <tr>
            <th scope='col'>Estado</th>
            <th scope='col'>Cantidad</th>
        </tr>
    </thead>
    <tbody>
        <tr class="table-info">
            <th scope='col'>Open</th>
            <td scope='col'>
                {{$open}}
            </td>
        </tr>
        <tr class="table-warning">
            <th scope='col'>Pending</th>
            <td scope='col'>
                {{$pending}}
            </td>
        </tr>
        <tr class="table-secondary">
            <th scope='col'>Estimating</th>
            <td scope='col'>{{$estimating}}</td>
        </tr>
        <tr class="table-success">
            <th scope='col'>In Progress</th>
            <td scope='col'>{{$inprogress}}</td>
        </tr>
        <tr>
            <th scope='col'>Waiting</th>
            <td scope='col'>{{$waiting}}</td>
        </tr>
        <tr>
            <th scope='col'>Closed</th>
            <td scope='col'>{{$closed}}</td>
        </tr>
    </tbody>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@stop

@section('js')

@stop