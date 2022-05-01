<?php
include('../conn.php');
?>
<style>
    tbody td a {
        display: block;
        margin: 5px;
        text-align: center;
    }

    tbody td a:first-child {
        padding: 5px;
        background-color: #0F90F2;
        color: #fff;
        text-decoration: none;
        border: 1px solid #0F90F2;
        transition: 0.3s;
    }

    tbody td a:nth-child(2) {
        padding: 5px;
        background-color: #FF4A52;
        color: #fff;
        text-decoration: none;
        border: 1px solid #FF4A52;
        transition: 0.3s;
    }

    tbody td a:first-child:hover {
        color: #0F90F2;
        background-color: #fff;
    }

    tbody td a:nth-child(2):hover {
        color: #FF4A52;
        background-color: #fff;
    }
</style>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Danh sách tài khoản
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên tài khoản</th>
                    <th>Mật khẩu</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Vai trò</th>
                    <th>Ngày tạo</th>
                    <th>Cập nhật</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Tên tài khoản</th>
                    <th>Mật khẩu</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Vai trò</th>
                    <th>Ngày tạo</th>
                    <th>Cập nhật</th>
                </tr>
            </tfoot>
            <tbody>
                <?php
                $sql_sl = "SELECT * FROM `user`";
                $listCat = mysqli_query($connect, $sql_sl);
                while ($row = mysqli_fetch_array($listCat)) { ?>

                    <tr>
                        <td><?php echo $row["user_id"] ?></td>
                        <td><?php echo $row["username"] ?></td>
                        <td><?php echo $row["password"] ?></td>
                        <td><?php echo $row["email"] ?></td>
                        <td><?php echo $row["phone"] ?></td>
                        <td><?php echo $row["role"] ?></td>
                        <td><?php echo $row["date_create_user"] ?></td>
                        
                        <td style="width: 15%;">
                            <a href="?module=setpermission&id=<?php echo $row["user_id"] ?>" name="update"><i class="fas fa-user-cog"></i></a>
                            <a href="?module=deleteaccount&id=<?php echo $row["user_id"] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" name="remove"><i class="far fa-times-circle"></i></a>
                        </td>
                    </tr>
                <?php }
                ?>
            </tbody>
    </div>
</div>