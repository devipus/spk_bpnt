<?php

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

use App\Pembobotanawal;
use App\Warga;

use Validator;
use routes;

use App\Http\Requests\PembobotanawalRequest;
use Illuminate\Support\Facades\DB;
class PembobotanawalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

     
 
        return view ('pembobotanawal');
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
    public function store(PembobotanawalRequest $request)
    {
    
        $data = [
            'tahun' => $request['tahun'],
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

       return Pembobotanawal::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pembobotanawal  $pembobotanawal
     * @return \Illuminate\Http\Response
     */
    public function show(Pembobotanawal $pembobotanawal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pembobotanawal  $pembobotanawal
     * @return \Illuminate\Http\Response
     */
   public function edit($id)
    {

        $Pembobotanawal = Pembobotanawal::find($id);
        return $Pembobotanawal;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pembobotanawal  $pembobotanawal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $Pembobotanawal = Pembobotanawal::find($id);

        $Pembobotanawal->tahun =$request['tahun'];
        $Pembobotanawal->penghasilan =$request['penghasilan'];
        $Pembobotanawal->pekerjaan =$request['pekerjaan'];
        $Pembobotanawal->pendidikan =$request['pendidikan'];
        $Pembobotanawal->aset =$request['aset'];
        $Pembobotanawal->luas_lantai =$request['luas_lantai'];
        $Pembobotanawal->jenis_lantai =$request['jenis_lantai'];
        $Pembobotanawal->jenis_dinding =$request['jenis_dinding'];
        $Pembobotanawal->sumber_penerangan =$request['sumber_penerangan'];
        $Pembobotanawal->sumber_air =$request['sumber_air'];
        $Pembobotanawal->fasil_bab =$request['fasil_bab'];
          
        $Pembobotanawal->update();
        return $Pembobotanawal;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
   {
    if($PembobotanawalDel = Pembobotanawal::destroy($id)){
            return ['success' =>  1];
        }else{
            return ['tidak success' =>  0];
        }
    }
     public function  apiPembobotanawal()
    {

        $Pembobotanawal = Pembobotanawal::all();
       
        return DataTables::of($Pembobotanawal)
            ->addColumn('action', function($Pembobotanawal) {
                return  
                        '<a onclick="editForm('. $Pembobotanawal->id_pembobotanawal .')" class=btn btn-primary btn-xs"> <i class="glyphicon glyphicon-edit"> </i> Edit </a>' .
                        
                        '<a onclick="deleteData('. $Pembobotanawal->id_pembobotanawal .')" class=btn btn-danger btn-xs"> <i class="glyphicon glyphicon-trash"> </i> Delete </a>' ;

            })->make(true);
    }

    
}

