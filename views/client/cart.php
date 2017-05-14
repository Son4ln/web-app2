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

<!-- CART -->
<section class="section white" style="text-align: left;">
    <div class="container">
		<div class="inside-container">
			<div class="section-title">
				<h3 class="title1 fancy"><span>Your Cart</span></h3>
			</div>
                        <?php
                            if(isset($_SESSION['check']))
                            {
                                if(!isset($_SESSION['cartview04516']) || count($_SESSION['cartview04516'])==0)
                                {
                                ?>
                                    <center><br/>
                                        <h3>You haven't selected any products yet!</h3>
                                        <br/>
                                        <form action="?action=product" method="post" ><input  class="btn btn-primary btn-login" type="submit"  value="Add Product"/></form></center><br/>
                                <?php
                                   unset($_SESSION['tongtien']);
                               }
                                else{
									echo '<center><p>'.$messages.'</p><br /></center>';
                        ?>
                            <center>
                            <form action="?action=update_cart" method="post">
                                <center><a href="?action=payments"><input type="button" value="Order Online" class="btn btn-primary btn-login" id="orderOnline"/></a>
                                <a href="?action=empty_cart"><input type="button" class="btn btn-primary btn-login" value="Delete" /></a>
                                <a href="?action=product"><input type="button" class="btn btn-primary btn-login" value="Add Product" /></a></center><br />
                                
                                <br />
                                <div  id="table">
                                <table width="100%" border="1">
                            	<tr>
                                    <th width="30%" style="line-height: 30px;">Product name</th>
                                    <th width="15%" style="line-height: 30px;">Price</th>
									<th width="15%" style="line-height: 30px;">Discount</th>
                                    <th width="15%" style="line-height: 30px;">Quantities</th>
                                    <th width="25%" style="line-height: 30px;">Amount</th>
                                </tr> 


                    <?php
                     foreach($_SESSION['cartview04516'] as $key => $item):
                            $price = number_format($item['price'],2);
							$discount = number_format($item['discount'],2);
                            $total = number_format($item['total'],2);

                    ?>
                                <tr>
                                    <td> <?php echo $item['name'];?> </td>
                                    <td> <?php echo $price?> </td>
									<td> <?php echo $discount?> </td>
                                    <td><input class="sl" type="text" name="newqty[<?php echo $key; ?>]" value="<?php echo $item['qty']; ?>" style="width:100% !important; text-align: center;color: #F00; border: none;"/></td>
                                     <td> <?php echo $total; ?> </td>
                                </tr>

                     <?php endforeach; ?>   


                                <tr>
                                    <td colspan="4" style="color: #ea1a77;">
                                        Tổng tiền
                                    </td>
                                    <td style="color: #ea1a77;"> 
                                        <?php 
											echo '$'.get_subtotal();
										?> 
                                        <?php
                                           $tongtien = get_subtotal();
                                           $tongsanpham = get_subtotalitem();
                                           $setName = $item['name'];

                                           $_SESSION['tongtien']=$tongtien;
                                           $_SESSION['tongsanpham']=$tongsanpham;
                                           $_SESSION['name']=$setName;
                                        ?>
                                    </td>
                                </tr>
                                </table></div>
                                   <br/>
                                    <p>Click <input type="submit" value="Update" class="btn btn-primary btn-login" > to update product quantity. Select 0 to remove the product.</p>
                            </form>
                            </center>
						<?php } ?>
                    <?php
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
</section>
<!-- END CART -->
<?php
    include '../views/client/footer.php';?>