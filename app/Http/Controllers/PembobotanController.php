<?php

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

use App\Pembobotan;
use App\Warga;
use App\Kriteria;

use Validator;
use routes;
use App\Http\Requests\PembobotanRequest;
use Illuminate\Support\Facades\DB;
class PembobotanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warga = Warga::all();

        $penghasilan1 = Kriteria::where('kriteria', 'penghasilan')->get();
        $pekerjaan1 = Kriteria::where('kriteria', 'pekerjaan')->get();
        $pendidikan1 = Kriteria::where('kriteria', 'pendidikan')->get();
        $aset1 = Kriteria::where('kriteria', 'aset')->get();
        $luas_lantai1 = Kriteria::where('kriteria', 'luas_lantai')->get();
        $jenis_lantai1 = Kriteria::where('kriteria', 'jenis_lantai')->get();
        $jenis_dinding1 = Kriteria::where('kriteria', 'jenis_dinding')->get();
        $sumber_penerangan1 = Kriteria::where('kriteria', 'sumber_penerangan')->get();
        $sumber_air1 = Kriteria::where('kriteria', 'sumber_air')->get();
        $fasil_bab1 = Kriteria::where('kriteria', 'fasil_bab')->get();
     
 
        return view ('pembobotan')->with('warga', $warga)->with('penghasilan1', $penghasilan1)->with('pekerjaan1', $pekerjaan1)->with('pendidikan1', $pendidikan1)->with('aset1', $aset1)->with('luas_lantai1', $luas_lantai1)->with('jenis_lantai1', $jenis_lantai1)->with('jenis_dinding1', $jenis_dinding1)->with('sumber_penerangan1', $sumber_penerangan1)->with('sumber_air1', $sumber_air1)->with('fasil_bab1', $fasil_bab1);
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
    public function store(PembobotanRequest $request)
    {
    
        $data = [
            'tahun' => $request['tahun'],
            'id_warga' => $request['id_warga'],
            'penghasilan' => $request['penghasilan'],
            'pekerjaan' => $request['pekerjaan'],
            'pendidikan' => $request['pendidikan'],
            'aset' => $request['aset'],
            'luas_lantai' => $request['luas_lantai'],
            'jenis_lantai' => $request['jenis_lantai'],
            'jenis_dinding' => $request['jenis_dinding'],
            'sumber_penerangan' => $request['sumber_penerangan'],
            'sumber_air' => $request['sumber_air'],
            'fasil_bab' => $request['fasil_bab'],

        ];

       return Pembobotan::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pembobotan  $pembobotan
     * @return \Illuminate\Http\Response
     */
    public function show(Pembobotan $pembobotan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pembobotan  $pembobotan
     * @return \Illuminate\Http\Response
     */
   public function edit($id)
    {

        $Pembobotan = Pembobotan::find($id);
        return $Pembobotan;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pembobotan  $pembobotan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
 
        $Pembobotan = Pembobotan::find($id);

        $Pembobotan->tahun =$request['tahun'];
        $Pembobotan->id_warga =$request['id_warga'];
        $Pembobotan->penghasilan =$request['penghasilan'];
        $Pembobotan->pekerjaan =$request['pekerjaan'];
        $Pembobotan->pendidikan =$request['pendidikan'];
        $Pembobotan->aset =$request['aset'];
        $Pembobotan->luas_lantai =$request['luas_lantai']; 
        $Pembobotan->jenis_lantai =$request['jenis_lantai'];
        $Pembobotan->jenis_dinding =$request['jenis_dinding'];
        $Pembobotan->sumber_penerangan =$request['sumber_penerangan'];
        $Pembobotan->sumber_air =$request['sumber_air'];
        $Pembobotan->fasil_bab =$request['fasil_bab']; 
          
        $Pembobotan->update();
        return $Pembobotan;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
   {
    if($PembobotanDel = Pembobotan::destroy($id)){
            return ['success' =>  1];
        }else{
            return ['tidak success' =>  0];
        }
    }
     public function  apiPembobotan()
    {

     $Pembobotan = Pembobotan::with('warga')->with('penghasilan1')->with('pekerjaan1')->with('pendidikan1')->with('aset1')->with('luas_lantai1')->with('jenis_lantai1')->with('jenis_dinding1')->with('sumber_penerangan1')->with('sumber_air1')->with('fasil_bab1')->get();
       
        return DataTables::of($Pembobotan)
            ->addColumn('action', function($Pembobotan) {
                return  
                        '<a onclick="editForm('. $Pembobotan->id_pembobotan .')" class=btn btn-primary btn-xs"> <i class="glyphicon glyphicon-edit"> </i> Edit </a>' .
                        
                        '<a onclick="deleteData('. $Pembobotan->id_pembobotan .')" class=btn btn-danger btn-xs"> <i class="glyphicon glyphicon-trash"> </i> Delete </a>' ;

            })->make(true);
    }

    
}

