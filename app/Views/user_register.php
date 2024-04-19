<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url(); ?>public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>public/assets/css/login.css">
    <link rel="stylesheet" href="<?= base_url(); ?>public/assets/css/userlog.css">
    <script defer type="text/javascript" src="<?= base_url(); ?>public/assets/js/SimpleImage.js"> </script>
    <script defer type="text/javascript" src="<?= base_url(); ?>public/assets/js/bootstrap.bundle.min.js"></script>
    <script defer type="text/javascript" src="<?= base_url(); ?>public/assets/js/userreg.js"></script>
    <title>Create Account | E-Matrimony</title>
</head>

<body>
    <?php
        if (isset($validation)) {
            if ($validation->hasError('uname')) {
                echo "<script>alert('Username already exists')</script>";
            }
        }
        if (isset($file)) {
            if ($file == true) {
                echo "<script>alert('Invalid File! Please Upload Again')</script>";
            }
        }
        if (isset($unknown)) {
            if ($unknown == true) {
                echo "<script>alert('Unknown error occurred')</script>";
            }
        }
    ?>
    <?= view('header'); ?>
    <div class="container regfrm">
        <div class="card cdr">
            <h5 class="card-title text-center">Registration Form</h5>
            <div class="card-body">
                <form id="form" action="<?= base_url(); ?>/register" method="post" novalidate
                    enctype="multipart/form-data">
                    <div class="row">
                        <div class="col">
                            <label class="frmlbl" for="fname">First Name</label>
                            <input name="fname" type="text" class="form-control frminp" placeholder="Steve" id="fname"
                                required>
                        </div>
                        <div class="error"></div>
                        <div class="col">
                            <label class="frmlbl" for="lname">Last Name</label>
                            <input name="lname" type="text" class="form-control frminp" placeholder="Rogers" id="lname"
                                required>
                        </div>
                        <div class="error"></div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="frmlbl" for="fname">Ph No</label>
                            <input name="phno" type="tel" class="form-control frminp" placeholder="7985484888" id="phno"
                                required>
                            <div class="error"></div>
                        </div>
                        <div class="col">
                            <label class="frmlbl" for="lname">Email ID</label>
                            <input name="eml" type="email" class="form-control frminp" placeholder="steve@example.com"
                                id="eml" required>
                            <div class="error"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="frmlbl" for="gend">Gender</label><br>
                            <select name="gend" id="gend" class="form-control frminp">
                                <option value="none">---</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <div class="error"></div>
                        </div>
                        <div class="col">
                            <label class="frmlbl" for="job">Current Job</label>
                            <input name="job" type="text" class="form-control frminp" placeholder="Bank Manager"
                                id="job" required>
                            <div class="error"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="frmlbl" for="addr1">Address</label>
                            <input name="addr1" type="text" class="form-control frminp"
                                placeholder="Flat No, Building, Area, Landmark" id="addr1" required>
                            <div class="error"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="frmlbl" for="city">Religion</label><br>
                            <select name="religion" id="height" class="form-control frminp">
                                <option value="none">---</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Christian">Christian</option>
                                <option value="Muslim">Muslim</option>
                                <option value="Buddhist">Buddhist</option>
                            </select>
                            <div class="error"></div>
                        </div>
                        <div class="col">
                            <label class="frmlbl" for="uname">Set a Username (only letters & numbers)</label>
                            <input name="uname" type="text" class="form-control frminp" placeholder="abcd123" id="uname"
                                required>
                            <div class="error"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="pswd1" class="frmlbl">Set a Password (Min 8 characters)</label>
                            <input name="pswd1" type="password" class="form-control frminp" id="pswd1" required>
                            <div class="error"></div>
                        </div>
                        <div class="col">
                            <label for="pswd2" class="frmlbl">Confirm Password</label>
                            <input name="pswd2" type="password" class="form-control frminp" id="pswd2" required>
                            <div class="error"></div>
                        </div>
                    </div>
                    <div class="row">
                        <label for="photo" class="frmlbl">Upload your photo (only .jpg files)</label>
                        <canvas id="canv1"></canvas>
                        <input name="photo" type="file" multiple="false" accept="image/*" id="finput"
                            onchange="upload()">
                        <div class="error"></div>
                    </div>
                    <div class="row text-center">
                        <div class="col">
                            <input name="register" value="Create Account" type="submit"
                                class="btn btn-outline-dark frmlbl btnr">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?= view('footer'); ?>

</body>

</html>