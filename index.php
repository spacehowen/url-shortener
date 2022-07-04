<?php

ob_start();
if (!isset($_SESSION)) {
    session_start();
}
?>


<?php

if (isset($_SESSION['admin_username']) && isset($_SESSION['admin_password'])) {

    header("Location: url_shortener.php");
}

?>
    <!doctype html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <meta http-equiv="Cache-Control" content="no-cache" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />


        <link
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            rel="stylesheet"
        />

        <link
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
            rel="stylesheet"
        />

        <link
            href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css"
            rel="stylesheet"
        />

        <link rel="stylesheet" href="./css/styles.css?v1"/>
        <link rel="icon" type="image/x-icon" href="./img/logo.png">
        <title>

            <?php
            require 'db.php';
            $conn->set_charset("utf8");
            $query = "select * from settings order by id desc;";
            $raw = $conn->query($query);

            while($row = $raw->fetch_assoc()){ ?>
                <?php echo $row['name_web']; ?>
            <?php } ?>

        </title>
    </head>
    <body>

    <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"
    ></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <?php include('db.php'); ?>

    <div class="container text-center">
        <div class="row">

            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12" id="outPopUp">
                <div class="card text-center">
                    <img src="./img/logo.png" class="card-img-top mx-auto d-block"/>

                    <?php
                    require 'db.php';
                    $conn->set_charset("utf8");
                    $query = "select * from settings order by id desc;";
                    $raw = $conn->query($query);

                    while($row = $raw->fetch_assoc()){ ?>
                        <h5 style="margin-top: 20px; font-weight: bold; color: aliceblue"><?php echo $row['name_web']; ?></h5>
                    <?php } ?>

                    <div class="card-body">

                        <form action="" method="post">
                            <div class="form-group">

                                <input class="form-control" type="text" placeholder="usuario" name="admin_username" id="email_address" required>
                            </div>
                            <br>
                            <div class="form-group">

                                <input class="form-control" type="password" placeholder="contraseña" name="admin_password"
                                       id="password" required>
                            </div>

                            <button class="btn" type="submit" style="margin-top: 20px; font-weight: bold">ENTRAR</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

    </body>
    </html>

<?php if (!empty($_POST['admin_username']) && !empty($_POST['admin_password'])) {

    $admin_username = $_POST['admin_username'];

    require('db.php');


    $sql = "select admin_password,id from settings where admin_username='" . $admin_username . "'";
    $results = $conn->query($sql);

    if ($results->num_rows > 0) {

        $row = $results->fetch_assoc();

        $hash = $row['admin_password'];
        $admin_password = $_POST['admin_password'];

        if (password_verify($admin_password, $hash)) {

            $_SESSION['valid'] = true;
            $_SESSION['admin_username'] = $admin_username;
            $_SESSION['admin_password'] = "success";
            $_SESSION['timeout'] = time();
            $_SESSION['userid'] = $row['id'];

            header('Location: url_shortener.php');
        } else {
            echo "<script>document.getElementById('msg').innerHTML = 'Incorect Password';</script>";
        }


    } else {
        echo "<script>document.getElementById('msg').innerHTML = 'User Doesnot Exists.';</script>";
    }

} ?>