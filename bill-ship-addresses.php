<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:index.php');
}
else{
	// code for billing address updation
	if(isset($_POST['update']))
	{
		$baddress=$_POST['billingaddress'];
		$bstate=$_POST['bilingstate'];
		$bcity=$_POST['billingcity'];
		$bpincode=$_POST['billingpincode'];
		$query=mysqli_query($con,"update users set billingAddress='$baddress',billingState='$bstate',billingCity='$bcity',billingPincode='$bpincode' where id='".$_SESSION['id']."'");
		if($query)
		{
echo "<script>alert('Billing Address has been updated');</script>";
		}
	}


// code for Shipping address updation
	if(isset($_POST['shipupdate']))
	{
		$saddress=$_POST['shippingaddress'];
		$sstate=$_POST['shippingstate'];
		$scity=$_POST['shippingcity'];
		$spincode=$_POST['shippingpincode'];
		$query=mysqli_query($con,"update users set shippingAddress='$saddress',shippingState='$sstate',shippingCity='$scity',shippingPincode='$spincode' where id='".$_SESSION['id']."'");
		if($query)
		{
echo "<script>alert('Shipping Address has been updated');</script>";
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
    
    
    
       <style>

        .panel-heading h4 a{
            color: rgb(102, 12, 35);
        }
        
        .panel-heading h4 a:hover{
            text-decoration: none;
        }
        
    </style>
    
    
    
    
    
    
    
    
    
    
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
		<div class="checkout-box inner-bottom-sm">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

	<!-- panel-heading -->
		<div class="panel-heading">
    	<h4 class="unicase-checkout-title">
	        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
	          <span>1 </span> Billing Address
	        </a>
	     </h4>
    </div>
    <!-- panel-heading -->

	<div id="collapseOne" class="panel-collapse collapse in">

		<!-- panel-body  -->
	    <div class="panel-body">
			<div class="row">		
				<div class="col-md-12 col-sm-12 already-registered-login">

<?php
$query=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{
?>

					<form class="register-form" role="form" method="post">
<div class="form-group">
					    <label class="info-title" for="Billing Address">Billing Address<span>*</span></label>
					    <textarea class="form-control unicase-form-control text-input"  name="billingaddress" required="required"><?php echo $row['billingAddress'];?></textarea>
					  </div>



						<div class="form-group">
					    <label class="info-title" for="Billing State ">Billing State  <span>*</span></label>
			 <input type="text" class="form-control unicase-form-control text-input" id="bilingstate" name="bilingstate" value="<?php echo $row['billingState'];?>" required>
					  </div>
					  <div class="form-group">
					    <label class="info-title" for="Billing City">Billing City <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="billingcity" name="billingcity" required="required" value="<?php echo $row['billingCity'];?>" >
					  </div>
 <div class="form-group">
					    <label class="info-title" for="Billing Pincode">Billing Pincode <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="billingpincode" name="billingpincode" required="required" value="<?php echo $row['billingPincode'];?>" >
					  </div>


					  <button type="submit" name="update" class="btn_2">Update</button>
					</form>
					<?php } ?>
				</div>	
				<!-- already-registered-login -->		

			</div>			
		</div>
		<!-- panel-body  -->

	</div><!-- row -->
</div>
<!-- checkout-step-01  -->
					    <!-- checkout-step-02  -->
					  	<div class="panel panel-default checkout-step-02">
						    <div class="panel-heading">
						      <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseTwo">
						          <span>2 </span> Shipping Address
						        </a>
						      </h4>
						    </div>
						    <div id="collapseTwo" class="panel-collapse collapse">
						      <div class="panel-body">
						     
				<?php
$query=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{
?>

					<form class="register-form" role="form" method="post">
<div class="form-group">
					    <label class="info-title" for="Shipping Address">Shipping Address<span>*</span></label>
					    <textarea class="form-control unicase-form-control text-input" name="shippingaddress" required="required"><?php echo $row['shippingAddress'];?></textarea>
					  </div>



						<div class="form-group">
					    <label class="info-title" for="Billing State ">Shipping State  <span>*</span></label>
			 <input type="text" class="form-control unicase-form-control text-input" id="shippingstate" name="shippingstate" value="<?php echo $row['shippingState'];?>" required>
					  </div>
					  <div class="form-group">
					    <label class="info-title" for="Billing City">Shipping City <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="shippingcity" name="shippingcity" required="required" value="<?php echo $row['shippingCity'];?>" >
					  </div>
 <div class="form-group">
					    <label class="info-title" for="Billing Pincode">Shipping Pincode <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="shippingpincode" name="shippingpincode" required="required" value="<?php echo $row['shippingPincode'];?>" >
					  </div>


					  <button type="submit" name="shipupdate" class="btn_2">Update</button>
					</form>
					<?php } ?>




						      </div>
						    </div>
					  	</div>
					  	<!-- checkout-step-02  -->
					  	
					</div><!-- /.checkout-steps -->
				</div>
			<?php include('includes/myaccount-sidebar.php');?>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
	

</div>
</div>
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
<?php } ?>