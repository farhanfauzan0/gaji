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
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                            </button>
                            {{ $message }}
                        </div>
                    @endif
                    <div class="card-header bg-white">
                        <i class="fa fa-database"></i>Data Gaji
                    </div>
                    <div class="card-block p-t-25">

                        <div class="col-sm-12 col-md-12 col-xs-12">

                            <div class="m-t-25">
                                <div class="pull-sm-right">
                                    <div class="tools pull-sm-right"></div>
                                </div>
                            </div>

                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Jabatan</th>
                                        <th>Bulan</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data as $datas)
                                        <tr>
                                            <td>{{ $datas->nama }}</td>
                                            <td>{{ $datas->jenis_kelamin }}</td>
                                            <td>{{ $datas->nama_jabatan }}</td>
                                            <form method="get" action="{{ route('get.detail') }}">
                                                <td>
                                                    <div class="row justify-content-center" style="text-align: center">
                                                        <div class="col-4 align-self-center">
                                                            <input readonly class="datepicker1 form-control form-control-sm"
                                                                name="tanggal" required>
                                                            <input hidden name="id" value="{{ $datas->id }}" required>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td style="text-align: center">
                                                    <div class="hidden-sm hidden-xs" style="text-align: center;">
                                                        <button class="btn btn-primary" type="submit">
                                                            <i class="ace-icon fa fa-info bigger-130"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </form>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

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
