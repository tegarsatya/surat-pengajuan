<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login </title>

    <!-- Bootstrap -->
    <link href="<?= base_url('assets/'); ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url('assets/'); ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url('assets/'); ?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url('assets/'); ?>vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url('assets/'); ?>build/css/custom.min.css" rel="stylesheet">
</head>
<style type="text/css">
    body {
        background: url('<?php echo base_url(); ?>/assets/img/mail1.jpg') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: cover;
    }
</style>

<body>
    <div class="login_wrapper" style="margin-top:10%;">
        <div class="animate form login_form">
            <section class="login_content">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_content">
                                <form action="<?= base_url('auth/index'); ?>" method="post">
                                    <h1>Silahkan Login</h1>

                                    <?php echo $this->session->flashdata('msg'); ?>
                                    <div>
                                        <input type="text" class="form-control" name="username" placeholder="Username" required />
                                    </div>
                                    <div>
                                        <input type="password" class="form-control" name="password" placeholder="Password" required />
                                    </div>
                                    <div style="padding-top:15px;">
                                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>

</html>