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

<!-- CHECKOUT -->
<section class="section white" style="text-align: left;">
    <div class="container">
		<div class="inside-container">
			<div class="section-title">
				<h3 class="title1 fancy"><span>Order Online</span></h3>
			</div>
            <?php
                if(isset($_SESSION['check'])){
                    if(!isset($_SESSION['cartview04516']) || count($_SESSION['cartview04516'])==0){
            ?>
                    <center><br/>
                        <h3>You haven't selected any products yet!</h3>
                        <br/>
                        <form action="?action=product" method="post" ><input class="btn btn-primary btn-login" type="submit"  value="Add Product"/></form></center><br/>
                        <?php
                                }
                                else if($messages !=""){
									echo '<center><p>'.$messages.'</p><br /></center>';
								}else{
									unset($_SESSION['cartview04516']);
                            ?>
                                <center>
									<p>Order has been successfully placed. We will contact you as soon as possible to confirm the information and delivery date.</p>
									<p>Note: Customers pay bills only when they receive the correct item.</p><br/>
								</center>
                        </div>
                        <?php
                            }
						}
                        else
                        {
                        ?>
                            <center><br/>
                                <h3>You must be logged in to perform this function</h3>
                                <br/>
                                <form action="?action=login" method="post" ><input class="btn btn-primary btn-login" type="submit" name="go_to_register" value="Go to the login page"/></form></center><br/>
                        <?php
                        }
                        ?>
                        </div>
                </div>
        </div>
</section>
<!-- END CHECKOUT -->
<?php
    include '../views/client/footer.php';?>