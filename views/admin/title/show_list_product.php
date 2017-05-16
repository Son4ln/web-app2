<?php include '../views/admin/header.php'; ?>
<?php include '../views/admin/nav.php'; ?>
    <!-- container here -->
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product on title
                            <small>List</small>
                        </h1>
                        <a style="margin: 0 0 20px 0" href="?action=listTitle" class="btn btn-success">Back to title list</a>
                    </div>
                    <div class="col-lg-12">
                        <div class="alert" id="showMes"></div>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $title = new Titles();
                                $data = $title -> showProductListByTitleId($id);
                                if(empty($data)){}else{
                                foreach ($data as $key) {

                            ?>
                            <tr class="odd gradeX" align="center">
                                <td><?php echo $key['show_title_id']; ?></td>
                                <td><?php
                                  $product = new Products();
                                  $result = $product -> getProductById($key['product_id']);
                                echo $result['product_name'];
                                ?></td>

                                <td class="center">

                                       <i class="fa fa-trash-o  fa-fw"></i><a onclick="return delConfirm('Bạn có chắc muốn xóa sản phẩm này')" href="?action=delProductInTitle&showId=<?php echo $key['show_title_id']; ?>&id=<?php echo $key['title_id']; ?>"> Delete</a>

                                </td>

                            </tr>
                            <?php } } ?>
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
