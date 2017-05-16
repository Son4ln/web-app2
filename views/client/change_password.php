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
												<input type="text" id="username"  onblur="blurFunction_user()" class="form-control" value="<?php if(isset($set['username'])){echo $set['username'];}?>" name="username" readonly='readonly'/><div id="alert-name"> </div>
											</div>
											<div class="col-md-12" id="alert-name"></div>
										</div>
										<br />
										<div class="row">
											<div class="col-md-4">
												<label>New Password: (*)</label>
											</div>
											<div class="col-md-8">
												<input type="password" class="form-control" id="password1" name="password1" placeholder="Password must be >6 characters."  onblur="blurFunction_pass1()"/>
											</div>
											<div class="col-md-12" id="alert-pass"></div>
										</div>
										<br />
										<div class="row">
											<div class="col-md-4">
												<label>Confirm: (*)</label>
											</div>
											<div class="col-md-8">>
												<input type="password" class="form-control" name="re_password" id="password2" onblur="blurFunction_pass1()"/>
											</div>
											<div class="col-md-12" id="alert-pass2"></div>
										</div>
										<br />
										<div>
											<input type="submit"  class="btn btn-primary btn-login" value="Update" onclick="return validate();" />
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
										<input type="text" id="name" name="user_fullname" onblur="blurFunction_name()" class="form-control" value="<?php echo $set['full_name']; ?>"  />
									</div>
									<div class="col-md-12" id="alert-fname"></div>
								</div>
                                <br />
								<div class="row">
									<div class="col-md-4">
										<label>Email: (*)</label>
									</div>
									<div class="col-md-8">
										<input type="email" id="email" name="user_email" class="form-control"  onblur="blurFunction_email()" value="<?php echo $set['email']; ?>" />
									</div>
									<div class="col-md-12" id="alert-email"></div>
								</div>
                                <br />
								<div class="row">
									<div class="col-md-4">
										<label>Address: (*)</label>
									</div>
									<div class="col-md-8">
										<input type="text" id="address" name="user_address" class="form-control"  onblur="blurFunction_address()" value="<?php echo $set['address']; ?>" />
									</div>
									<div class="col-md-12" id="alert-address"></div>
								</div>
                                <br />
								<div class="row">
									<div class="col-md-4">
										<label>Phone: (*)</label>
									</div>
									<div class="col-md-8">
										<input type="text" id="tel" name="user_phone" class="form-control" onblur="blurFunction_tel()" value="<?php echo $set['phone']; ?>" />
									</div>
									<div class="col-md-12" id="alert-tel"></div>
								</div>
                                <br />
                                <div style="text-align: center">
                                    <input type="submit" class="btn btn-primary btn-login" value="Update" onclick="return validate1()" />
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
                                    <input  class="btn btn-primary btn-login" type="submit" name="uploadclick" value="Upload"/>
                                    </form></center>
                            <br />
                                    <?php
                            }
                            ?>
                </div>
        </div>
</section>
    <?php
    include '../views/client/footer.php';?>
	
	<script type="text/javascript">
		/* Change password */
		function validate(){
				var user =document.getElementById('username').value;
				if(user.length == 0 || user ==" ") {
					document.getElementById('alert-name').innerHTML = "Please enter a username.";
					document.getElementById('alert-name').style.color = "#ea1a77";
				}
				else if(user.length < 6 || user.length >20) {
					document.getElementById('alert-name').innerHTML = "Username must be >6 or <20 characters.";
					document.getElementById('alert-name').style.color = "#ea1a77";
				}else{
					document.getElementById('alert-name').innerHTML = "";
				}
				
				var pass1 =document.getElementById('password1').value;
				if(pass1.length == 0) {
					document.getElementById('alert-pass').innerHTML = " Please enter a password.";
					document.getElementById('alert-pass').style.color = "#ea1a77";
				}
				else if(pass1.length < 6) {
					document.getElementById('alert-pass').innerHTML = "Password must be >6 characters.";
					document.getElementById('alert-pass').style.color = "#ea1a77";
				}else{
					document.getElementById('alert-pass').innerHTML = "";
				}
				
				var pass2 =document.getElementById('password2').value;
				if(pass2 != pass1) {
					document.getElementById('alert-pass2').innerHTML = "Password entered does not match.";
					document.getElementById('alert-pass2').style.color = "#ea1a77";
				}else{
					document.getElementById('alert-pass2').innerHTML = "";
				}
				
		/*----------*/
			function blurFunction_user() {
				var user =document.getElementById('username').value;
				if(user.length == 0 || user ==" ") {
					document.getElementById('alert-name').innerHTML = "Please enter a username";
					document.getElementById('alert-name').style.color = "#ea1a77";
				}
				else if(user.length < 6 || user.length >20) {
					document.getElementById('alert-name').innerHTML = "Username must be >6 or <20 characters";
					document.getElementById('alert-name').style.color = "#ea1a77";
				}else{
					document.getElementById('alert-name').innerHTML = "";
				}
			}
			function blurFunction_pass1() {
				var pass1 =document.getElementById('password1').value;
				if(pass1.length == 0) {
					document.getElementById('alert-pass').innerHTML = "Please enter a password.";
					document.getElementById('alert-pass').style.color = "#ea1a77";
				}
				else if(pass1.length < 6) {
					document.getElementById('alert-pass').innerHTML = "Password must be <6 characters";
					document.getElementById('alert-pass').style.color = "#ea1a77";
				}else{
					document.getElementById('alert-pass').innerHTML = "";
				}
			}
			function blurFunction_pass2() {
				var pass =document.getElementById('password1').value;
				var pass1 =document.getElementById('password2').value;
				if(pass1.length == 0) {
					document.getElementById('alert-pass2').innerHTML = "Please enter a confirm password.";
					document.getElementById('alert-pass2').style.color = "#ea1a77";
				}
				else if(pass1 != pass) {
					document.getElementById('alert-pass2').innerHTML = "Password entered does not match.";
					document.getElementById('alert-pass2').style.color = "#ea1a77";
				}else{
					document.getElementById('alert-pass2').innerHTML = "";
				}
			}
			
		/* \\Change info */	
		
		function validate1(){
				var name =document.getElementById('name').value;
				if(name.length == 0 || name ==" ") {
					document.getElementById('alert-fname').innerHTML = "Please enter a full name.";
					document.getElementById('alert-fname').style.color = "#ea1a77";
				}
				else if(name.length < 6) {
					document.getElementById('alert-fname').innerHTML = "Full name must be >6 characters.";
					document.getElementById('alert-fname').style.color = "#ea1a77";
				}else{
					document.getElementById('alert-fname').innerHTML = "";
				}
				
				var email = document.getElementById('email').value;
				if(email.length == 0) {
					document.getElementById('alert-email').innerHTML = "Please enter a email.";
					document.getElementById('alert-email').style.color = "#ea1a77";
				}
				else if(email.indexOf("@")==(-1) || email.indexOf(".")==(-1)) {
					document.getElementById('alert-email').innerHTML = "Email entered the wrong rules.";
					document.getElementById('alert-email').style.color = "#ea1a77";
				}else{
					document.getElementById('alert-email').innerHTML = "";
				}
				
				var t =document.getElementById('address').value;
				if(t.length < 15) {
					document.getElementById('alert-address').innerHTML = "Please enter an address.";
					document.getElementById('alert-address').style.color = "#ea1a77";
				}else{
					document.getElementById('alert-address').innerHTML = "";
				}
				
				var tel = document.getElementById('tel').value;
				if(tel.length == 0) {
                    document.getElementById('alert-tel').innerHTML = "Please enter the phone number.";
                    document.getElementById('alert-tel').style.color = "#ea1a77";
                }else if(tel.slice(0,1)!=("0") || tel.length <10 || tel.length >12 ) {
                    document.getElementById('alert-tel').innerHTML = "Phone number entered incorrectly.";
                    document.getElementById('alert-tel').style.color = "#ea1a77";
                }else{
					document.getElementById('alert-tel').innerHTML = "";
				}
				
			}
		/*----------*/
			function blurFunction_name() {
				var name =document.getElementById('name').value;
				if(name.length == 0 || name ==" ") {
					document.getElementById('alert-fname').innerHTML = "Please enter a fullname.";
					document.getElementById('alert-fname').style.color = "#ea1a77";
				}
				else if(name.length < 6) {
					document.getElementById('alert-fname').innerHTML = "Full name must be >6 characters long";
					document.getElementById('alert-fname').style.color = "#ea1a77";
				}else{
					document.getElementById('alert-fname').innerHTML = "";
				}
			}
			
			function blurFunction_email() {
				var email = document.getElementById('email').value;
				if(email.length == 0) {
					document.getElementById('alert-email').innerHTML = "Please enter a email.";
					document.getElementById('alert-email').style.color = "#ea1a77";
				}
				else if(email.indexOf("@")==(-1) || email.indexOf(".")==(-1)) {
					document.getElementById('alert-email').innerHTML = "Email entered the wrong rules.";
					document.getElementById('alert-email').style.color = "#ea1a77";
				}else{
					document.getElementById('alert-email').innerHTML = "";
				}
			}
			
			function blurFunction_address() {
				var t =document.getElementById('address').value;
				if(t.length <15) {
					document.getElementById('alert-address').innerHTML = "Please enter an address";
					document.getElementById('alert-address').style.color = "#ea1a77";
				}else{
					document.getElementById('alert-address').innerHTML = "";
				}
			}
			
			function blurFunction_tel() {
				var tel = document.getElementById('tel').value;
				if(tel.length == 0) {
                    document.getElementById('alert-tel').innerHTML = "Please enter the phone number.";
                    document.getElementById('alert-tel').style.color = "#ea1a77";
                }else if(tel.slice(0,1)!=("0") || tel.length <10 || tel.length >12 ) {
                    document.getElementById('alert-tel').innerHTML = "Phone number entered incorrectly.";
                    document.getElementById('alert-tel').style.color = "#ea1a77";
                }else{
					document.getElementById('alert-tel').innerHTML = "";
				}
			}
		/* \\Change info */	
</script>