<?php

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

use App\Normalisasi;

use Validator;
use routes;
use App\Http\Requests\NormalisasiRequest;
use Illuminate\Support\Facades\DB;
class NormalisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('normalisasi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NormalisasiRequest $request)
    {
         $data = [
        'kriteria_normalisasi' => $request['kriteria_normalisasi'],
        'bobot_normalisasi' => $request['bobot_normalisasi'],
       
   
        ];

       return Normalisasi::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Normalisasi  $normalisasi
     * @return \Illuminate\Http\Response
     */
    public function show(Normalisasi $normalisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Normalisasi  $normalisasi
     * @return \Illuminate\Http\Response
     */
   public function edit($id)
    {

        $Normalisasi = Normalisasi::find($id);
        return $Normalisasi;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Normalisasi  $normalisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $Normalisasi = Normalisasi::find($id);
            $Normalisasi->kriteria_normalisasi =$request['kriteria_normalisasi'];
            $Normalisasi->bobot_normalisasi =$request['bobot_normalisasi'];
          
        $Normalisasi->update();
        return $Normalisasi;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
   {
    if($NormalisasiDel = Normalisasi::destroy($id)){
            return ['success' =>  1];
        }else{
            return ['tidak success' =>  0];
        }
    }
     public function  apiNormalisasi()
    {

//$user=\Auth::user();
          // $Normalisasi = Normalisasi::find($user->id);

     $Normalisasi = Normalisasi::all();
       //$Normalisasi= siswa::where('id','=',$id)->first();
  // $Normalisasi = Normalisasi::where('user_id','=',\Auth::user()->id)->with('kegiatan')->get();
      ///  $Normalisasi = Normalisasi::select('tanggal',DB::raw("(SUM(ns_siang)) as ns_siang"),DB::raw("(SUM(tkno_siang)) as tkno_siang"),DB::raw("(SUM(tamu_siang)) as tamu_siang"),DB::raw("(SUM(ss_malam)) as ss_malam"),DB::raw("(SUM(ns_malam)) as ns_malam"))->groupBy('tanggal')->get(); //pertanggal,
        return DataTables::of($Normalisasi)
            ->addColumn('action', function($Normalisasi) {
                return  
                        '<a onclick="editForm('. $Normalisasi->id_normalisasi .')" class=btn btn-primary btn-xs"> <i class="glyphicon glyphicon-edit"> </i> Edit </a>' .
                        
                        '<a onclick="deleteData('. $Normalisasi->id_normalisasi .')" class=btn btn-danger btn-xs"> <i class="glyphicon glyphicon-trash"> </i> Delete </a>' ;

            })->make(true);
    }

    
}

