<?php include '../views/admin/header.php'; ?>
<?php include '../views/admin/nav.php'; ?>
    <!-- container here -->
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Order
                            <small>Detail</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-9" style="padding-bottom:120px">
                        <?php
                          $order = new Order();
                          $data = $order -> getOrderById($id);
                          $user = new Users();
                          $product = new Products();
                        ?>
                        <h2>Mã Hóa Đơn : <?php echo $data['order_id']; ?></h2>
                        <table>
                            <tbody>
                                <tr>
                                    <td><b>Tên Khách Hàng :</b></td>
                                    <td><?php
                                       $userData = $user -> getUserById($data['user_id']);
                                        echo $userData['full_name'];
                                    ?></td>
                                </tr>
                                <tr>
                                    <td><b>Số điện thoại :</b></td>
                                    <td><?php
                                        echo $userData['phone'];
                                    ?></td>
                                </tr>
                                <tr>
                                    <td><b>Email :</b></td>
                                    <td><?php
                                        echo $userData['email'];
                                    ?></td>
                                </tr>
                                <tr>
                                    <td><b>Địa chỉ giao hàng :</b></td>
                                    <td><?php
                                        echo $userData['address'];
                                    ?></td>
                                </tr>
                                <tr>
                                    <td><b>Ngày Đặt Hàng :</b></td>
                                    <td><?php echo $data['order_date']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Ngày Thanh Toán :</b></td>
                                    <td><?php echo $data['delivery_date']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Tổng Tiền :</b></td>
                                    <td><?php echo $data['order_cost']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Trạng Thái :</b></td>
                                    <td><?php
                                        if($data['order_status'] == 1)
                                            echo "Đã giao hàng";
                                        else
                                            echo "<b style='color:red;'>Chưa giao hàng</b>";
                                    ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <h2>Sản phẩm</h2>
                        <table class="table table-striped table-bordered table-hover">
                            <?php
                                $detail = $order -> getOrderDetailByOrderId($data['order_id']);
                            ?>
                            <thead>
                                <tr>
                                    <td>Sản phẩm</td>
                                    <td>Số lượng</td>
                                    <td>Giá</td>
                                    <td>Giá giảm</td>
                                    <td>Tổng</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($detail as $key) {
                                 ?>
                                <tr>
                                    <td><?php
                                        $getName = $product -> getProductById($key['product_id']);
                                        echo $getName['product_name'];
                                    ?></td>
                                    <td><?php echo $key['order_quantity']; ?></td>
                                    <td><?php echo $key['product_price']; ?></td>
                                    <td><?php echo $key['product_discount']; ?></td>
                                    <td><?php echo $key['total']; ?></td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan="3">Tổng Hóa Đơn</td>
                                    <td colspan="2" align="center"><?php
                                        echo $data['order_cost'];
                                    ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    <!-- end container -->
<?php include '../views/admin/footer.php'; ?>
