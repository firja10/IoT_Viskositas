<?php

namespace App\Http\Controllers;

use App\Models\KecepatanMotorDCSesudah;
use Illuminate\Http\Request;

class KecepatanMotorDCSesudahController extends Controller
{
    /**
     * Display a listing of the resource.
        */
    public function index()
    {
        //

        $kecepatan =  KecepatanMotorDCSesudah::select('id', 'w_ref_sud', 'w_sud')->get();
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

        $w_ref_sud = $request->w_ref_sud;
        $w_sud = $request->w_sud;

        $kecepatan_motor_dc_sesudah = new KecepatanMotorDCSesudah();
        $kecepatan_motor_dc_sesudah->w_ref_sud = $request->w_ref_sud;
        $kecepatan_motor_dc_sesudah->w_sud = $request->w_sud;

        $kecepatan_motor_dc_sesudah->delay = $request->delay;

        $error_w_sud = $w_sud - $w_ref_sud;

        $kecepatan_motor_dc_sesudah->error_w_sud = $error_w_sud;
        $kecepatan_motor_dc_sesudah->ref_error_w_sud = $request->ref_error_w_sud;
        $kecepatan_motor_dc_sesudah->save();

        return "Kecepatan Motor DC Sesudah Ada Fluida Berhasil disave";

    }

    /**
     * Display the specified resource.
     */
    public function show(KecepatanMotorDCSesudah $kecepatanMotorDCSesudah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KecepatanMotorDCSesudah $kecepatanMotorDCSesudah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KecepatanMotorDCSesudah $kecepatanMotorDCSesudah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KecepatanMotorDCSesudah $kecepatanMotorDCSesudah)
    {
        //
    }
}
