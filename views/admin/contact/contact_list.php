<?php include '../views/admin/header.php'; ?>
<?php include '../views/admin/nav.php'; ?>
    <!-- container here -->
    <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Contact from user
                            <small>List</small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <div class="alert" id="showMes"></div>
                    </div>

                    <?php
                        $contact = new contactInfo();
                        $data = $contact -> getContactFromUser ();
                    ?>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên người gửi</th>
                                <th>Địa chỉ</th>
                                <th>Email</th>
                                <th>Ngày gửi</th>
                                <th>Thao Tác</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($data)){} else{ foreach ($data as $key) {
                             ?>
                            <tr class="odd gradeX" align="center">
                                <td><?php echo $key['contact_id']; ?></td>
                                <td><?php echo $key['full_name']; ?></td>
                                <td><?php echo $key['contact_address']; ?></td>
                                <td><?php echo $key['sender_email']; ?></td>
                                <td><?php echo $key['sent_date']; ?></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return delConfirm('Bạn có chắc muốn xóa liên hệ này')" href="?action=delContactFromUser&id=<?php echo $key['contact_id']; ?>"> Delete</a></td>
                            </tr>
                            <?php } }?>
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