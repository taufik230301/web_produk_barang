<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Registration Page (v2)</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url();?>assets/admin_lte/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?=base_url();?>assets/admin_lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url();?>assets/admin_lte/dist/css/adminlte.min.css">
    <!-- SweetAlert -->
    <script src="<?= base_url() ?>node_modules/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class="hold-transition register-page">

    <?php if ($this->session->flashdata('eror_password')){ ?>
    <script>
    swal({
        title: "Erorr!",
        text: "Password Tidak sama, Ulangi Registrasi!",
        icon: "error"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror_input')){ ?>
    <script>
    swal({
        title: "Erorr!",
        text: "Data gagal dimasukan!",
        icon: "error"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('input')){ ?>
    <script>
    swal({
        title: "Success!",
        text: "Data berhasil dimasukan!",
        icon: "success"
    });
    </script>
    <?php } ?>

    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Register a new membership</p>

                <form action="<?=base_url();?>Register/proses" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="re_password" class="form-control" placeholder="Retype password"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">

                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>



                <a href="login.html" class="text-center">I already have a membership</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="<?=base_url();?>assets/admin_lte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?=base_url();?>assets/admin_lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url();?>assets/admin_lte/dist/js/adminlte.min.js"></script>
</body>

</html>