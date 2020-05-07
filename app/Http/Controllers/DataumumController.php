<?php

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

use App\Dataumum;
use App\Provinsi;
use App\Kabkota;
use App\Kec;
use App\Kel;

use Validator;
use routes;
use App\Http\Requests\DataumumRequest;
use Illuminate\Support\Facades\DB;

class DataumumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view ('dataumum');
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
    public function store(DataumumRequest $request)
    {
        if(!$request->ajax()){ abort('403'); }

        $dataUmum = new Dataumum();
        $dataUmum->id_provinsi = $request->get('id_provinsi');
        $dataUmum->id_kabkota = $request->get('id_kabkota');
        $dataUmum->id_kec = $request->get('id_kec');
        $dataUmum->id_kel = $request->get('id_kel');
        $dataUmum->rw = $request->get('rw');
        $dataUmum->rt = $request->get('rt');
        $dataUmum->luassk = $request->get('luassk');
        $dataUmum->luasverifikasi = $request->get('luasverifikasi');
        $dataUmum->jumlahbangunan = $request->get('jumlahbangunan');
        $dataUmum->jumlahpenduduk = $request->get('jumlahpenduduk');
        $dataUmum->jumlahkk = $request->get('jumlahkk');
        $ret = true;
        if(!$dataUmum->save()){
            $ret = false;
        }
        return response()->json(['data' => $ret]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dataumum  $dataumum
     * @return \Illuminate\Http\Response
     */
    public function show(Dataumum $dataumum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dataumum  $dataumum
     * @return \Illuminate\Http\Response
     */
   public function edit($id)
    {

        $Dataumum = Dataumum::find($id);
        return $Dataumum;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dataumum  $dataumum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        

        $Dataumum = Dataumum::find($id);
            $Dataumum->id_provinsi =$request['id_provinsi'];
            $Dataumum->id_kabkota =$request['id_kabkota'];
            $Dataumum->id_kec =$request['id_kec'];
            $Dataumum->id_kel =$request['id_kel'];
            $Dataumum->rt =$request['rt'];
            $Dataumum->luassk =$request['luassk'];
            $Dataumum->luasverifikasi =$request['luasverifikasi'];
            $Dataumum->jumlahbangunan =$request['jumlahbangunan'];
            $Dataumum->jumlahpenduduk =$request['jumlahpenduduk'];
            $Dataumum->jumlahkk =$request['jumlahkk'];
          
        $Dataumum->update();
        return $Dataumum;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
   {
    if($DataumumDel = Dataumum::destroy($id)){
            return ['success' =>  1];
        }else{
            return ['tidak success' =>  0];
        }
    }
     public function  apiDataumum()
    {

//$user=\Auth::user();
          // $Dataumum = Dataumum::find($user->id);

     $Dataumum = Dataumum::with(['regions'=> function($query){
        $query-> where('country', 'ID');
     },'cities'=> function($query){
        $query-> where('country', 'ID');
     },'districts'=> function($query){
        $query-> where('country', 'ID');
     },'villages'=> function($query){
        $query-> where('country', 'ID');
     },


      ])->get();
     // ('*','geo_regions.name as region', 'geo_cities.name as city', 'geo_districts.name as district', 'geo_villages.name as village')
     //                     ->leftJoin('geo_regions', 'geo_regions.code', 'dataumums.id_provinsi')
     //                     ->leftJoin('geo_cities', 'geo_cities.code', 'dataumums.id_kabkota')
     //                     ->leftJoin('geo_districts', 'geo_districts.code', 'dataumums.id_kec')
     //                     ->leftJoin('geo_villages', 'geo_villages.code', 'dataumums.id_kel')
     //                     ->where('geo_regions.country', 'ID')
     //                     ->where('geo_cities.country', 'ID')
     //                     ->where('geo_districts.country', 'ID')
     //                     ->where('geo_villages.country', 'ID')->get();
       //$Dataumum= siswa::where('id','=',$id)->first();
  // $Dataumum = Dataumum::where('user_id','=',\Auth::user()->id)->with('kegiatan')->get();
      ///  $Dataumum = Dataumum::select('tanggal',DB::raw("(SUM(ns_siang)) as ns_siang"),DB::raw("(SUM(tkno_siang)) as tkno_siang"),DB::raw("(SUM(tamu_siang)) as tamu_siang"),DB::raw("(SUM(ss_malam)) as ss_malam"),DB::raw("(SUM(ns_malam)) as ns_malam"))->groupBy('tanggal')->get(); //pertanggal,
        return DataTables::of($Dataumum)
            ->addColumn('action', function($Dataumum) {
                return  
                        '<a onclick="editForm('. $Dataumum->id_dataumum .')" class=btn btn-primary btn-xs"> <i class="glyphicon glyphicon-edit"> </i> Edit </a>' .
                        
                        '<a onclick="deleteData('. $Dataumum->id_dataumum .')" class=btn btn-danger btn-xs"> <i class="glyphicon glyphicon-trash"> </i> Delete </a>' ;

            })->make(true);
    }

    
    public function geoRw(Request $request){
        if(!$request->ajax()){
            abort(404,'Not Found');
        }
        $query= Dataumum::select('id_dataumum as id', 'id_provinsi','id_kabkota', 'id_kec', 'id_kel', 'rt', 'rw', 'rw as name');
        if(isset($request['rw'])&&$request['rw']!=''){

            $query->where('rw', $request['rw']);
        }
        if(isset($request['region'])&&$request['region']!=''){

            $query->where('id_provinsi', $request['region']);
        }
        if(isset($request['city'])&&$request['city']!=''){

            $query->where('id_kabkota', $request['city']);
        }
        if(isset($request['district'])&&$request['district']!=''){

            $query->where('id_kec', $request['district']);
        }
        if(isset($request['village'])&&$request['village']!=''){

            $query->where('id_kel', $request['village']);
        }

         //untuk pencarian
        if(isset($request['q'])&&$request['q']!=''){

            $query->where('rw','like','%'. $request['q'].'%');
        }
        $querys=$query->get()->toArray();
         return response()->json($querys);
    }



    
    public function geoRt(Request $request){
        if(!$request->ajax()){
            abort(404,'Not Found');
        }
        $query= Dataumum::select('id_dataumum as id', 'id_provinsi','id_kabkota', 'id_kec', 'id_kel', 'rt', 'rw', 'rt as name');
        if(isset($request['rt'])&&$request['rt']!=''){

            $query->where('rt', $request['rt']);
        }
        if(isset($request['rw'])&&$request['rw']!=''){

            $query->where('rw', $request['rw']);
        }
        if(isset($request['region'])&&$request['region']!=''){

            $query->where('id_provinsi', $request['region']);
        }
        if(isset($request['city'])&&$request['city']!=''){

            $query->where('id_kabkota', $request['city']);
        }
        if(isset($request['district'])&&$request['district']!=''){

            $query->where('id_kec', $request['district']);
        }
        if(isset($request['village'])&&$request['village']!=''){

            $query->where('id_kel', $request['village']);
        }

         //untuk pencarian
        if(isset($request['q'])&&$request['q']!=''){

            $query->where('rt','like','%'. $request['q'].'%');
        }
        $querys=$query->get()->toArray();
         return response()->json($querys);
    }
}

