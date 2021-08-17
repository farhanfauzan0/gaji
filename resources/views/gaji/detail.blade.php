@extends('master')
@section('css')
    <!--plugin styles-->
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/select2/css/select2.min.css" />
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/datatables/css/scroller.bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/datatables/css/colReorder.bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/datatables/css/dataTables.bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/css/pages/dataTables.bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/css/plugincss/responsive.dataTables.min.css" />
    {{-- <link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/wow/css/animate.css" />
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/bootstrap-tagsinput/css/bootstrap-tagsinput.css" /> --}}
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/sweetalert/css/sweetalert2.min.css" />
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/css/pages/sweet_alert.css" />
    <!-- end of plugin styles -->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/css/pages/tables.css" />
    {{-- <link type="text/css" rel="stylesheet" href="admin/css/pages/portlet.css" />
    <link type="text/css" rel="stylesheet" href="admin/css/pages/advanced_components.css" />
    <link type="text/css" rel="stylesheet" href="admin/vendors/daterangepicker/css/daterangepicker.css" />
    <link type="text/css" rel="stylesheet" href="admin/vendors/datepicker/css/bootstrap-datepicker.min.css" />
    <link type="text/css" rel="stylesheet" href="admin/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css" />
    <link type="text/css" rel="stylesheet" href="admin/vendors/datetimepicker/css/DateTimePicker.min.css" />
    <link type="text/css" rel="stylesheet" href="admin/vendors/j_timepicker/css/jquery.timepicker.css" /> --}}
    <!--End of page level styles-->
@endsection
@section('active-dt')
    active
@endsection
@section('judul')
    Data Gaji
@endsection
@section('logo-judul')
    fa-bars
@endsection
@section('content')
    <div class="inner bg-light lter bg-container">
        <div class="row">
            <div class="col-12 data_tables">
                <!-- BEGIN EXAMPLE1 TABLE PORTLET-->
                <div class="card">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                            </button>
                            {{ $message }}
                        </div>
                    @endif
                    <div class="card-header bg-white">
                        <i class="fa fa-database"></i>Data Gaji Perbulan
                    </div>
                    <div class="card-block p-t-25">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Total Lembur</label>
                                    <input value="{{ $lembur }}" class="form-control form-control-sm" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label>Total Biaya Lain</label>
                                    <input value="{{ $lain }}" class="form-control form-control-sm" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label>Total Gaji</label>
                                    <input value="{{ $gaji + $data[0]['gaji_bulan'] }}"
                                        class="form-control form-control-sm" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label>Total Gaji Harian</label>
                                    <input value="{{ $gaji }}" class="form-control form-control-sm" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label>Gaji Bulanan</label>
                                    <input value="{{ $gaji_bulan }}" class="form-control form-control-sm" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-xs-12">

                            <div class="m-t-25">
                                <div class="pull-sm-right">
                                    <div class="tools pull-sm-right"></div>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('data.store') }}">
                                <table class="table table-striped table-bordered table-hover" id="sample_1">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Lembur</th>
                                            <th>Biaya Operasional</th>
                                            <th>Keterangan Operasional</th>
                                            <th>Gaji Perhari</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @csrf
                                        @foreach ($data as $datas)
                                            <input name="id_karyawan" value="{{ $datas['id_karyawan'] }}" hidden>
                                            <input name="id[]" value="{{ $datas['id'] }}" hidden>
                                            <tr>
                                                <td>
                                                    <div class="row justify-content-center">
                                                        <div class="col-9 align-self-center">
                                                            <input value="{{ $datas['tanggal'] ?: '' }}" name="tanggal[]"
                                                                readonly class="form-control form-control-sm">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="row justify-content-center">
                                                        <div class="col-4 align-self-center">
                                                            <input type="number" value="{{ $datas['lembur'] ?: '' }}"
                                                                name="lembur[]" class="form-control form-control-sm"
                                                                id="{{ $datas['tanggal'] }}lembur"
                                                                onchange="changeperhari('{{ $datas['tanggal'] }}')"
                                                                onkeyup="changeperhari('{{ $datas['tanggal'] }}')">
                                                            <input hidden class="lemburan"
                                                                value="{{ $datas['lemburan'] ?: '' }}">
                                                        </div>
                                                        <div class="col-4 align-self-center">
                                                            Jam
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="row justify-content-center">
                                                        <div class="col-12 align-self-center">
                                                            <input name="jumlah_lain[]" class="form-control form-control-sm"
                                                                id="{{ $datas['tanggal'] }}jml-lain"
                                                                value="{{ $datas['jumlah_lain'] ?: '' }}"
                                                                onkeyup="changeperhari('{{ $datas['tanggal'] }}')">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="row justify-content-center">
                                                        <div class="col-12 align-self-center">
                                                            <input {{ $datas['jenis_lain'] ?: '' }}
                                                                value="{{ $datas['jenis_lain'] ?: '' }}"
                                                                name="jenis_lain[]" class="form-control form-control-sm">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="row justify-content-center">
                                                        <div class="col-12 align-self-center">
                                                            <input id="{{ $datas['tanggal'] }}tcore"
                                                                value="{{ $datas['total_per_hari'] ?: '' }}" hidden>
                                                            <input value="{{ $datas['total_per_hari'] ?: '' }}"
                                                                name="total_per_hari[]" class="form-control form-control-sm"
                                                                id="{{ $datas['tanggal'] }}total-per-hari">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <section style="text-align: center">

                                    <button class="btn btn-lg btn-primary" type="submit">Simpan</button>
                                    @if ($new === false)
                                        <a href="{{ route('slip', ['id' => $id, 'tanggal' => $tgl]) }}" target="_blank"
                                            class="btn btn-lg btn-primary">Slip Gaji</a>
                                    @endif
                                </section>
                            </form>

                        </div>
                        <!-- END EXAMPLE1 TABLE PORTLET-->
                        <!-- BEGIN EXAMPLE4 TABLE PORTLET-->
                        <div class="card m-t-35" style="display: none;">
                            <div class="card-block p-t-10">
                                <div class=" m-t-25">
                                    <table class="table table-striped table-bordered table-hover " id="sample_6">
                                        <thead>
                                            <tr>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- END EXAMPLE4 TABLE PORTLET-->
                    </div>
                </div>
            </div>
        @endsection
        @section('js')
            <!--  plugin scripts -->
            <script type="text/javascript" src="tmpl_admin/vendors/select2/js/select2.js"></script>
            <script type="text/javascript" src="tmpl_admin/vendors/datatables/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="tmpl_admin/js/pluginjs/dataTables.tableTools.js"></script>
            <script type="text/javascript" src="tmpl_admin/vendors/datatables/js/dataTables.colReorder.min.js"></script>
            <script type="text/javascript" src="tmpl_admin/vendors/datatables/js/dataTables.bootstrap.min.js"></script>
            <script type="text/javascript" src="tmpl_admin/vendors/datatables/js/dataTables.buttons.min.js"></script>
            <script type="text/javascript" src="tmpl_admin/js/pluginjs/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="tmpl_admin/vendors/datatables/js/dataTables.responsive.min.js"></script>
            <script type="text/javascript" src="tmpl_admin/vendors/datatables/js/dataTables.rowReorder.min.js"></script>
            <script type="text/javascript" src="tmpl_admin/vendors/datatables/js/buttons.colVis.min.js"></script>
            <script type="text/javascript" src="tmpl_admin/vendors/datatables/js/buttons.html5.min.js"></script>
            <script type="text/javascript" src="tmpl_admin/vendors/datatables/js/buttons.bootstrap.min.js"></script>
            <script type="text/javascript" src="tmpl_admin/vendors/datatables/js/buttons.print.min.js"></script>
            <script type="text/javascript" src="tmpl_admin/vendors/datatables/js/dataTables.scroller.min.js"></script>
            <script type="text/javascript" src="tmpl_admin/vendors/bootstrapvalidator/js/bootstrapValidator.min.js">
            </script>
            <script type="text/javascript" src="tmpl_admin/vendors/wow/js/wow.min.js"></script>
            <script type="text/javascript" src="tmpl_admin/vendors/sweetalert/js/sweetalert2.min.js"></script>
            <script type="text/javascript" src="tmpl_admin/vendors/datepicker/js/bootstrap-datepicker.min.js"></script>
            <script type="text/javascript" src="tmpl_admin/vendors/bootstrap-timepicker/js/bootstrap-timepicker.min.js">
            </script>
            <script type="text/javascript" src="tmpl_admin/vendors/bootstrap-switch/js/bootstrap-switch.min.js"></script>
            <script type="text/javascript" src="tmpl_admin/vendors/autosize/js/jquery.autosize.min.js"></script>
            <script type="text/javascript" src="tmpl_admin/vendors/jasny-bootstrap/js/inputmask.js"></script>
            <script type="text/javascript" src="tmpl_admin/vendors/datetimepicker/js/DateTimePicker.min.js"></script>
            <script type="text/javascript" src="tmpl_admin/vendors/j_timepicker/js/jquery.timepicker.min.js"></script>
            <!-- end of plugin scripts -->
            <!--Page level scripts-->
            <script type="text/javascript">
                function changeperhari(tgl) {

                    var _idl = '#' + tgl + 'lembur';
                    var _idjl = '#' + tgl + 'jml-lain';
                    var _idt = '#' + tgl + 'tcore';
                    var _idta = '#' + tgl + 'total-per-hari';

                    var total = $(_idt).val();
                    var lembur = $(_idl).val();
                    var jml_lain = $(_idjl).val();
                    var lemburan = $('.lemburan').val();

                    if (isNaN(parseInt(lembur))) {
                        // var lemburnew = lembur * lemburan;
                        var lemburnew = 0;
                    } else {
                        var lemburnew = lembur * lemburan;
                    }

                    if (isNaN(parseInt(jml_lain))) {
                        var jml_lain = 0;
                    }

                    var newtotal = parseInt(lemburnew) + parseInt(jml_lain) + parseInt(total);
                    console.log(newtotal);

                    $(_idta).val(newtotal);
                }

                $('.datepicker1').datepicker({
                    format: "mm-yyyy",
                    viewMode: "months",
                    minViewMode: "months"
                });

                $(document).on("click", "#edit-data", function() {

                    var id = $(this).data('id');
                    $.ajax({
                        type: 'GET',
                        data: {
                            id: id
                        },
                        url: "/karyawan/" + id
                    }).then(function(data) {
                        if (data) {
                            $('.body-edit').html(data);
                            $("#m-edit-data").modal('show');
                        }
                    });
                });

                function deleteConfirmation(id) {
                    swal({
                        title: "Yakin ingin menghapus data ini?",
                        text: "jika terhapus tidak dapat dikembalikan.",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "red",
                        confirmButtonText: "Ya",
                        cancelButtonText: "Tidak",
                    }).then(function(e) {
                        if (e === true) {
                            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                            $.ajax({
                                type: 'DELETE',
                                // method: 'DELETE',
                                url: "/karyawan/" + id,
                                success: function(data) {
                                    if (data.alertdelete === true) {
                                        swal({
                                            title: 'Sukses!',
                                            text: 'Data Berhasil dihapus',
                                            type: 'success'
                                        }).then(function() {
                                            location.reload();
                                        });
                                    } else {
                                        location.reload();
                                    }
                                }
                            })
                        } else {
                            location.reload();
                        }
                    });
                };

            </script>
            <script type="text/javascript" src="/tmpl_admin/js/pages/sweet_alerts.js"></script>
            <script type="text/javascript" src="/tmpl_admin/js/pages/datatable.js"></script>
            <script type="text/javascript" src="/tmpl_admin/js/pages/modals.js"></script>
            <!-- end of global scripts-->
        @endsection
