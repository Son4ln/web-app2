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
								<input name="username" class="form-control" type="text" id="txtusername" value=""/>
							</div>
						</div>
						<br />
						<div class="row">
							<div class="col-md-4">
								<label>Password: (*)</label>
							</div>
							<div class="col-md-8">
								<input name="password" class="form-control" type="password" id="txtpasword" value=""/>
							</div>
						</div>
						<br />
						<div style="text-align: center">
							<input type="submit"  class="btn btn-primary" value="Sign In"  />
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