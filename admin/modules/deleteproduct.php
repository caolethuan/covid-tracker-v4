<?php
    include('../conn.php');

    if(isset($_GET['id'])){   
            
            $sql_dlt ="DELETE FROM `product` WHERE id=".$_GET["id"];
            mysqli_query($connect,$sql_dlt);
            header('location: index.php?module=listproduct'); 
    }
?>