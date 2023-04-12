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
