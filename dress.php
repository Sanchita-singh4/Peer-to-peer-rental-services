<?php
require('top.php');

 $product_id= mysqli_real_escape_string($con,$_GET['id']);
 $get_product= get_product($con,'','',$product_id);
?>

<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/5.webp) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <a class="breadcrumb-item" href="category.php?id=<?php  echo  $get_product['0'][
                                    'category_id']?>"> <?php  echo  $get_product['0']['dress_category']?></a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active"><?php  echo  $get_product['0']['dress_name']?></span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Details Area -->
        <section class="htc__product__details bg__white ptb--100" " >
            <!-- Start Product Details Top -->
            <div class="htc__product__details__top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                            <div class="htc__product__details__tab__content">
                                <!-- Start Product Big Images -->
                                <div class="product__big__images">
                                    <div class="portfolio-full-image tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                            <img src ="<?php  echo SITE_DRESS_IMAGE. $get_product['0']['image']
                                            ?>" alt="full-image">
                                        </div>
                                    </div>
                                </div>
                                <!-- End Product Big Images -->
                                
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40 ">
                            <div class="ht__product__dtl">
                                <h2><?php  echo  $get_product['0']['dress_name']?></h2>
                                <ul  class="pro__prize">
                                    <li class="old__prize"><?php  echo  $get_product['0']['price']?></li>
                                    <li><?php  echo  $get_product['0']['rent_price']?></li>
                                </ul>
                                <p class="pro__info"><?php  echo  $get_product['0']['short_desc']?></p>
                                <p class="pro__info"><?php  echo  $get_product['0']['meta_litle']?></p>
                                <p class="pro__info"><?php  echo  $get_product['0']['meta_desc']?></p>
                                
                                <div class="ht__pro__desc">
                                    <div class="sin__desc align--left">
                                        <p><span>Categories:</span></p>
                                        <ul class="pro__cat__list">
                                            <li><a href="#"><?php  echo  $get_product['0']['dress_category']?></a></li>
                                        </ul>
                                    </div>
                                    <div class> Availability:</div>
                                        <div class="sin__desc mb-3" style=" margin-bottom: 15px;">
                                        <p><span>Days:</span>
                                        <select  id="qty<?php echo $get_product['0']['id']?>">
                                            <option value="0">Days </option>
                                            <?php 
                                            for($i=1;$i<=10;$i++){
                                                echo "<option>$i</option>";
                                            }
                                            ?>
                                        </select>
                                        </p>
                                    </div>
                                   
                                        </div>
                                        <a class="fr__btn"  href="javascript:void(0)"  onclick="manage_cart('<?php echo $get_product['0']['id']?>'
                                    ,'add')"> Book Now</a>
                                    </div> 
                                    </div>
                                </div>
                                
                                                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    <!-- Start Product Description -->
        <section class="htc__produc__decription bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- Start List And Grid View -->
                        <ul class="pro__details__tab" role="tablist">
                            <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab">description</a></li>
                        </ul>
                        <!-- End List And Grid View -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="ht__pro__details__content">
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                                <div class="pro__tab__content__inner">
                                    <?php  echo  $get_product['0']['discription']?>
                                </div>
                            </div>
                            <!-- End Single Content -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Description -->
            <!-- End Product Details Top -->
        </section>
<!-- End Product Details Area -->


<?php include('footer.php'); ?>

