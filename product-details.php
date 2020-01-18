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
			header('location:my-cart.php');
		}else{
			$message="Product ID is invalid";
		}
	}
}
$pid=intval($_GET['pid']);
if(isset($_GET['pid']) && $_GET['action']=="wishlist" ){
	if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else
{
mysqli_query($con,"insert into wishlist(userId,productId) values('".$_SESSION['id']."','$pid')");
echo "<script>alert('Product aaded in wishlist');</script>";
header('location:my-wishlist.php');

}
}
if(isset($_POST['submit']))
{
	$qty=$_POST['quality'];
	$price=$_POST['price'];
	$value=$_POST['value'];
	$name=$_POST['name'];
	$summary=$_POST['summary'];
	$review=$_POST['review'];
	mysqli_query($con,"insert into productreviews(productId,quality,price,value,name,summary,review) values('$pid','$qty','$price','$value','$name','$summary','$review')");
}


?>


















<!doctype html>
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
  <link rel="stylesheet" href="css/lightslider.min.css">
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="css/all.css">
  <!-- flaticon CSS -->
  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/themify-icons.css">
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="css/magnific-popup.css">
  <!-- style CSS -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
   <!--::header part start::-->
    <?php include('includes/top-header.php');?>
    <?php include('includes/menu-bar.php');?>
    <!-- Header part end-->

  <!-- breadcrumb start-->
   <section class="" style="height: 355px;">
      <div class="cat_img" style="padding: 60px 0 0 0">
     
            
            <div class="container">
                   <img src="img/80671824_831507687350462_3370956243916029952_n.jpg" alt="" height="330px" width="100%">

            </div>
      </div>
       
    </section>
  <!-- breadcrumb start-->
  <!--================End Home Banner Area =================-->

  <!--================Single Product Area =================-->
  <div class="product_image_area section_padding">
    <div class="container">
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
      <div class="row s_product_inner justify-content-between">
       
       
       
       
       
        <div class="col-lg-7 col-xl-7">
         
         
         <?php 
$ret=mysqli_query($con,"select * from products where id='$pid'");
while($row=mysqli_fetch_array($ret))
{

?>
         
         
         
         
         
         
         
         
          <div class="product_slider_img">
            <div id="vertical">
              <div data-thumb="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>">
                <img src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" >
              </div>
              <div data-thumb="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage2']);?>">
                <img src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage2']);?>" >
              </div>
              
              <div data-thumb="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage3']);?>">
                <img src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage3']);?>" >
              </div>
              
            </div>
          </div>
        </div>
        <div class="col-lg-5 col-xl-4">
          <div class="s_product_text">
            
            <h3><?php echo htmlentities($row['productName']);?></h3>
            <h2>৳. <?php echo htmlentities($row['productPrice']);?></h2>
            <ul class="list">
              <li>
                <p class="active">
                  <span>Category</span> : Household</p>
              </li>
              <li>
                <p> <span>Availibility</span> : <?php echo htmlentities($row['productAvailability']);?></p>
              </li>
            </ul>
            
            <div class="card_area d-flex justify-content-between align-items-center">
              <div class="product_count">
                <span class="inumber-decrement"> <i class="ti-minus"></i></span>
                <input class="input-number" type="text" value="1" min="0" max="10">
                <span class="number-increment"> <i class="ti-plus"></i></span>
              </div>
              
              
              <a href="product-details.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="btn_3">add to cart</a>
              
              
              
<!--              <a href="#" class="btn_3">add to cart</a>-->
              
            </div>
          </div>
        </div>
      </div>
      
      <?php } ?>
      
    </div>
  </div>
  <!--================End Single Product Area =================-->

  <!--================Product Description Area =================-->
  <section class="product_description_area">
    <div class="container">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
            aria-selected="true">Description</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
            aria-selected="false">Specification</a>
        </li>
       
       
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
          <p>
            <?php echo htmlentities($row['productAvailability']);?>
          </p>
          <p>
            It is often frustrating to attempt to plan meals that are designed
            for one. Despite this fact, we are seeing more and more recipe
            books and Internet websites that are dedicated to the act of
            cooking for one. Divorce and the death of spouses or grown
            children leaving for college are all reasons that someone
            accustomed to cooking for more than one would suddenly need to
            learn how to adjust all the cooking practices utilized before into
            a streamlined plan of cooking that is more efficient for one
            person creating less
          </p>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <td>
                    <h5>Width</h5>
                  </td>
                  <td>
                    <h5>2 ft</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>Height</h5>
                  </td>
                  <td>
                    <h5>4 ft</h5>
                  </td>
                </tr>
                
                <tr>
                  <td>
                    <h5>Weight</h5>
                  </td>
                  <td>
                    <h5>3 kg</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>Quality checking</h5>
                  </td>
                  <td>
                    <h5>yes</h5>
                  </td>
                </tr>
               
              </tbody>
            </table>
          </div>
        </div>
       

      </div>
    </div>
  </section>
  <!--================End Product Description Area =================-->

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

    <!--::footer_part start::-->
    <footer class="footer_part">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-sm-4 col-lg-4">
                    <div class="single_footer_part">
                        <h4>Furnitrend</h4>
                        <ul class="list-unstyled">
                            <li><a href="">About</a></li>
                            <li><a href="">Privacy</a></li>
                            <li><a href="">Terms</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4 col-lg-4">
                    <div class="single_footer_part">
                        <h4>More Information</h4>
                        <ul class="list-unstyled">
                            <li><a href="">Rent</a></li>
                            <li><a href="">Delivery</a></li>
                            <li><a href="">Return</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4 col-lg-4">
                    <div class="single_footer_part">
                        <h4>Explore</h4>
                        <ul class="list-unstyled">
                            <li><a href="">Contact</a></li>
                            <li><a href="">Career</a></li>
                            <li><a href="">FAQs</a></li>
                        </ul>
                    </div>
                </div>
               
              
            </div>
            
        </div>
        <div class="copyright_part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="copyright_text">
                            <P><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy; All rights reserved by Furnitrend 
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></P>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="footer_icon social_icon">
                            <ul class="list-unstyled">
                                <li><a href="#" class="single_social_icon"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" class="single_social_icon"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" class="single_social_icon"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#" class="single_social_icon"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--::footer_part end::-->

  <!-- jquery plugins here-->
  <!-- jquery -->
  <script src="js/jquery-1.12.1.min.js"></script>
  <!-- popper js -->
  <script src="js/popper.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.min.js"></script>
  <!-- easing js -->
  <script src="js/jquery.magnific-popup.js"></script>
  <!-- swiper js -->
  <script src="js/lightslider.min.js"></script>
  <!-- swiper js -->
  <script src="js/masonry.pkgd.js"></script>
  <!-- particles js -->
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.nice-select.min.js"></script>
  <!-- slick js -->
  <script src="js/slick.min.js"></script>
  <script src="js/swiper.jquery.js"></script>
  <script src="js/jquery.counterup.min.js"></script>
  <script src="js/waypoints.min.js"></script>
  <script src="js/contact.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/jquery.form.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/mail-script.js"></script>
  <script src="js/stellar.js"></script>
  <!-- custom js -->
  <script src="js/theme.js"></script>
  <script src="js/custom.js"></script>
</body>

</html>