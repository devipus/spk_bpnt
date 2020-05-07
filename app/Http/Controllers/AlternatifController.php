<?php

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

use App\Alternatif;

use Validator;
use routes;
use App\Http\Requests\AlternatifRequest;
use Illuminate\Support\Facades\DB;
class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('alternatif');
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
    public function store(AlternatifRequest $request)
    {
        //id_alternatif','alternatif','budget','dp','lokasi','harga','bonus
         $data = [
        'alternatif' => $request['alternatif'],
        'budget' => $request['budget'],
        'dp' => $request['dp'],
        'lokasi' => $request['lokasi'],
        'harga' => $request['harga'],
        'bonus' => $request['bonus'],
       
   
        ];

       return Alternatif::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function show(Alternatif $alternatif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
   public function edit($id)
    {

        $Alternatif = Alternatif::find($id);
        return $Alternatif;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
 //id_alternatif','alternatif','budget','dp','lokasi','harga','bonus
        
        $Alternatif = Alternatif::find($id);
            $Alternatif->alternatif =$request['alternatif'];
            $Alternatif->budget =$request['budget'];
            $Alternatif->dp =$request['dp'];
            $Alternatif->lokasi =$request['lokasi'];
            $Alternatif->harga =$request['harga'];
            $Alternatif->bonus =$request['bonus'];
          
        $Alternatif->update();
        return $Alternatif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
   {
    if($AlternatifDel = Alternatif::destroy($id)){
            return ['success' =>  1];
        }else{
            return ['tidak success' =>  0];
        }
    }
     public function  apiAlternatif()
    {

//$user=\Auth::user();
          // $Alternatif = Alternatif::find($user->id);

     $Alternatif = Alternatif::all();
       //$Alternatif= siswa::where('id','=',$id)->first();
  // $Alternatif = Alternatif::where('user_id','=',\Auth::user()->id)->with('kegiatan')->get();
      ///  $Alternatif = Alternatif::select('tanggal',DB::raw("(SUM(ns_siang)) as ns_siang"),DB::raw("(SUM(tkno_siang)) as tkno_siang"),DB::raw("(SUM(tamu_siang)) as tamu_siang"),DB::raw("(SUM(ss_malam)) as ss_malam"),DB::raw("(SUM(ns_malam)) as ns_malam"))->groupBy('tanggal')->get(); //pertanggal,
        return DataTables::of($Alternatif)
            ->addColumn('action', function($Alternatif) {
                return  
                        '<a onclick="editForm('. $Alternatif->id_alternatif .')" class=btn btn-primary btn-xs"> <i class="glyphicon glyphicon-edit"> </i> Edit </a>' .
                        
                        '<a onclick="deleteData('. $Alternatif->id_alternatif .')" class=btn btn-danger btn-xs"> <i class="glyphicon glyphicon-trash"> </i> Delete </a>' ;

            })->make(true);
    }

    
}

