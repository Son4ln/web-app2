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
<section class="section white" style="text-align: left;">
    <div class="container">
    <div class="inside-container">
        <div class="section-title">
            <h3 class="title1 fancy"><span>Register</span></h3>
        </div>
                        <?php
                            echo "<center><p>".$messages."</p><br/></center>";
                            ?>
						<center>
						<div class="row"><div class="col-md-4"></div>
						<div class="col-md-4">
							<form method="post" name="contact"  action="?action=add_user" >
								<div class="row">
									<div class="col-md-4">
										<label>Username: (*)</label>
									</div>
									<div class="col-md-8">
										<input type="text" name="username" class="form-control" id="username" placeholder="Từ 6 đến 12 ký tự" /><div id="alert-name"> </div>
									</div>
								</div>
                            <br />
								<div class="row">
									<div class="col-md-4">
										<label>Password: (*)</label>
									</div>
									<div class="col-md-8">
										<input name="password" type="password" class="form-control" id="password1" placeholder="từ 5 đến 12 ký tự" />
									</div>
								</div>
                            <br />
								<div class="row">
									<div class="col-md-4">
										<label>Confirm: (*)</label>
									</div>
									<div class="col-md-8">
										<input type="password" name="re_password" class="form-control" id="password2" placeholder="từ 5 đến 12 ký tự" />
										<div id="alert-pass"> </div>
									</div>
								</div>
                            <br />
								<div class="row">
									<div class="col-md-4">
										<label>Full Name: (*)</label>
									</div>
									<div class="col-md-8">
										<input type="text" id="name" class="form-control" name="user_fullname" placeholder="từ 6 đến 20 ký tự" />
										<div id="alert-fname"> </div>
									</div>
								</div>
                            <br />
								<div class="row">
									<div class="col-md-4">
										<label>Email: (*)</label>
									</div>
									<div class="col-md-8">
										<input type="email" id="email" class="form-control" name="user_email"/>
										<div id="alert-email"> </div>
									</div>
								</div>
                            <br />
								<div class="row">
									<div class="col-md-4">
										<label>Address: (*)</label>
									</div>
									<div class="col-md-8">
										<input type="text" id="diachi" class="form-control" name="user_address" />
										<div id="alert-address"> </div>
									</div>
								</div>
                            <br />
								<div class="row">
									<div class="col-md-4">
										<label>Phone: (*)</label>
									</div>
									<div class="col-md-8">
										<input type="text" id="tel" class="form-control" name="user_phone"/>
										<div id="alert-tel"> </div>
									</div>
								</div>
                            <br />
                            <div style="text-align: center">
                                <input type="submit"  class="btn btn-primary" value="Đăng Ký" onclick="return validate()" />
                                <input class="btn btn-default" type="reset" value="Nhập lại" />
                            </div>
                        </form>
						</div></div>
						</center>
                            <br />
                </div>
        </div>
</section>
<?php
    include 'footer.php';?>
<script type="text/javascript">
	function clearAlert(){
		document.getElementById('alert-name').innerHTML = "";
		document.getElementById('alert-pass').innerHTML = "";
                document.getElementById('alert-fname').innerHTML = "";
		document.getElementById('alert-email').innerHTML = "";
                document.getElementById('alert-address').innerHTML = "";
		document.getElementById('alert-tel').innerHTML = "";
	}
	function validate(){
		clearAlert();
		var user =document.getElementById('username').value.length;
		if(user == 0) {
			document.getElementById('alert-name').innerHTML = " Mời nhập tên";
			document.getElementById('alert-name').style.color = "red";
                        return false;
		}
		else if(user < 6 || user >12) {
			document.getElementById('alert-name').innerHTML = "Tên nhập nhỏ hơn 6 hoặc dài hơn 12 ký tự";
			document.getElementById('alert-name').style.color = "red";
                        return false;
		}
		
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
                var address =document.getElementById('diachi').value.length;
                if(address == 0) {
			document.getElementById('alert-address').innerHTML = " Mời nhập địa chỉ";
			document.getElementById('alert-address').style.color = "red";
                        return false;
		}
                 var tel = document.getElementById('tel').value;
                if(tel.length == 0) {
                                document.getElementById('alert-tel').innerHTML = " Mời nhập số điện thoại.";
                                document.getElementById('alert-tel').style.color = "red";
                                return false;
                        }
                        else if(tel.slice(0,1)!=("0") || tel.length <10 || tel.length >12 ) {
                                document.getElementById('alert-tel').innerHTML = "Số điện thoại nhập không đúng.";
                                document.getElementById('alert-tel').style.color = "red";
                                return false;
                        }
	
	}
</script>