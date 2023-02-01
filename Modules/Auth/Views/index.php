<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title><?= identity()['identity_name'] ?></title>
    
    <!-- page css -->
    <link href="<?= base_url(); ?>/assets/dist/css/pages/login-register-lock.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url(); ?>/assets/dist/css/style.min.css" rel="stylesheet">
    <script>
        var base_url = '<?= base_url(); ?>';
    </script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Loading</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper" class="login-register login-sidebar" style="background-image:url(<?= base_url(); ?>/assets/images/background/login-register.jpg);">
        <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material text-center" id="loginform">
                    <?php if (!empty(identity()['identity_logo_icon'])) { ?>
                        <img width="50%" src="<?= base_url(); ?>/<?= identity()['identity_logo_icon'] ?>" alt="Home" />
                    <?php } ?>
                    <br/>
                    <?php if (!empty(identity()['identity_logo_text'])) { ?>
                        <img width="50%" src="<?= base_url(); ?>/<?= identity()['identity_logo_text'] ?>" alt="Home" />
                    <?php } ?>
                    <div class="form-group m-t-20">
                        <div class="col-xs-12">
                            <input class="form-control" type="email" name="email" required="" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="password" required="" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase btn-rounded" type="submit">Log In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?= base_url(); ?>/assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url(); ?>/assets/node_modules/popper/popper.min.js"></script>
    <script src="<?= base_url(); ?>/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= base_url(); ?>/assets/js/auth.js?v=<?= time(); ?>"></script>
    <script type="text/javascript">
        <?php 
            if(session()->getFlashdata('sweetalert')) {
                echo session()->getFlashdata('sweetalert');
            }
        ?>
    </script>
    <script>
        $(document).ready(function() {
            $(".preloader").fadeOut();
        });
    </script>
</body>

</html>