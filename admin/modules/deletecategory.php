<?php
include('../conn.php');

if (isset($_GET['id'])) {

    $sql_dlt = "DELETE FROM `category` WHERE cat_id=" . $_GET["id"];
    $rsl = mysqli_query($connect, $sql_dlt);
    if ($rsl) {
        header('location: index.php?module=listcategory');
    } else {
        echo "<script>
            alert('Danh mục này đang chứa sản phẩm, không thể xóa danh mục!');
            window.location.href='index.php?module=listcategory';
            </script>";
    }
}
