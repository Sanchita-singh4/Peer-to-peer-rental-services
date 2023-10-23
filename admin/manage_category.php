<?php
include('top.php');
isAdmin();
$msg="";
$dress_category="";
$booking_number="";
$id="";

if(isset($_GET['id']) && $_GET['id']>0){
  $id= get_safe_value($_GET['id']);
  $row=mysqli_fetch_assoc( mysqli_query($con, "select * from category where id='$id' "));
  $dress_category= $row['dress_category'];
  $booking_number= $row['booking_number'];
} 

if( isset($_POST['submit'])){
   $dress_category= get_safe_value($_POST['dress_category']);
   $booking_number= get_safe_value($_POST['booking_number']);
   $added_on=date('Y-m-d h:i:s');
   
   if($id==''){
      $sql= "select* from category where dress_category= '$dress_category' ";
   }  else{
      $sql="select* from category where dress_category='$dress_category' and id !='$id' ";
    }   
      if(mysqli_num_rows(mysqli_query($con,$sql))>0){
      $msg=" product allready added";
   }else{
      if($id==''){
         mysqli_query($con,"insert into category(dress_category,booking_number,status,added_on)values('$dress_category','$booking_number',1,'$added_on')");
      }else{
         mysqli_query($con,"update category set  dress_category='$dress_category', booking_number='$booking_number' where id='$id' ");
      }
      redirect('category.php');
   }
}
?>
<div class="row">
	<h1 class="card-title ml10">Manage Category</h1>
   <div class="col-12 grid-margin stretch-card">
     <div class="card">
       <div class="card-body">
         <form class="forms-sample"  method="post">
           <div class="form-group">
              <label for="exampleInputName1" >Dress Category</label>
              <input type="text" class="form-control"  placeholder="Dress Category" name="dress_category" required value="<?php echo $dress_category?>">
              <div class="error"><?php echo $msg?></div>
           </div>
           <div class="form-group">
             <label for="exampleInputEmail3" required>Booking Number</label>
             <input type="textbox" class="form-control"  placeholder=" Booking Number" name="booking_number" value="<?php echo $booking_number?>">
           </div>
            <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
            
         </form>
      </div>
   </div>
  </div>
</div>
<?php include('footer.php');?>
