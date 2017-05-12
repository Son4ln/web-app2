<?php include '../views/admin/header.php'; ?>
<?php include '../views/admin/nav.php'; ?>
    <!-- container here -->
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Certificate
                            <small>Edit</small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <?php echo $alert; ?>
                    </div>
                    <!-- /.col-lg-12 -->

                    <?php
                        $certif = new Certificates();
                        $data = $certif -> getCertificateById($id);
                     ?>
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="?action=certifEditAction" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input class="form-control" type="hidden" value="<?php echo $data['certificate_id']; ?>" name="certifId" />
                            <label>Tên Chứng nhận</label>
                            <input class="form-control" value="<?php echo $data['certificate_name']; ?>" name="certifName" />
                        </div>
                        <div class="form-group">
                            <label>Ảnh cũ</label>
                            <img src="public/client/images/certificates/<?php echo $data['certificate_image']; ?>" width="150px">
                            <input class="form-control" type="hidden" value="<?php echo $data['certificate_image']; ?>" name="oldImg" />
                        </div>
                        <div class="form-group">
                            <label>Hình Ảnh</label>
                            <input class="form-control" name="certifImg" type="file" />
                        </div>
                        <button type="submit" class="btn btn-primary">Sửa Chứng nhận</button>
                        <a onclick="goback()" class="btn btn-default">Cancel</a>
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

