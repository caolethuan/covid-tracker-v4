<?php
// include('../conn.php');
// ob_start();
// session_start();
// if (!isset($_SESSION["login"]) || $_SESSION["login"]["7"] != 1) {
//     header("location: ../login.php");
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="./css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>
<style>

</style>

<body class="sb-nav-fixed">
    <?php
    include('./modules/header.php');
    ?>
    <div id="layoutSidenav">
        <?php
        include('./modules/sidenav.php');
        ?>

        <div id="layoutSidenav_content">
            <div class="container-fluid px-4">
                <?php
                if (isset($_GET["module"])) {
                    $module = $_GET["module"];
                    include('./modules/' . $module . '.php');
                } else {
                    include('./modules/dashboard.php');
                }
                ?>

            </div>
        </div>

    </div>
</body>
<footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="./js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="./js/datatables-simple-demo.js"></script>
</footer>

</html>