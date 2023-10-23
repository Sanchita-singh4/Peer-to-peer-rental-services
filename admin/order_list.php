<?php 
 include('top.php');




$sql="select * from user order by id desc";
$res=mysqli_query($con,$sql);
$count=mysqli_num_rows($res);

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
                                                <th class="product-remove"><span class="nobr">Order Id</span></th>
                                                <th class="product-name"><span class="nobr">Order Date</span></th>
                                                <th class="product-price"><span class="nobr"> Address </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Payment Type </span></th>
                                                <th class="product-add-to-cart"><span class="nobr"> Payment Status</span></th>
                                                <th class="product-add-to-cart"><span class="nobr"> Order Status</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            
                                            $uid=$_SESSION['USER_ID'];
                                            
                                            $res=mysqli_query($con,"select user_order.*,order_status.name as
                                            order_status from user_order,order_status where
                                             order_status.id= user_order.order_status");
                                            while($row=mysqli_fetch_assoc($res)){
                                            ?>

                                            <tr>
                                            <td class="product-add-to-cart"><a href="order_list_detail.php?id=<?php 
                                            echo $row['id'] ?>"><?php echo $row['id'] ?></td>
                                            <td class="product-name"><?php echo $row['added_on'] ?></td>
                                            <td class="product-name">
                                              <?php echo $row['address'] ?><br/>
                                              <?php echo $row['city'] ?><br/>
                                              <?php echo $row['pincode'] ?><br/>
                                            </td>
                                            <td class="product-name"><?php echo $row['payment_type'] ?></td>
                                            <td class="product-name"><?php echo $row['payment_status'] ?></td>
                                            <td class="product-name"><?php echo $row['order_status'] ?></td>
                                                
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                      </table>
                  </div>
				       </div>
              </div>
            </div>
          </div>
        
<?php include('footer.php');?>