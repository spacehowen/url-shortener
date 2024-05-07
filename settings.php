<?php
include "header.php"
?>
<?php
session_start();
if ($_SESSION["userid"] != true) {
    echo 'not logged in';
    header("Location: index.php");
}
?>
<?php require('db.php');
if (isset($_SESSION['userid'])) {
    $query = "select * from settings where id=" . $_SESSION['userid'];
    $rData = $conn->query($query);
    $data = $rData->fetch_assoc();
}
?>
<?php
require('db.php');
if (isset($_POST['admin_username']) && isset($_POST['admin_new_username'])) {
    if ($_POST['admin_username'] == $data['admin_username']) {

        $admin_new_username = $_POST['admin_new_username'];

        $check = "SELECT * FROM settings WHERE admin_username='" . $admin_new_username . "'";
        $results = $conn->query($check);

        if ($results->num_rows > 0) {
            echo "<script>alert('Username Already Exists.');</script>";
        } else {

            $sql = "update settings set admin_username='" . $admin_new_username . "'";
            if ($conn->query($sql) === true) {
                echo "<script>alert('Actualizado.'); location.href = 'settings.php';</script>";
            } else {
                echo $sql . " -> " . $conn->error;
            }
        }
    } else {
        echo "<script>alert('Username Not Found.');</script>";
    }
}

if (isset($_POST['admin_password']) && isset($_POST['admin_new_password'])) {

    $hash = $data['admin_password'];
    $admin_password = $_POST['admin_password'];
    $admin_new_password = $_POST['admin_new_password'];

    if (password_verify($admin_password, $hash)) {

        $admin_new_passwordHash = password_hash($admin_new_password, PASSWORD_DEFAULT);

        $sql = "update settings set admin_password='" . $admin_new_passwordHash . "'";
        if ($conn->query($sql) === true) {
            echo "<script>alert('Actualizado.'); location.href = 'settings.php';</script>";
        } else {
            echo $sql . " -> " . $conn->error;
        }

    } else {
        echo "<script>alert('Password Do Not Match.');</script>";
    }
}

if(isset($_POST['ads_banner']) && isset($_POST['ads_new_banner'])){
    if($_POST['ads_banner'] == $data['ads_banner']){

        $ads_new_banner = $_POST['ads_new_banner'];

        $check = "SELECT * FROM settings WHERE ads_banner='".$ads_new_banner."'";


        $sql = "update settings set ads_banner='".$ads_new_banner."'";
        if($conn->query($sql) === true){
            echo "<script>alert('Actualizado.'); location.href = 'settings.php';</script>";
        }else {
            echo $sql." -> ".$conn->error;
        }

    }
}

if(isset($_POST['ads_intersticial']) && isset($_POST['ads_new_intersticial'])){
    if($_POST['ads_intersticial'] == $data['ads_intersticial']){

        $ads_new_intersticial = $_POST['ads_new_intersticial'];

        $check = "SELECT * FROM settings WHERE ads_intersticial='".$ads_new_intersticial."'";


        $sql = "update settings set ads_intersticial='".$ads_new_intersticial."'";
        if($conn->query($sql) === true){
            echo "<script>alert('Actualizado.'); location.href = 'settings.php';</script>";
        }else {
            echo $sql." -> ".$conn->error;
        }

    }
}

if(isset($_POST['name_web']) && isset($_POST['name_new_web'])){
    if($_POST['name_web'] == $data['name_web']){

        $name_new_web = $_POST['name_new_web'];

        $check = "SELECT * FROM settings WHERE name_web='".$name_new_web."'";


        $sql = "update settings set name_web='".$name_new_web."'";
        if($conn->query($sql) === true){
            echo "<script>alert('Actualizado.'); location.href = 'settings.php';</script>";
        }else {
            echo $sql." -> ".$conn->error;
        }

    }
}

?>

<div class="container" style="margin-top: 20px">
    <div class="row">

        <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-12 col-sm-12">

            <p style="margin-bottom: 20px; color: aliceblue; font-weight: bold; font-size: 15.5px">CAMBIAR NOMBRE DE LA WEB:</p>

            <form class="add_question_form" method="post">

                <input type="text" name="name_web" placeholder="nombre actual" required value="<?php echo $data['name_web']; ?>" class="form-control" style="margin-bottom: 20px" >

                <input type="text" name="name_new_web" placeholder="nuevo nombre" required class="form-control" style="margin-bottom: 20px">

                <input class="btn" type="submit" name="submit" value="Guardar" style="margin-bottom: 20px">
            </form>
        </div>

        <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-12 col-sm-12">

            <p style="margin-bottom: 20px; color: aliceblue; font-weight: bold; font-size: 15.5px">CAMBIAR USUARIO:</p>

            <form class="add_question_form" method="post">

                <input type="text" name="admin_username" placeholder="usuario actual" required value="<?php echo $data['admin_username']; ?>" class="form-control" style="margin-bottom: 20px">

                <input type="text" name="admin_new_username" placeholder="nuevo usuario" required class="form-control" style="margin-bottom: 20px">

                <input class="btn" type="submit" name="submit" value="Guardar" style="margin-bottom: 20px">

            </form>
        </div>

        <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-12 col-sm-12">

            <p style="margin-bottom: 20px; color: aliceblue; font-weight: bold; font-size: 15.5px">CAMBIAR CONTRASEÑA:</p>

            <form class="add_question_form" method="post">

                <input type="password" name="admin_password" placeholder="contraseña actual"  required class="form-control" style="margin-bottom: 20px">

                <input type="password" name="admin_new_password" placeholder="nueva contraseña" required class="form-control" style="margin-bottom: 20px">

                <input class="btn" type="submit" name="submit" value="Guardar" style="margin-bottom: 20px">
            </form>
        </div>

        <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-12 col-sm-12">

            <p style="margin-bottom: 20px; color: aliceblue; font-weight: bold; font-size: 15.5px">CAMBIAR BANNER ADS:</p>

            <form class="add_question_form" method="post">

                <textarea rows="1" name="ads_banner" style="width: 100%; border-radius: 5px; margin-bottom: 20px"><?php echo $data['ads_banner']; ?></textarea>

                <input type="text" name="ads_new_banner" placeholder="nuevo banner" required class="form-control" style="margin-bottom: 20px">

                <input class="btn" type="submit" name="submit" value="Guardar" style="margin-bottom: 20px">
            </form>
        </div>

        <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-12 col-sm-12">

            <p style="margin-bottom: 20px; color: aliceblue; font-weight: bold; font-size: 15.5px">CAMBIAR INTERSTICIAL ADS:</p>

            <form class="add_question_form" method="post">

                <textarea rows="1" name="ads_intersticial" style="width: 100%; border-radius: 5px; margin-bottom: 20px"><?php echo $data['ads_intersticial']; ?></textarea>

                <input type="text" name="ads_new_intersticial" placeholder="nuevo intersticial" required class="form-control" style="margin-bottom: 20px">

                <input class="btn" type="submit" name="submit" value="Guardar" style="margin-bottom: 20px">
            </form>
        </div>


    </div>
</div>

</body>
</html>