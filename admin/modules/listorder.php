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
        background-color: #01CE69;
        color: #fff;
        text-decoration: none;
        border: 1px solid #01CE69;
        transition: 0.3s;
    }

    tbody td a:nth-child(3) {
        padding: 5px;
        background-color: #FF4A52;
        color: #fff;
        text-decoration: none;
        border: 1px solid #FF4A52;
        transition: 0.3s;
    }

    tbody td a:nth-child(2):hover,
    tbody td a:first-child:hover {
        color: #0F90F2;
        background-color: #fff;
    }

    tbody td a:nth-child(3):hover {
        color: #FF4A52;
        background-color: #fff;
    }

    .filterStatus-order,
    .sort-order {
        margin-bottom: 10px;
    }

    .filterStatus-order select,
    .sort-order select {
        height: 35px;
        width: fit-content;
        color: #0B5ED7;
    }
</style>
<div class="card mb-4">
    <?php
    $param = "";
    $orderBy = "";
    $sortParam = "";
    $orderField = isset($_GET['field']) ? $_GET['field'] : "";
    $orderSort = isset($_GET['sort']) ? $_GET['sort'] : "";
    $statusfilter = isset($_GET['set']) ? $_GET['set'] : "";
    //sap xep
    if (!empty($orderField) && !empty($orderSort)) {
        $orderBy = "ORDER BY `order-info`.`" . $orderField . "` " . $orderSort;
        $param .= "field=" . $orderField . "&sort=" . $orderSort . "&";
    }
    //Loc tinh trang

    if (!empty($statusfilter)) {
        $statusCondition = "WHERE status=" . $statusfilter;
        $sortParam = "set=" . $statusfilter . "&";
    }
    ?>
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Danh sách đơn hàng
    </div>
    <div class="card-body">
        <div class="sort-order">
            <label for="">Sắp xếp</label>
            <select onchange="this.options[this.selectedIndex].value && (window.location=this.options[this.selectedIndex].value);">
                <option value="">Sắp xếp theo</option>
                <option <?php if (isset($_GET['sort']) && $_GET['sort'] == "desc") { ?> selected <?php } ?> value="?module=listorder&<?= $sortParam ?>field=date_order&sort=desc">Mới nhất</option>
                <option <?php if (isset($_GET['sort']) && $_GET['sort'] == "asc") { ?> selected <?php } ?> value="?module=listorder&<?= $sortParam ?>field=date_order&sort=asc">Cũ nhất</option>
            </select>
        </div>
        <div class="filterStatus-order">
            <label for="">Lọc</label>
            <select onchange="this.options[this.selectedIndex].value && (window.location=this.options[this.selectedIndex].value);">
                <option <?php if (isset($_GET['set']) && $_GET['set'] == "0") { ?> selected <?php } ?> value="?module=listorder&set=0">Tình trạng</option>
                <option <?php if (isset($_GET['set']) && $_GET['set'] == "1") { ?> selected <?php } ?> value="?module=listorder&set=1">Đang xử lý</option>
                <option <?php if (isset($_GET['set']) && $_GET['set'] == "2") { ?> selected <?php } ?> value="?module=listorder&set=2">Đã xử lý</option>
                <option <?php if (isset($_GET['set']) && $_GET['set'] == "3") { ?> selected <?php } ?> value="?module=listorder&set=3">Đang vận chuyển</option>
                <option <?php if (isset($_GET['set']) && $_GET['set'] == "4") { ?> selected <?php } ?> value="?module=listorder&set=4">Đã giao hàng</option>
                <option <?php if (isset($_GET['set']) && $_GET['set'] == "'0'") { ?> selected <?php } ?> value="?module=listorder&set='0'">Đã hủy</option>
            </select>
        </div>
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên khách hàng</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Ngày đặt hàng</th>
                    <th>Trạng thái</th>
                    <th>Cập nhật</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Tên khách hàng</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Ngày đặt hàng</th>
                    <th>Trạng thái</th>
                    <th>Cập nhật</th>
                </tr>
            </tfoot>
            <tbody>
                <?php
                if ($statusfilter) {
                    $sql_sl = "SELECT * FROM `order-info` " . $statusCondition . " " . $orderBy;
                    $listorder = mysqli_query($connect, $sql_sl);
                } else {
                    $sql_sl = "SELECT * FROM `order-info` " . $orderBy;
                    $listorder = mysqli_query($connect, $sql_sl);
                }
                while ($row = mysqli_fetch_array($listorder)) { ?>

                    <tr>
                        <td><?php echo $row["order_id"] ?></td>
                        <td><?php echo $row["full_name"] ?></td>
                        <td><?php echo $row["email"] ?></td>
                        <td><?php echo $row["phone"] ?></td>
                        <td><?php echo $row["date_order"] ?></td>
                        <td><?php if ($row["status"] == 1) {
                                echo "Đang xử lý";
                            }
                            if ($row["status"] == 2) {
                                echo "Đã xử lý";
                            }
                            if ($row["status"] == 3) {
                                echo "Đang vận chuyển";
                            }
                            if ($row["status"] == 4) {
                                echo "Đã giao hàng";
                            }
                            if ($row["status"] == 0) {
                                echo "Đã hủy";
                            } ?></td>
                        <td>
                            <a href="?module=detailsorder&id=<?php echo $row["order_id"] ?>" name="review"><i class="fas fa-eye"></i></a>
                            <a href="?module=commitOrder&id=<?php echo $row["order_id"] ?>" name="update"><i class="fas fa-pen-square"></i></a>
                            <a href="?module=deleteorder&id=<?php echo $row["order_id"] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" name="remove"><i class="far fa-times-circle"></i></a>
                        </td>
                    </tr>
                <?php }
                ?>
            </tbody>
    </div>
</div>