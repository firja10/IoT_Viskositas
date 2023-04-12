<?php

namespace App\Http\Controllers;

use App\Models\kecepatan_motor_dc;
use Illuminate\Http\Request;

class KecepatanMotorDcController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        // $kecepatan =  kecepatan_motor_dc::select('w')->get();

        $kecepatan =  kecepatan_motor_dc::select('id', 'w_ref', 'w')->get();

        return response()->json($kecepatan);



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
    public function show(kecepatan_motor_dc $kecepatan_motor_dc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kecepatan_motor_dc $kecepatan_motor_dc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kecepatan_motor_dc $kecepatan_motor_dc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kecepatan_motor_dc $kecepatan_motor_dc)
    {
        //
    }
}
