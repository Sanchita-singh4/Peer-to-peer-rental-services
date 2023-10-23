<?php

require('database.inc.php');
require('add_to_cart.inc.php');
require('constant.inc.php');
include('functions.inc.php');


$pid=get_safe_value($_POST['pid']);
$qty=get_safe_value($_POST['qty']);
$type=get_safe_value($_POST['type']);

$obj=new add_to_cart();

if($type=='add'){
    $obj->addProduct($pid,$qty);
}

if($type=='remove'){
    $obj->removeProduct($pid);
}

if($type=='update'){
    $obj->updateProduct($pid,$qty);
}

echo $obj->totalProduct();

?>