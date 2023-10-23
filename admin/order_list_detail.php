<?php 
 include('top.php');
 isAdmin();


 $order_id=get_safe_value($_GET['id']);
 if(isset($_POST['update_order_status'])){
$update_order_status=$_POST['update_order_status'];
mysqli_query($con,"update user_order set order_status='$update_order_status' where id= '$order_id'");
 }

?>
  <div class="card">
            <div class="card-body">
              <h1 class="grid_title">Order List</h1>
			        
              <div class="row grid_box">
				        <div class="col-12">
                  <div class="table-responsive">
                  <table id="order-listing" class="table">
                                        <thead>
                                            <tr>
                                                <th class="product-remove"><span class="nobr">Product Name </span></th>
                                                <th class="product-name"><span class="nobr">Product Image</span></th>
                                                <th class="product-price"><span class="nobr"> Days </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Security Charge</span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Rent Price</span></th>
                                                <th class="product-add-to-cart"><span class="nobr">Total Price</span></th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $uid=$_SESSION['USER_ID'];

                                         

                                            $res=mysqli_query($con,"select  distinct(order_detail.id),
                                            order_detail.*,dress.dress_name,dress.image, user_order.address, user_order.city,
                                             user_order.pincode,user_order.order_status from order_detail,dress
                                            ,user_order where order_detail.order_id='$order_id' and user_order.user_id='
                                            $uid' and order_detail.product_id=dress.id");
                                            while($row=mysqli_fetch_assoc($res)){
                                              $address=$row['address'];
                                              $city=$row['city'];
                                              $pincode=$row['pincode'];
                                              $order_status=$row['order_status'];
                                            ?>

                                            <tr>
                                            <td class="product-name"><?php echo $row['dress_name'] ?></td>
                                            <td class="product-name"><img src ="<?php  echo SITE_DRESS_IMAGE.$row['image'] 
                                            ?>"></td>
                                            <td class="product-name"><?php echo $row['qty'] ?></td>
                                            <td class="product-name"><?php echo $row['security_charge'] ?></td>
                                            <td class="product-name"><?php echo $row['rent_price'] ?></td>
                                            <td class="product-name"><?php echo $row['rent_price']*$row['qty']+$row['security_charge'] ?></td>
                                                
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                 <div id="address_details">
                                  <strong>Adress</strong>
                                  <?php echo $address ?>,<?php echo $city ?>,<?php echo $pincode ?><br/><br/>
                                  <strong> Order Stauts</strong>
                                  <?php
                                  $order_status_arr=mysqli_fetch_assoc(mysqli_query($con, "select name from order_status
                                  where id='$order_status'"));
                                 echo $order_status_arr['name']; 
                                  ?>

                                  <div>
                                    <form method="post">

                                    <select class="form-control" name ="update_order_status"  >
                <option value=""> Select Status</option>
                <?php 
                $res=mysqli_query($con,"select * from order_status ");
                while($row_category=mysqli_fetch_assoc($res)){
                  if($row_category['id']==$category_id){
                     echo "<option value='".$row_category['id']."' selected> ".$row_category['name']."</option>";
                  }else{
                     echo "<option value='".$row_category['id']."'> ".$row_category ['name']."</option>";
                  }

                  }
                ?>
              </select>
              <input type="submit" class="from-control"/>
                                    </form>
                                  </div>

                                 </div>           
                                            

                 
                  </div>
				       </div>
              </div>
            </div>
          </div>
        
<?php include('footer.php');?>