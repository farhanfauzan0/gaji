
<!DOCTYPE html>

<html>

<head>
    

    <title>Login</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link rel="shortcut icon" href="admin/img/logo1.ico"/>

    <!--Global styles -->

    <link type="text/css" rel="stylesheet" href="admin/css/components.css" />

    <link type="text/css" rel="stylesheet" href="admin/css/custom.css" />

    <!--End of Global styles -->

    <!--Plugin styles-->

    <link type="text/css" rel="stylesheet" href="admin/vendors/bootstrapvalidator/css/bootstrapValidator.min.css"/>

    <link type="text/css" rel="stylesheet" href="admin/vendors/wow/css/animate.css"/>

    <link type="text/css" rel="stylesheet" href="admin/vendors/bootstrap-tagsinput/css/bootstrap-tagsinput.css"/>

    <link type="text/css" rel="stylesheet" href="admin/vendors/sweetalert/css/sweetalert2.min.css"/>

    <link type="text/css" rel="stylesheet" href="admin/css/pages/sweet_alert.css"/>

    <!--End of Plugin styles-->

    <link type="text/css" rel="stylesheet" href="admin/css/pages/login1.css"/>

    <link type="text/css" rel="stylesheet" href="admin/css/pages/portlet.css"/>

    <link type="text/css" rel="stylesheet" href="admin/css/pages/advanced_components.css"/>

    

</head>

<body>

<div class="preloader" style=" position: fixed;

  width: 100%;

  height: 100%;

  top: 0;

  left: 0;

  z-index: 100000;

  backface-visibility: hidden;

  background: #ffffff;

  display: none;">

    <div class="preloader_img" style="width: 200px;

  height: 200px;

  position: absolute;

  left: 48%;

  top: 48%;

  background-position: center;

z-index: 999999">

        <img src="admin/img/loader.gif" style=" width: 50px;" alt="loading...">

    </div>

</div>

<div class="container wow fadeInDown" data-wow-delay="0.5s" data-wow-duration="2s">

    <div class="row">

        <div class="col-lg-8 push-lg-2 col-md-10 push-md-1 col-sm-10 push-sm-1 login_top_bottom">

            <div class="row">

                <div class="col-lg-8 push-lg-2 col-md-10 push-md-1 col-sm-12">

                    <div class="login_logo login_border_radius1">

                        <h3 class="text-center">

                            <img src="admin/img/logow.png" alt="josh logo" class="admire_logo"><span class="text-white"> DUANJAYA &nbsp;<br/>

                                Login</span>

                        </h3>

                    </div>

                    <div class="bg-white login_content login_border_radius">

                        <form action="/loginpost" method="post" class="login_validator">

                            {{csrf_field()}}

                            <div class="form-group">

                                <label for="" class="col-form-label"> Username</label>

                                <div class="input-group">

                                    <span class="input-group-addon input_email"><i

                                            class="fa fa-user text-primary"></i></span>

                                    <input type="text" class="form-control  form-control-md" id="email" name="username" placeholder="Username" autocomplete="off" required>

                                </div>

                            </div>

                            <!--</h3>-->

                            <div class="form-group">

                                <label for="password" class="col-form-label">Password</label>

                                <div class="input-group">

                                    <span class="input-group-addon addon_password"><i

                                            class="fa fa-lock text-primary"></i></span>

                                    <input type="password" class="form-control form-control-md" id="password" name="password" placeholder="Password" autocomplete="off" required >

                                </div>

                            </div>

                            <div class="form-group">

                                <div class="row">

                                    <div class="col-lg-12 col-md-12 col-xs-12">

                                        <input type="submit" value="Log In" class="btn btn-primary btn-block login_button">

                                    </div>

                                </div>

                            </div>

                        </form>

                        <div class="form-group" style="display: @if($regist) block @else none @endif">

                            <label class="col-form-label">Belum ada data user! </label>

                            <a href='register1.html' class="text-primary" data-toggle="modal" data-target="#modal-10"><b>Registrasi</b></a>

                        </div>

                        <div class="modal fade slideExpandUp" id="modal-10" role="dialog" aria-labelledby="Modallabel3dsign">

                            <div class="modal-dialog" role="document">

                                <div class="modal-content ">

                                    <div class="modal-header bg-info ">

                                        <h4 class="modal-title text-white" id="Modallabel3dsign">Registrasi</h4>

                                    </div>

                                    <div class="modal-body">

                                        <div class="row">

                                            <div class="col-md-12">

                                                <form action="/su/create" method="post" class="login_validator">

                                                    {{csrf_field()}}

                                                    <div class="form-group">

                                                        <label for="email" class="col-form-label"> Nama</label>

                                                        <div class="input-group">

                                                            <span class="input-group-addon input_email"><i

                                                                    class="fa fa-user text-primary"></i></span>
                                                                    
                                                            <input type="text" name="level" value="1">

                                                            <input type="text" class="form-control  form-control-md" id="a-nama" name="nama" placeholder="Nama" autocomplete="off" required>

                                                        </div>

                                                    </div>

                                                    <div class="form-group">

                                                        <label for="email" class="col-form-label"> Username</label>

                                                        <div class="input-group">

                                                            <span class="input-group-addon input_email"><i

                                                                    class="fa fa-user-circle-o text-primary"></i></span>

                                                            <input type="text" class="form-control  form-control-md" id="a-username" name="username" placeholder="Username" autocomplete="off" required>

                                                        </div>

                                                    </div>                                        

                                                    <div class="form-group">

                                                        <label for="password" class="col-form-label">Password</label>

                                                        <div class="input-group">

                                                            <span class="input-group-addon addon_password"><i

                                                                    class="fa fa-unlock-alt text-primary"></i></span>

                                                            <input type="password" class="form-control form-control-md" id="a-password" name="password" placeholder="Password" autocomplete="off" required>

                                                        </div>

                                                    </div>

                                                

                                        </div>

                                    </div>

                                    <div class="modal-footer">

                                        <button class="btn btn-info" type="submit">Simpan</button>

                                        </form>

                                        <button class="btn btn-default" data-dismiss="modal">Tutup</button>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>



<!-- global js -->



<script type="text/javascript" src="admin/js/jquery.min.js"></script>

<script type="text/javascript" src="admin/js/tether.min.js"></script>

<script type="text/javascript" src="admin/js/bootstrap.min.js"></script>

<!-- end of global js-->



<!--Plugin js-->

@if(session('alertsukses'))

<script type="text/javascript">

    $(document).ready(function () {

        swal(

            'Sukses!',

            'Data Berhasil disimpan',

            'success'

        )

    });

</script>

@endif



@if(session('alertgagal'))

<script type="text/javascript">

    $(document).ready(function () {

        swal(

            'Gagal!',

            'Username atau Password Salah!',

            'error'

        )

    });

</script>

@endif

<script type="text/javascript" src="admin/vendors/bootstrapvalidator/js/bootstrapValidator.min.js"></script>

<script type="text/javascript" src="admin/vendors/wow/js/wow.min.js"></script>

<script type="text/javascript" src="admin/vendors/sweetalert/js/sweetalert2.min.js"></script>

<!--End of plugin js-->

<script type="text/javascript" src="admin/js/pages/sweet_alerts.js"></script>

<script type="text/javascript" src="admin/js/pages/login1.js"></script>

<script type="text/javascript" src="admin/js/pages/modals.js"></script>



</body>



</html>