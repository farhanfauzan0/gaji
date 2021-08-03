<div class="col-12 data_tables">
    <!-- BEGIN EXAMPLE1 TABLE PORTLET-->

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
                            <td colspan="3">Total</td>
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
</div>
<script type="text/javascript" src="tmpl_admin/js/pluginjs/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="tmpl_admin/vendors/datatables/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="/tmpl_admin/js/pages/datatable.js"></script>
<script type="text/javascript" src="/tmpl_admin/js/components.js"></script>

<script>

</script>
