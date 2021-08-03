<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Bukti;
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
        // return view('report.index');
        if (!empty($request->bln)) {
            # code...
            $data = Karyawan::select('karyawans.*', 'karyawans.id as id_kar', 'j.nama as nama_jabatan', 'j.gaji_bulan', 'j.lemburan', 'd.*')
                ->join('jabatans as j', 'karyawans.id_jabatan', 'j.id')
                ->join('datas as d', 'karyawans.id', 'd.id_karyawan')
                ->whereRaw('MONTH(d.tanggal)', explode('-', $request->bln)[0])
                ->whereRaw('YEAR(d.tanggal)', explode('-', $request->bln)[1])
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
        }
        // dd($newdata);

        !empty($newdata) ? $newdata : $newdata = [];
        return view('report.index', ['data' => $newdata]);
        // dd($newdata);
    }

    function report_post(Request $request)
    {
    }
}
