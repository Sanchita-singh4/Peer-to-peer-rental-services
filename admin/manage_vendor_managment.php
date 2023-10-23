<?php
include('top.php');
$msg="";

$username="";
$email="";
$mobile="";
$password="";


if(isset($_GET['id']) && $_GET['id']>0){
  $id= get_safe_value($_GET['id']);
  $row=mysqli_fetch_assoc( mysqli_query($con, "select * from admin where id='$id' "));
  $username= $row['username'];
  $email= $row['email'];
  $mobile= $row['mobile'];
  $password= $row['password'];
  

} 

if( isset($_POST['submit'])){
   $username= get_safe_value($_POST['username']);
   $email= get_safe_value($_POST['email']);
   $mobile= get_safe_value($_POST['mobile']);
   $password= get_safe_value($_POST['password']);
   
    
  
      $res= mysqli_query($con,"select* from admin where username='$username' ");
      $check=mysqli_num_rows( $res);
      if($check>0){
         if(isset($_GET['id']) && $_GET['id']!=''){
            $getData=mysqli_fetch_assoc($res);
            if($id==$getData['id']){

            }else{
               $msg="username allready added";
            }
         }else{
            $msg="username allready added";
         }
      }
     
   

      if($msg==''){
         if(isset($_GET['id']) && $_GET['id']!=''){
            mysqli_query($con,"update admin set  username='$username',email='$email', mobile='$mobile',password='$password' where id='$id' ");
         }else{
         mysqli_query($con,"insert into admin(username,email,mobile,password,status,role)values('$username','$email','$mobile','$password',1,1)");
      }
      redirect('vendor_managment.php');
      }

   
}
?>
<div class="row">
	<h1 class="card-title ml10">Manage Vendor</h1>
   <div class="col-12 grid-margin stretch-card">
     <div class="card">
       <div class="card-body">
         <form class="forms-sample"  method="post">
           <div class="form-group">
              <label for="exampleInputName1" >Username</label>
              <input type="text" class="form-control"  placeholder="username" Name="username" required value="<?php echo $username?>">
              <div class="error"><?php echo $msg?></div>
           </div>
           <div class="form-group">
              <label for="exampleInputName1" >Email</label>
              <input type="email" class="form-control"  placeholder="email" Name="email" required value="<?php echo $email?>">
              <div class="error"><?php echo $msg?></div>
           </div>
           <div class="form-group">
             <label for="exampleInputEmail3" required>Mobile</label>
             <input type="textbox" class="form-control"  placeholder="Mobile" name="mobile" value="<?php echo $mobile?>">
           </div>
           <div class="form-group">
             <label for="exampleInputEmail3" required>Password</label>
             <input type="textbox" class="form-control"  placeholder="Password" name="password" value="<?php echo $password?>">
           </div>
            <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
            
         </form>
      </div>
   </div>
  </div>
</div>
<?php include('footer.php');?>
