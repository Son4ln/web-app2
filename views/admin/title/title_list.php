<?php include '../views/admin/header.php'; ?>
<?php include '../views/admin/nav.php'; ?>
    <!-- container here -->
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Title
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
                                <th>ID</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $count = 0;
                                $title = new Titles();
                                $data = $title -> getTitles();
                                if(empty($data)){}else{
                                foreach ($data as $key) {

                            ?>
                            <tr class="odd gradeX" align="center">
                                <td><?php echo $key['title_id']; ?></td>
                                <td><?php echo $key['title_name']; ?></td>
                                <td><?php
                                  if($key['show_hide'] == 0){?>

                                    <a href='?action=updateTitleStatus&id=<?php echo $key['title_id']; ?>&status=1'>Hide</a>

                                 <?php }else{ ?>

                                    <a style='color:red' href='?action=updateTitleStatus&id=<?php echo $key['title_id']; ?>&status=0'>Show</a>

                                <?php } ?></td>

                                <td class="center">
                                <?php
                                    $count++;
                                    if($count > 3){ ?>
                                       <i class="fa fa-trash-o  fa-fw"></i><a onclick="return delConfirm('Bạn có chắc muốn xóa title này')" href="?action=delTitle&id=<?php echo $key['title_id']; ?>"> Delete</a>

                                        | <i class="fa fa-pencil fa-fw"></i> <a href="?action=editTitle&id=<?php echo $key['title_id']; ?>">Edit</a> |

                                       <i class="fa fa-trash-o  fa-fw"></i><a href="?action=addProductToTitle&id=<?php echo $key['title_id']; ?>"> Add Product</a>

                                        | <i class="fa fa-pencil fa-fw"></i> <a href="?action=showListProduct&id=<?php echo $key['title_id']; ?>">Show List Products</a>

                                   <?php }else{ ?>
                                        Không thể thao tác
                                   <?php } ?>
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
