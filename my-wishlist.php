<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:index.php');
}
else{
// Code forProduct deletion from  wishlist	
$wid=intval($_GET['del']);
if(isset($_GET['del']))
{
$query=mysqli_query($con,"delete from wishlist where id='$wid'");
}


if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	$query=mysqli_query($con,"delete from wishlist where productId='$id'");
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);	
header('location:my-wishlist.php');
}
		else{
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
    

    <div class="body-content outer-top-bd">
        <div class="container">
            <div class="my-wishlist-page inner-bottom-sm">
                <div class="row">
                    <div class="col-md-12 my-wishlist">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th colspan="4">My wishlist</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                   
                                    <?php
    
                                    $ret = mysqli_query($con,"select products.productName as pname,products.productName as proid,products.productImage1 as pimage,products.productPrice as pprice,wishlist.productId as pid,wishlist.id as wid from wishlist join products on products.id=wishlist.productId where wishlist.userId='".$_SESSION['id']."'");
    
                                    $num = mysqli_num_rows($ret);
                                    if($num>0){
                                        while ($row=mysqli_fetch_array($ret)) {

                                    ?>
                                    <tr>
                                        <td class="col-md-4">
                                            <img src="admin/productimages/<?php echo htmlentities($row['pid']);?>/<?php echo htmlentities($row['pimage']);?>" alt="<?php echo htmlentities($row['pname']);?>" width="70" height="110">
                                        </td>
                                        
                                        <td class="col-md-3">
                                            <div class="product-name">
                                                <a href="product-details.php?pid=<?php echo htmlentities($pd=$row['pid']);?>" style="color: rgb(102, 12, 35)">
                                                    <?php echo htmlentities($row['pname']);?>
                                                </a>
                                            </div>
                                            
                                            <?php 
                                                $rt = mysqli_query($con,"select * from productreviews where productId='$pd'");
                                                $num = mysqli_num_rows($rt);
                                            {
                                            ?>

                                            <div class="rating">
<!--                                                <span class="review">( <?php echo htmlentities($num);?> Reviews )</span>-->
                                            </div>
                                            
                                            <?php } ?>
                                            
                                            <div class="price" style="color: rgb(102, 12, 35)">
                                               ৳. <?php echo htmlentities($row['pprice']);?>.00
                                            </div>
                                        </td>
                                        
                                        <td class="col-md-3">
                                            <a href="my-wishlist.php?page=product&action=add&id=<?php echo $row['pid']; ?>" class="btn_2">Add to cart</a>
                                        </td>
                                        
                                        <td class="col-md-2 close-btn">
                                            <a href="my-wishlist.php?del=<?php echo htmlentities($row['wid']);?>" onClick="return confirm('Are you sure you want to delete?')" class=""><i class="fa fa-times" style="color: rgb(102, 12, 35)"></i></a>
                                        </td>
                                    </tr>
                                    <?php } } else{ ?>
                                    <tr>
                                    
                                        <td style="font-size: 18px; font-weight:bold ">Your Wishlist is Empty</td>

                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
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
<?php } ?>