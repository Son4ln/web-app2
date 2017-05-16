<?php 
	include '../views/client/header.php';
?>
<?php
if(isset($_SESSION['check']))
    {
       echo 'Không tìm thấy yêu cầu';
    }
    else  if(empty($_SESSION['messages']))
        {
            $messages="";
            
        }
        else
        {
            $messages=$_SESSION['messages'];
        }
      if ((isset($_COOKIE["user"]) && (isset($_COOKIE["pass"]))))
      {
          $user=$_COOKIE["user"];
          $pass=$_COOKIE["pass"];
      }
      else
      {
          $user="";
          $pass="";
      }
      
?> 
<!-- LOGIN -->
<section class="section white" style="text-align: left;">
    <div class="container">
    <div class="inside-container">
        <div class="section-title">
            <h3 class="title1 fancy"><span>Login</span></h3>
        </div>
    <?php
            echo "<center><p>".$messages."</p><br/></center>";
    ?>
        <center>
			<div class="row"><div class="col-md-4"></div>
				<div class="col-md-4">
					<form method="post" name="login" action="?action=login_action">
						<div class="row">
							<div class="col-md-4">
								<label>Username: (*)</label>
							</div>
							<div class="col-md-8">
								<input name="username" class="form-control" type="text" id="txtusername" value="" onblur="blurFunction_user()"/>
							</div>
							<div class="col-md-12" id="alert-name"></div>
						</div>
						<br />
						<div class="row">
							<div class="col-md-4">
								<label>Password: (*)</label>
							</div>
							<div class="col-md-8">
								<input name="password" class="form-control" type="password" id="txtpassword" value="" onblur="blurFunction_pass()"/>
							</div>
							<div class="col-md-12" id="alert-pass"></div>
						</div>
						<br />
						<div style="text-align: center">
							<input type="submit"  class="btn btn-primary btn-login" value="Sign In" onclick="return validate()" />
							<input class="btn btn-default" type="reset" value="Reset" />
						</div>
					</form>
				</div>
			</div>
		<center>
		<br />
    <?php 
        if($action !="login_forgot_password" || $action !="add_user" ){
            echo "<center><p></a><a href='?action=register'>Register    |</a><a href='?action=forgot_password'>  Forgot password?</p></center>";
        }
    ?>
        <br />
		</div>
    </div>
</section>
<!-- END LOGIN -->
<?php include '../views/client/footer.php'; ?>
<script>
/* Login */
function validate(){
		var user =document.getElementById('txtusername').value;
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
		
		var pass1 =document.getElementById('txtpassword').value;
		if(pass1.length == 0) {
			document.getElementById('alert-pass').innerHTML = " Please enter a password.";
			document.getElementById('alert-pass').style.color = "#ea1a77";
		}
		else if(pass1.length < 6) {
			document.getElementById('alert-pass').innerHTML = "Password must be >6 characters";
			document.getElementById('alert-pass').style.color = "#ea1a77";
		}else{
			document.getElementById('alert-pass').innerHTML = "";
		}
		
	}
/*----------*/
	function blurFunction_user() {
		var user =document.getElementById('txtusername').value;
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
	function blurFunction_pass() {
		var pass1 =document.getElementById('txtpassword').value;
		if(pass1.length == 0) {
			document.getElementById('alert-pass').innerHTML = "Please enter a password.";
			document.getElementById('alert-pass').style.color = "#ea1a77";
		}
		else if(pass1.length < 6 ) {
			document.getElementById('alert-pass').innerHTML = "Password must be >6 characters";
			document.getElementById('alert-pass').style.color = "#ea1a77";
		}else{
			document.getElementById('alert-pass').innerHTML = "";
		}
	}
/* \\Login */

</script>