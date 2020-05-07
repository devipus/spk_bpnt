<?php

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Warga;

use Validator;
use routes;
use App\Http\Requests\WargaRequest;
use Illuminate\Support\Facades\DB;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('warga');   
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
    public function store(WargaRequest $request)
    {
        $data = [
            'nama_warga' => $request['nama_warga'],
            'nik' => $request['nik'],
            'kec' => $request['kec'],
            'kel' => $request['kel'],
            'alamat' => $request['alamat'],
        ];

        return Warga::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Warga  $warga
     * @return \Illuminate\Http\Response
     */
    public function show(Warga $warga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Warga  $warga
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $warga = Warga::find($id);
        return $warga;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Warga  $warga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $warga = Warga::find($id);

        $warga->nama_warga=$request['nama_warga'];
        $warga->nik=$request['nik'];
        $warga->kec=$request['kec'];
        $warga->kel=$request['kel'];
        $warga->alamat=$request['alamat'];

        $warga->update();
        return $warga;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Warga  $warga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($wargaDel = Warga::destroy($id)) {
            return ['success' => 1];
        } else {
            return ['tidak success' => 0];
        }
    }

    public function apiWarga()
    {
        $warga = Warga::all();

        return DataTables::of($warga)
            ->addColumn('action', function($warga){
                return
                    '<a onclick="editForm('. $warga->id_warga .')" class=btn btn-primary btn-xs"> <i class="glyphicon glyphicon-edit"> </i> Edit </a>' .    
                    '<a onclick="deleteData('. $warga->id_warga .')" class=btn btn-danger btn-xs"> <i class="glyphicon glyphicon-trash"> </i> Delete </a>' ;
            })->make(true);
    }

    public function dataExport(){
        $data = Warga::select('id_warga', 'nama_warga', 'nik','kec', 'kel', 'alamat')->get();

        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Data usulan.xls");

        ?>

        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>NIK</th>
                    <th>Nama Warga</th>
                    <th>Kecamatan</th>
                    <th>Kelurahan</th>
                    <th>Alamat</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    $b=1;
                    foreach ($data as $key => $value) {
                ?> 
                    <tr>
                        <td> <?php echo $b ?></td>
                        <td> <?php echo $value->nik; ?></td>
                        <td> <?php echo $value->nama_warga; ?></td>
                        <td> <?php echo $value->kec; ?></td>
                        <td> <?php echo $value->kel; ?></td>
                        <td> <?php echo $value->alamat; ?></td>
                    </tr>
                <?php
                    $b++;
                    }

                ?>
            
            </tbody>
        </table>
<?php
    }
    
}
