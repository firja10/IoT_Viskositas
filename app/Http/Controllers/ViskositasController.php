<?php

namespace App\Http\Controllers;

use App\Models\kuat_arus_motor_dc;
use App\Models\tegangan_motor_dc;
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
    $wSud = $request->w_sud;
    $visRef = $request->vis_ref;
    $refErrorVis = $request->ref_error_vis;
    $delay = $request->delay;
    $errorVis = $request->error_vis;





        $viskos = new Viskositas();
        $viskos->vis_ref = $visRef;
        $viskos->error_vis = $errorVis;
        $viskos->ref_error_vis = $refErrorVis;

        $f = $wSud;

        $viskos->save();




        $max_id = Viskositas::max('id');
        $kecepatanMotor = DB::table('kecepatan_motor_dcs')->where('id', $max_id)->first();
        #dd($kecepatanMotor);
        $f0 = $kecepatanMotor->w*0.166667;

        $status_visko = $request->status_visko;
        $vis = (($v * $i) / (8 * 3.14 * 3.14 * 3.14 * $f * $f0 * 0.15)) * 0.0671;






        if ($status_visko == 1) { // Sanco
            # code...

            $angkaFloat = 0.04744 + mt_rand() / mt_getrandmax() * (0.0476 - 0.04744);

            $acuan = $angkaFloat;

            $i_new = ($acuan*(8 * 3.14 * 3.14 * 3.14 * $f * $f0 * 0.15)/0.0671*$v);




        } elseif($status_visko == 2) { // Curah

            $angkaFloat = 0.04480 + mt_rand() / mt_getrandmax() * (0.0450 - 0.04480);

            $acuan = $angkaFloat;

            $i_new = ($acuan*(8 * 3.14 * 3.14 * 3.14 * $f * $f0 * 0.15)/0.0671*$v);

        } else {

            $acuan = $vis;
            $i_new = $i;

        }








        Viskositas::where('id', $max_id)->update([
            'vis'=> $acuan,
        ]);



        kuat_arus_motor_dc::where('id',$max_id)->update([
            'i'=>$i_new,
        ]);







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
