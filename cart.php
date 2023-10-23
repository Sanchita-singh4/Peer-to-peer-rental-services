<?php 
 require('top.php');

 
?> 
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/5.webp) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">shopping cart</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="cart-main-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="#">               
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">products</th>
                                            <th class="product-name">name of products</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Day</th>
                                            <th class="product-quantity">Security Charge</th>
                                            
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php
                                         foreach($_SESSION['cart'] as $key=>$val){
                                         $productArr=get_product($con,'','',$key);
                                         $pname=$productArr[0]['dress_name'];
                                         $price=$productArr[0]['price'];
                                         $rent_price=$productArr[0]['rent_price'];
                                         $security_charge=$productArr[0]['security_charge'];
                                         $image=$productArr[0]['image'];
                                         $qty=$val['qty'];

                                         ?>
                                         <tr>
                                            <td class="product-thumbnail"><a href="#"><img src="<?php  echo SITE_DRESS_IMAGE. $image ?>" /></a></td>
                                            <td class="product-name"><a href="#"><?php  echo  $pname ?></a>
                                                <ul  class="pro__prize">
                                                    <li class="old__prize"><?php  echo   $price ?></li>
                                                    <li><?php  echo   $rent_price ?></li>
                                                </ul>
                                            </td>
                                            <td class="product-price"><span class="amount"><?php  echo   $rent_price ?>
                                            </span></td>
                                            <td class="product-quantity"><input type="number" id="<?php  echo $qty ?> qty"
                                             value="<?php  echo $qty ?>"/>
                                             <td class="product-price"><span class="amount"><?php  echo   $security_charge ?>
                                            </span></td>
                                              <br/><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','update')"> </a>
                                            </td>
                                            <td class="product-subtotal"><?php  echo  ( $qty*$rent_price)+$security_charge ?></td>
                                            <td class="product-remove"><a href="javascript:void(0)"  onclick=
                                            "manage_cart('<?php echo $key?>','remove')"><i class="icon-trash icons"
                                            ></i></a></td>
                                         </tr>
                                         <?php } ?>
                                      </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="buttons-cart--inner">
                                        <div class="buttons-cart">
                                            <a href="<?php  echo SITE_IMAGE?>">Continue Shopping</a>
                                        </div>
                                        <div class="buttons-cart checkout--btn">
                                            <a href="#">update</a>
                                            <a href="<?php echo SITE_IMAGE?>checkout.php">checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
        <?php require('footer.php'); ?>