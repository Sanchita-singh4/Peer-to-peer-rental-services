<?php
include('top.php');

$condition='';
$condition1='';
if($_SESSION['ADMIN_ROLE']==1){
 $condition=" and dress.added_by='".$_SESSION['ADMIN_ID']."'";
 $condition1=" and dress.added_by='".$_SESSION['ADMIN_ID']."'";
}

$msg="";
$category_id="";
$dress_name="";
$price="";
$rent_price="";
$security_charge="";
$qty="";
$short_desc="";
$meta_litle="";
$meta_desc="";
$discription="";
$image="";
$id="";
$image_status='required';
$image_error="";

if(isset($_GET['id']) && $_GET['id']>0){
  $id= get_safe_value($_GET['id']);
  $row=mysqli_fetch_assoc( mysqli_query($con, "select * from dress where id='$id' $condition1 "));
  $category_id= $row['category_id'];
  $dress_name= $row['dress_name'];
  $price= $row['price'];
  $rent_price= $row['rent_price'];
  $security_charge= $row['security_charge'];
  $qty= $row['qty'];
  $short_desc= $row['short_desc'];
  $meta_litle= $row['meta_litle'];
  $meta_desc= $row['meta_desc'];
  $discription= $row['discription'];
  $image= $row['image'];
  $image_status='';

} 

if( isset($_POST['submit'])){
   $category_id= get_safe_value($_POST['category_id']);
   $dress_name= get_safe_value($_POST['dress_name']);
   $price= get_safe_value($_POST['price']);
   $rent_price= get_safe_value($_POST['rent_price']);
   $security_charge= get_safe_value($_POST['security_charge']);
   $qty= get_safe_value($_POST['qty']);
   $short_desc= get_safe_value($_POST['short_desc']);
   $meta_litle= get_safe_value($_POST['meta_litle']);
   $meta_desc= get_safe_value($_POST['meta_desc']);
   $discription= get_safe_value($_POST['discription']);
   $added_on=date('Y-m-d h:i:s');
   
   if($id==''){
      $sql= "select* from dress where dress_name= '$dress_name'  $condition1 ";
   }  else{
      $sql="select* from dress where dress_name='$dress_name' and id !='$id'";
    }   
      if(mysqli_num_rows(mysqli_query($con,$sql))>0){
      $msg="Dress allready added";
   }else{
      $type=$_FILES['image']['type'];
      if($id==''){
          if($type!='image/jpeg' && $type!='image/png'){
            $image_error="ivalid image format";
          }else{
             $image=$_FILES['image']['name'];
             move_uploaded_file($_FILES['image']['tmp_name'],SERVER_DRESS_IMAGE.$_FILES['image']['name']);
             mysqli_query($con,"insert into 
             dress(category_id,dress_name,price,rent_price,security_charge,qty,
             short_desc,meta_litle,meta_desc,discription,status,added_on,image ,added_by)values('
             $category_id','$dress_name','$price','$rent_price','$security_charge','$qty','$short_desc',
             '$meta_litle','$meta_desc','$discription',1,'$added_on','$image','".$_SESSION['ADMIN_ID']."')");
             redirect('dress.php'); 
          }
           }else{
           $image_condition='';
           if($_FILES['image']['name']!=''){
            if($type!='image/jpeg' && $type!='image/png'){
               $image_error="ivalid image format";
             }else{
               $image=$_FILES['image']['name'];
               move_uploaded_file($_FILES['image']['tmp_name'],SERVER_DRESS_IMAGE.$_FILES
               ['image']['name']);
               $image_condition=", image='$image'";
             }
         }if($image_error==''){
           $sql="update dress set category_id='$category_id',dress_name='$dress_name',
           price='$price',rent_price='$rent_price',security_charge='$security_charge',qty='$qty',
           short_desc='$short_desc',meta_litle='$meta_litle',meta_desc='$meta_desc',
           discription='$discription' $image_condition where id='$id' ";
            mysqli_query($con,$sql);
            redirect('dress.php');
        
         }
      }
   }
}
$res_category=mysqli_query($con,"select * from category where status='1'order by dress_category asc");
?>
<div class="row">
	<h1 class="card-title ml10">Manage Dress</h1>
   <div class="col-12 grid-margin stretch-card">
     <div class="card">
       <div class="card-body">
         <form class="forms-sample"  method="post" enctype="multipart/form-data">
           <div class="form-group">
              <label for="exampleInputName1" >Category</label>
              <select class="form-control" name ="category_id" require >
                <option value=""> Select Category</option>
                <?php 
                while($row_category=mysqli_fetch_assoc($res_category)){
                  if($row_category['id']==$category_id){
                     echo "<option value='".$row_category['id']."' selected> ".$row_category
                     ['dress_category']."</option>";
                  }else{
                     echo "<option value='".$row_category['id']."'> ".$row_category
                     ['dress_category']."</option>";
                  }

                  }
                ?>
              </select>
           </div>
           <div class="form-group">
             <label for="exampleInputEmail3">Dress Name</label>
             <input type="textbox" class="form-control"  placeholder="Dress Name" name=
             "dress_name" required value="<?php echo $dress_name?>">
             <div class="error"><?php echo $msg?></div>
           </div>
           <div class="form-group">
             <label for="exampleInputEmail3">Price </label>
             <input type="textbox" class="form-control"  placeholder="Price" name=
             "price" required value="<?php echo $price?>">
           </div>
           <div class="form-group">
             <label for="exampleInputEmail3">Rent Price </label>
             <input type="textbox" class="form-control"  placeholder="Rent Price" name=
             "rent_price" required value="<?php echo $rent_price?>">
           </div>
           <div class="form-group">
             <label for="exampleInputEmail3">TXT</label>
             <input type="textbox" class="form-control"  placeholder="Security Charge" name=
             "security_charge" required value="<?php echo $security_charge?>">
           </div>
           <div class="form-group">
             <label for="exampleInputEmail3">Day</label>
             <input type="textbox" class="form-control"  placeholder="Qty " name=
             "qty" required value="<?php echo $qty?>">  
           </div>
           <div class="form-group">
             <label for="exampleInputEmail3"> Short Desc</label>
             <textarea name="short_desc" class="form-control" placeholder=
             "DiscrShort"> <?php echo $short_desc ?>
              </textarea>
           </div>
           <div class="form-group">
             <label for="exampleInputEmail3">Meta Litle </label>
             <textarea name="meta_litle" class="form-control" placeholder=
             "Meta Litle"> <?php echo $meta_litle ?>
              </textarea>
             </div>
           <div class="form-group">
             <label for="exampleInputEmail3">Meta Desc</label>
             <textarea name="meta_desc" class="form-control" placeholder=
             "Meta Desc"> <?php echo $meta_desc ?>
              </textarea>
           </div>
           <div class="form-group">
             <label for="exampleInputEmail3" required>Discription</label>
             <textarea name="discription" class="form-control" placeholder=
             "Discription"> <?php echo $discription ?>
              </textarea>
           </div>
           <div class="form-group">
             <label for="exampleInputEmail3">Dress Image</label>
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
