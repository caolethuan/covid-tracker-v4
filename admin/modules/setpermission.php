<?php
ob_start();
include('../conn.php');
if (!empty($_GET["id"])) {
    if (isset($_POST['set'])) {
        $role = isset($_POST["role"]) ? 1 : 0;
        $sql_set = "UPDATE `user` SET `role`='$role' WHERE `user_id`=" . $_GET["id"];
        mysqli_query($connect, $sql_set) or die("Lỗi cấp quyền!");
        header('Location: index.php?module=listaccount');
    }
}
?>

<link href="../css/styles.css" rel="stylesheet" />
<div class="container-addcategory">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="box-form">
                <form action="" method="POST">
                    <div class="form-group">
                        <div class="boxheader">
                            <label for="">Cấp quyền</label>
                        </div>
                        <label for="" style="opacity: 0.6;">Tên tài khoản</label><br>
                        <select name="permission" id="permission">
                            <?php
                            $sql_sl = "SELECT * FROM `user` WHERE `user_id`=" . $_GET["id"];
                            $sql_rsl = mysqli_query($connect, $sql_sl);
                            $row = mysqli_fetch_array($sql_rsl);
                            ?>
                            <option value="<?php echo $row["username"] ?>"><?php echo $row["username"] ?></option>
                        </select>
                        <label for="" class="custom-checkbox"><input type="checkbox" class="custom-control-input" name="role" <?php if (isset($row) && $row["role"] == 1) { ?> checked <?php } ?>><span class="custom-control-label">Admin</span></label><br>
                        <input id="setpermission" type="submit" name="set" value="Xác nhận" style="color:#fff; background-color:#0B5ED7; width: 100px; border: 1px solid #0B5ED7;">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>