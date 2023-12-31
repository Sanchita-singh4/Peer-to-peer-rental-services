<?php 
 include('database.inc.php');
 include('functions.inc.php');
 $msg="";
 if(isset($_POST['submit'])){
	  $username=get_safe_value($_POST['username']);
	  $password=get_safe_value($_POST['password']);
     
    $sql= "select * from admin where  username='$username' and password='$password'";
    $res=mysqli_query($con,$sql);
	  if(mysqli_num_rows($res)>0){
        $row=mysqli_fetch_assoc($res);
        if($row['status']=='0'){
          $msg="Account deactivated";
        }else{
          $_SESSION['IS_LOGIN']='yes';
          $_SESSION['ADMIN_ID']=$row['id'];
          $_SESSION['ADMIN_USERNAME']=$username;
          $_SESSION['ADMIN_ROLE']=$row['role'];
		     redirect('index.php');
        }
	  }else{
		$msg="Please enter correct login details";	
	  }
 }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Drss Rent Admin Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/css/bootstrap-datepicker.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="sidebar-light">
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
            <div class="brand-logo text-center">
             <a href="../index.php"> <img src="assets/images/logo.png" alt="logo"></a>
              </div>
              <h6 class="font-weight-light">Sign in to continue.</h6>

              <form class="pt-3" method="post">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" 
                  id="exampleInputEmail1" placeholder="username" name="username"
                   required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" 
                  id="exampleInputPassword1" placeholder="Password" name="password" 
                  required>
                </div>
                <div class="mt-3">
                  
                  <input type="submit" class="btn btn-block btn-primary btn-lg 
                  font-weight-medium auth-form-btn" value="sign in"name="submit"/>
                </div> 
              </form>
              <div class="login_msg"> <?php echo $msg?></div>

              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  

  <!-- plugins:js -->
  <script src="assets/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="assets/js/Chart.min.js"></script>
  <script src="assets/js/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/template.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="assets/js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>
</html>