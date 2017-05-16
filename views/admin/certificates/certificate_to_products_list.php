<?php include '../views/admin/header.php'; ?>
<?php include '../views/admin/nav.php'; ?>
    <!-- container here -->
    <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Certificates and Products come with
                            <small>List</small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <div class="alert" id="showMes"></div>
                    </div>

                    <?php
                        $certifi = new Certificates();
                        $data = $certifi -> getCertificatesAndProducts ();
                        $product = new Products();
                        if(empty($data)){
                        }
                    ?>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Tên Chứng Nhận</th>
                                <th>Thao Tác</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php else{ foreach ($data as $key) {
                             ?>
                            <tr class="odd gradeX" align="center">
                                <td><?php echo $key['show_id']; ?></td>
                                <td><?php
                                  $resultProduct = $product -> getProductById($key['product_id']);
                                echo $resultProduct['product_name'];
                                ?></td>
                                <td><?php
                                $result = $certifi -> getCertificateById($key['certificate_id']);
                                echo $result['certificate_name'];
                                ?></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return delConfirm('Bạn có chắc muốn xóa chứng nhận đi kèm với sản phẩm này')" href="?action=certificateAndProductDel&id=<?php echo $key['show_id']; ?>"> Delete</a> | <i class="fa fa-pencil fa-fw"></i> <a href="?action=certificateAndProductEdit&id=<?php echo $key['show_id']; ?>">Edit</a></td>
                            </tr>
                            <?php } } ?>
                            </tbody>
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