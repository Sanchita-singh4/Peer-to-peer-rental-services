<?php
require('database.inc.php');
require('constant.inc.php');
require('functions.inc.php');

$name=get_safe_value($_POST['name']);
$email=get_safe_value($_POST['email']);
$mobile=get_safe_value($_POST['mobile']);
$password=get_safe_value($_POST['password']);
$added_on=date('Y-m-d h:i:s');

$check_user=mysqli_num_rows(mysqli_query($con,"select* from user where email='$email'"));
if($check_user>0){

  echo "email_present";

}else{

mysqli_query($con,"insert into user(name, email,mobile,password,status,added_on)values
('$name','$email','$mobile','$password',1,'$added_on')");

echo "insert";
}


?>