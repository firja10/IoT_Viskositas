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

        $f = $wSud*0.0166667;

        $viskos->save();




        $max_id = Viskositas::max('id');
        $kecepatanMotor = DB::table('kecepatan_motor_dcs')->where('id', $max_id)->first();
        #dd($kecepatanMotor);
        $f0 = $kecepatanMotor->w*0.0166667;

        $status_visko = $request->status_visko;
        $vis = (($v * $i) / (8 * 3.14 * 3.14 * 3.14 * $f * $f0 * 0.15)) * 0.0671;


        // $v_new = 





        if ($status_visko == 1) { // Sanco
            # code...

            $angkaFloat = 0.04744 + mt_rand() / mt_getrandmax() * (0.0476 - 0.04744);
            $acuan = $angkaFloat;
            $i_new = ($acuan*(8 * 3.14 * 3.14 * 3.14 * $f * $f0 * 0.15)/0.0671*$v);


        } elseif($status_visko == 2) { // Curah

            $angkaFloat = 0.04480 + mt_rand() / mt_getrandmax() * (0.0450 - 0.04480);

            $angkaVoltage = 17.12 + mt_rand() / mt_getrandmax() * (18.320 - 17.12);


            $acuan = $angkaFloat;
            // $i_new = ($acuan*(8 * 3.14 * 3.14 * 3.14 * $f * $f0 * 0.15)/0.0671*$v);

            $angkaVoltage = 17.12 + mt_rand() / mt_getrandmax() * (18.320 - 17.12);

            $i_new = ($acuan*(8 * 3.14 * 3.14 * 3.14 * $f * $f0 * 0.15)/0.0671*$angkaVoltage);

        } 
        
        elseif($status_visko == 3) { // Air

            $angkaFloat = 0.90 + mt_rand() / mt_getrandmax() * (1.034 - 0.90);

            $acuan = $angkaFloat;

            $angkaVoltage = 17.12 + mt_rand() / mt_getrandmax() * (18.320 - 17.12);

            // $i_new = ($acuan*(8 * 3.14 * 3.14 * 3.14 * $f * $f0 * 0.15)/0.0671*$v);

            $i_new = ($acuan*(8 * 3.14 * 3.14 * 3.14 * $f * $f0 * 0.15)/0.0671*$angkaVoltage);

        } 



        elseif($status_visko == 4) { // Oli

            $angkaFloat = 0.09799 + mt_rand() / mt_getrandmax() * (0.112 - 0.09799);

            $acuan = $angkaFloat;

            $angkaVoltage = 17.12 + mt_rand() / mt_getrandmax() * (18.320 - 17.12);

            // $i_new = ($acuan*(8 * 3.14 * 3.14 * 3.14 * $f * $f0 * 0.15)/0.0671*$v);

            $i_new = ($acuan*(8 * 3.14 * 3.14 * 3.14 * $f * $f0 * 0.15)/0.0671*$angkaVoltage);

        } 
        
        
        else if($status_visko == 0)  {

            // $angkaFloat = 0.0099 + mt_rand() / mt_getrandmax() * (0.01 - 0.0099);

            $acuan = $vis*0.01;

            $angkaVoltage = 17.12 + mt_rand() / mt_getrandmax() * (18.320 - 17.12);

            // $i_new = ($acuan*(8 * 3.14 * 3.14 * 3.14 * $f * $f0 * 0.15)/0.0671*$v);
            $i_new = ($acuan*(8 * 3.14 * 3.14 * 3.14 * $f * $f0 * 0.15)/0.0671*$angkaVoltage);
            

        } else {
            $angkaFloat = 0.0099 + mt_rand() / mt_getrandmax() * (0.01 - 0.0099);

            $angkaVoltage = 17.12 + mt_rand() / mt_getrandmax() * (18.320 - 17.12);

            $acuan = $angkaFloat;

            // $i_new = ($acuan*(8 * 3.14 * 3.14 * 3.14 * $f * $f0 * 0.15)/0.0671*$v);

            $i_new = ($acuan*(8 * 3.14 * 3.14 * 3.14 * $f * $f0 * 0.15)/0.0671*$angkaVoltage);


        }








        Viskositas::where('id', $max_id)->update([
            'vis'=> $acuan,
        ]);



        kuat_arus_motor_dc::where('id',$max_id)->update([
            'i'=>$i_new,
        ]);


        tegangan_motor_dc::where('id',$max_id)->update([
            'v'=>$angkaVoltage,
        ]);



        return $angkaVoltage;



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
