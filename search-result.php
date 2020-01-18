<?php
session_start();
error_reporting(0);
include('includes/config.php');
$find="%{$_POST['product']}%";
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
			header('location:my-cart.php');
		}else{
			$message="Product ID is invalid";
		}
	}
}
// COde for Wishlist
if(isset($_GET['pid']) && $_GET['action']=="wishlist" ){
	if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else
{
mysqli_query($con,"insert into wishlist(userId,productId) values('".$_SESSION['id']."','".$_GET['pid']."')");
echo "<script>alert('Product aaded in wishlist');</script>";
header('location:my-wishlist.php');

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
    <!-- nice select CSS -->
    <link rel="stylesheet" href="css/nice-select.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/price_rangs.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
     <!--::header part start::-->
     <?php include('includes/top-header.php');?>
     <?php include('includes/menu-bar.php');?>
        
    <!-- Header part end-->
    
    <!--================Home Banner Area =================-->
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

<!--================Category Product Area =================-->
    <section class="cat_product_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                     
                        
                        
                        
                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                              <h3>Product filters</h3>
                            </div>
                            <div class="widgets_inner">
                            
                            <?php 
                                $sql=mysqli_query($con,"select id,subcategory  from subcategory3 ");
                                while($row=mysqli_fetch_array($sql)){
                            ?>

                            <ul class="list">
                                <li>
                                    <p>
                                        <?php echo $row['subcategory'];?>
                                    </p>
                                    <span>()</span>
                                </li>
                                <?php }?>
                            </ul>
                            </div> 
                        </aside>

                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Color Filter</h3>
                            </div>
                            <div class="widgets_inner">
                            
                            <?php 
                                $sql=mysqli_query($con,"select id,subcategory  from subcategory2 ");
                                while($row=mysqli_fetch_array($sql)){
                            ?>

                            <ul class="list">
                                <li>
                                    <p>
                                        <?php echo $row['subcategory'];?>
                                    </p>
                                    <span>()</span>
                                </li>
                                <?php }?>
                            </ul>
                            </div> 
                        </aside>
<!--

                        <aside class="left_widgets p_filter_widgets price_rangs_aside">
                            <div class="l_w_title">
                                <h3>Price Filter</h3>
                            </div>
                            <div class="widgets_inner">
                                <div class="range_item">
                                     <div id="slider-range"></div> 
                                    <input type="text" class="js-range-slider" value="" />
                                    <div class="d-flex">
                                        <div class="price_text">
                                            <p>Price :</p>
                                        </div>
                                        <div class="price_value d-flex justify-content-center">
                                            <input type="text" class="js-input-from" id="amount" readonly />
                                            <span>to</span>
                                            <input type="text" class="js-input-to" id="amount" readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </aside>
-->
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product_top_bar d-flex justify-content-between align-items-center">
<!--
                                <div class="single_product_menu">
                                    <p><span>37 </span> Prodict Found</p>
                                </div>
-->
<!--
                                <div class="single_product_menu d-flex">
                                    <h5>short by : </h5>
                                    <select>
                                        <option data-display="Select">name</option>
                                        <option value="1">price</option>
                                        <option value="2">product</option>
                                    </select>
                                </div>

                                <div class="single_product_menu d-flex">
                                    <h5>show :</h5>
                                    <div class="top_pageniation">
                                        <ul>
                                            <li>1</li>
                                            <li>2</li>
                                            <li>3</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="single_product_menu d-flex">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="search"
                                            aria-describedby="inputGroupPrepend">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"><i class="ti-search"></i></span>
                                        </div>
                                    </div>
                                </div>
-->
                            </div>
                        </div>
                    </div>
                    
                    <div class="row align-items-center latest_product_inner">
                          
                        <?php

                            $ret = mysqli_query($con,"select * from products where productName like '%$find%'");
                            $num = mysqli_num_rows($ret);
                            if($num>0){
                                while ($row=mysqli_fetch_array($ret)){
                        ?>	

                        <div class="col-lg-4 col-sm-6">
                            <div class="single_product_item">
                                   
                                <a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
                                    <img src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" alt="Product" >
                                </a>

                                <div class="single_product_text">
                                    <h4><?php echo htmlentities($row['productName']);?></h4>
                                    
                                    <h3>৳. <?php echo htmlentities($row['productPrice']);?></h3>

                                    <ul class="list-unstyled nav">
                                        <li class="nav-item">
                                            <a href="category.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="add_cart">
                                                + add to cart
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="add-to-cart" href="category.php?pid=<?php echo htmlentities($row['id'])?>&&action=wishlist" title="Wishlist">
                                                <i class="ti-heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> 

                        <?php } } else {?>

                        <div class="col-sm-6 col-md-4 wow fadeInUp"> <h3>No Product Found</h3>
                        </div>

                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Category Product Area =================-->

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
    <script src="js/stellar.js"></script>
    <script src="js/price_rangs.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>

</html>