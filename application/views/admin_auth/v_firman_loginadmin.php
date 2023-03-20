<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-warning">
    <div class="container">

    <main>
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <!-- Nested Row within Card Body -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                                <div>
                                                    <h3 class="text-center text-muted font-weight-light my-4">Login Administrator</h3>
                                                </div>
                                                <hr>
                                                <div class="card-body">
                                                    <?= $this->session->flashdata('message'); ?>
                                                    <form class="user" method="post" action="<?= base_url('login_admin') ?>">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-user" 
                                                            id="username" name="username" placeholder="Enter Name..">
                                                            <?= form_error('username', '<small class="text-danger pl-3">', 
                                                            '</small>'); ?> 
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="password" class="form-control form-control-user" 
                                                            id="password" name="password" placeholder="Password">
                                                            <?= form_error('password', '<small class="text-danger pl-3">', 
                                                            '</small>'); ?>
                                                        </div>
                                               
                                                        <button type="submit"
                                                        class="btn btn-danger btn-user btn-login col-md-12 ">Login</button>
                                                    </form>
                                                  </div>
                                                    <div class="card-footer text-center py-3">
                                                    <div class="small"> <a>Copyright © UKK-Fireman 2024</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                     </div>
</main>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>assets/js/sb-admin-2.min.js"></script>

</body>

</html>