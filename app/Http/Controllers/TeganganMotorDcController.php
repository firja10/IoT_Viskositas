<?php

namespace App\Http\Controllers;

use App\Models\tegangan_motor_dc;
use Illuminate\Http\Request;

class TeganganMotorDcController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $tegangan_motor_dc = tegangan_motor_dc::select('id', 'v', 'v_ref')->get();
        return response()->json($tegangan_motor_dc);
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
    public function show(tegangan_motor_dc $tegangan_motor_dc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tegangan_motor_dc $tegangan_motor_dc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tegangan_motor_dc $tegangan_motor_dc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tegangan_motor_dc $tegangan_motor_dc)
    {
        //
    }
}
