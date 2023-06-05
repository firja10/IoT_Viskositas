<?php

namespace App\Http\Controllers;

use App\Models\Viskositas;
use Illuminate\Http\Request;

class ViskositasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $viskositas = Viskositas::select('id', 'vis', 'vis_ref')->get();
        return response()->json($viskositas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $v = $request->v;
        $i = $request->i;

        $f = ($request->w)/60;

        $vis = (($v*$i)/8*3.14*8*3.14*$f*$f)*0.0671;

        $viskos = new Viskositas();
        $viskos->vis;
        $viskos->vis_ref = 0;
        $viskos->error_vis = 0;
        $viskos->ref_error_vis = 0;


        $viskos->save();

        
        






    }

    /**
     * Display the specified resource.
     */
    public function show(Viskositas $viskositas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Viskositas $viskositas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Viskositas $viskositas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Viskositas $viskositas)
    {
        //
    }
}
