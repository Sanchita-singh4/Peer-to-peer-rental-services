<?php 
require('top.php');

if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0){
    ?>
     <script>
      window.location.href='index.php';
      </script>
    <?php
}

$cart_total="";
$cart_sub_total=0;
foreach  ($_SESSION['cart'] as $key=>$val){
   $productArr=get_product($con,'','',$key);
   $rent_price=$productArr[0]['rent_price'];
   $security_charge=$productArr[0]['security_charge'];
   $qty=$val['qty'];
   $cart_sub_total=$cart_sub_total+($rent_price*$qty);
   $cart_total=($cart_sub_total+ $security_charge);
}

if(isset($_POST['submit'])){
    $address=get_safe_value($_POST['address']);
    $city=get_safe_value($_POST['city']);
    $pincode=get_safe_value($_POST['pincode']);
    $payment_type=get_safe_value($_POST['payment_type']);
    $user_id=$_SESSION['USER_ID'];
    $total_price=$cart_total;
    $payment_status='pending'; 
    if($payment_type=='cod'){
        $payment_status='success';
    }
    $order_status='1'; 
    $added_on=date('Y-m-d h:i:s');
     
    mysqli_query($con,"insert into
    user_order(user_id,address,city,pincode,payment_type,total_price,payment_status,order_status,added_on)values('$user_id','
    $address','$city','$pincode','$payment_type','$total_price','$payment_status','$order_status','$added_on')");

   $order_id=mysqli_insert_id($con);
   
   foreach  ($_SESSION['cart'] as $key=>$val){
   $productArr=get_product($con,'','',$key);
   $rent_price=$productArr[0]['rent_price'];
   $security_charge=$productArr[0]['security_charge'];
   $qty=$val['qty'];

   mysqli_query($con,"insert into
   order_detail(order_id,product_id,qty,rent_price,security_charge)values('$order_id','
    $key','$qty','$rent_price','$security_charge')");
  }
    unset($_SESSION['cart'])
    ?>
       <script>
         window.location.href='thank_you.php';
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
                                  <span class="breadcrumb-item active">checkout</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="checkout-wrap ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="checkout__inner">
                            <div class="accordion-list">
                                <div class="accordion">
                                    
                                     <?php 
                                         $accordion_class='accordion__title';
                                         if(!isset($_SESSION['USER_LOGIN'])){  
                                         $accordion_class='accordion__hide';     
                                      ?>
                                      <div class="accordion__title">
                                        Checkout Method
                                    </div>
                                    <div class="accordion__body">
                                        <div class="accordion__body__form">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="checkout-method__login">
                                                    <form id="login-form"  method="post">
                                                            <h5 class="checkout-method__title">Login</h5>
                                                            <div class="single-input">
                                                                <input type="email" name="login_email" id="login_email"  placeholder=
                                                                "Your Email*" style="width:100%">
                                                                <span class="field_error" id="login_email_error"></span>
                                                            </div>
                                                            
                                                            <div class="single-input">
                                                                
                                                                <input type="password" name="login_password" id="login_password" placeholder=
                                                                "Your Password*" style="width:100%">
                                                                <span class="field_error" id="login_password_error"></span>
                                                            </div>
                                                            
                                                            <p class="require">* Required fields</p>
                                                            <div class="dark-btn">
                                                            <button type="button" class="fv-btn" onclick="user_login()">Login</button>
                                                            </div>
                                                        </form>
                                                        <div class="form-output  login_msg">
									                    <p class="form-messege field_error"></p>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="checkout-method__login">
                                                    <form id="register-form"  method="post">
                                                            <h5 class="checkout-method__title">Register</h5>
                                                            <div class="single-input">
                                                            <input type="text" name="name" id="name" placeholder="Your Name*" 
                                                            style="width:100%">
                                                            <span class="field_error" id="name_error"></span>
                                                            </div>
                                                            
															<div class="single-input">
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
                                                             <span class="field_error" id="email_error"></span>
                                                            </div>
															
                                                            <div class="single-input">                          
                                                            <input type="tel" name="mobile"  id="mobile" placeholder="0123456789" 
									 		                  style="width:100%" pattern="[0-9]{10}">
                                                              
                                                               <span class="field_error" id="mobile_error"></span>           
										                    </div>
										                        
                                                            <div class="single-input">
                                                            <input type="password" name="password" id="password"  placeholder="Your Password*" 
											                style="width:100%" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                                            <span class="field_error" id="password_error"></span>
                                                            </div>
                                                            
                                                            <div class="dark-btn">
                                                            <button type="button" class="fv-btn" onclick="user_register()">Register</button>
                                                            </div>
                                                        </form>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <div class="<?php echo $accordion_class ?>">
                                        Address Information
                                    </div>
                                    <div class="accordion__body">
                                        <div class="bilinfo">
                                            <form method="post">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <input type="text" name="address"  placeholder="Street Address"  required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" name="city"  placeholder="City/State" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" name="pincode"  placeholder="Post code/ zip" required>
                                                        </div>
                                                    </div>
                                                </div>
            
                                               </div>
                                               </div>
                                                <div class="<?php echo $accordion_class ?>">
                                                 payment information
                                                </div>
                                              <div class="accordion__body">
                                                 <div class="paymentinfo">
                                                      <div class="single-method">
                                                           COD <input type="radio" name="payment_type"  value="COD" required/> 
                                                           &nbsp;  PayU <input type="radio" name="payment_type"  value="PayU" required/> 
                                                         </div>
                                                          <div class="single-method">
                                                           
                                                      </div>
                                                   </div>
                                              </div>
                                              <input type="submit" name="submit" required> 
                                           <form>
                                       </div>
                                 </div>
                           </div>
                    </div>
                    <div class="col-md-4">
                        <div class="order-details">
                            <h5 class="order-details__title">Your Order</h5>
                            <div class="order-details__item">
                            <?php 
                                  $cart_total="";
                                   $cart_sub_total=0;
                                   foreach  ($_SESSION['cart'] as $key=>$val){
                                    $productArr=get_product($con,'','',$key);
                                    $pname=$productArr[0]['dress_name'];
                                    $price=$productArr[0]['price'];
                                    $rent_price=$productArr[0]['rent_price'];
                                    $security_charge=$productArr[0]['security_charge'];
                                    $image=$productArr[0]['image'];
                                    $qty=$val['qty'];
                                    $cart_sub_total=$cart_sub_total+($rent_price*$qty);
                                    $cart_total=($cart_sub_total+ $security_charge);
                                     ?>
                                   
                                <div class="single-item">
                                    <div class="single-item__thumb">
                                        <img src ="<?php  echo SITE_DRESS_IMAGE. $image ?>" />
                                    </div>
                                    <div class="single-item__content">
                                        <a href="#"><?php  echo  $pname ?></a>
                                        <span class="price"><?php  echo   $rent_price*$qty ?></span> 
                                    </div>
                                    <div class="single-item__remove">
                                    <a href="javascript:void(0)"  onclick=
                                    "manage_cart('<?php echo $key?>','remove')"><i class="zmdi zmdi-delete"></i></a>
                                    </div>
                                </div>
                               <?php } ?>
                            </div>
                            <div class="order-details__count">
                                <div class="order-details__count__single">
                                    <h5>sub total</h5>
                                    <span class="price"><?php echo  $cart_sub_total?></span>
                                </div>
                                <div class="order-details__count__single">
                                    <h5>Security Charge</h5>
                                    <span class="price"><?php  echo $security_charge ?></span>
                                </div>
                            </div>
                            <div class="ordre-details__total">
                                <h5>Order total</h5>
                                <span class="price"><?php echo  $cart_total?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
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