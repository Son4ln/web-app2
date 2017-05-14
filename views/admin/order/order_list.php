<?php include '../views/admin/header.php'; ?>
<?php include '../views/admin/nav.php'; ?>
    <!-- container here -->
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Orders
                            <small>List</small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <div class="alert" id="showMes"></div>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Order Id</th>
                                <th>Họ Tên</th>
                                <th>Ngày đặt hàng</th>
                                <th>Ngày thanh toán</th>
                                <th>Tổng giá</th>
                                <th>Tình trạng</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php
                                $order = new Order();
                                $user = new Users();
                                $data = $order -> getOrder();
                                 foreach ($data as $key) {
                            ?>
                            <tr class="odd gradeX" align="center">
                                <td><?php echo $key['order_id']; ?></td>
                                <td><?php
                                  $userData = $user -> getUserById($key['user_id']);
                                  echo $userData['full_name'];
                                 ?></td>
                                <td><?php echo $key['order_date']; ?></td>
                                <td><?php echo $key['delivery_date']; ?></td>
                                <td><?php echo $key['order_cost']; ?></td>
                                <td><?php
                                  if($key['order_status'] == 1){?>
                                    <a onclick="return delConfirm ('Bạn có chắc muốn chỉnh sửa trạng thái');" href="?action=updateStatus&id=<?php echo $key['order_id']; ?>&status=0"><b'>Đã nhận hàng</b></a>
                                  <?php }else{ ?>
                                    <a onclick="return delConfirm ('Bạn có chắc muốn chỉnh sửa trạng thái');" href="?action=updateStatus&id=<?php echo $key['order_id']; ?>&status=1"><b style="color: red">Chưa nhận hàng</b></a>
                                  <?php } ?></td>
                                <td>
                                <i class="fa fa-truck  fa-fw" ></i><a onclick="return delConfirm ('Giao hàng ?');" href="?action=shipping&id=<?php echo $key['order_id']; ?>"> Ship</a>
                                 |
                                <i class="fa fa-table fa-fw"></i> <a href="?action=orderDetail&id=<?php echo $key['order_id']; ?>">Detail</a> |
                                <i class="fa fa-trash-o  fa-fw" ></i><a onclick="return delConfirm ('Bạn có chắc muốn xóa hóa đơn này');" href="?action=orderDel&id=<?php echo $key['order_id']; ?>"> Delete</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    <!-- end container -->
<?php include '../views/admin/footer.php'; ?>
