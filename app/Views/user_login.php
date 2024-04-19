<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>public/assets/css/login.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>public/assets/css/userlog.css">
    <script defer type="text/javascript" src="<?=base_url();?>public/assets/js/userlog.js"></script>
    <title>Login | E-Matrimony</title>
</head>

<body>
    <?php
        if (isset($validation)) {
            echo $validation->listErrors();
        }
        if(isset($login))
        {
            if($login == false)
                echo "<script>alert('Wrong Username or Password')</script>";
        }
    ?>
    <?= view('header'); ?>
    <br><br>
    <div class="logfrm container">
        <div class="row">
            <div class="col-12">
                <div class="card cdlog">
                    <h5 class="card-title text-center" >Please Login to continue</h5>
                    <div class="card-body">
                        <form id="form" action="<?= base_url();?>/login" method="post" novalidate>
                            <div class="row">
                                <div class="col">
                                    <label class="frmlbl" for="uname">Username</label>
                                    <input name="uname" type="text" class="form-control frminp" placeholder="user123"
                                        id="uname" required>
                                    <div class="error"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="frmlbl" for="pwd">Password</label>
                                    <input name="pwd" type="password" class="form-control frminp" placeholder="**********"
                                        id="pwd" required>
                                    <div class="error"></div>
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col">
                                    <input name="login" value="Login" type="submit" class="btn btn-outline-dark frmlbl btnr">
                                </div>
                            </div>
                        </form>
                        <br>
                        <div class="text-center">
                            New User? <a class="crtAcc" href="<?= base_url();?>register">Create Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= view('footer'); ?>
</body>

</html>