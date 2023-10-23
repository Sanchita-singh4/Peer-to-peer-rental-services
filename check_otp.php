<?php
require('database.inc.php');
require('constant.inc.php');
require('functions.inc.php');

$otp=get_safe_value($_POST['otp']);
$type=get_safe_value($_POST['type']);
if($type=='email'){
	if($otp== $_SESSION['EMAIL_OTP']){
		echo "done";
	}else{
		echo  "no";
	}
}




?>