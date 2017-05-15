<?php include '../views/admin/header.php'; ?>
<?php include '../views/admin/nav.php'; ?>
    <!-- container here -->
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="?action=userAddAction" method="POST" enctype="multipart/form-data">
                            <?php echo $alert ?>
                            <div class="form-group">
                                <label>Họ Và Tên (*)</label>
                                <input class="form-control" id="txtFullName" name="txtFullName" placeholder="Nhập họ và tên" />
                                <p style="color: red"><i id="alertFullName"></i></p>
                            </div>
                            <div class="form-group">
                                <label>Username (*)</label>
                                <input class="form-control" id="txtUser" name="txtUser" placeholder="Nhập Username" />
                                <p style="color: red"><i id="alertUser"></i></p>
                            </div>
                            <div class="form-group">
                                <label>Password (*)</label>
                                <input type="password" id="txtPass" class="form-control" name="txtPass" placeholder="Nhập Password"/>
                                <p style="color: red"><i id="alertPass"></i></p>
                            </div>
                            <div class="form-group">
                                <label>RePassword (*)</label>
                                <input type="password" id="txtRePass" class="form-control" name="txtRePass" placeholder="Xác nhận password"/>
                                <p style="color: red"><i id="alertRepass"></i></p>
                            </div>
                            <div class="form-group">
                                <label>Email (*)</label>
                                <input type="email" id="txtEmail" class="form-control" name="txtEmail" placeholder="Nhập Email" />
                                <p style="color: red"><i id="alertEmail"></i></p>
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại (*)</label>
                                <input type="number" id="txtPhone" class="form-control" name="txtPhone" placeholder="Nhập SĐT" />
                                <p style="color: red"><i id="alertPhone"></i></p>
                            </div>

                            <div class="form-group">
                                <label>Địa chỉ (*)</label>
                                <input type="text" id="txtAddr" class="form-control" name="txtAddr" placeholder="Nhập địa chỉ" />
                                <p style="color: red"><i id="alertAddr"></i></p>
                            </div>
                            <div class="form-group">
                                <label>Hình đại diện (*)</label>
                                <input type="file" id="txtAva" class="form-control" name="txtAva"/>
                                <p style="color: red"><i id="alertAva"></i></p>
                            </div>

                            <div class="form-group">
                                <label>Phân quyền</label>
                                <select class="form-control" name="permis">
                                    <option value="0">Super Admin</option>
                                    <option value="1">Admin</option>
                                    <option selected="" value="2">User</option>
                                </select>
                            </div>

                            <button type="submit" onclick="return validUser();" name="uploadclick" class="btn btn-primary">Thêm</button>
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
