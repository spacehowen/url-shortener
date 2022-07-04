<?php

	include 'db.php';

	if (isset($_POST['continue'])) {

	$alias = htmlspecialchars($_POST['alias']);

	$select = 'SELECT longurl, views FROM urls WHERE alias = ?';

	$statement = $conn -> prepare($select);
	$statement -> bind_param('s', $alias);
	$statement -> execute();
	$result = $statement -> get_result();

	while ($row = $result -> fetch_assoc()) {
					
		$longurl = $row['longurl'];
		$views = $row['views'];
		$views++;

	}

	$update = 'UPDATE urls SET views = ? WHERE alias = ?';
	$statement = $conn -> prepare($update);
	$statement -> bind_param('is', $views, $alias);
	$statement -> execute();

?>

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
<body>
<div class="container-fluid text-center" style="margin-top: 20px">
    <div class="row">

        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12" style="margin-top: 20px">

            <?php
            require 'db.php';
            $conn->set_charset("utf8");
            $query = "select * from settings order by id desc;";
            $raw = $conn->query($query);

            while($row = $raw->fetch_assoc()){ ?>
                <?php echo $row['ads_banner']; ?>
            <?php } ?>

        </div>

        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12">
            <div class="card text-center">
                <img src="./img/logo.png" class="card-img-top mx-auto d-block"/>
                <div class="card-body">
                    <h4 id="countdown" class="timmer-download"></h4>
                    <a href="javascript:void(0)" id="redirection" class="btn">Generando...</a>
                </div>
            </div>

        </div>

        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12" style="margin-top: 20px; margin-bottom: 20px">

            <?php
            require 'db.php';
            $conn->set_charset("utf8");
            $query = "select * from settings order by id desc;";
            $raw = $conn->query($query);

            while($row = $raw->fetch_assoc()){ ?>
                <?php echo $row['ads_banner']; ?>
            <?php } ?>

        </div>


    </div>
</div>

	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript">

		if ( window.history.replaceState ) {
		  	window.history.replaceState( null, null, window.location.href );
		}

        <?php

        $redirecttimer = 25;

        ?>
		document.querySelector('#countdown').innerText = <?php echo $redirecttimer?>;

		var countdown = setInterval(function() {

			var timeleft = document.querySelector('#countdown').textContent;
			if (timeleft == 3) {
				document.querySelector('#redirection').innerHTML = 'Procesando'
			}
			if (timeleft == 0) {
				clearInterval(countdown);
				document.querySelector('#redirection').classList.remove('opacity-60');
				document.querySelector('#redirection').innerText = 'Abrir'
				document.querySelector('#redirection').setAttribute('href', '<?php echo $longurl?>');
			} else{
				document.querySelector('#countdown').innerText = timeleft - 1;
			}
		}, 1000);
		
	</script>

</body>
</html>

<?php

	} else{

	$alias = htmlspecialchars($_GET['alias']);

	$select = 'SELECT alias FROM urls WHERE alias = ?';
	$statement = $conn -> prepare($select);
	$statement -> bind_param('s', $alias);
	$statement -> execute();
	$statement -> store_result();
	$result = $statement -> num_rows;

	if ($result === 0) {
		header('location: error.php');
	}

	$select = 'SELECT longurl, views FROM urls WHERE alias = ?';

	$statement = $conn -> prepare($select);
	$statement -> bind_param('s', $alias);
	$statement -> execute();
	$result = $statement -> get_result();

	while ($row = $result -> fetch_assoc()) {
					
		$longurl = $row['longurl'];
		$views = $row['views'];
		$views++;

	}

	$update = 'UPDATE urls SET views = ? WHERE alias = ?';
	$statement = $conn -> prepare($update);
	$statement -> bind_param('is', $views, $alias);
	$statement -> execute();

?>

 <!-- PRIMER VIEW REDIRECT -->

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
<body>
<div class="container-fluid text-center" style="margin-top: 20px">
    <div class="row">

        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12" style="margin-top: 20px">

            <?php
            require 'db.php';
            $conn->set_charset("utf8");
            $query = "select * from settings order by id desc;";
            $raw = $conn->query($query);

            while($row = $raw->fetch_assoc()){ ?>
                <?php echo $row['ads_banner']; ?>
            <?php } ?>

        </div>

        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12">
            <div class="card text-center">
                <img src="./img/logo.png" class="card-img-top mx-auto d-block"/>
                <div class="card-body">
                    <form action="" method="POST" class="flex justify-center py-40">
                        <input type="text" name="alias" value="<?php echo $alias?>" hidden>
                        <h4 id="myTimer" class="timmer-download"></h4>
                        <button id="myBtn" class="btn btnDisable" name="continue">CLICK PARA CONTINUAR</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12" style="margin-top: 20px; margin-bottom: 20px">

            <?php
            require 'db.php';
            $conn->set_charset("utf8");
            $query = "select * from settings order by id desc;";
            $raw = $conn->query($query);

            while($row = $raw->fetch_assoc()){ ?>
                <?php echo $row['ads_banner']; ?>
            <?php } ?>

        </div>

    </div>
</div>

	<script type="text/javascript">
		if ( window.history.replaceState ) {
		  	window.history.replaceState( null, null, window.location.href );
		}
	</script>


<script>
    var sec = 25;
    var myTimer = document.getElementById('myTimer');
    var myBtn = document.getElementById('myBtn');
    window.onload = countDown;

    myBtn.disabled= true;

    function countDown()
    {
        if (sec < 10) {
            myTimer.innerHTML = "" + sec;
        } else {
            myTimer.innerHTML = sec;
        }
        if (sec <= 0) {
            myBtn.disabled = false;
            return;
        }
        sec -= 1;
        window.setTimeout(countDown, 1000);
    }
</script>

</body>
</html>

<?php  } ?>
