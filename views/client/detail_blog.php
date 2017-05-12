<?php 
	include '../views/client/header.php'; 
?>
<!-- DETAIL BLOG -->
<section class="section white" style="text-align: left;">
    <div class="container">
        <div class="inside-container">
            <div class="section-title">
                <h3 class="title1 fancy"><span>Blog</span></h3>
            </div>
            <div class="row">
                <div class="col-md-8 left">
                    <div id="article-left">
					<?php
						$objBlog = new Blogs();
						$objUser = new Users();
						$getBlog = $objBlog->getBlogById($client_id);
					?>
						<h3 class="intro"><?php echo $getBlog['blog_title']; ?></h3>
						<div class="post-div">
							<p>Posted Date: <?php echo $getBlog['date_posted']; ?> | By: <?php
								$blogUser = $objUser->getUserById($getBlog['user_id']);
								echo $blogUser['full_name'];
							?></p>
						</div>
						<div id="facebook"><iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.aussiehealthproducts.com.au%2Fcolliodal-minerals.php%3Fid%3D75746%26Suttons-Colloidal-Silver-1ltr&amp;layout=standard&amp;show_faces=true&amp;width=200&amp;action=like&amp;colorscheme=light&amp;height=50" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:50px;" class="facebook"></iframe></div>
						<img src="<?php echo '../controller/public/client/images/blog/'.$getBlog['featured_image']; ?>" class="b-lazy attachment-blog-preview wp-post-image b-loaded" width="100%">
						<div class="description"> 
							<br />
							<p><?php echo nl2br($getBlog['blog_content']); ?></p>
						</div>
                    </div>
                    <!-- end -->
                </div>
                <div class="col-md-4 right">
                    <div id="article-right">   
                        <h3 class="bottom-border">Latest Blogs!</h3>
					<?php
						$countBlog = $objBlog->getCountBlogSlide();
						if($countBlog[0]>=4){
							$showBlog = $objBlog->getBlogSlide (0, 4);
						}else{
							$showBlog = $objBlog->getBlogSlide (0, $countBlog[0]);
						}
						foreach($showBlog as $blog){
							$blogUser = $objUser->getUserById($blog['user_id']);
					?>
							<div class="article">
								<a href="?action=viewBlog&id=<?php echo $blog['blog_id']; ?>" class="thumb">
									<img src="<?php echo '../controller/public/client/images/blog/'.$blog['featured_image']; ?>" 
										alt="<?php echo $blog['blog_title']; ?>" 
										title="<?php echo $blog['blog_title']; ?>" /></a>
								<div class="article-details">
									<h4><a href="?action=viewBlog&id=<?php echo $blog['blog_id']; ?>"><?php echo $blog['blog_title']; ?></a></h4>
									<span class="new-price"><?php echo $blog['date_posted']; ?> / <?php echo $blogUser['full_name']; ?></span>
								</div>
							</div>
					<?php
						}
						$objOrder = new Order();
						$countOrder = $objOrder->getCountOrderProduct();
						if($countOrder[0] == 0){
							
						}else{
							echo '<h3 class="bottom-border">Selling Products!</h3>';
							if($countOrder[0]>=4){
								$showOrder = $objOrder->getOrderProduct (0, 4);
							}else{
								$showOrder = $objOrder->getOrderProduct (0, $countBlog[0]);
							}
							foreach($showOrder as $set){
					?>
							<div class="article">
								<a href="?action=viewProduct&id=<?php echo $set['product_id']; ?>" class="thumb1">
									<img src="<?php echo '../controller/public/client/images/product/'.$set['product_image']; ?>" 
									alt="<?php echo $set['product_name']; ?>"
									title="<?php echo $set['product_name']; ?>"/>
								</a>
								<div class="article-details">
									<h4><a href="?action=viewProduct&id=<?php echo $set['product_id']; ?>" tabindex="-1"><?php echo $set['product_name']; ?></a></h4>
									<?php
										if($set['product_currency']== 'vnđ' || $set['product_currency']== 'đ' || $set['product_currency']== 'vnd' || $set['product_currency']== 'đồng'){
											if($set['product_discount']!=0){
									?>
												<span class="new-price left"><?php  echo number_format($set['product_discount'],2).' '.$set['product_currency']; ?></span>
												<span class="old-price right"><?php echo number_format($set['product_price'],2).' '.$set['product_currency']; ?></span>
										<?php
											}else{
										?>
												<center><span class="new-price"><?php echo number_format($set['product_price'],2).' '.$set['product_currency']; ?></span></center>
									<?php 	} 
										}
										else{
											if($set['product_discount']!=0){
									?>
												<span class="new-price left"><?php  echo $set['product_currency'].' '.number_format($set['product_discount'],2); ?></span>
												<span class="old-price right"><?php echo $set['product_currency'].' '.number_format($set['product_price'],2); ?></span>
										<?php
											}else{
										?>
												<center><span class="new-price"><?php echo $set['product_currency'].' '.number_format($set['product_price'],2); ?></span></center>
									<?php
											} 
										}
									?>
								</div>
							</div>
					<?php
							}
						}
					?>
                    </div>
                   <!--  end -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END DETAIL BLOG -->
<?php include '../views/client/footer.php'; ?>