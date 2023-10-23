<?php include ('top.php');
if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']='yes'){
?>
 <script>
  window.location.href="index.php";
 </script>
<?php

}
?>

<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/5.webp) no-repeat scroll center center / cover ;">
  <div class="ht__bradcaump__wrap">
   <div class="container">
     <div class="row">
       <div class="col-xs-12">
         <div class="bradcaump__inner">
           <nav class="bradcaump-inner">
             <a class="breadcrumb-item" href="index.html">Home</a>
             <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
             <span class="breadcrumb-item active">Login</span>
           </nav>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>
<!-- End Bradcaump area -->
<section class="htc__contact__area ptb--100 bg__white" style="background-color: bisque;">
            <div class="container">
                <div class="row">
					<div class="col-md-6">
						<div class="contact-form-wrap mt--60">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6">Login</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form id="login-form"  method="post">
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="email" name="login_email" id="login_email"  placeholder="Your Email*" style="width:100%">
										</div>
										<span class="field_error" id="login_email_error"></span>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="password" name="login_password" id="login_password" placeholder="Your Password*" style="width:100%">
										</div>
										<span class="field_error" id="login_password_error"></span>
									</div>
									
									<div class="contact-btn">
										<button type="button" class="fv-btn" onclick="user_login()" >Login</button>
									</div>
								</form>
								<div class="form-output  login_msg">
									<p class="form-messege field_error"></p>
								</div>
							</div>
						</div> 
                
				</div>
				

					<div class="col-md-6">
						<div class="contact-form-wrap mt--60">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6">Register</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form id="register-form"  method="post">
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="name" id="name" placeholder="Your Name*"
										  style="width:100%">
										</div>
										<span class="field_error" id="name_error"></span>
									</div>
									
									<div class="single-contact-form">
										<div class="contact-box name">
										<input type="text" name="email" id="email"  placeholder="Your Email*" 
										style="width:45%">

										<button type="button" class="fv-btn-email-sent-otp" onclick="email_sent_otp()">
										Send Otp</button>

										<input type="text"  id="email_otp"  placeholder="OTP" 
										style="width:45%" 
										class="email_verify_otp" >

										<button type="button" class="fv-btn
										email_verify_otp" onclick="email_verify_otp()">Verify Otp</button>

										<span id="email_otp_result"></span>
									</div>
									<span class="field_error" id="email_error"></span>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="tel" name="mobile"  id="mobile" placeholder="Your Mobile*" 
											style="width:100%" minlength="10" pattern="[0-9]{10}" required>
										
										</div>
										<span class="field_error" id="mobile_error"></span>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="password" name="password" id="password"  placeholder="Your Password*" 
											style="width:100%" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
										</div>
										<span class="field_error" id="password_error"></span>
									</div>
									
									<div class="contact-btn">
										<button type="button" class="fv-btn" onclick="user_register()" id="btn_register" disabled>Register</button>
									</div>
								</form>
								<div class="form-output  register_msg">
									<p class="form-messege field_error"></p>
								</div>
							</div>
						</div> 
                
				</div>
					
            </div>
        </section>
				<input type="hidden" id="is_email_verified"/>
<script>
					function email_sent_otp(){
						jQuery('#email_error').html('');
						var email=jQuery('#email').val();
						if(email==''){
                  jQuery('#email_error').html('Please Enter  Email Id');
						}else{
							jQuery('.fv-btn-email-sent-otp').html('please wait..');
							jQuery('.fv-btn-email-sent-otp').attr('disabled',true);
							jQuery.ajax({
                url:'send_otp.php',
							  type:'post',
							  data:'email='+email+'&type=email',
							  success:function(result){
                  if(result=='done'){
									 jQuery('#email').attr('disabled',true);
						       jQuery('.email_verify_otp').show();
						       jQuery('.fv-btn-email-sent-otp').hide();
									}else{
										jQuery('.fv-btn-email-sent-otp').html('Send Otp');
							      jQuery('.fv-btn-email-sent-otp').attr('disabled',false);
										jQuery('#email_error').html('Please  try after sometime'); 

									}
								}
							 });
						}
					}
					function email_verify_otp(){
						jQuery('#email_error').html('');
						var email_otp=jQuery('#email_otp').val();
						if(email_otp==''){
            jQuery('#email_error').html('Please Enter  Otp');
						}else{
							jQuery.ajax({
                url:'check_otp.php',
							  type:'post',
							  data:'otp='+email_otp+'&type=email',
							  success:function(result){
                  if(result=='done'){
										jQuery('.email_verify_otp').hide();
					        	jQuery('#email_otp_result').html('Email Id Verified')
										jQuery('#is_email_verified').val(1);
										if(jQuery('#is_email_verified').val()==1){
											jQuery('#btn_register').attr('disabled',false);
										}
									}else{
										jQuery('#email_error').html('Please Enter valid OtP ');

									}
								}
							 });
						}
					}
		
</script>
<?php include('footer.php'); ?>