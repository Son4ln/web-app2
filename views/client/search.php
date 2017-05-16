<?php
	include '../views/client/header.php';
?>
<?php
    if(empty($_SESSION['messages']))
        {
            $messages="";

        }
        else
        {
            $messages=$_SESSION['messages'];
        }
?> 
<!-- SEARCH -->
<section class="section white" style="text-align: left;">
    <div class="container">
    <div class="inside-container" >
        <div class="section-title">
            <h3 class="title1 fancy"><span>Search</span></h3>
        </div>
		<div class="row">
    <?php
			if(empty($search)){
				echo "<center><p>".$messages."</p><br/></center>";
			}else{
				$objBlog = new Blogs();
				$countPro = $objBlog->countSearchProduct($search);
				$countBrand = $objBlog->countSearchBrand($search);
				$countFeature = $objBlog->countSearchFeature($search);
				$countOrigin = $objBlog->countSearchOrigin($search);
				$countBlog = $objBlog->countSearchBlog($search);
				$totalSearch = $countPro[0] + $countBrand[0] + $countFeature[0] + $countOrigin[0] + $countBlog[0];
				if($totalSearch == 0){
					echo "<center><p>Can not find search result</p><br/></center>";
				}else{
					echo '<h3>Results found:'.$totalSearch.'</h3>';
					if($countPro[0]>0){
						$srPro = $objBlog->searchProduct($search);
						echo "<br /><h4 class='title1' style='margin-bottom:0px;'>+ Product: ". $countPro[0]."</h4>";
						foreach($srPro as $result){
							echo '<div class="col-md-6"><a href="?action=viewProduct&id='.$result["product_id"].'" >'.$result["product_name"].'</a></div>';
						}
						echo "<br />";
					}
					if($countBrand[0]>0){
						$srBrand = $objBlog->searchBrand($search);
						echo "<br /><h4 class='title1' style='margin-bottom:0px;'>+ Brand: ". $countBrand[0]."</h4>";
						foreach($srBrand as $result){
							echo '<div class="col-md-6"><a href="?action=product&brand='.$result["brand_id"].'" >'.$result["brand_name"].'</a></div>';
						}
						echo "<br />";
					}
					if($countFeature[0]>0){
						$srFeature = $objBlog->searchFeature($search);
						echo "<br /><h4 class='title1' style=' margin-bottom:0px;'>+ Feature: ". $countFeature[0]."</h4>";
						foreach($srFeature as $result){
							echo '<div class="col-md-6"><a href="?action=product&feature='.$result["feature_id"].'" >'.$result["feature_name"].'</a></div>';
						}
						echo "<br />";
					}
					if($countOrigin[0]>0){
						$srOrigin = $objBlog->searchOrigin($search);
						echo "<br /><h4 class='title1' style='margin-bottom:0px;'>+ In Origin: ". $countOrigin[0]."</h4>";
						foreach($srOrigin as $result){
							echo '<div class="col-md-6"><a href="?action=product&origin='.$result["origin_id"].'" >'.$result["name_of_origin"].'</a></div>';
						}
						echo "<br />";
					}
					if($countBlog[0]>0){
						$srBlog = $objBlog->searchBlog($search);
						echo "<br /><h4 class='title1' style='margin-bottom:0px;'>+ Blog: ". $countBlog[0]."</h4>";
						foreach($srBlog as $result){
							echo '<div class="col-md-6"><a href="?action=viewBlog&id='.$result["blog_id"].'" >'.$result["blog_title"].'</a></div>';
						}
						echo "<br />";
					}
				}
			}
			?>
		<br />
		</div>
		</div>
    </div>
</section>
<!-- END SEARCH -->
<?php include '../views/client/footer.php'; ?>