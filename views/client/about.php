<?php 
	include '../views/client/header.php';
	include '../views/client/banner.php';
?>
<!-- ABOUT -->
<section class="section white" style="text-align: left;">
    <div class="container">
    <div class="inside-container">
        <div class="section-title">
            <h3 class="title1 fancy"><span>About Us</span></h3>
        </div>
        <div class="row">
			<div class="col-sm-2"></div>
            <div class="col-sm-8">
				<?php $info = new contactInfo();
					$contact = $info->getContactInfo();
					if($contact['contact_info'] == null){
						echo "<center><h3>Waiting for article updates.</h3></center>";
					}
				?>
            	<p><?php echo nl2br($contact['contact_info'])?></p>
            </div>
			<div class="col-sm-2"></div>
        </div>
    </div>
    </div>
</section>
<!-- END ABOUT -->
<?php include '../views/client/footer.php'; ?>