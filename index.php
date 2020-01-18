<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
			header('location:index.php');
		}else{
			$message="Product ID is invalid";
		}
	}
}


?>





<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Furnitrend</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!--::header part start::-->
    <?php include('includes/top-header.php');?>
    <?php include('includes/menu-bar.php');?>
    
    <!-- Header part end-->

    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="banner_slider owl-carousel">
                        <div class="single_banner_slider">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1>Bed room</h1>
                                            <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                                suspendisse ultrices gravida. Risus commodo viverra</p>
                                            <a href="all.php" class="btn_2">buy now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img src="img/slide/room/bedroom.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="single_banner_slider">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1>Living room</h1>
                                            <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                                suspendisse ultrices gravida. Risus commodo viverra</p>
                                            <a href="all.php" class="btn_2">buy now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img src="img/slide/room/livingroom.png" alt="">
                                </div>
                            </div>
                        </div>
                    
                            <div class="single_banner_slider">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1>Dining room</h1>
                                            <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                                suspendisse ultrices gravida. Risus commodo viverra</p>
                                            <a href="all.php" class="btn_2">buy now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img src="img/slide/room/dining.png" alt="">
                                </div>
                            </div>
                        </div>

                    </div>
<!--                    <div class="slider-counter"></div>-->
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->


    <!-- product_list start-->
    <section class="product_list section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>New arrival <span><a href="all.php">all</a></span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="product_list_slider owl-carousel">
                        <div class="single_product_list_slider">
                            <div class="row align-items-center justify-content-between">
                              
<?php
$ret=mysqli_query($con,"select * from products  order by rand() limit 4");
while ($row=mysqli_fetch_array($ret)) 
{



?>

                               <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                       
                                       <a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
                                          
                                           
                                           
                                           <img src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>"alt="Product">
                                           
                                           
                                           
                                           
                                       </a>
                                        
                                        <div class="single_product_text">
                                            <h4>
                                                
                                                    <?php echo htmlentities($row['productName']);?>
                                                
                                            </h4>
                                            
                                            <h3>৳ <?php echo htmlentities($row['productPrice']);?></h3>
                                            
                                            <a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="add_cart">+ add to cart</a>
<!--                                            <a href="#" class="add_cart">+ add to cart</a>-->
                                        </div>
                                    </div>
                                </div><?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product_list part start-->



    <!-- product_list part start-->
       <section class="product_list section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Popular Product <span><a href="all.php">all</a></span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="product_list_slider owl-carousel">
                        <div class="single_product_list_slider">
                            <div class="row align-items-center justify-content-between">
                              
<?php
$ret=mysqli_query($con,"select * from products  order by rand() limit 4");
while ($row=mysqli_fetch_array($ret)) 
{



?>

                               <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                       
                                       <a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
                                          
                                           
                                           
                                           <img src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>"alt="Product">
                                           
                                           
                                           
                                           
                                       </a>
                                        
                                        <div class="single_product_text">
                                            <h4>
                                                
                                                    <?php echo htmlentities($row['productName']);?>
                                                
                                            </h4>
                                            
                                            <h3>৳ <?php echo htmlentities($row['productPrice']);?></h3>
                                            
                                            <a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="add_cart">+ add to cart</a>
<!--                                            <a href="#" class="add_cart">+ add to cart</a>-->
                                        </div>
                                    </div>
                                </div><?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product_list part end-->
    
    <!-- product_list part start-->
    <section class="product_list best_seller section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>For Rent <span><a href="all.php">all</a></span></h2>
                    </div>
                </div>
            </div>
            
            
            
            
            
            
            
            
            
  <div class="row">
                <div class="col-lg-12">
                    <div class="product_list_slider owl-carousel">
                        <div class="single_product_list_slider">
                            <div class="row align-items-center justify-content-between">
                              
<?php
$ret=mysqli_query($con,"select * from products where category = 2 limit 4");
while ($row=mysqli_fetch_array($ret)) 
{



?>

                               <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                       
                                       <a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
                                          
                                           
                                           
                                           <img src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>"alt="Product">
                                           
                                           
                                           
                                           
                                       </a>
                                        
                                        <div class="single_product_text">
                                            <h4><?php echo htmlentities($row['productName']);?></h4>
                                            
                                            <h3>৳ <?php echo htmlentities($row['productPrice']);?></h3>
                                            
                                            <a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="add_cart">+ add to cart</a>
<!--                                            <a href="#" class="add_cart">+ add to cart</a>-->
                                        </div>
                                    </div>
                                </div><?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <!-- product_list part end-->


    <!--::footer_part start::-->
    <?php include('includes/footer.php');?>
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="js/masonry.pkgd.js"></script>
    <!-- particles js -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- slick js -->
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>

</html>