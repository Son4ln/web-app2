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

<!-- FORGOT PASSWORD-->
<section class="section white" style="text-align: left;">
    <div class="container">
    <div class="inside-container">
        <div class="section-title">
            <h3 class="title1 fancy"><span>Forgot Password</span></h3>
        </div>
        <center><h3>You forgot your password ???</h3></center>
            <?php
                if($action =="login_forgot_password"){
                    echo "<center><p>".$messages."</p><br/></center>";
                }
            ?>
            <center><span>( Please enter your Username & Email address to receive your password )</span><br /><br />
			<div class="row"><div class="col-md-4 "></div>
                <div class="col-md-4 ">
                <form method="post" name="forgot_password" action="?action=login_forgot_password">
                    <div class="row">
						<div class="col-md-4">
							<label>Username: (*)</label>
						</div>
						<div class="col-md-8">
							<input type="text" class="form-control" id="username" name="username" onblur="blurFunction_user()"/>
						</div>
						<div class="col-md-12" id="alert-name"></div>
                    </div><br />
                    <div class="row">
						<div class="col-md-4">
							<label>Email: (*)</label>
						</div>
						<div class="col-md-8">
							<input type="email" class="form-control" id="email" name="user_email" onblur="blurFunction_email()" />
						</div>
						<div class="col-md-12" id="alert-email"></div>
                    </div><br />
                    <div>
                        <input type="submit"  class="btn btn-primary btn-login" value="Send" onclick="return validate()" />
                        <input class="btn btn-default" type="reset" value="Reset" />
                    </div>
                </form>
			</div></div>
			</center><br />
		</div>
    </div>
</section>
<?php
    include '../views/client/footer.php';?>

	<script>
	/* Reset-pass */
		function validate(){
				var user =document.getElementById('username').value;
				if(user.length == 0 || user ==" ") {
					document.getElementById('alert-name').innerHTML = " Please enter a username.";
					document.getElementById('alert-name').style.color = "#ea1a77";
				}
				else if(user.length < 6 || user.length >20) {
					document.getElementById('alert-name').innerHTML = "Username must be >6 or <20 characters.";
					document.getElementById('alert-name').style.color = "#ea1a77";
				}else{
					document.getElementById('alert-name').innerHTML = "";
				}
				
				var email = document.getElementById('email').value;
				if(email.length == 0) {
					document.getElementById('alert-email').innerHTML = "Please enter a email.";
					document.getElementById('alert-email2').style.color = "#ea1a77";
				}
				else if(email.indexOf("@")==(-1) || email.indexOf(".")==(-1)) {
					document.getElementById('alert-email').innerHTML = "Email entered the wrong rules.";
					document.getElementById('alert-email').style.color = "#ea1a77";
				}else{
					document.getElementById('alert-email').innerHTML = "";
				}
				
			}
		/*----------*/
			function blurFunction_user() {
				var user =document.getElementById('username').value;
				if(user.length == 0 || user ==" ") {
					document.getElementById('alert-name').innerHTML = "Please enter a username.";
					document.getElementById('alert-name').style.color = "#ea1a77";
				}
				else if(user.length < 6 || user.length >20) {
					document.getElementById('alert-name').innerHTML = "Username must be >6 or <20 characters";
					document.getElementById('alert-name').style.color = "#ea1a77";
				}else{
					document.getElementById('alert-name').innerHTML = "";
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
		/* \\Reset-pass */	
	
	</script>