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

    tbody td img {
        width: 100px;
    }

    .details_customer {
        line-height: 30px;
        margin-left: 15px;
        text-align: justify;
        display: flex;
    }

    .details_customer label {
        font-weight: 600;
    }

    .details_customer span {
        color: #0B5ED7;
    }

    .details_customer .editStatus {
        margin-left: 5px;
        padding: 10px;
    }

    .card-header {
        display: flex;
        justify-content: space-between;
    }
</style>
<div class="card mb-4">
    <div class="card-header">
        <div class="title-header">
            <i class="fas fa-table me-1"></i>
            Chi tiết đơn hàng
        </div>

        <div class="back">
            <a href="?module=listorder"><i class="fas fa-reply"></i></a>
        </div>
    </div>
    <?php
    if (isset($_GET["id"])) {
        $sql_order = "SELECT * FROM `order-info` WHERE `order_id` =" . $_GET["id"];
        $order_rsl = mysqli_query($connect, $sql_order);
        $rowdt = mysqli_fetch_array($order_rsl);
    }
    ?>
    <h3 style="padding-left: 15px;">Thông tin đặt hàng</h3>
    <div class="details_customer">
        <div class="column1">
            <label for="">Tên:</label> <span><?= $rowdt["full_name"]; ?></span><br>
            <label for="">Điện thoại:</label> <span><?= $rowdt["phone"]; ?></span><br>
            <label for="">Email:</label> <span><?= $rowdt["email"]; ?></span><br>
            <label for="">Địa chỉ:</label> <span><?= $rowdt["address"]; ?></span><br>
            <label for="">Yêu cầu:</label> <span><?= $rowdt["request"]; ?></span><br>
            <label for="">Ngày đặt hàng:</label> <span><?= $rowdt["date_order"]; ?></span><br>
        </div>
        <div class="column2">
            <label for="">Trạng thái đơn hàng:</label>
            <a class="statusShow" href="#"><?php if ($rowdt["status"] == 1) {
                                                echo  "<a style='background-color: #91ADD3; border-radius: 8px; padding: 5px 10px;
                                                color: #fff; text-decoration: none;'>" . "Đang xử lý" . "</a>";
                                            }
                                            if ($rowdt["status"] == 2) {
                                                echo "<a style='background-color: #1996D7; border-radius: 8px; padding: 5px 10px;
                                                color: #fff; text-decoration: none;'>" . "Đã xử lý" . "</a>";
                                            }
                                            if ($rowdt["status"] == 3) {
                                                echo "<a style='background-color: #FF5801; border-radius: 8px; padding: 5px 10px;
                                                color: #fff; text-decoration: none;'>" . "Đang vận chuyển" . "</a>";
                                            }
                                            if ($rowdt["status"] == 4) {
                                                echo "<a style='background-color: #01CE69; border-radius: 8px; padding: 5px 10px;
                                                color: #fff; text-decoration: none;'>" . "Đã giao hàng" . "</a>";
                                            }
                                            if ($rowdt["status"] == 0) {
                                                echo "<a style='background-color: #FF4A52; border-radius: 8px; padding: 5px 10px;
                                                color: #fff; text-decoration: none;'>" . "Đã Hủy" . "</a>";
                                            } ?></a><a class="editStatus" href="?module=commitOrder&id=<?php echo $rowdt["order_id"] ?>"><i class="far fa-edit"></i></a><br>
            <label for="">Tổng tiền đơn hàng: </label> <span><?= number_format($rowdt["total"], 0, '', ','); ?> VNĐ</span>
        </div>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Giá đơn hàng</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Giá đơn hàng</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
            </tfoot>
            <tbody>
                <?php
                if (isset($_GET["id"])) {
                    $sql_query = "SELECT * FROM `order-details`, `product` WHERE `order-details`.`id`=`product`.`id` AND `order_id` =" . $_GET["id"];
                    $result = mysqli_query($connect, $sql_query);
                }
                while ($row = mysqli_fetch_array($result)) { ?>

                    <tr>
                        <td><?php echo $row["orderdetail_id"] ?></td>
                        <td><?php echo $row["name"] ?></td>
                        <td><img src="../upload/<?php echo $row["image"] ?>" alt=""></td>
                        <td><?php echo number_format($row["price"], 0, '', ',') ?> VND</td>
                        <td><?php echo $row["quantity"] ?></td>
                        <td><?php echo $row["total"] ?></td>
                    </tr>
                <?php }
                ?>
            </tbody>
    </div>
</div>