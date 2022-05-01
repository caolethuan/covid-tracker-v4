<?php
    include('../conn.php');
    if(empty($_GET["id"])){
    if(isset($_POST['addNewCat'])){
        $catName = $_POST["catName"];
        $status = isset($_POST["status"]) ? 1 : 0;
        $sql_insert = "INSERT INTO `category`(cat_name,cat_status,date_create) VALUES('$catName','$status','".date("Y-m-d H:i:s")."') ";
        $addCat = mysqli_query($connect,$sql_insert) or die ("Lỗi thêm mới!");
        header('location: index.php?module=listcategory'); 
    } } else{
        if(isset($_POST['addNewCat'])){
        $catName = $_POST["catName"];
        $status = isset($_POST["status"]) ? 1 : 0;
        $sql_insert = "UPDATE `category` SET `cat_name`='$catName', `cat_status`='$status' WHERE cat_id=".$_GET["id"];
        $addCat = mysqli_query($connect,$sql_insert) or die ("Lỗi cập nhật!");
        header('location: index.php?module=listcategory'); 
        }
    }
?>

<link href="../css/styles.css" rel="stylesheet" />
<div class="container-addcategory">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="box-form" >
                <form action="" method="POST">
                <?php
                    if(isset($_GET["id"])){
                    $sqlsl = "SELECT * FROM `category` WHERE cat_id=".$_GET["id"];
                    $result_sl = mysqli_query($connect,$sqlsl);
                    $row = mysqli_fetch_array($result_sl);
                    }
                ?>
                    <div class="form-group">
                        <div class="boxheader">
                            <label for=""><?=!empty($_GET["id"])?"Sửa danh mục" :"Thêm mới danh mục"?></label>
                        </div>
                        <label for="" style="opacity: 0.6;">Tên danh mục</label><br>
                        <input id="catName" type="text" name="catName" placeholder="Nhập tên danh mục.." value="<?=(!empty($row)? $row["cat_name"]:"")?>"> <br>
                        <label for="" class="custom-checkbox"><input type="checkbox" class="custom-control-input" name="status" <?php if(isset($row) && $row["cat_status"]==1){ ?> checked <?php } ?>><span class="custom-control-label">Trạng thái</span></label><br>
                        <input id="addCat"  type="submit" name="addNewCat" value="<?=!empty($_GET["id"])?"Cập nhật" :"Thêm mới"?>">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>