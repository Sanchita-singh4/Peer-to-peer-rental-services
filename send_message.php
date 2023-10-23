<?php
require('database.inc.php');
require('constant.inc.php');
include('functions.inc.php');

$name=get_safe_value($_POST['name']);
$email=get_safe_value($_POST['email']);
$mobile=get_safe_value($_POST['mobile']);
$comment=get_safe_value($_POST['message']);
$added_on=date('Y-m-d h:i:s');

mysqli_query($con,"insert into contact_us(name, email,mobile,comment,added_on)values
('$name','$email','$mobile','$comment','$added_on')");

echo ("thank you");
?>