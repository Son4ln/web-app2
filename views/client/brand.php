<?php 
	include '../views/client/header.php'; 
?>
<!-- BRANDS -->
<section class="section white" style="text-align: left;">
    <div class="container">
        <div class="inside-container">
            <div class="section-title">
                <h3 class="title1 fancy"><span>Brands</span></h3>
            </div>
            <div class="row">
                <div class="col-md-12">
					<?php
						$objBrand = new Brands();
						$countBrand = $objBrand->countBrand();
						if($countBrand[0] == 0){
							echo "<center><h3>Waiting for brand updates.</h3></center>";
						}else{
						$array = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
					?>
					<ul id="brand-az">
						<?php
						for($i=0; $i<26; $i++){
							echo '<li><a href="#brand-'.$array[$i].'">'.$array[$i].'</a></li>';
						}
						?>
					</ul>
  
					<div id="brand-list">
						<div class="brand-char-wrap">
							<div class="brand-char" id="brand-8">Total</div>
								<ul>
									<div class="col-md-4"><a href="?action=product"><?php echo $countBrand[0]; ?> Brand</a></div>
								</ul>
						</div>
						<?php
						for($i=0; $i<26; $i++){
						?>
							<div class="brand-char-wrap"><hr />
								<div class="brand-char" id="brand-<?php echo $array[$i]; ?>"><?php echo $array[$i]; ?></div>
								<ul>
								<?php
									$showBrand = $objBrand->getLikeBrand($array[$i]);
									foreach($showBrand as $brand){
								?>
										<div class="col-md-4">
											<a href="?action=product&brand=<?php echo $brand['brand_id'];?>"><?php echo $brand['brand_name']; ?></a>
										</div>
								<?php
									}
								?>
								</ul>
								<br />
								<br />
							</div>
						<?php
						}
						?>
					</div>
					<?php
						}
					?>
				</div>
			</div>
        </div>
    </div>
</section>
<!-- END BRANDS -->
<?php include '../views/client/footer.php'; ?>