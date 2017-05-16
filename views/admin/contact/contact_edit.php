<?php include '../views/admin/header.php'; ?>
<?php include '../views/admin/nav.php'; ?>
    <!-- container here -->
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Contact
                            <small>Detail and Edit</small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <div class="alert" id="showMes"></div>
                    </div>
                    <div class="col-lg-12">
                        <?php echo $alert; ?>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="?action=showContactAction" method="POST" enctype="multipart/form-data">
                            <?php
                                $info = new contactInfo();
                                $data = $info -> getContactInfo ();
                             ?>
                            <div class="form-group">
                                <label>Company Name</label>
                                <input class="form-control" type="hidden" name="infoId" value="<?php echo $data['info_id']; ?>" />
                                <input class="form-control" name="companyName" value="<?php echo $data['company_name']; ?>" />
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input class="form-control" name="address" value="<?php echo $data['address']; ?>" />

                            </div>
                            <div class="form-group">
                                <label>Headquarters</label>
                                <input class="form-control" name="Headquarters" value="<?php echo $data['headquarters']; ?>" />

                            </div>
                            <div class="form-group">
                                <label>Branch</label>
                                <input class="form-control" name="branch" value="<?php echo $data['branch']; ?>" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="mail" type="mail" value="<?php echo $data['contact_email']; ?>" />
                            </div>
                            <div class="form-group">
                                <label>Việt Nam Phone</label>
                                <input class="form-control" type="number" name="vnPhone" value="<?php echo $data['vietnam_phone']; ?>" />
                            </div>
                            <div class="form-group">
                                <label>Australia Phone</label>
                                <input class="form-control" type="number" name="ausPhone" value="<?php echo $data['australia_phone']; ?>" />
                            </div>
                            <div class="form-group">
                                <label>Fax</label>
                                <input class="form-control" name="fax" value="<?php echo $data['fax']; ?>" />
                            </div>
                            <div class="form-group">
                                <label>Old Logo</label>
                                <img src="public/client/images/<?php echo $data['logo_image']; ?>" width="200">
                                <input class="form-control"  type="hidden" name="oldLogo" value="<?php echo $data['logo_image']; ?>" />
                            </div>
                            <div class="form-group">
                                <label>Logo</label>
                                <input class="form-control"  type="file" name="imgLogo"/>
                            </div>
                            <div class="form-group">
                                <label>Map</label>
                                <input class="form-control"  type="text" name="map" value="<?php echo $data['map']; ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Introduce</label>
                                <textarea class="form-control"  type="text" name="content">
                                    <?php echo $data['contact_info']; ?>
                                </textarea>
                                <script>
                                CKEDITOR.replace( 'content');
                                </script>
                            </div>
                            <button type="submit" class="btn btn-primary">Sửa Contact</button>
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
