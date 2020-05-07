<?php

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

use App\Kriteria;

use Validator;
use routes;
use App\Http\Requests\KriteriaRequest;
use Illuminate\Support\Facades\DB;
class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
     
 
        return view ('kriteria');
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
    public function store(KriteriaRequest $request)
    {
    
        $data = [
            'kriteria' => $request['kriteria'],
            'subkriteria' => $request['subkriteria'],
            'nilai' => $request['nilai'],
   
        ];

       return Kriteria::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function show(Kriteria $kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
   public function edit($id)
    {

        $Kriteria = Kriteria::find($id);
        return $Kriteria;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $Kriteria = Kriteria::find($id);

        $Kriteria->kriteria =$request['kriteria'];
        $Kriteria->subkriteria =$request['subkriteria'];
        $Kriteria->nilai =$request['nilai'];
          
          
        $Kriteria->update();
        return $Kriteria;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
   {
    if($KriteriaDel = Kriteria::destroy($id)){
            return ['success' =>  1];
        }else{
            return ['tidak success' =>  0];
        }
    }
     public function  apiKriteria()
    {

     $Kriteria = Kriteria::all();
       
        return DataTables::of($Kriteria)
            ->addColumn('action', function($Kriteria) {
                return  
                        '<a onclick="editForm('. $Kriteria->id_kriteria .')" class=btn btn-primary btn-xs"> <i class="glyphicon glyphicon-edit"> </i> Edit </a>' .
                        
                        '<a onclick="deleteData('. $Kriteria->id_kriteria .')" class=btn btn-danger btn-xs"> <i class="glyphicon glyphicon-trash"> </i> Delete </a>' ;

            })->make(true);
    }

    
}

