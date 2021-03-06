<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Bukti;
use App\Models\Data;
use App\Models\Karyawan;
use App\Models\Notif;
use App\Models\Swab;
use App\Models\Userclient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class Indexcontroller extends Controller
{

    function index()
    {
        if (Auth::check()) {
            if (Auth::user()->nama == 'Admin') {
                return redirect()->route('data.index');
            } else {
                return redirect()->route('report.index');
            }
        }
    }

    function login_index()
    {
        if (Auth::guard('client')->check()) {
            return redirect()->route('index');
        } else {
            return view('front.auth.login');
        }
    }

    function report_index(Request $request)
    {
        // dd(explode('-', $request->bln)[1]);
        if (!empty($request->bln)) {
            # code...
            $data = Karyawan::select('karyawans.*', 'karyawans.id as id_kar', 'j.nama as nama_jabatan', 'j.gaji_bulan', 'j.lemburan', 'd.*')
                ->join('jabatans as j', 'karyawans.id_jabatan', 'j.id')
                ->join('datas as d', 'karyawans.id', 'd.id_karyawan')
                ->whereMonth('d.tanggal', explode('-', $request->bln)[0])
                ->whereYear('d.tanggal', explode('-', $request->bln)[1])
                ->get();
            $harian = 0;
            $lemburan = 0;
            $lain = 0;
            foreach ($data as $value) {
                $harian += $value->total_per_hari;
                $lemburan += $value->lembur * $value->lemburan;
                $lain += $value->jumlah_lain;
                $newdata[$value->id_kar] = [
                    'nama' => $value->nama,
                    'jenis_kelamin' => $value->jenis_kelamin,
                    'jabatan' => $value->nama_jabatan,
                    'gaji_bulan' => $value->gaji_bulan,
                    'harian' => $harian,
                    'lemburan' => $lemburan,
                    'lain' => $lain
                ];
            }

            $data1 = Karyawan::select('karyawans.*', 'karyawans.id as id_kar', 'j.nama as nama_jabatan', 'j.gaji_bulan', 'j.lemburan', 'd.*')
                ->join('jabatans as j', 'karyawans.id_jabatan', 'j.id')
                ->join('datas as d', 'karyawans.id', 'd.id_karyawan')
                ->whereMonth('d.tanggal', explode('-', $request->bln)[0])
                ->whereYear('d.tanggal', explode('-', $request->bln)[1])
                ->get();
            $harian1 = 0;
            $lemburan1 = 0;
            $lain1 = 0;
            $newdata2[][] = [];
            foreach ($data1 as $value) {
                $harian1 += $value->total_per_hari;
                $lemburan1 += $value->lembur * $value->lemburan;
                $lain1 += $value->jumlah_lain;
                $newdata1[$value->id_kar] = [
                    'nama' => $value->nama,
                    'jenis_kelamin' => $value->jenis_kelamin,
                    'jabatan' => $value->nama_jabatan,
                    'gaji_bulan' => $value->gaji_bulan,
                    'harian' => $harian,
                    'lemburan' => $lemburan,
                    'lain' => $lain
                ];
            }
            !empty($newdata1) ? $newdata1 : $newdata1 = [];
            foreach ($newdata1 as $value2) {
                if (!array_key_exists($value2['jabatan'], $newdata2)) {
                    $newdata2[$value2['jabatan']]['gaji_bulan'] = $value2['gaji_bulan'];
                } else {
                    $newdata2[$value2['jabatan']]['gaji_bulan'] += $value2['gaji_bulan'];
                }
            }

            foreach ($newdata2 as $key => $value3) {
                if ($key != '0') {
                    # code...
                    $f['jabatan'][] = $key;
                    $f['total'][] = $value3['gaji_bulan'];
                }
            }
        }

        !empty($newdata) ? $newdata : $newdata = [];
        if (empty($f)) {
            $f['jabatan'] = [];
            $f['total'] = [];
        }

        return view('report.index', ['data' => $newdata, 'f' => $f]);
        // dd($newdata);
    }

    function slip(Request $request, $id, $tanggal)
    {

        $cek = Data::select('*')->whereid_karyawan($id)->first();
        $gajiperhair = Karyawan::select('karyawans.nama', 'jabatans.per_hari', 'jabatans.lemburan', 'jabatans.gaji_bulan', 'jabatans.nama as nama_jabatan')->leftjoin('jabatans', 'jabatans.id', 'karyawans.id_jabatan')->where('karyawans.id', $id)->first();
        // dd($cek);
        $data = Data::select('*')->whereid_karyawan($id)->whereMonth('tanggal', $tanggal)->get();

        foreach ($data as $datas) {
            // dd($tanggal);
            $newdata[] = [
                'id' => $datas->id,
                'id_karyawan' => $id,
                'tanggal' => $datas->tanggal,
                'lembur' => $datas->lembur,
                'jenis_lain' => $datas->jenis_lain,
                'jumlah_lain' => $datas->jumlah_lain,
                'total_per_hari' => $datas->total_per_hari,
                'lemburan' => $gajiperhair->lemburan,
                'gaji_bulan' => $gajiperhair->gaji_bulan,
                'nama' => $gajiperhair->nama,
                'nama_jabatan' => $gajiperhair->nama_jabatan
            ];
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

        return view('gaji.slip', ['data' => $newdata, 'lembur' => $totallembur, 'lain' => $totallain, 'gaji' => $totalgaji, 'gaji_bulan' => $gajibulan]);
    }
}
