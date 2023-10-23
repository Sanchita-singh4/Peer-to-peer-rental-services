<?php 
require('top.php');
?>

<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/5.webp) no-repeat scroll center center / cover ;">
  <div class="ht__bradcaump__wrap">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="bradcaump__inner">
               <nav class="bradcaump-inner">
                  <a class="breadcrumb-item" href="index.php">Home</a>
                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                  <span class="breadcrumb-item active">Thank You</span>
                </nav>
              </div>
           </div>
       </div>
     </div>
  </div>
</div>
<!-- End Bradcaump area -->
<!-- cart-main-area start -->
        <!-- wishlist-area start -->
        <div class="wishlist-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wishlist-content">
                        <h1 style="font-size: 25px;
                          margin-left: 20px;
                          margin-bottom: 20px;">
                          My Order 
                        </h1>
                            <form action="#">
                                
                                <div class="wishlist-table table-responsive">
                                    <table>
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
                                            order_status from user_order,order_status where user_order.user_id='$uid' and order_status.id= user_order.order_status");
                                            while($row=mysqli_fetch_assoc($res)){
                                            ?>

                                            <tr>
                                            <td class="product-add-to-cart"><a href="my_order_detail.php?id=<?php 
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- wishlist-area end -->
<?php include('footer.php'); ?>