<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit'])){
		if(!empty($_SESSION['cart'])){
		foreach($_POST['quantity'] as $key => $val){
			if($val==0){
				unset($_SESSION['cart'][$key]);
			}else{
				$_SESSION['cart'][$key]['quantity']=$val;

			}
		}
			echo "<script>alert('Your Cart hasbeen Updated');</script>";
		}
	}
// Code for Remove a Product from Cart
if(isset($_POST['remove_code']))
	{

if(!empty($_SESSION['cart'])){
		foreach($_POST['remove_code'] as $key){
			
				unset($_SESSION['cart'][$key]);
		}
			echo "<script>alert('Your Cart has been Updated');</script>";
	}
}
// code for insert product in order table


if(isset($_POST['ordersubmit'])) 
{
	
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{

	$quantity=$_POST['quantity'];
	$pdd=$_SESSION['pid'];
	$value=array_combine($pdd,$quantity);


		foreach($value as $qty=> $val34){



mysqli_query($con,"insert into orders(userId,productId,quantity) values('".$_SESSION['id']."','$qty','$val34')");
header('location:payment-method.php');
}
}
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
  
  
  
  
  
  

    <!--================Cart Area =================-->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form name="cart" method="post">	
                    <?php
                        if(!empty($_SESSION['cart'])){
                    ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="cart-romove item">Delete</th>
                                <th class="cart-description item">Image</th>
                                <th class="cart-product-name item">Product Name</th>
                                <th class="cart-qty item">Quantity</th>
                                <th class="cart-sub-total item">Price Per item</th>
                                <th class="cart-sub-total item">Shipping Charge</th>
                                <th class="cart-total last-item">Grand total</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <td colspan="7">
                                    <div class="shopping-cart-btn">
                                        <span class="">
                                        <a href="index.php" class="btn_2">Continue Shopping</a>
                                        <input type="submit" name="submit" value="Update cart" class="btn_2 float-right">
                                        </span>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                        <tbody>
                        <?php
                        $pdtid=array();
                        $sql = "SELECT * FROM products WHERE id IN(";
                        foreach($_SESSION['cart'] as $id => $value){
                        $sql .=$id. ",";
                        }
                        $sql=substr($sql,0,-1) . ") ORDER BY id ASC";
                        $query = mysqli_query($con,$sql);
                        $totalprice=0;
                        $totalqunty=0;
                        if(!empty($query)){
                        while($row = mysqli_fetch_array($query)){
                        $quantity=$_SESSION['cart'][$row['id']]['quantity'];
                        $subtotal= $_SESSION['cart'][$row['id']]['quantity']*$row['productPrice']+$row['shippingCharge'];
                        $totalprice += $subtotal;
                        $_SESSION['qnty']=$totalqunty+=$quantity;
                        array_push($pdtid,$row['id']);

                        ?>
                        <tr>
                        <td class="romove-item"><input type="checkbox" name="remove_code[]" value="<?php echo htmlentities($row['id']);?>" /></td>
                        <td class="cart-image">
                        <img src="admin/productimages/<?php echo $row['id'];?>/<?php echo $row['productImage1'];?>" alt="" width="154" height="106">
                        </td>
                        <td class="cart-product-name-info">
                        <h6 class='cart-product-description'><a href="product-details.php?pid=<?php echo htmlentities($pd=$row['id']);?>" style="color: rgb(102, 12, 35)"><?php echo $row['productName'];
                        $_SESSION['sid']=$pd;
                        ?></a></h6>
                        <div class="row">
                        <div class="col-sm-4">
                        <div class="rating rateit-small"></div>
                        </div>
                        <div class="col-sm-8">
                        <?php $rt=mysqli_query($con,"select * from productreviews where productId='$pd'");
                        $num=mysqli_num_rows($rt);
                        {
                        ?>
                        <?php } ?>
                        </div>
                        </div>
                        </td>
                        <td class="cart-product-quantity">
                        <div class="quant-input">

                        <input type="number" value="<?php echo $_SESSION['cart'][$row['id']]['quantity']; ?>" name="quantity[<?php echo $row['id']; ?>]">

                        </div>
                        </td>
                        <td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php echo "৳"." ".$row['productPrice']; ?>.00</span></td>
                        <td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php echo "৳"." ".$row['shippingCharge']; ?>.00</span></td>

                        <td class="cart-product-grand-total"><span class="cart-grand-total-price"><?php echo ($_SESSION['cart'][$row['id']]['quantity']*$row['productPrice']+$row['shippingCharge']); ?>.00</span></td>
                        </tr>

                        <?php } }
                        $_SESSION['pid']=$pdtid;
                        ?>

                        </tbody>
                    </table>
                    </div>














                    <div class="col-md-4 col-sm-12 estimate-ship-tax">
                    <table class="table table-bordered">
                    <thead>
                    <tr>
                    <th>
                    <span class="estimate-title">Shipping Address</span>
                    </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <td>
                    <div class="form-group">
                    <?php $qry=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
                    while ($rt=mysqli_fetch_array($qry)) {
                    echo htmlentities($rt['shippingAddress'])."<br />";
                    echo htmlentities($rt['shippingCity'])."<br />";
                    echo htmlentities($rt['shippingState']);
                    echo htmlentities($rt['shippingPincode']);
                    }

                    ?>

                    </div>

                    </td>
                    </tr>
                    </tbody>
                    </table>
                    </div>



                    <div class="col-md-4 col-sm-12 estimate-ship-tax">
                    <table class="table table-bordered">
                    <thead>
                    <tr>
                    <th>
                    <span class="estimate-title">Billing Address</span>
                    </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <td>
                    <div class="form-group">
                    <?php $qry=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
                    while ($rt=mysqli_fetch_array($qry)) {
                    echo htmlentities($rt['billingAddress'])."<br />";
                    echo htmlentities($rt['billingCity'])."<br />";
                    echo htmlentities($rt['billingState']);
                    echo htmlentities($rt['billingPincode']);
                    }

                    ?>

                    </div>

                    </td>
                    </tr>
                    </tbody><!-- /tbody -->
                    </table><!-- /table -->
                    </div>
                    <div class="col-md-4 col-sm-12 cart-shopping-total">
                    <table class="table table-bordered">
                    <thead>
                    <tr>
                    <th>

                    <div class="cart-grand-total">
                    Grand Total tk. <span class="inner-left-md"><?php echo $_SESSION['tp']="$totalprice". ".00"; ?></span>
                    </div>
                    </th>
                    </tr>
                    </thead><!-- /thead -->
                    <tbody>
                    <tr>
                    <td>
                    <div class="cart-checkout-btn pull-right">
                    <button type="submit" name="ordersubmit" class="btn_2">PROCCED TO CHEKOUT</button>

                    </div>
                    </td>
                    </tr>
                    </tbody><!-- /tbody -->
                    </table>
                    <?php } else {
                    echo "<h2>Your shopping Cart is empty</h2>";
                    }?>
                    </div>
                    </div>
                </form>
            </div>
        </div> 
    </div> 
    
    <!--================End Cart Area =================-->

    <!--::footer_part start::-->
    <?php include('includes/footer.php');?>
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