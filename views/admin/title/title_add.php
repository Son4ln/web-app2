<?php include '../views/admin/header.php'; ?>
<?php include '../views/admin/nav.php'; ?>
    <!-- container here -->
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Title
                            <small>Add</small>
                        </h1>
                    </div>
                    <div class="col-lg-7">
                        <div style="display: none;" id="alert-mes" class="alert alert-danger"></div>
                    </div>
                    <div class="col-lg-12">
                        <?php echo $alert; ?>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="?action=addTitleAction" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Title Name</label>
                                <input class="form-control" name="tName" id="tName" placeholder="Vui lòng nhập tên title" />
                            </div>
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select class="form-control" name="status">
                                    <option value="0">Hide</option>
                                    <option value="1">Show</option>
                                </select>
                            </div>
                            <button type="submit" onclick="return validTitle()" class="btn btn-primary">Thêm Title</button>
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

