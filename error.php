<!DOCTYPE html>
<html>
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
</head>
<body>

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

                    <p class="btn" style="font-weight: bold">404 | Página no encontrada</p>

                </div>
            </div>

        </div>
    </div>
</div>

	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript">
		if ( window.history.replaceState ) {
		  	window.history.replaceState( null, null, window.location.href );
		}
	</script>

</body>
</html>