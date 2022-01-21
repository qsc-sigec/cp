@extends('adminlte::page')

@section('title', 'cpi')

@section('content_header')

@stop

@section('content')

    <a href='actividades/create' class='btn btn-primary mb-3'>Crear Servicio</a>

    <table class='table table-light table-striped table-bordered shadow-lg mt-4' id='actividades'>
        <thead class="bg-primary text-white">
            <tr>
                <th scope='col'>Servicio</th>
                <th scope='col'>Actividad</th>
                <th scope='col'>Cliente</th>
                <th scope='col'>Categoría</th>
                <th scope='col'>Status</th>
                <th scope='col'>Responsable</th>
                <th scope='col'>Time</th>
                <th scope='col'>SLA</th>
                <th scope='col'>Prioridad</th>
                <th scope='col'>Acciones</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($actividades as $actividad)
                @if ((auth()->user()->current_team_id == $actividad->act_team || auth()->user()->area == 'Departamento de TI' || auth()->user()->area == 'Servicio al Cliente') && $actividad->act_status != 'Closed')

                    <tr>
                        <td>{{ $actividad->id }}</td>
                        <td>{{ $actividad->act_titulo }}</td>
                        <td>
                            @foreach ($clientes as $cliente)
                                @if ($actividad->act_cli_id == $cliente->id)
                                    {{ $cliente->cli_nombre }}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($categorias as $categoria)
                                @if ($actividad->act_cat_id == $categoria->id)
                                    {{ $categoria->cat_descripcion }}
                                @endif
                            @endforeach
                        </td>
                        <td>{{ $actividad->act_status }}</td>
                        <td>
                            @foreach ($usuarios as $usuario)
                                @if ($usuario->id == $actividad->act_responsable)
                                    {{ $usuario->name }}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @php
                                $t1 = $actividad->created_at;
                                $t2 = now()->toDateTimeString();
                                $dia1 = date('d', strtotime($t1));
                                $dia2 = date('d');
                                $dias = $dia2 - $dia1;
                                $minutes = $t1->diffInMinutes($t2, true);
                                $hours = $t1->diffInHours($t2, true);
                                $minutesst = '';
                                if ($minutes >= 60) {
                                    for ($i = 0; $i < $hours; $i++) {
                                        $minutes = $minutes - 60;
                                    }
                                }
                                if ($minutes <= 9) {
                                    $minutes = '0' . number_format($minutes, 0);
                                }
                                
                            @endphp
                            {{ number_format($hours, 0) - 15 * $dias . ':' . $minutes }}
                        </td>
                        @php
                            foreach ($registros as $registro) {
                                if ($registro->reg_act_id == $actividad->id) {
                                    if ($actividad->act_cat_id == '1' || $actividad->act_cat_id == '2') {
                                        $a = 0;
                                        foreach ($slas as $sla) {
                                            if ($sla->sla_prioridad == $registro->reg_prioridad && $sla->sla_servicio == $actividad->act_cat_id && $sla->sla_tipo == 'Solucion') {
                                                $a = $sla->sla_tiempo;
                                                if ($hours - 15 * $dias > $a) {
                                                    $r = $hours - $a;
                                                    echo "<td><h6 style='color:red'>VENCIDO " . ($r - 15 * $dias) . ' horas</h3></td>';
                                                    echo "<td>$registro->reg_prioridad</td>";
                                                } else {
                                                    echo '<td></td>';
                                                    echo "<td>$registro->reg_prioridad</td>";
                                                }
                                            }
                                        }
                                    } else {
                                        echo '<td></td>';
                                        echo "<td>$registro->reg_prioridad</td>";
                                    }
                                }
                            }
                            
                        @endphp
                        <td>
                            <form action="{{ route('actividades.destroy', $actividad->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="/actividades/{{ $actividad->id }}/{{ $actividad->act_cli_id }}/{{ $actividad->act_cat_id }}/edit"
                                    class="btn btn-info"><i class="fa fa-eye"></i></a>
                                @if (auth()->user()->area == 'Departamento de TI')
                                    <!--button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash-alt"></i>
                            </button-->
                                @endif
                            </form>
                        </td>
                    </tr>
                @endif

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
            $('#actividades').DataTable({
                "lengthMenu": [
                    [10, 15, 50, -1],
                    [10, 15, 50, "All"]
                ]
            });
        });
    </script>

@stop
