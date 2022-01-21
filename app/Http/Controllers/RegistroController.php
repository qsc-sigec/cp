<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;
use App\Models\Actividad;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros=Registro::all();
        return view('registros.index')->with('registros',$registros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $registros=new Registro();
        $registros->reg_act_id=$request->get('reg_act_id');
        $registros->reg_acciones=$request->get('reg_acciones');
        $registros->reg_lastUpdate=$request->get('reg_lastUpdate');
        $registros->reg_usr_id=$request->get('reg_usr_id');
        $registros->reg_status=$request->get('reg_status');
        $registros->reg_prioridad=$request->get('reg_prioridad');
        $registros->reg_complejidad=$request->get('reg_complejidad');
        $registros->reg_estimado=$request->get('reg_estimado');
        $registros->reg_fechaPropuesta=$request->get('reg_fechaPropuesta');
        $registros->reg_revision=$request->get('reg_revision');

        $registros->save();
        return redirect('/registros');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }
    public function showActRegs($id)
    {
        $registros=Registro::where('reg_act_id',$id);
        return view('registros.index')->with('registros',$registros);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registros=Registro::find($id);
        return view('registros.edit')->with('registro', $registros);
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
        $registro=Registro::find($id);
        $registro->reg_act_id=$request->get('reg_act_id');
        $registro->reg_acciones=$request->get('reg_acciones');
        $registro->reg_lastUpdate=$request->get('reg_lastUpdate');
        $registro->reg_usr_id=$request->get('reg_usr_id');
        $registro->reg_status=$request->get('reg_status');
        $registro->reg_prioridad=$request->get('reg_prioridad');
        $registro->reg_complejidad=$request->get('reg_complejidad');
        $registro->reg_estimado=$request->get('reg_estimado');
        $registro->reg_fechaPropuesta=$request->get('reg_fechaPropuesta');
        $registro->reg_revision=$request->get('reg_revision');


        $registro->update();
        return redirect('/registros');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registro=Registro::find($id);
        $registro->delete();
        return redirect('/registros');
    }
}
