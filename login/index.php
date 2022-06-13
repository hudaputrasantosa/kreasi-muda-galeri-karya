<?php
session_start();
include '../inc/config-konek.php';
if (@$_SESSION["user"]) {
    header("location:../?p=beranda");
}
?>
<html>

<head>
    <title>Login | Kreasi Muda BPMPK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="img/logo.png" />
    <link rel="stylesheet" href="css/menu.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/bgimg.css" />
    <link rel="stylesheet" href="css/font.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</head>
<style type="text/css">
    /* HEADER */
    .login-form-header {
        text-align: center;
    }

    .login-form-header img {

        padding: 10px;

    }

    .login-form-header h3 {
        font-weight: lighter;
        font-size: 25px;
        margin: 10px 0;
    }
</style>

<body>

    <div class="background"></div>

    <div class="login-form-container" id="login-form">
        <div class="login-form-content">
            <div class="login-form-header">
                <div class="logo">
                    <img src="img/logo.png" />
                </div>
                <h3>Login</h3>
            </div>
            <form method="post" action="" class="login-form">
                <?php
                if (@$_POST["submit"]) {
                    $user = mysqli_real_escape_string($db, $_POST["username"]);
                    $pass = mysqli_real_escape_string($db, $_POST["password"]);
                    $e = false;
                    if (empty($user) && empty($pass)) {
                        echo "<div class='alert alert-warning'>Username Dan Password Tidak Boleh Kosong</div>";
                        $e = true;
                    } elseif (empty($user)) {
                        echo "<div class='alert alert-warning'>Username Tidak Boleh Kosong</div>";
                        $e = true;
                    } elseif (empty($pass)) {
                        echo "<div class='alert alert-warning'>Password Tidak Boleh Kosong</div>";
                        $e = true;
                    }
                    if ($e == false) {
                        $querylogin = mysqli_query($db, "SELECT*FROM user WHERE user_user='$user' AND pass_user='$pass'");
                        $datalogin = mysqli_fetch_array($querylogin);
                        $beda = $datalogin["user_user"];
                        $ceklogin = mysqli_num_rows($querylogin);
                        if (empty($ceklogin)) {
                            echo "<div class='alert alert-danger'>Username Atau Password Anda Salah !</div>";
                        } else {
                            $_SESSION["user"] = $beda;
                            date_default_timezone_set("Asia/Jakarta");
                            $tanggal_login = date("G:i d/m/Y");
                            mysqli_query($db, "UPDATE user SET tanggal_login_user='$tanggal_login' WHERE user_user='$user'");
                            mysqli_query($db, "UPDATE user SET status_user='Online' WHERE user_user='$user'");
                            $ngepos = @$_GET["post"] . "&id=";
                            $redipos = @$_GET["id"] . "&post_by=";
                            $rekpos = @$_GET["post_by"];
                            $redpos = $ngepos . $redipos . $rekpos;
                            if (isset($ngepos) && isset($redipos) && isset($rekpos)) {
                                header("location:$redpos#komentar");
                            } else {

                                header("location:../?p=beranda");
                            }
                        }
                    }
                }
                ?>
                <div class="input-container">
                    <i class="fa fa-user"></i>
                    <input type="text" class="input" name="username" placeholder="Username" />
                </div>
                <div class="input-container">
                    <i class="fa fa-lock"></i>
                    <input type="password" id="login-password" class="input" name="password" placeholder="Password" />
                    <i id="show-password" class="fa fa-eye"></i>
                </div>

                <input type="submit" name="submit" value="Login" class="button" />

                <a href="../reg.php" class="register">Register</a>
            </form>
            <?php
            $regsql = mysqli_fetch_array(mysqli_query($db, "SELECT*FROM tegar"));
            if ($regsql["izin_reg_tegar"] == 1) {
            ?>
                Belum Daftar ? <a href="../reg.php">Klik Disini </a> Atau Kembali Ke <a href="../?p=beranda">Beranda</a>
            <?php
            } else {
            ?>
                Kembali Ke <a href="../?p=beranda">Beranda</a>
            <?php
            }
            ?>

        </div>
    </div>
</body>

</html>