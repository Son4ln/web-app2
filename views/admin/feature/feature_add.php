<?php include '../views/admin/header.php'; ?>
<?php include '../views/admin/nav.php'; ?>
    <!-- container here -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Feature
                        <small>Add</small>
                    </h1>
                </div>
                <div class="col-lg-12">
                    <div style="display: none;" id="alert-mes" class="alert alert-danger"></div>
                </div>
                <div class="col-lg-12">
                    <?php echo $alert; ?>
                </div>
                    <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="?action=addFeatureAction" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Tên Feature</label>
                            <input class="form-control" name="fName" id="fName" />
                        </div>
                        <button type="submit" onclick="return validFeature();" class="btn btn-primary">Thêm Feature</button>
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

