<?php include '../views/admin/header.php'; ?>
<?php include '../views/admin/nav.php'; ?>
    <!-- container here -->
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Title
                            <small>Edit</small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <?php echo $alert; ?>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="?action=editTitleAction" method="POST" enctype="multipart/form-data">
                            <?php
                                $title = new Titles();
                                $data = $title -> getTitleById($id);
                             ?>
                            <input type="hidden" name="tId" value="<?php echo $data['title_id']; ?>"  class="form-control">
                            <div class="form-group">
                                <label>Title Name</label>
                                <input class="form-control" name="tName" value="<?php echo $data['title_name']; ?>"/>
                            </div>
                            <button type="submit" class="btn btn-primary">Sửa title</button>
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
