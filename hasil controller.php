<?php

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

use App\Pembobotan;
use App\Pembobotanawal;
use App\Kriteria;
use App\Aarga;

use Validator;
use routes;
use App\Http\Requests\HasilRequest;
use Illuminate\Support\Facades\DB;


class HasilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->get('tahun') != ''){
            return redirect()->route('laporan', ['tahun' => $request->get('tahun')]);
        }else{
            return view ('hasil');
        }
    }

    public function laporan(Request $request)
    {
      if ($request->get('tahun') != '' && ($a=$this->perhitungan($request->get('tahun')))) {

        return view('laporan')->with('data', $a)->with('tahun', $request->get('tahun'));

      } else{
        return redirect('hasil');
      }
    }

    private function perhitungan($tahun)
    {
        if($tahun != ''){
        $p = Pembobotan::where('tahun', $tahun)->get();
        $pa = Pembobotanawal::where('tahun', $tahun)->first();

          if($p && $pa){
              $PembobotanAwalTotal = $pa->penghasilan + $pa->pekerjaan + $pa->pendidikan + $pa->aset + $pa->luas_lantai + $pa->jenis_lantai + $pa->jenis_dinding + $pa->sumber_penerangan + $pa->sumber_air + $pa->fasil_bab;
             
              $pPenghasilan = intval(($pa->penghasilan / $PembobotanAwalTotal)* 100)/100;
              $pPekerjaan = intval(($pa->pekerjaan / $PembobotanAwalTotal)* 100)/100;
              $pPendidikan = intval(($pa->pendidikan / $PembobotanAwalTotal)* 100)/100;
              $pAset = intval(($pa->aset / $PembobotanAwalTotal)* 100)/100;
              $pLuas_lantai = intval(($pa->luas_lantai / $PembobotanAwalTotal)* 100)/100;
              $pJenis_lantai = intval(($pa->jenis_lantai / $PembobotanAwalTotal)* 100)/100;
              $pJenis_dinding = intval(($pa->jenis_dinding / $PembobotanAwalTotal)* 100)/100;
              $pSumber_penerangan = intval(($pa->sumber_penerangan / $PembobotanAwalTotal)* 100)/100;
              $pSumber_air = intval(($pa->sumber_air / $PembobotanAwalTotal)* 100)/100;
              $pFasil_bab = intval(($pa->fasil_bab / $PembobotanAwalTotal)* 100)/100;
            
              $qA = Array();
              $qB = Array();
              $qC = Array();
              $qD = Array();
              $qE = Array();
              $qF = Array();
              $qG = Array();
              $qH = Array();
              $qI = Array();
              $qJ = Array();

              foreach($p as $k){
                  $qA[] = $k->penghasilan1->nilai;
                  $qB[] = $k->pekerjaan1->nilai;
                  $qC[] = $k->pendidikan1->nilai;
                  $qD[] = $k->aset1->nilai;
                  $qE[] = $k->luas_lantai1->nilai;
                  $qF[] = $k->jenis_lantai1->nilai;
                  $qG[] = $k->jenis_dinding1->nilai;
                  $qH[] = $k->sumber_penerangan1->nilai;
                  $qI[] = $k->sumber_air1->nilai;
                  $qJ[] = $k->fasil_bab1->nilai;
              }

              $qAMax = max($qA);
              $qAMin = min($qA);

              $qBMax = max($qB);
              $qBMin = min($qB);

              $qCMax = max($qC);
              $qCMin = min($qC);

              $qDMax = max($qD);
              $qDMin = min($qD);

              $qEMax = max($qE);
              $qEMin = min($qE);

              $qFMax = max($qF);
              $qFMin = min($qF);

              $qGMax = max($qG);
              $qGMin = min($qG);

              $qHMax = max($qH);
              $qHMin = min($qH);

              $qIMax = max($qI);
              $qIMin = min($qI);

              $qJMax = max($qJ);
              $qJMin = min($qJ);
              // print_r($qAMax);print_r('<br>');
              // print_r($qAMin);print_r('<br>');print_r('<br>');
              // print_r($qBMax);print_r('<br>');
              // print_r($qBMin);print_r('<br>');print_r('<br>');
              // print_r($qCMax);print_r('<br>');
              // print_r($qCMin);print_r('<br>');print_r('<br>');
              // print_r($qDMax);print_r('<br>');
              // print_r($qDMin);print_r('<br>');print_r('<br>');
              // print_r($qEMax);print_r('<br>');
              // print_r($qEMin);print_r('<br>');print_r('<br>');
              $data = Array();
              foreach($p as $k){
                  $pAT = (($qAMax - $k->penghasilan1->nilai) > 0 ? (((($qAMax - $k->penghasilan1->nilai) / ($qAMax - $qAMin)) * 100) * $pPenghasilan) : 0);
                  $pBT = (($qBMax - $k->pekerjaan1->nilai) > 0 ? (((($qBMax - $k->pekerjaan1->nilai) / ($qBMax - $qBMin)) * 100) * $pPekerjaan) : 0);
                  $pCT = (($qCMax - $k->pendidikan1->nilai) > 0 ? (((($qCMax - $k->pendidikan1->nilai) / ($qCMax - $qCMin)) * 100) * $pPendidikan) : 0);
                  $pDT = (($qDMax - $k->aset1->nilai) > 0 ? (((($qDMax - $k->aset1->nilai) / ($qDMax - $qDMin)) * 100) * $pAset) : 0);
                  $pET = (($qEMax - $k->luas_lantai1->nilai) > 0 ? (((($qEMax - $k->luas_lantai1->nilai) / ($qEMax - $qEMin)) * 100) * $pLuas_lantai) : 0 );
                  $pFT = (($qFMax - $k->jenis_lantai1->nilai) > 0 ? (((($qFMax - $k->jenis_lantai1->nilai) / ($qFMax - $qFMin)) * 100) * $pJenis_lantai) : 0);
                  $pGT = (($qGMax - $k->jenis_dinding1->nilai) > 0 ? (((($qGMax - $k->jenis_dinding1->nilai) / ($qGMax - $qGMin)) * 100) * $pJenis_dinding) : 0);
                  $pHT = (($qHMax - $k->sumber_penerangan1->nilai) > 0 ? (((($qHMax - $k->sumber_penerangan1->nilai) / ($qHMax - $qHMin)) * 100) * $pSumber_penerangan) : 0);
                  $pIT = (($qIMax - $k->sumber_air1->nilai) > 0 ? (((($qIMax - $k->sumber_air1->nilai) / ($qIMax - $qIMin)) * 100) * $pSumber_air) : 0);
                  $pJT = (($qJMax - $k->fasil_bab1->nilai) > 0 ? (((($qJMax - $k->fasil_bab1->nilai) / ($qJMax - $qJMin)) * 100) * $pFasil_bab) : 0 );

                 $tt = $pAT + $pBT + $pCT + $pDT + $pET + $pFT + $pGT + $pHT + $pIT + $pJT;
                 $th = number_format($tt,2);
                 $data[$th] = (Object)Array('no_bdt' => $k->warga->no_bdt, 'nama' => $k->warga->nama_warga, 'nik' => $k->warga->nik,'nilai' => (float)$th);


                 // print_r($k->proyek->nama_proyek );
                 // print_r('<br>');

                 // print_r($k->penghasilan1->nilai);
                 // print_r('<br>');
                 // print_r($ppenghasilan);
                 // print_r('<br>');
                 // print_r('<br>');
                 // print_r($k->Aaktu1->nilai);
                 // print_r('<br>');
                 // print_r($ppekerjaan);
                 // print_r('<br>');
                 // print_r('<br>');
                 // print_r($k->pendidikan1->nilai);
                 // print_r('<br>');
                 // print_r($ppendidikan);
                 // print_r('<br>');
                 // print_r('<br>');
                 // print_r($k->aset1->nilai);
                 // print_r('<br>');
                 // print_r($paset);
                 // print_r('<br>');
                 // print_r('<br>');
                 // print_r($k->luas_lantai1->nilai);
                 // print_r('<br>');
                 // print_r($pluas_lantai);
                 // print_r('<br>');
                 // print_r('<br>');

                 // print_r('-----------------');

                 // print_r('<br>');

                 // print_r($pAT);
                 // print_r('<br>');
                 // print_r($pJT);
                 // print_r('<br>');
                 // print_r($pHT);
                 // print_r('<br>');
                 // print_r($pDT);
                 // print_r('<br>');
                 // print_r($pPT);
                 // print_r('<br>');
                 // print_r('<br>');
                 // print_r('<br>');

              }
              // usort($data, function($a,$b){
              //     return $a->nilai > $b->nilai ? 1 : -1;
              // });
              ksort($data);
              return $data;

          }

          }else{
              return null;
          }
    }

    /**
     * ShoA the form for creating a neA resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a neAly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HasilRequest $request)
    {
    


        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hasil  $Hasil
     * @return \Illuminate\Http\Response
     */
    public function show(Hasil $Hasil)
    {
        //
    }

    /**
     * ShoA the form for editing the specified resource.
     *
     * @param  \App\Hasil  $Hasil
     * @return \Illuminate\Http\Response
     */
   public function edit($id)
    {

        $Hasil = Hasil::find($id);
        return $Hasil;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hasil  $Hasil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
 //id_Hasil','Hasil','budget','aset','lokasi','pendidikan','bonus
           // Protected $fillable=['id_Hasil','id_Hasil','penghasilan','pekerjaan','pendidikan','aset','luas_lantai','ket'];
        $Hasil = Hasil::find($id);

        $Hasil->tahun =$request['tahun'];
        $Hasil->penghasilan =$request['penghasilan'];
        $Hasil->pekerjaan =$request['pekerjaan'];
        $Hasil->pendidikan =$request['pendidikan'];
        $Hasil->aset =$request['aset'];
        $Hasil->luas_lantai =$request['luas_lantai'];
        $Hasil->jenis_lantai =$request['jenis_lantai'];
        $Hasil->jenis_dinding =$request['jenis_dinding'];
        $Hasil->sumber_penerangan =$request['sumber_penerangan'];
        $Hasil->sumber_air =$request['sumber_air'];
        $Hasil->fasil_bab =$request['fasil_bab'];
  
        $Hasil->update();
        return $Hasil;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
   {
    if($HasilDel = Hasil::destroy($id)){
            return ['success' =>  1];
        }else{
            return ['tidak success' =>  0];
        }
    }
     public function  apiHasil()
    {

//$user=\Auth::user();
          // $Hasil = Hasil::find($user->id);

     $Hasil = Hasil::all();
       //$Hasil= sisAa::Ahere('id','=',$id)->first();
  // $Hasil = Hasil::Ahere('user_id','=',\Auth::user()->id)->Aith('kegiatan')->get();
      ///  $Hasil = Hasil::select('tanggal',DB::raA("(SUM(ns_siang)) as ns_siang"),DB::raA("(SUM(tkno_siang)) as tkno_siang"),DB::raA("(SUM(tamu_siang)) as tamu_siang"),DB::raA("(SUM(ss_malam)) as ss_malam"),DB::raA("(SUM(ns_malam)) as ns_malam"))->groupBy('tanggal')->get(); //pertanggal,
        return DataTables::of($Hasil)
            ->addColumn('action', function($Hasil) {
                return  
                        '<a onclick="editForm('. $Hasil->id_Hasil .')" class=btn btn-primary btn-xs"> <i class="glyphicon glyphicon-edit"> </i> Edit </a>' .
                        
                        '<a onclick="deleteData('. $Hasil->id_Hasil .')" class=btn btn-danger btn-xs"> <i class="glyphicon glyphicon-trash"> </i> Delete </a>' ;
 
            })->make(true);
    }

    public function dataExport(Request $request){
      if ($request->get('tahun') != '' && ($a=$this->perhitungan( $request->get('tahun')))) {

        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Data hasil.xls");

        ?>

        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>No. BDT</th>
                    <th>Nama Warga</th>
                    <th>NIK</th>
                    <th>Nilai</th>
                    <th>Ranking</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    $b=1;
                    foreach ($a as $key => $value) {
                ?> 
                    <tr>
                        <td> <?php echo $b ?></td>
                        <td> <?php echo $value->no_bdt; ?></td>
                        <td> <?php echo $value->nama; ?></td>
                        <td> <?php echo $value->nik; ?></td>
                        <td> <?php echo $value->nilai; ?></td>
                        <td> <?php echo $b ?></td>
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

}


    


