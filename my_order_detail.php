<?php 
require('top.php');
$order_id=get_safe_value($_GET['id']);

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
                    <div class="col-md-12 col-sm-12 col-xs-12" style=" width: 65%; margin-left: 148px;">
                        <div class="wishlist-content">
                        <h1 style="font-size: 25px;
                          margin-left: 20px;
                          margin-bottom: 20px;">
                          My Order Details 
                        </h1>
                            <form action="#">
                                <div class="wishlist-table table-responsive">
                                    <table>
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
                                            order_detail.*,dress.dress_name,dress.image,order_detail.security_charge  from order_detail,dress
                                            ,user_order where order_detail.order_id='$order_id' and user_order.user_id='
                                            $uid' and order_detail.product_id=dress.id");
                                            while($row=mysqli_fetch_assoc($res)){
                                            ?>

                                            <tr>
                                            <td class="product-name"><?php echo $row['dress_name'] ?></td>
                                            <td class="product-name"><img src ="<?php  echo SITE_DRESS_IMAGE.$row['image'] 
                                            ?>"></td>
                                            <td class="product-name"><?php echo $row['qty'] ?></td>
                                            <td class="product-name"><?php echo $row['security_charge'] ?></td>
                                            <td class="product-name"><?php echo $row['rent_price'] ?></td>
                                            <td class="product-name"><?php echo $row['rent_price']*$row['qty']+$row['security_charge']?></td>
                                                
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