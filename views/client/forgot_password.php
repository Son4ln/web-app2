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
							<input type="text" class="form-control" id="username" name="username" required="required"/>
						</div>
                    </div><br />
                    <div class="row">
						<div class="col-md-4">
							<label>Email: (*)</label>
						</div>
						<div class="col-md-8">
							<input type="email" class="form-control" id="email" name="user_email" required="required"/>
						</div>
                    </div><br />
                    <div>
                        <input type="submit"  class="btn btn-primary" value="Send"  />
                        <input class="btn btn-default" type="reset" value="Reset" />
                    </div>
                </form>
			</div></div>
			</center><br />
		</div>
    </div>
</section>
<?php
    include 'footer.php';?>