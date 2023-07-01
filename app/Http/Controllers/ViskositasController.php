<?php

namespace App\Http\Controllers;

use App\Models\Viskositas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        // $delay = $request->delay;

        


  
        // $tabel_kecepatan_motor = DB::table('kecepatan_motor_dcs')->where('delay', $delay)->get();

        // // dd($tabel_kecepatan_motor);

        // foreach ($tabel_kecepatan_motor as $tabel_kecepatan_motors) {
        //     # code...




        //     $v = $request->v;
        //     $i = $request->i;
    
        //     $f = ($request->w_sud)* 0.016667;
    
        //     // $vis = (($v*$i)/8*3.14*8*3.14*$f*$f)*0.0671;
    

    
        //     $viskos = new Viskositas();
        //     $viskos->id = $tabel_kecepatan_motors->id;
  
        //     $viskos->vis_ref = $request->vis_ref;
        //     $viskos->error_vis = 0;
        //     $viskos->ref_error_vis = 0;

        //     $kecepatan_motor_polos = DB::table('kecepatan_motor_dcs')->where('delay', $delay)->where('id', $tabel_kecepatan_motors->id)->first();



        //     $f0 = $kecepatan_motor_polos->w;

        //     $vis = (($v*$i)/8*3.14*3.14*3.14*$f*$f0*0.15)*0.0671;
        //     $viskos->vis = $vis;
    
        //     $viskos->save();
    


        // }


    $v = $request->v;
    $i = $request->i;
    $w_sud = $request->w_sud;
    $vis_ref = $request->vis_ref;
    $ref_error_vis = $request->ref_error_vis;
    $delay = $request->delay;

    // Mendapatkan id teratas dari tabel kecepatan_motor_dcs
    $maxId = DB::table('kecepatan_motor_dcs')->max('id');

    // Mendapatkan data kecepatan_motor_d_c_sesudahs dengan delay tertentu secara berurutan
    $tabel_kecepatan_motor_sesudahs = DB::table('kecepatan_motor_d_c_sesudahs')
        ->where('delay', $delay)
        ->orderBy('id', 'asc')
        ->get();

    // Iterasi data kecepatan_motor_d_c_sesudahs dan simpan ke tabel viskositas
    foreach ($tabel_kecepatan_motor_sesudahs as $tabel_kecepatan_motor_sesudah) {
        // Mendapatkan nilai w dari kecepatan_motor_dcs berdasarkan id
        $kecepatan_motor_dc = DB::table('kecepatan_motor_dcs')
            ->where('id', $tabel_kecepatan_motor_sesudah->id)
            ->first();

        // Menggandakan nilai w menjadi 2*w
        $w = $kecepatan_motor_dc->w * 2;

        // Menghitung nilai vis
        $f = $tabel_kecepatan_motor_sesudah->w_sud * 0.016667;
        $vis = (($v * $i) / (8 * 3.14 * 3.14 * 3.14 * $f * $w * 0.15)) * 0.0671;

        // Menyimpan data ke tabel viskositas
        $viskositas = new Viskositas();
        $viskositas->id = $maxId + 1; // Menyimpan data di baris paling atas
        $viskositas->vis_ref = $vis_ref;
        $viskositas->error_vis = 0;
        $viskositas->ref_error_vis = $ref_error_vis;
        $viskositas->vis = $vis;
        $viskositas->save();

        $maxId++;
    }
        


        
        






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
