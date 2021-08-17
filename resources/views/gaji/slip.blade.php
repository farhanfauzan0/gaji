<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Slip Gaji</title>
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/css/components.css" />
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/css/custom.css" />

</head>

<body class="p-3">
    <div class="row">
        <div class="col-12 text-center">
            <label style="font-size: 40px; font-weight: bold">SLIP GAJI</label>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-2">
            Nama
        </div>
        <div class="col-1">
            :
        </div>
        <div class="col-8">
            {{ $data[0]['nama'] }}
        </div>
        <div class="col-2">
            Bulan
        </div>
        <div class="col-1">
            :
        </div>
        <div class="col-8">
            {{ date('m-Y', strtotime($data[0]['tanggal'])) }}
        </div>
        <div class="col-2">
            Jabatan
        </div>
        <div class="col-1">
            :
        </div>
        <div class="col-8">
            {{ $data[0]['nama_jabatan'] }}
        </div>
    </div>
    <br>
    <hr>
    <div class="row">
        <div class="col-4">
            <label style="font-size: 20px">Gaji Pokok</label>
        </div>
        <div class="col-1">
            <label style="font-size: 20px">:</label>
        </div>
        <div class="col-7">
            <label style="font-size: 20px"> Rp. {{ number_format($gaji_bulan) }} </label>
        </div>
        <div class="col-4">
            <label style="font-size: 20px">Gaji Harian</label>
        </div>
        <div class="col-1">
            <label style="font-size: 20px">:</label>
        </div>
        <div class="col-7">
            <label style="font-size: 20px"> Rp. {{ number_format($gaji) }} </label>
        </div>
        <div class="col-4">
            <label style="font-size: 20px">Gaji Lemburan</label>
        </div>
        <div class="col-1">
            <label style="font-size: 20px">:</label>
        </div>
        <div class="col-7">
            <label style="font-size: 20px"> Rp. {{ number_format($lembur) }} </label>
        </div>
        <div class="col-4">
            <label style="font-size: 20px">Total Gaji</label>
        </div>
        <div class="col-1">
            <label style="font-size: 20px">:</label>
        </div>
        <div class="col-7">
            <label style="font-size: 20px"> Rp. {{ number_format($gaji_bulan + $lembur + $gaji) }} </label>
        </div>
    </div>
    <hr>
    <br>
    <div class="row">
        <div class="col-3 text-center">
            <label>Admin</label>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-3 text-center">
            <label>TTD</label>
        </div>
    </div>
</body>
<script type="text/javascript" src="/tmpl_admin/js/components.js"></script>
<script type="text/javascript" src="/tmpl_admin/js/custom.js"></script>

</html>
