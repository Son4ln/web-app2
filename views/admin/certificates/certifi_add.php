<?php include '../views/admin/header.php'; ?>
<?php include '../views/admin/nav.php'; ?>
    <!-- container here -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Certificate
                        <small>Add</small>
                    </h1>
                </div>
                <div class="col-lg-12">
                    <?php echo $alert; ?>
                </div>
                <div class="col-lg-7">
                    <div style="display: none;" id="alert-mes" class="alert alert-danger"></div>
                </div>
                    <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="?action=certifAddAction" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Tên Chứng nhận</label>
                            <input class="form-control" id="certifName" name="certifName" placeholder="Nhập tên chứng nhận" />
                        </div>
                        <div class="form-group">
                            <label>Hình Ảnh</label>
                            <input class="form-control" id="certifImg" name="certifImg" type="file" placeholder="Please Enter Category Keywords" />
                        </div>
                        <button type="submit" onclick="return validCertif()" name="brandUpload" class="btn btn-primary">Thêm Chứng nhận</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    <form>
                </div>
            </div>
                <!-- /.row -->
        </div>
            <!-- /.container-fluid -->
    </div>
        <!-- /#page-wrapper -->

    <!-- end container -->
<?php include '../views/admin/footer.php'; ?>

