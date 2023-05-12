<?php

namespace App\Http\Controllers;

use App\Models\kuat_arus_motor_dc;
use Illuminate\Http\Request;

class KuatArusMotorDcController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $kuat_arus = kuat_arus_motor_dc::select('id', 'i', 'i_ref')->get();

        return response()->json($kuat_arus);

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

        $i_ref = $request->i_ref;
        $i = $request->i;

        $kuat_arus = new kuat_arus_motor_dc();
        $kuat_arus->i_ref = $request->i_ref;
        $kuat_arus->i = $request->i;

        $error_i = $i - $i_ref;

        $kuat_arus->error_i = $error_i;
        $kuat_arus->ref_error_i = $request->ref_error_i;
        $kuat_arus->save();

        return "Kuat Arus Berhasil disave";
    }

    /**
     * Display the specified resource.
     */
    public function show(kuat_arus_motor_dc $kuat_arus_motor_dc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kuat_arus_motor_dc $kuat_arus_motor_dc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kuat_arus_motor_dc $kuat_arus_motor_dc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kuat_arus_motor_dc $kuat_arus_motor_dc)
    {
        //
    }
}
