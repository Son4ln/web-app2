<?php
    include '../views/client/header.php';
if(empty($_SESSION['messages']))
        {
            $messages="";
            
        }
        else
        {
            $messages=$_SESSION['messages'];
        }
?>
<!--////////////////////////////////////Container-->
<!-- LOGIN -->
<section class="section white" style="text-align: left;">
    <div class="container">
    <div class="inside-container">
                        <?php
                            if($action == "change_password"){
                                $user = new Users();
                                $set = $user->getUsername($username);
                                    
                        ?> 
						<div class="section-title">
							<h3 class="title1 fancy"><span>Change Password</span></h3>
						</div>
                                <?php
                                        echo "<center>".$messages."<br/></center>";
                                ?>
                            <center><p><span>Hello! You want to refresh your password.</span>
                                <br/>Please enter the information below to update your changes.</p><br />
							<div class="row"><div class="col-md-3"></div>
								<div class="col-md-6">
									<form method="post" name="change" action="?action=login_change_password">
										<div class="row">
											<div class="col-md-4">
												<label>Username: (*)</label>
											</div>
											<div class="col-md-8">
												<input type="text" id="username" class="form-control" size="35" value="<?php if(isset($set['username'])){echo $set['username'];}?>" name="username" readonly='readonly'/><div id="alert-name"> </div>
											</div>
										</div>
										<br />
										<div class="row">
											<div class="col-md-4">
												<label>New Password: (*)</label>
											</div>
											<div class="col-md-8">
												<input type="password" class="form-control" id="password1" name="password1" size="35" required/>
											</div>
										</div>
										<br />
										<div class="row">
											<div class="col-md-4">
												<label>Confirm: (*)</label>
											</div>
											<div class="col-md-8">>
												<input type="password" class="form-control" name="re_password" id="password2" size="35" required/><div id="alert-pass">										</div>
											</div>
										</div>
										<br /><br />
										<div>
											<input type="submit"  class="btn btn-primary" value="Update" onclick="validate();" />
											<input class="btn btn-default" type="reset" value="Reset" />
										</div>
									</form>
								</div>
							</div>
							<br /></center>
                            <?php 
                            }
                            else if($action == "change_data"){
                            ?>
                            
						<div class="section-title">
							<h3 class="title1 fancy"><span>Change Infomation</span></h3>
						</div>
							<center><p><span>Hello! You want to refresh your information.</span>
                                <br/>Please enter the information below to update your changes.</p><br />
							<div class="row"><div class="col-md-4"></div>
							<div class="col-md-4">
                            <form method="post" name="change"  action="?action=upload&id=1" >
                                <?php
                                    $user = new Users();
                                    $set = $user->getUsername($username);
                                        
                                ?>
                                <input type="hidden" class="textbox" value="<?php echo $set['username'];?>" name="username"/>
								<div class="row">
									<div class="col-md-4">
										<label>Full name: (*)</label>
									</div>
									<div class="col-md-8">
										<input type="text" id="name" name="user_fullname" placeholder="từ 6 đến 20 ký tự" class="form-control" size="35" value="<?php echo $set['full_name']; ?>"  />
										<div id="alert-fname"> </div>
									</div>
								</div>
                                <br />
								<div class="row">
									<div class="col-md-4">
										<label>Email: (*)</label>
									</div>
									<div class="col-md-8">
										<input type="email" id="email" name="user_email" class="form-control" size="35" value="<?php echo $set['email']; ?>" />
										<div id="alert-email"> </div>
									</div>
								</div>
                                <br />
								<div class="row">
									<div class="col-md-4">
										<label>Address: (*)</label>
									</div>
									<div class="col-md-8">
										<input type="text" id="diachi" name="user_address" class="form-control" size="35" value="<?php echo $set['address']; ?>" />
									</div>
									</div>
                                <br />
								<div class="row">
									<div class="col-md-4">
										<label>Phone: (*)</label>
									</div>
									<div class="col-md-8">
										<input type="text" id="tel" name="user_phone" class="form-control" size="35" value="<?php echo $set['phone']; ?>" />
									</div>
								</div>
                                <br />
                                <div style="text-align: center">
                                    <input type="submit" class="btn btn-primary" value="Update" onclick="return validate1()" />
                                    <input class="btn btn-default" type="reset" value="Reset" />
                                </div>
                            </form></div></div></center>
                            <br />
                            
                            <?php
                            }  else if($action == "change_avatar"){
                                    $user = new Users();
                                    $set = $user->getUsername($username);
                            ?>
                            
						<div class="section-title">
							<h3 class="title1 fancy"><span>Change Avatar</span></h3>
						</div>
							<?php
								echo "<center>".$messages."<br/></center>";
							?>
							<center><p><span>Hello! You want to refresh your avatar.</span>
                                <br/>(Please add a link below.)</p><br />
                                <form id="upload_form" action="?action=upload" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" class="textbox" value="<?php echo $set['username'];?>" name="username"/>
                                    <input type="hidden" name="action" value="upload"/>
                                    <input class="button" type="file" name="file1" /><br /><br />
                                    <input  class="btn btn-primary" type="submit" name="uploadclick" value="Upload"/>
                                    </form></center>
                            <br />
                                    <?php
                            }
                            ?>
                </div>
        </div>
</section>
    <?php
    include 'footer.php';?>
<script type="text/javascript">
	function clearAlert(){
		document.getElementById('alert-pass').innerHTML = "";
	}
	function validate(){
		clearAlert();
		
		var pass1 =document.getElementById('password1').value;
		var pass2 =document.getElementById('password2').value;
		if(pass1.length == 0 || pass2.length == 0) {
			document.getElementById('alert-pass').innerHTML = " Xin mời nhập đầy đủ mật khẩu.";
			document.getElementById('alert-pass').style.color = "red";
                        return false;
		}
		else if(pass1 != pass2) {
			document.getElementById('alert-pass').innerHTML = "Password nhập vào không đúng.";
			document.getElementById('alert-pass').style.color = "red";
                        return false;
		}
		else if(pass1.length < 5 || pass1.length >12 || pass2.length < 5 || pass2.length >12) {
			document.getElementById('alert-pass').innerHTML = "Password nhập nhỏ hơn 5 hoặc dài hơn 12 ký tự";
			document.getElementById('alert-pass').style.color = "red";
                        return false;
		}
            }
	function clearAlert1(){
                document.getElementById('alert-fname').innerHTML = "";
		document.getElementById('alert-email').innerHTML = "";
	}
	function validate1(){
		clearAlert1();
		  
                var name =document.getElementById('name').value.length;
                if(name  == 0) {
			document.getElementById('alert-fname').innerHTML = " Mời nhập họ tên";
			document.getElementById('alert-fname').style.color = "red";
                        return false;
		}
		else if(name < 6 || name >20) {
			document.getElementById('alert-fname').innerHTML = "Tên nhập nhỏ hơn 6 hoặc dài hơn 20 ký tự";
			document.getElementById('alert-fname').style.color = "red";
                        return false;
		}
                
                var email = document.getElementById('email').value;
                if(email.length == 0) {
                                document.getElementById('alert-email').innerHTML = " Mời nhập email";
                                document.getElementById('alert-email').style.color = "red";
                                return false;
                        }
                        else if(email.indexOf("@")==(-1) || email.indexOf(".")==(-1)) {
                                document.getElementById('alert-email').innerHTML = "Email nhập sai quy tắc.";
                                document.getElementById('alert-email').style.color = "red";
                                return false;
                        }

	
	}
</script>