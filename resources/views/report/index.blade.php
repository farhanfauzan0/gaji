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
    Report
@endsection
@section('logo-judul')
    fa-bars
@endsection
@section('content')
    <div class="inner bg-light lter bg-container">
        <div class="row">
            <div class="col-12" style="padding-bottom: 15px">
                <div class="card">
                    <div class="card-block p-t-25">
                        <div class="row justify-content-left">
                            <div class="col-1">
                                <label style="font-size: 20px">Bulan</label>
                            </div>
                            <div class="col-6">
                                <form method="get" action="{{ route('report.index') }}">
                                    <div class="row">
                                        <div class="col-3">
                                            <input readonly class="datepicker1 form-control form-control-md" name="bln"
                                                required>
                                        </div>

                                        <div class="col-3">
                                            <button class="btn btn-primary" type="submit" id="submit">
                                                <i class="ace-icon fa fa-info bigger-130"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 data_tables">
                <!-- BEGIN EXAMPLE1 TABLE PORTLET-->
                @if (Auth::guard('web')->user()->nama == 'Pembina')
                    <div class="card">
                        <div class="card-header bg-white">
                            <i class="fa fa-database"></i>Report
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
                                            <th>Nama Karyawan</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Jabatan</th>
                                            <th>Gaji Bulanan</th>
                                            <th>Gaji Harian</th>
                                            <th>Lemburan</th>
                                            <th>Operasional</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                            $_jgaji = 0;
                                            $_jharian = 0;
                                            $_jlembur = 0;
                                            $_jlain = 0;
                                        @endphp
                                        @foreach ($data as $datas)
                                            <tr>
                                                <td>{{ $datas['nama'] }}</td>
                                                <td>{{ $datas['jenis_kelamin'] }}</td>
                                                <td>{{ $datas['jabatan'] }}</td>
                                                <td>{{ $datas['gaji_bulan'] }}</td>
                                                <td>{{ $datas['harian'] }}</td>
                                                <td>{{ $datas['lemburan'] }}</td>
                                                <td>{{ $datas['lain'] }}</td>
                                                @php
                                                    $_jgaji += $datas['gaji_bulan'];
                                                    $_jharian += $datas['harian'];
                                                    $_jlembur += $datas['lemburan'];
                                                    $_jlain += $datas['lain'];
                                                @endphp
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td>Total</td>
                                            <td></td>
                                            <td></td>
                                            <td>{{ $_jgaji }}</td>
                                            <td>{{ $_jharian }}</td>
                                            <td>{{ $_jlembur }}</td>
                                            <td>{{ $_jlain }}</td>
                                        </tr>
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
                @endif
                <br>
                <div class="card">
                    <div class="card-header bg-white">
                        <i class="fa fa-database"></i>Grafik
                    </div>
                    <div class="card-block p-t-25">
                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="m-t-25">
                                <div class="pull-sm-right">
                                    <div class="tools pull-sm-right"></div>
                                </div>
                            </div>

                            <canvas id="myChart" width="400" height="400"></canvas>


                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
@section('js')
    <!--  plugin scripts -->
    <script type="text/javascript" src="tmpl_admin/vendors/select2/js/select2.js"></script>
    <script type="text/javascript" src="tmpl_admin/vendors/datatables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="tmpl_admin/js/pluginjs/dataTables.tableTools.js"></script>
    <script type="text/javascript" src="tmpl_admin/vendors/datatables/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="tmpl_admin/vendors/datatables/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="tmpl_admin/js/pluginjs/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="tmpl_admin/vendors/datatables/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="tmpl_admin/vendors/datatables/js/dataTables.rowReorder.min.js"></script>
    <script type="text/javascript" src="tmpl_admin/js/pluginjs/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="tmpl_admin/vendors/datatables/js/dataTables.colReorder.min.js"></script>
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

        $('#submit').click(function(e) {
            e.preventDefault;

            var bulan = $('.datepicker1').val();
            $.ajax({
                type: 'POST',
                data: {
                    bln: bulan
                },
                url: '{{ route('report.post') }}',
            }).then(function(data) {
                $('.datas').html(data);
            });
        });

    </script>
    <script type="text/javascript" src="/tmpl_admin/js/pages/datatable.js"></script>
    <script type="text/javascript" src="/chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($f['jabatan']) !!},
                datasets: [{
                    label: 'Total',
                    data: {!! json_encode($f['total']) !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

    </script>
    <!-- end of global scripts-->
@endsection
