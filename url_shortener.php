<?php
session_start();
if ($_SESSION["userid"] != true) {
    echo 'not logged in';
    header("Location: index.php");
}
?>
<?php
include 'shortener.php';
include "header.php";
?>

<div class="container" style="margin-top: 20px">

    <div class="row">

        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 text-center">

            <form action="" method="POST" autocomplete="off" class="add_question_form">

                <input type="url" name="url" placeholder="url" class="form-control" <?php if (isset($url)) { ?> value = <?php echo $url?> <?php } ?>required>
                <br>
                <button class="btn" name="create"><span><i class="fa-solid fa-link fa-lg"></i></span> ACORTAR ENLACE</button>

            </form>

            <?php if (isset($report)) {

                if ($report == 'success') {

                    ?>

                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 text-center" style="margin-top: 20px">

                        <input type="text" class="form-control" value="<?php echo $shareurl?>" id="shareurl" readonly>
                        <br>
                        <button class="btn" onclick="share()"><span><i class="fa-solid fa-copy fa-lg"></i></span> COPIAR ENLACE</button>

                    </div>

                <?php } else{ ?>

                    <div class="">

                        Encontrado con algún error interno.

                    </div>

                <?php } }?>

        </div>

        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 table-responsive-xxl text-center" style="margin-top: 50px">

            <table class="table" id="table">

                <thead class="table-dark">
                <tr>
                    <td scope="col">Alias</td>
                    <td scope="col">Url Acortado</td>
                    <td scope="col">Vistas</td>
                    <td scope="col">Usuario IP</td>
                    <td scope="col">Creado</td>
                    <td scope="col">Eliminar</td>
                </tr>
                </thead>
                <tbody>
                <?php

                $select = 'SELECT alias, longurl, views, userip, created FROM urls';

                $statement = $conn -> prepare($select);
                $statement -> execute();
                $result = $statement -> get_result();
                $rows = 0;

                while ($row = $result -> fetch_assoc()) {

                    $rows++;
                    $alias = $row['alias'];
                    $views = $row['views'];
                    $longurl = $row['longurl'];
                    $userip = $row['userip'];
                    $created = $row['created'];

                    ?>

                    <tr>
                        <td id="alias"><?php echo $alias?></td>
                        <td><?php echo $longurl?></td>
                        <td><?php echo $views?></td>
                        <td id="userip"><?php echo $userip?></td>
                        <td id="created"><?php echo date('F j, Y',$created)?></td>
                        <td>
                            <a href="delete.php?alias=<?php echo $alias?>" class="btn"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>

                    <?php

                }

                ?>

                </tbody>
            </table>

        </div>

        <script type="text/javascript" src="js/script.js"></script>
        <script type="text/javascript">
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
        </script>

    </div>

</div>
