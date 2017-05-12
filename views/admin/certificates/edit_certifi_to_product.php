<?php include '../views/admin/header.php'; ?>
<?php include '../views/admin/nav.php'; ?>
    <!-- container here -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Certificate to Products
                        <small>Edit</small>
                    </h1>
                </div>
                <div class="col-lg-12">
                    <div class="alert" id="showMes"></div>
                </div>
                <div class="col-lg-12">
                    <?php echo $alert; ?>
                </div>
                    <!-- /.col-lg-12 -->
                <?php
                  $certif = new Certificates();
                  $data = $certif -> getCertificates();
                  $certifAndProduct = $certif -> getCertificatesAndProductsById($id);
                ?>
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="?action=certificateAndProductEditAction" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Tên Chứng nhận</label>
                            <input type="hidden" name="showId" value="<?php echo $certifAndProduct['show_id'] ?>">
                            <select class="form-control" name="certifId">
                                <?php foreach ($data as $key) {
                                 ?>
                                    <option value="<?php echo $key['certificate_id'] ?>"
                                    <?php selected($key['certificate_id'],$certifAndProduct['certificate_id']); ?>
                                    >
                                        <?php echo $key['certificate_name'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Sản Phẩm</label>
                            <!-- <select class="form-control">
                                <option></option>
                            </select> -->
                            <input type="text" class="form-control" data-toggle="modal" data-target="#myModal" id="selectPro" name="prodId" value="<?php echo $certifAndProduct['product_id']; ?>" readonly="readonly">

                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Chọn sản phẩm</button>
                        </div>
                        <button type="submit" name="brandUpload" class="btn btn-primary">Sửa Chứng nhận</button>
                        <a onclick="goback()" class="btn btn-default">Cancel</a>
                    <form>
                </div>
            </div>
                <!-- /.row -->
        </div>
            <!-- /.container-fluid -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content" style="width: 800px">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Lựa chọn</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Hình ảnh</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $products = new Products();
                                $data = $products -> getProducts();
                                foreach ($data as $value) {
                            ?>
                            <tr class="odd gradeX" align="center">
                                <td>
                                <input type="radio"
                                onclick="choose<?php echo $value['product_id']; ?>()"
                                name="optradio"
                                id="proId<?php echo $value['product_id']; ?>"
                                value="<?php echo $value['product_id']; ?>"
                                >

                                <script type="text/javascript">
                                    function choose<?php echo $value['product_id']; ?>(){
                                        document.getElementById('selectPro').value = document.getElementById('proId<?php echo $value['product_id']; ?>').value;
                                    }
                                </script>

                                </td>
                                <td><?php echo $value['product_id']; ?></td>
                                <td><?php echo $value['product_name']; ?></td>
                                <td><img src="public/client/images/product/<?php echo $value['product_image']; ?>" height="50"></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>
    </div>
        <!-- /#page-wrapper -->

    <!-- end container -->
<?php include '../views/admin/footer.php'; ?>

