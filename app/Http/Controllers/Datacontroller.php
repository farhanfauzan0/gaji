<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class Datacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Karyawan::select('karyawans.*', 'jabatans.nama as nama_jabatan')->leftJoin('jabatans', 'karyawans.id_jabatan', 'jabatans.id')->get();
        return view('gaji.index', ['data' => $data]);
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
    public function store(Request $request)
    {
        // dd($request->all());
        $cek = Data::select('*')->whereid_karyawan($request->id_karyawan)->first();

        if (!empty($cek)) {
            $date = date('m-Y', strtotime($cek->tanggal));
            $date1 = date('m-Y', strtotime($request->tanggal[0]));
            if ($date == $date1) {
                foreach ($request->tanggal as $inddata => $tgl) {
                    $detail = Data::find($request->id[$inddata]);
                    $detail->id_karyawan = $request->id_karyawan;
                    $detail->tanggal = $request->tanggal[$inddata];
                    $detail->lembur = $request->lembur[$inddata] ?: '0';
                    $detail->jenis_lain = $request->jenis_lain[$inddata] ?: '-';
                    $detail->jumlah_lain = $request->jumlah_lain[$inddata] ?: '0';
                    $detail->total_per_hari = $request->total_per_hari[$inddata];
                    $detail->update();
                }
            } else {
                foreach ($request->tanggal as $inddata => $tgl) {
                    $detail = new Data();
                    $detail->id_karyawan = $request->id_karyawan;
                    $detail->tanggal = $request->tanggal[$inddata];
                    $detail->lembur = $request->lembur[$inddata] ?: '0';
                    $detail->jenis_lain = $request->jenis_lain[$inddata] ?: '-';
                    $detail->jumlah_lain = $request->jumlah_lain[$inddata] ?: '0';
                    $detail->total_per_hari = $request->total_per_hari[$inddata];
                    $detail->save();
                }
            }
        } else {
            foreach ($request->tanggal as $inddata => $tgl) {
                $detail = new Data();
                $detail->id_karyawan = $request->id_karyawan;
                $detail->tanggal = $request->tanggal[$inddata];
                $detail->lembur = $request->lembur[$inddata] ?: '0';
                $detail->jenis_lain = $request->jenis_lain[$inddata] ?: '-';
                $detail->jumlah_lain = $request->jumlah_lain[$inddata] ?: '0';
                $detail->total_per_hari = $request->total_per_hari[$inddata];
                $detail->save();
            }
        }


        return back()->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function get_detail(Request $request)
    {
        // dd($request->all());
        $valids = Validator::make($request->all(), [
            'tanggal' => 'required',
            'id' => 'required'
        ]);

        if ($valids->fails()) {
            return redirect()->route('data.index')->with('success', 'periksa data kembali');
        }

        $cek = Data::select('*')->whereid_karyawan($request->id)->first();
        $gajiperhair = Karyawan::select('jabatans.per_hari', 'jabatans.lemburan', 'jabatans.gaji_bulan')->leftjoin('jabatans', 'jabatans.id', 'karyawans.id_jabatan')->where('karyawans.id', $request->id)->first();
        // dd($cek);
        if (!empty($cek)) {
            $data = Data::select('*')->whereid_karyawan($request->id)->get();
            $date = date('m-Y', strtotime($cek->tanggal));
            if ($date == $request->tanggal) {
                foreach ($data as $datas) {
                    // dd($request->tanggal);
                    $newdata[] = [
                        'id' => $datas->id,
                        'id_karyawan' => $request->id,
                        'tanggal' => $datas->tanggal,
                        'lembur' => $datas->lembur,
                        'jenis_lain' => $datas->jenis_lain,
                        'jumlah_lain' => $datas->jumlah_lain,
                        'total_per_hari' => $datas->total_per_hari,
                        'lemburan' => $gajiperhair->lemburan,
                        'gaji_bulan' => $gajiperhair->gaji_bulan
                    ];
                }
            } else {
                $ndate = $this->create_date($request->tanggal);
                foreach ($ndate as $ndates) {
                    $newdata[] = [
                        'id' => '',
                        'id_karyawan' => $request->id,
                        'tanggal' => $ndates,
                        'lembur' => '0',
                        'jenis_lain' => '',
                        'jumlah_lain' => '0',
                        'total_per_hari' => $gajiperhair->per_hari,
                        'lemburan' => $gajiperhair->lemburan,
                        'gaji_bulan' => $gajiperhair->gaji_bulan
                    ];
                }
            }
        } else {
            $ndate = $this->create_date($request->tanggal);
            foreach ($ndate as $ndates) {
                $newdata[] = [
                    'id' => '',
                    'id_karyawan' => $request->id,
                    'tanggal' => $ndates,
                    'lembur' => '0',
                    'jenis_lain' => '',
                    'jumlah_lain' => '0',
                    'total_per_hari' => $gajiperhair->per_hari,
                    'lemburan' => $gajiperhair->lemburan,
                    'gaji_bulan' => $gajiperhair->gaji_bulan
                ];
            }
        }
        $totallembur = 0;
        $totallain = 0;
        $totalgaji = 0;
        $gajibulan = 0;
        foreach ($newdata as $newdatas) {
            $totallembur += $newdatas['lembur'];
            $totallain += $newdatas['jumlah_lain'];
            $totalgaji += $newdatas['total_per_hari'];
            $gajibulan = $newdatas['gaji_bulan'];
        }

        // dd($gajibulan);

        return view('gaji.detail', ['data' => $newdata, 'lembur' => $totallembur, 'lain' => $totallain, 'gaji' => $totalgaji, 'gaji_bulan' => $gajibulan]);
    }

    function create_date($date)
    {
        $date = Carbon::createFromFormat('m-Y', $date);
        for ($i = 1; $i < $date->daysInMonth + 1; ++$i) {
            $dates[] = \Carbon\Carbon::createFromDate($date->year, $date->month, $i)->format('Y-m-d');
        }
        return $dates;
    }
}
