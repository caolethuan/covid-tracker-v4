<?php
include('../conn.php');

?>

<style>
    tbody td a:first-child {

        background-color: #0F90F2;
        color: #fff;
        text-decoration: none;
        border: 1px solid #0F90F2;
        transition: 0.3s;
    }

    tbody td a:nth-child(2) {

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

    tbody td:nth-child(7) {
        text-align: center;
        line-height: 50px;
    }

    .custom {
        padding: 5px 10px;
        border-radius: 5px;

    }
</style>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        DANH SÁCH SẢN PHẨM
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Mô tả</th>
                    <th>Giá</th>
                    <th>Loại sản phẩm</th>
                    <th>
                        Cập nhật
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php

                // $productquery = "SELECT * FROM `product`";
                $namecat_sl = "SELECT * FROM `category`,`product` WHERE `category`.cat_id = `product`.cat_id";
                $result2 = mysqli_query($connect, $namecat_sl);
                while ($row = mysqli_fetch_array($result2)) { ?>

                    <tr>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["name"] ?></td>
                        <td><img style="width:50px; height:50px;" src="../upload/<?php echo $row["image"] ?>"></td>
                        <td><?php echo $row["description"] ?></td>
                        <td><?php echo $row["price"] ?></td>
                        <td><?php echo $row["cat_name"] ?></td>
                        <td style="width: 15%;">
                            <a class="custom" href="?module=addproduct&id=<?php echo $row["id"] ?>" name="update"><i class="fas fa-edit"></i></a>
                            <a class="custom" href="?module=deleteproduct&id=<?php echo $row["id"] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" name="remove"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php }
                ?>
            </tbody>
    </div>
</div>