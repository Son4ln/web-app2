<?php 
	include '../views/client/header.php'; 
?>
<!-- Contact -->
<section class="section white" style="text-align: left;">
    <div class="container">
        <div class="inside-container">
            <div class="section-title">
                <h3 class="title1 fancy"><span>Contact Us</span></h3>
            </div>
			<h2 class="title1" style="font-size: 24px; margin-top: 0">We would love to hear from you.</h2>
            <div class="row">
                <div class="col-md-8 ">
                    <div role="form" class="" id="" lang="en-US">
						<div class="screen-reader-response"></div>
                        <form action="" method="post" class="contact-form" novalidate="novalidate">
							<div class="row">
								<div class="col-md-12">
									<span class="contact-form-control-wrap name"><input type="text" name="name" value="" size="40" class="contact-form-control contact-text contact-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="Full Name"></span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<span class="contact-form-control-wrap address"><input type="text" name="txt-address" value="" size="40" class="contact-form-control contact-address contact-address contact-validates-as-required contact-validates-as-address form-control" aria-required="true" aria-invalid="false" placeholder="Address"></span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<span class="contact-form-control-wrap email"><input type="email" name="email" value="" size="40" class="contact-form-control contact-text contact-email contact-validates-as-required contact-validates-as-email form-control" aria-required="true" aria-invalid="false" placeholder="Email" required=""></span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<span class="contact-form-control-wrap subject"><input type="text" name="txt-subject" value="" size="40" class="contact-form-control contact-subject contact-subject contact-validates-as-required contact-validates-as-subject form-control" aria-required="true" aria-invalid="false" placeholder="Subject"></span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<span class="contact-form-control-wrap message"><textarea name="message" cols="40" rows="7" class="contact-form-control contact-textarea form-control" aria-invalid="false" placeholder="Message"></textarea></span>
								</div>
							</div>
							<p><input type="submit" value="Send" class="contact-form-control contact-submit btn btn-ghost"><span class="ajax-loader"></span></p>
                        </form>
					</div>
                </div>
                <div class="col-md-4 ">
					<?php
						$objContact = new Contact();
						$showContact = $objContact->getShowContactInfo();
					?>
                    <p><strong><span class="alt">Vietnam Phone: </span><?php echo $showContact['vietnam_phone']; ?></strong></p>
					<p><strong><span class="alt">Australia Phone: </span><?php echo $showContact['australia_phone']; ?></strong></p>
                    <p><strong><span class="alt">Fax: </span><?php echo $showContact['fax']; ?></strong></p>
                    <p><strong><span class="alt">Email: </span><?php echo $showContact['contact_email']; ?></strong></p>
                    <p><strong><span class="alt"><br>
                    <?php echo $showContact['company_name']; ?></span></strong></p>
                    <p><strong><span class="alt">Address: </span> <?php echo $showContact['address']; ?></strong></p>
					<?php if(isset($showContact['headquarters'])){
					?>
					<p><strong><span class="alt">Headquarters: </span> <?php echo nl2br($showContact['headquarters']); ?></strong></p>
					<?php
					}
					if(isset($showContact['branch'])){
					?>
					<p><strong><span class="alt">Branch: </span> <?php echo nl2br($showContact['branch']); ?></strong></p>
					<?php
					}
					?>
                </div>
            </div>
			<?php
			if(isset($showContact['map'])){
			?>
				<h2 class="title1" style="font-size: 24px; margin-top: 20px">Google Map</h2>
				<div class="row">
					<?php echo nl2br($showContact['map']); ?>
				</div>
			<?php
			}
			?>
        </div>
    </div>
</section>
<!-- END contact -->
<?php include '../views/client/footer.php'; ?>