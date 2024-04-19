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
    <title>E-Matrimony | Dashboard</title>
</head>

<body>
    <?php 
        session_start();
        if(isset($_SESSION['sent']))
        {
            if($_SESSION['sent'] == true){
                echo "<script>alert('Request Successfully Sent')</script>";
                $_SESSION['sent'] = false;
            }
        }
        if (isset($_SESSION['alreadysent'])) {
            if($_SESSION['alreadysent'] == true){
                echo "<script>alert('Request Already Sent')</script>";
                $_SESSION['alreadysent'] = false;
            }
        }
        if (isset($_SESSION['match'])) {
            if($_SESSION['match'] == true){
                echo "<script>alert('Congrats! You have a match')</script>";
                $_SESSION['match'] = false;
            }
        }
        if (isset($_SESSION['alreadymatch'])) {
            if ($_SESSION['alreadymatch'] == true) {
                echo "<script>alert('Profile is already a match')</script>";
                $_SESSION['alreadymatch'] = false;
            }
        }
        if (isset($_SESSION['error'])) {
            if ($_SESSION['error'] == true) {
                echo "<script>alert('Unknown error occurred')</script>";
                $_SESSION['error'] = false;
            }
        }
        $data = [];
        $data['name'] = $user[0]['name'];
    ?>
    <?= view('nav', $data); ?>
    <div class="main-cont">
        <h1>Dashboard</h1>
        <div class="row">
            <?php 
                $i = 1;
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
                            <form action="<?= base_url(); ?>sendreq" name="form<?=$i?>" method="post">
                                <input name="login" value="Send Interest" type="submit"
                                class="btn btn-outline-dark frmlbl btnr">
                                <input type="hidden" name="uname" value="<?=$user[0]['uname']?>">
                                <input type="hidden" name="intuname" value="<?=$prof['uname']?>">
                            </form>
                        </div>
                    </div>
                </div>
                <?php $i+=1;endforeach; ?>
            </div>
    </div>
</body>

</html>