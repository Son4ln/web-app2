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
										<input type="text" name="username" class="form-control"  onblur="blurFunction_user()" id="username" placeholder="Username is between 6-20" />
									</div>
									<div class="col-md-12" id="alert-name"></div>
								</div>
                            <br />
								<div class="row">
									<div class="col-md-4">
										<label>Password: (*)</label>
									</div>
									<div class="col-md-8">
										<input name="password" type="password" class="form-control" onblur="blurFunction_pass1()" id="password1" placeholder="Password must be >6 characters." />
									</div>
									<div class="col-md-12" id="alert-pass"></div>
								</div>
                            <br />
								<div class="row">
									<div class="col-md-4">
										<label>Confirm: (*)</label>
									</div>
									<div class="col-md-8">
										<input type="password" name="re_password" class="form-control" onblur="blurFunction_pass2()" id="password2" placeholder="" />
									</div>
									<div class="col-md-12" id="alert-pass2"></div>
								</div>
                            <br />
								<div class="row">
									<div class="col-md-4">
										<label>Full Name: (*)</label>
									</div>
									<div class="col-md-8">
										<input type="text" id="name" class="form-control" name="user_fullname" onblur="blurFunction_name()" placeholder="Full name must be >6 characters." />
									</div>
									<div class="col-md-12" id="alert-fname"></div>
								</div>
                            <br />
								<div class="row">
									<div class="col-md-4">
										<label>Email: (*)</label>
									</div>
									<div class="col-md-8">
										<input type="email" id="email" class="form-control" name="user_email" onblur="blurFunction_email()"/>
									</div>
									<div class="col-md-12" id="alert-email"></div>
								</div>
                            <br />
								<div class="row">
									<div class="col-md-4">
										<label>Address: (*)</label>
									</div>
									<div class="col-md-8">
										<input type="text" id="address" class="form-control" name="user_address" onblur="blurFunction_address()" />
									</div>
									<div class="col-md-12" id="alert-address"></div>
								</div>
                            <br />
								<div class="row">
									<div class="col-md-4">
										<label>Phone: (*)</label>
									</div>
									<div class="col-md-8">
										<input type="text" id="tel" class="form-control" name="user_phone" onblur="blurFunction_tel()"/>
									</div>
									<div class="col-md-12" id="alert-tel"></div>
								</div>
                            <br />
                            <div style="text-align: center">
                                <input type="submit"  class="btn btn-primary btn-login" value="Register" onclick="return validate()" />
                                <input class="btn btn-default" type="reset" value="Reset" />
                            </div>
                        </form>
						</div></div>
						</center>
                            <br />
                </div>
        </div>
</section>
<?php
    include '../views/client/footer.php';?>
<script type="text/javascript">
		/* Register */
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
		/* \\Register */	
</script>