<?php
include('top.php');
isAdmin();
$msg="";
$heading1="";
$heading2="";
$btn_text="";
$btn_link="";
$image="";

$id="";
$image_status='required';
$image_error="";


if(isset($_GET['id']) && $_GET['id']>0){
  $id= get_safe_value($_GET['id']);
  $row=mysqli_fetch_assoc( mysqli_query($con, "select * from banner where id='$id' "));
  $heading1= $row['heading1'];
  $heading2= $row['heading2'];
  $btn_text= $row['btn_text'];
  $btn_link= $row['btn_link'];
  $image= $row['image'];
  $order_number= $row['order_number'];
  $image_status='';
} 
$order_number="";
if( isset($_POST['submit'])){
   $heading1= get_safe_value($_POST['heading1']);
   $heading2= get_safe_value($_POST['heading2']);
   $btn_text= get_safe_value($_POST['btn_text']);
   $btn_link= get_safe_value($_POST['btn_link']);
   
   $added_on=date('Y-m-d h:i:s');
 
   
     
      if($id==''){
        $type=$_FILES['image']['type'];
        if($type!='image/jpeg' && $type!='image/png'){
          $image_error="invalid image format";
        }else{
           $image=$_FILES['image']['name'];
           move_uploaded_file($_FILES['image']['tmp_name'],SERVER_BANNER_IMAGE.$_FILES['image']['name']);
           mysqli_query($con,"insert into banner(heading1,heading2,btn_text,btn_link,order_number,image,status,added_on)values('$heading1
          ','$heading2','$btn_text','$btn_link','$order_number','$image',1,'$added_on')");
           redirect('banner.php'); 
        }
      }else{
        if($_FILES['image']['name']==''){
         mysqli_query($con,"update banner set  heading1='$heading1', heading2='$heading2', btn_text='$btn_text',
          btn_link='$btn_link' where id='$id' ");
         redirect('banner.php');
        }else{
          $type=$_FILES['image']['type'];
          if($type!='image/jpeg' && $type!='image/png'){
            $image_error="invalid image format";
          }else{
            move_uploaded_file($_FILES['image']['tmp_name'],SERVER_BANNER_IMAGE.$image);
            mysqli_query($con,"update banner set  heading1='$heading1', heading2='$heading2', btn_text='$btn_text',
            btn_link='$btn_link', image='$image' where id='$id' ");
            redirect('banner.php');
          }

        }
      
    } 
   
}

?>
<div class="row">
	<h1 class="card-title ml10">Manage banner</h1>
   <div class="col-12 grid-margin stretch-card">
     <div class="card">
       <div class="card-body">
        <form class="forms-sample"  method="post" enctype="multipart/form-data">
           <div class="form-group">
              <label for="exampleInputName1" >Heading1</label>
              <input type="text" class="form-control"  placeholder="Dress banner" name="heading1" required value=
              "<?php echo $heading1?>">
             
           </div>
           <div class="form-group">
              <label for="exampleInputName1" >Heading2</label>
              <input type="text" class="form-control"  placeholder="Dress banner" name="heading2" required value="<?php echo $heading2?>">
              
           </div>
           <div class="form-group">
              <label for="exampleInputName1" >Btn Text</label>
              <input type="text" class="form-control"  placeholder="Dress banner" name="btn_text" required value=
              "<?php echo $btn_text?>">
              
           </div>
           <div class="form-group">
              <label for="exampleInputName1" >Btn Link</label>
              <input type="text" class="form-control"  placeholder="Dress banner" name="btn_link" required value=
              "<?php echo $btn_link?>">
              <div class="error"><?php echo $msg?></div>
           </div>
           <div class="form-group">
             <label for="exampleInputEmail3" required>Image</label>
             <input type="file" class="form-control"  placeholder=
             "Dress Image" name="image" <?php echo $image_status?>>
             <div class="error"><?php echo $image_error?></div>
           </div>
            <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
            
         </form>
      </div>
   </div>
  </div>
</div>
<?php include('footer.php');?>
