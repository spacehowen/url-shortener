<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


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

    <link rel="stylesheet" href="./css/styles.css"/>
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

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid justify-content-between">

        <div class="d-flex">

            <a class="navbar-brand me-2 mb-1 d-flex align-items-center" href="url_shortener.php">
                <img
                    src="./img/logo.png"
                    height="20"
                    alt="MDB Logo"
                    loading="lazy"
                    class="me-4"
                    style="margin-top: 2px; width: 40px; height: 40px"
                />

                <?php
                require 'db.php';
                $conn->set_charset("utf8");
                $query = "select * from settings order by id desc;";
                $raw = $conn->query($query);

                while($row = $raw->fetch_assoc()){ ?>
                    <small><?php echo $row['name_web']; ?></small>
                <?php } ?>

            </a>
        </div>

        <ul class="navbar-nav flex-row">

            <li class="nav-item me-3 me-lg-1">
                <a class="nav-link" href="settings.php">
                    <span><i class="fa-solid fa-gear fa-lg"></i></span>
                </a>
            </li>
            <li class="nav-item me-3 me-lg-1">
                <a class="nav-link" href="logout.php">
                    <span><i class="fa-solid fa-person-walking-dashed-line-arrow-right fa-lg"></i></span>
                </a>
            </li>
        </ul>

    </div>
</nav>

<script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"
></script>
<?php include('db.php'); ?>