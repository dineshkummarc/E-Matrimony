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
    <title>E-Matrimony | Sent Requests</title>
</head>

<body>
    <?php
    $data = [];
    $data['name'] = $user[0]['name'];
    ?>
    <?= view('nav', $data); ?>
    <div class="main-cont">
        <div class="row">
            <?php
            $i = 1;
            try {
                if (isset($profiles))
                    echo "<h1>Sent Requests</h1>";
                foreach ($profiles as $prof):
                    ?>
                    <div class="col-12 col-lg-4">
                        <div class="card cd crdrow">
                            <img src="<?= base_url(); ?>public/assets/images/<?= $prof['uname'] ?>.jpg"
                                class="card-img-top cimg" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Name:
                                    <?= $prof['name'] ?>
                                </h5>
                                <h5 class="card-title">Profession:
                                    <?= $prof['job'] ?>
                                </h5>
                                <h5 class="card-title">Religion:
                                    <?= $prof['religion'] ?>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <?php $i += 1; endforeach;
            } catch (\Exception $e) {
                echo "<h2>OOPS! Nothing Found</h2>";
            }
            ?>
        </div>
    </div>
</body>

</html>