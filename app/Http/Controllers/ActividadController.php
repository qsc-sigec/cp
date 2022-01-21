<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividad;
use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Registro;
use App\Models\User;
use App\Models\Team;
use App\Models\Sla;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes=Cliente::all();
        $categorias=Categoria::all();
        $actividades=Actividad::all();
        $usuarios=User::all();
        $slas=Sla::all();
        $c=0;
        foreach($actividades as $actividad){
            $id=$actividad->id;
            $registros[$c]=Registro::where('reg_act_id','=',$id)->orderByDesc('updated_at')->first();
            $c++;
        }
        //dd($registros);
        return view('actividades.index')
        ->with('clientes',$clientes)
        ->with('actividades',$actividades)
        ->with('categorias',$categorias)
        ->with('registros',$registros)
        ->with('usuarios',$usuarios)
        ->with('slas',$slas);
    }
    public function board()
    {
        $open=Actividad::where('act_responsable','=',auth()->user()->id)
        ->where('act_status', '=', 'Open')->count();
        $pending=Actividad::where('act_responsable','=',auth()->user()->id)
        ->where('act_status', '=', 'Pending')->count();
        $estimating=Actividad::where('act_responsable','=',auth()->user()->id)
        ->where('act_status', '=', 'Estimating')->count();
        $inprogress=Actividad::where('act_responsable','=',auth()->user()->id)
        ->where('act_status', '=', 'In Progress')->count();
        $waiting=Actividad::where('act_responsable','=',auth()->user()->id)
        ->where('act_status', '=', 'Waiting')->count();
        $closed=Actividad::where('act_responsable','=',auth()->user()->id)
        ->where('act_status', '=', 'Closed')->count();
        $ropen=Actividad::where('act_responsable','=',auth()->user()->id)
        ->where('act_status', '=', 'Re-Open')->count();
        
        
        return view('dashboard')
        ->with('open',$open)
        ->with('pending',$pending)
        ->with('estimating',$estimating)
        ->with('inprogress',$inprogress)
        ->with('waiting',$waiting)
        ->with('closed',$closed)
        ->with('ropen',$ropen);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=Categoria::all();
        $clientes=Cliente::all();
        $users=User::all();
        $slas=Sla::all();

        return view('actividades.create')
        ->with('categorias',$categorias)
        ->with('clientes',$clientes)
        ->with('users',$users)
        ->with('slas',$slas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $actividades=new Actividad();
        $user=User::find($request->get('reg_usr_id'));

        $actividades->act_titulo=$request->get('act_titulo');
        $actividades->act_descripcion=$request->get('act_descripcion');
        $actividades->act_cli_id=$request->get('act_cli_id');
        $actividades->act_cat_id=$request->get('act_cat_id');
        $actividades->act_status=$request->get('act_status');
        $actividades->act_responsable=$request->get('reg_usr_id');
        $actividades->act_team=$user->current_team_id;

        $actividades->save();

        $act_id=DB::table('actividades')->max('id');

        $registros=new Registro();
      
        $registros->reg_act_id=intval($act_id);
        
        $registros->reg_acciones=$request->get('reg_acciones');
        $registros->reg_lastUpdate=$request->get('reg_lastUpdate');
        $registros->reg_usr_id=$request->get('reg_usr_id');
        $registros->reg_status=$request->get('reg_status');
        $registros->reg_prioridad=$request->get('reg_prioridad');
        $registros->reg_complejidad=$request->get('reg_complejidad');
        $registros->reg_estimado=$request->get('reg_estimado');
        $registros->reg_fechaPropuesta=$request->get('reg_fechaPropuesta');
        $registros->reg_revision="";

        $registros->save();

        return redirect('/actividades');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $act_cli_id, $act_cat_id)
    {
            $actividades=Actividad::find($id);
            $clientes=Cliente::find($act_cli_id);
            $categoria=Categoria::find($act_cat_id);
            $categorias=Categoria::all();
            $users=User::all();
            $registros=DB::table('registros')
            ->where('reg_act_id','=', $id)
            ->orderBy('id', 'desc')
            ->first();
            
            if($registros===null){
                return view('actividades.error')
                ->with('msj', 'La actividad no tiene registros relacionados.');
            }else{
                return view('actividades.edit')
                ->with('actividad', $actividades)
                ->with('clientes', $clientes)
                ->with('categoria', $categoria)
                ->with('categorias', $categorias)
                ->with('usuarios', $users)
                ->with('registros', $registros);
            }
            
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $actividad=Actividad::find($id);
        $team="";
        $actividad->act_titulo=$request->get('act_titulo');
        $actividad->act_descripcion=$request->get('act_descripcion');
        $actividad->act_cli_id=$request->get('act_cli_id');
        $actividad->act_cat_id=$request->get('act_cat_id');
        $actividad->act_status=$request->get('act_status');
        $actividad->act_responsable=$request->get('act_responsable');
        $t_user=DB::table('users')->where('id','=', $request->get('act_responsable'))->first();

        $team=$t_user->current_team_id;
        $actividad->act_team=$team;

        $actividad->update();
        
        $registros=new Registro();
        $registros->reg_act_id=intval($id);
        $registros->reg_acciones=$request->get('reg_acciones');
        $registros->reg_lastUpdate=$request->get('reg_lastUpdate');
        $registros->reg_usr_id=$request->get('act_responsable');
        $registros->reg_status=$request->get('act_status');
        $registros->reg_prioridad=$request->get('reg_prioridad');
        $registros->reg_complejidad=$request->get('reg_complejidad');
        $registros->reg_estimado=$request->get('reg_estimado');
        $registros->reg_fechaPropuesta=$request->get('reg_fechaPropuesta');
        $registros->reg_revision="";

        $registros->save();

        return redirect('/actividades');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actividad=Actividad::find($id);
        $actividad->delete();
        return redirect('/actividades');
    }
}
