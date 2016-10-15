<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Patrimonio;

class PatrimoniosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patrimonios = Patrimonio::orderBy('anio','ASC')->paginate(15);
        return view('admin.patrimonios.index')->with('patrimonios',$patrimonios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.patrimonios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patrimonio = new Patrimonio();
        $patrimonio->idEmpresa = $request->idEmpresa;
        $patrimonio->anio = $request->anio;
        $patrimonio->valor = $request->valor;

        $patrimonio->save();

        return redirect()->route('solidario.patrimonios.index');
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
        $patrimonio = Patrimonio::find('$id');
        return view('admin/patrimonios/edit',['patrimonio'=>$patrimonio]);
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
        $patrimonio = Patrimonio::find($id);
        $patrimonio->idEmpresa = $request->idEmpresa;
        $patrimonio->anio = $request->anio;
        $patrimonio->valor = $request->valor;

        $patrimonio->save();
        return redirect()->route('solidario.patrimonios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patrimonio = Patrimonio::find($id);
        $patrimonio->delete();
        return redirect()->route('solidario.patrimonios.index');
    }
}
