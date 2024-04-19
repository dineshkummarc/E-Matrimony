<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/assets/css/nav.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/assets/css/main_cont.css">
    <script defer type="text/javascript" src="<?= base_url(); ?>public/assets/js/bootstrap.bundle.min.js"></script>
    <title>E-Matrimony | Matched Profile</title>
</head>

<body>
    <?php
    $data = [];
    $data['name'] = $user[0]['name'];
    ?>
    <?= view('nav', $data); ?>
    <div class="main-cont">
        <div class="row">
            <h1>Matched Profile</h1>
            <div class="col-12 col-lg-4"></div>
            <div class="col-12 col-lg-4">
                <div class="card cd">
                    <img src="<?= base_url(); ?>public/assets/images/<?= $profile[0]['uname'] ?>.jpg"
                        class="card-img-top cimg" alt="...">
                    <div class="card-body cbdy">
                        <h5 class="card-title">Name:
                            <?= $profile[0]['name'] ?>
                        </h5>
                        <h5 class="card-title">Profession:
                            <?= $profile[0]['job'] ?>
                        </h5>
                        <h5 class="card-title">Religion:
                            <?= $profile[0]['religion'] ?>
                        </h5>
                         <h5 class="card-title cn">Mob no:
                            <?= $profile[0]['mobno'] ?>
                        </h5>
                        <h5 class="card-title cn">Email:
                            <?= $profile[0]['email'] ?>
                        </h5>
                        <h5 class="card-title cn">Address:
                            <?= $profile[0]['address'] ?>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4"></div>
        </div>
    </div>
</body>

</html>