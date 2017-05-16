<?php
	include '../views/client/header.php';
?>
<!-- DETAIL PRODUCT -->
<section class="section white" style="text-align: left;">
    <div class="container">
    <div class="inside-container">
        <div class="section-title">
            <h3 class="title1 fancy"><span>PRODUCT</span></h3>
        </div>
		<?php
			$objPro = new Products();
			$detailPro = $objPro->getProductById ($client_id);
		?>
        <div class="row">
            <div class="col-sm-5 col-xs-12">
            	<div class="col-sm-3">
            		<div class="product-images-small">
                        <div class="box-images-small" style="margin: 0;">
                            <img class="images-small images-opacity images-hover-opacity-off zoom" id='zoom1' src="<?php echo '../controller/public/client/images/product/'.$detailPro['product_image']; ?>" style="width:50%" onclick="currentDiv(1)">
                        </div>
						<?php
							if($detailPro['product_image1'] != null){
						?>
							<div class="box-images-small">
								<img class="images-smallmo images-opacity images-hover-opacity-off zoom" id='zoom1' src="<?php echo '../controller/public/client/images/product/'.$detailPro['product_image1']; ?>" style="width:50%" onclick="currentDiv(2)">
							</div>
						<?php
							}
							if($detailPro['product_image2'] != null){
						?>
							<div class="box-images-small">
								<img class="images-smallmo images-opacity images-hover-opacity-off zoom" id='zoom1' src="<?php echo '../controller/public/client/images/product/'.$detailPro['product_image2']; ?>" style="width:50%" onclick="currentDiv(3)">
							</div>
						<?php
							}
						?>
                    </div>
            	</div>

            	<div class="col-sm-9 col-xs-12">
                    <div class="product-images-large product-border">
                        <img class="images-large" src="<?php echo '../controller/public/client/images/product/'.$detailPro['product_image']; ?>" style="width:auto; height: 100%">
						<?php
							if($detailPro['product_image1'] != null){
						?>
							<img class="images-large" src="<?php echo '../controller/public/client/images/product/'.$detailPro['product_image1']; ?>" style="width:auto; height: 100%">
						<?php
							}
							if($detailPro['product_image2'] != null){
						?>
							<img class="images-large" src="<?php echo '../controller/public/client/images/product/'.$detailPro['product_image2']; ?>" style="width:auto; height: 100%">
						<?php
							}
						?>
                    </div>
            	</div>

                <script>
				$(document).ready(function(){
				  $('#zoom1').zoom();
				});
                var slideIndex = 1;
                showDivs(slideIndex);

                function plusDivs(n) {
                  showDivs(slideIndex += n);
                }

                function currentDiv(n) {
                  showDivs(slideIndex = n);
                }

                function showDivs(n) {
                  var i;
                  var x = document.getElementsByClassName("images-large");
                  var dots = document.getElementsByClassName("images-small");
                  if (n > x.length) {slideIndex = 1}
                  if (n < 1) {slideIndex = x.length}
                  for (i = 0; i < x.length; i++) {
                     x[i].style.display = "none";
                  }
                  for (i = 0; i < dots.length; i++) {
                     dots[i].className = dots[i].className.replace(" images-opacity-off", "");
                  }
                  x[slideIndex-1].style.display = "block";
                  dots[slideIndex-1].className += " images-opacity-off";
                }
                </script>

				<?php
					$objCtfc = new Certificates();
					$countCtfc = $objCtfc->countProductCertificateById($client_id);
					if($countCtfc[0]==0){

					}else{

				?>
				<div class="col-md-12 chungnhan" style="margin-top: 5%">
                    <div class="title"><h3>Certificate</h3></div>
                    <div class="row">
						<?php
						$showCtfc = $objCtfc->getProductCertificate($client_id);
						foreach($showCtfc as $ctfc){
						?>
						<div  class="col-md-4">
							<img src="<?php echo '../controller/public/client/images/certificates/'.$ctfc['certificate_image']; ?>" alt="<?php echo $ctfc['certificate_name']; ?>" title="<?php echo $ctfc['certificate_name']; ?>"/>
							<p><?php echo $ctfc['certificate_name']; ?></p>
							<br />
						</div>
						<?php
						}
						?>
                    </div>
                </div>
				<?php
					}
				?>
            </div>
            <div class="col-sm-7 col-xs-12">
                <div id="product-text">
					<h2 class="bold" style="font-size: 1.6em;"><?php  echo $detailPro['product_name'] ; ?></h2>
					<span class="currency" style="display:none">AUD</span>
                    <div class="price-div">
						<div class="rrp">Old Price:
							<?php
								if($detailPro['product_currency']== 'vnđ' || $detailPro['product_currency']== 'đ' || $detailPro['product_currency']== 'vnd' || $detailPro['product_currency']== 'đồng'){
							?>
								<span class="rrp-price"><?php  echo '<span>'.number_format($detailPro['product_price'],2).'</span><span> '.$detailPro['product_currency'].'<span>'; ?>
							<?php
								} else{
							?>
								<span class="rrp-price"><?php  echo '<span>'.$detailPro['product_currency'].number_format($detailPro['product_price'],2).'</span><span> '.'<span>';
								}
							?>
                        </div>
						<div class="price">
						<?php
							if($detailPro['product_discount']==0){
								if($detailPro['product_currency']== 'vnđ' || $detailPro['product_currency']== 'đ' || $detailPro['product_currency']== 'vnd' || $detailPro['product_currency']== 'đồng'){
									echo '<span>'.number_format($detailPro['product_price'],2).'</span><span> '.$detailPro['product_currency'].'<span>';
								} else{
									echo '<span>'.$detailPro['product_currency'].number_format($detailPro['product_price'],2).'</span><span> '.'<span>';
								}
							}else {
								if($detailPro['product_currency']== 'vnđ' || $detailPro['product_currency']== 'đ' || $detailPro['product_currency']== 'vnd' || $detailPro['product_currency']== 'đồng'){
									echo '<span>'.number_format($detailPro['product_discount'],2).'</span><span> '.$detailPro['product_currency'].'<span>';
								} else{
									echo '<span>'.$detailPro['product_currency'].number_format($detailPro['product_discount'],2).'</span><span> '.'<span>';
								}
							}
						?>
                        </div>
                    </div>
                   	<div id="add-to-cart-wrap">
						<?php 
							if($detailPro['product_in_stock'] == 0){
								echo '<h3>Sold out</h3>';
							}else{
						?>
						<form action="?action=add_cart" method="post" name="add_cart">
							<input type="hidden" name="productkey" value="<?php echo $client_id;?>"/>
                            <fieldset id="add-to-cart">
                                <label for="quantity">Enter Qty</label>
                                	<input id="quantity" name="itemqty" value="1" type="number" min="1" max="<?php  echo $detailPro['product_in_stock']; ?>">
									<input type="submit" class="btn btn-primary btn-login" value="Add to Cart" >
	                        </fieldset>
						</form>
						<?php
							}
						?>
                    </div><h2 class="bold">Product Description</h2>
                    <div class="description">
						<p><?php echo nl2br($detailPro['product_detail'])?></p>
					</div>
				</div>
			</div>
		</div>
    </div>
</section>
<!-- END DETAIL PRODUCT -->
<?php include '../views/client/footer.php'; ?>