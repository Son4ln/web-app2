<?php include '../views/admin/header.php'; ?>
<?php include '../views/admin/nav.php'; ?>
    <!-- container here -->
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Feature
                            <small>Edit</small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <?php echo $alert; ?>
                    </div>
                    <!-- /.col-lg-12 -->

                    <?php
                        $feature = new Features();
                        $data = $feature -> getFeatureById($id);
                     ?>
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="?action=editFeatureAction" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input class="form-control" type="hidden" value="<?php echo $data['feature_id']; ?>" name="fId" />
                            <label>Tên Feature</label>
                            <input class="form-control" value="<?php echo $data['feature_name']; ?>" name="fName" />
                        </div>
                        <button type="submit" class="btn btn-primary">Sửa Feature</button>
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

