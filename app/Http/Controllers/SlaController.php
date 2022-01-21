<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sla;
use App\Models\Categoria;
use App\Models\Area;

class SlaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slas=Sla::all();
        $categorias=Categoria::all();
        $areas=Area::all();

        return view('slas.index')
        ->with('slas',$slas)
        ->with('categorias',$categorias)
        ->with('areas',$areas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=Categoria::all();
        $areas=Area::all();
        return view('slas.create')
        ->with('categorias',$categorias)
        ->with('areas',$areas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slas=new Sla();
        $slas->sla_tipo=$request->get('sla_tipo');
        $slas->sla_prioridad=$request->get('sla_prioridad');
        $slas->sla_servicio=$request->get('sla_servicio');
        $slas->sla_area=$request->get('sla_area');
        $slas->sla_tiempo=$request->get('sla_tiempo');

        $slas->save();
        return redirect('/slas');
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
    public function edit($id)
    {
        $sla=Sla::find($id);
        $categorias=Categoria::all();
        $areas=Area::all();

        return view('slas.edit')
        ->with('sla', $sla)
        ->with('categorias', $categorias)
        ->with('areas', $areas);
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
        $slas=Sla::find($id);
        $slas->sla_tipo=$request->get('sla_tipo');
        $slas->sla_prioridad=$request->get('sla_prioridad');
        $slas->sla_servicio=$request->get('sla_servicio');
        $slas->sla_area=$request->get('sla_area');
        $slas->sla_tiempo=$request->get('sla_tiempo');

        $slas->update();
        return redirect('/slas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sla=Sla::find($id);
        $sla->delete();
        return redirect('/slas');
    }
}