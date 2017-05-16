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
						<?php
							echo '<center><p>'.$messages.'</p></center>';
						?>
                        <form action="?action=send_mail" method="post" class="contact-form" novalidate="novalidate">
							<div class="row">
								<div class="col-md-12">
									<input type="text" name="fname" id="name" value="" size="80%" class="form-control" placeholder="Full Name" onblur="blurFunction_name()">
								</div>
								<div class="col-md-12" id="alert-fname"></div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<input type="text" name="address" id="address" value="" size="80%" class="form-control" placeholder="Address" onblur="blurFunction_address()">
								</div>
								<div class="col-md-12" id="alert-address"></div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<input type="email" name="from" value="" id="email" size="80%" class="form-control" placeholder="Email" onblur="blurFunction_email()">
								</div>
								<div class="col-md-12" id="alert-email"></div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<input type="text" name="subject" value=""  id="title" size="80%" class="form-control" placeholder="Subject" onblur="blurFunction_title()">
								</div>
								<div class="col-md-12" id="alert-title"></div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<textarea name="message" cols="80%" rows="7"  id="text-t" class="form-control" placeholder="Message" onblur="blurFunction_text()"></textarea>
								</div>
								<div class="col-md-12" id="alert-text"></div>
							</div>
							<p><input type="submit" value="Send"  class="btn btn-primary btn-login" ></p>
                        </form>
					</div>
                </div>
                <div class="col-md-4 ">
					<?php
						$objContact = new contactInfo();
						$showContact = $objContact->getContactInfo();
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

<script>
/* Contact */
	function validate(){
		var name =document.getElementById('name').value;
		if(name.length == 0 || name ==" ") {
			document.getElementById('alert-fname').innerHTML = "Please enter a full name.";
			document.getElementById('alert-fname').style.color = "#ea1a77";
		}
		else if(name.length < 6) {
			document.getElementById('alert-fname').innerHTML = "Full name must be >6 characters.";
			document.getElementById('alert-fname').style.color = "#ea1a77";
		}else{
			document.getElementById('alert-fname').innerHTML = "";
		}
		
		var t =document.getElementById('address').value;
		if(t.length < 15) {
			document.getElementById('alert-address').innerHTML = "Please enter an address.";
			document.getElementById('alert-address').style.color = "#ea1a77";
		}else{
			document.getElementById('alert-address').innerHTML = "";
		}
		
		var email = document.getElementById('email').value;
		if(email.length == 0) {
			document.getElementById('alert-email').innerHTML = "Please enter a email.";
			document.getElementById('alert-email').style.color = "#ea1a77";
		}
		else if(email.indexOf("@")==(-1) || email.indexOf(".")==(-1)) {
			document.getElementById('alert-email').innerHTML = "Email entered the wrong rules.";
			document.getElementById('alert-email').style.color = "#ea1a77";
		}else{
			document.getElementById('alert-email').innerHTML = "";
		}
		
		var title =document.getElementById('title').value;
		if(title.length == 0 || title ==" ") {
			document.getElementById('alert-title').innerHTML = "Please enter a subject.";
			document.getElementById('alert-title').style.color = "#ea1a77";
		}else{
			document.getElementById('alert-title').innerHTML = "";
		}
		
		var t =document.getElementById('text-t').value;
		if(t.length == 0 || t ==" ") {
			document.getElementById('alert-text').innerHTML = "Please enter a message.";
			document.getElementById('alert-text').style.color = "#ea1a77";
		}else{
			document.getElementById('alert-text').innerHTML = "";
		}
	}
/*-------------*/	
	function blurFunction_name() {
		var name =document.getElementById('name').value;
		if(name.length == 0 || name ==" ") {
			document.getElementById('alert-fname').innerHTML = "Please enter a full name.";
			document.getElementById('alert-fname').style.color = "#ea1a77";
		}
		else if(name.length < 6) {
			document.getElementById('alert-fname').innerHTML = "Full name must be >6 characters.";
			document.getElementById('alert-fname').style.color = "#ea1a77";
		}else{
			document.getElementById('alert-fname').innerHTML = "";
		}
	}
	
	function blurFunction_address() {
		var t =document.getElementById('address').value;
		if(t.length <15) {
			document.getElementById('alert-address').innerHTML = "Please enter an address";
			document.getElementById('alert-address').style.color = "#ea1a77";
		}else{
			document.getElementById('alert-address').innerHTML = "";
		}
	}
	
	function blurFunction_email() {
		var email = document.getElementById('email').value;
		if(email.length == 0) {
			document.getElementById('alert-email').innerHTML = "Please enter a email.";
			document.getElementById('alert-email').style.color = "#ea1a77";
		}
		else if(email.indexOf("@")==(-1) || email.indexOf(".")==(-1)) {
			document.getElementById('alert-email').innerHTML = "Email entered the wrong rules.";
			document.getElementById('alert-email').style.color = "#ea1a77";
		}else{
			document.getElementById('alert-email').innerHTML = "";
		}
	}
	function blurFunction_title() {
		var title =document.getElementById('title').value;
		if(title.length == 0 || title ==" ") {
			document.getElementById('alert-title').innerHTML = "Please enter a subject.";
			document.getElementById('alert-title').style.color = "#ea1a77";
		}else{
			document.getElementById('alert-title').innerHTML = "";
		}
	}
	function blurFunction_text() {
		var t =document.getElementById('text-t').value;
		if(t.length == 0 || t ==" ") {
			document.getElementById('alert-text').innerHTML = "Please enter a message.";
			document.getElementById('alert-text').style.color = "#ea1a77";
		}else{
			document.getElementById('alert-text').innerHTML = "";
		}
	}
/* // End contact */
</script>