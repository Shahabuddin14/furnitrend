<?php

    session_start();
    error_reporting(0);
    include('includes/config.php');
    if(strlen($_SESSION['login'])==0){   
        header('location:index.php');
    }
    else{
        if(isset($_POST['update'])){
            $name=$_POST['name'];
            $contactno=$_POST['contactno'];
            $query=mysqli_query($con,"update users set name='$name',contactno='$contactno' where id='".$_SESSION['id']."'");
            
            if($query){
                echo "<script>alert('Your info has been updated');</script>";
            }
        }

        date_default_timezone_set('Asia/Dhaka');
        $currentTime = date( 'd-m-Y h:i:s A', time () );

        if(isset($_POST['submit'])){
            
            $sql=mysqli_query($con,"SELECT password FROM  users where password='".md5($_POST['cpass'])."' && id='".$_SESSION['id']."'");
            $num=mysqli_fetch_array($sql);
            if($num>0){
                $con=mysqli_query($con,"update students set password='".md5($_POST['newpass'])."', updationDate='$currentTime' where id='".$_SESSION['id']."'");
                echo "<script>alert('Password Changed Successfully !!');</script>";
            }
            else{
                echo "<script>alert('Current Password not match !!');</script>";
            }
        }

?>

<!DOCTYPE html>
<html lang="en">
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
    
    <script type="text/javascript">
    function valid()
    {
    if(document.chngpwd.cpass.value=="")
    {
    alert("Current Password Filed is Empty !!");
    document.chngpwd.cpass.focus();
    return false;
    }
    else if(document.chngpwd.newpass.value=="")
    {
    alert("New Password Filed is Empty !!");
    document.chngpwd.newpass.focus();
    return false;
    }
    else if(document.chngpwd.cnfpass.value=="")
    {
    alert("Confirm Password Filed is Empty !!");
    document.chngpwd.cnfpass.focus();
    return false;
    }
    else if(document.chngpwd.newpass.value!= document.chngpwd.cnfpass.value)
    {
    alert("Password and Confirm Password Field do not match  !!");
    document.chngpwd.cnfpass.focus();
    return false;
    }
    return true;
    }
    </script>
    
    
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
    
    
    
    <div class="mycontact">
        <div class="container">
            <div class="checkout-box inner-bottom-sm">
                <div class="row">
                    <div class="col-md-8">
                        <div class="panel-group checkout-steps" id="accordion">
                            <div class="panel panel-default checkout-step-01">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
                                            <span>1 </span> My Profile
                                        </a>
                                    </h4>
                                </div>

                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="row">		
                                            <h6>Personal info</h6>
                                            <div class="col-md-12 col-sm-12 already-registered-login">
                                                <?php
        
                                                    $query=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
                                                    while($row=mysqli_fetch_array($query)){
                                                ?>

                                                <form class="register-form" role="form" method="post">
                                                    <div class="form-group">
                                                        <label class="info-title" for="name">Name<span>*</span></label>
                                                        <input type="text" class="form-control unicase-form-control text-input" value="<?php echo $row['name'];?>" id="name" name="name" required="required">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                                        <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" value="<?php echo $row['email'];?>" readonly>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="info-title" for="Contact No.">Contact No. <span>*</span></label>
                                                        <input type="text" class="form-control unicase-form-control text-input" id="contactno" name="contactno" required="required" value="<?php echo $row['contactno'];?>"  maxlength="11">
                                                    </div>
                                                    <button type="submit" name="update" class="btn_2">Update</button>
                                                </form>
                                                <?php } ?>
                                            </div>	
                                        </div>			
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default checkout-step-02">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseTwo">
                                            <span>2 </span> Change Password
                                        </a>
                                    </h4>
                                </div>
                                
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <form class="register-form" role="form" method="post" name="chngpwd" onSubmit="return valid();">
                                            <div class="form-group">
                                                <label class="info-title" for="Current Password">Current Password<span>*</span></label>
                                                <input type="password" class="form-control unicase-form-control text-input" id="cpass" name="cpass" required="required">
                                            </div>

                                            <div class="form-group">
                                                <label class="info-title" for="New Password">New Password <span>*</span></label>
                                                <input type="password" class="form-control unicase-form-control text-input" id="newpass" name="newpass">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="info-title" for="Confirm Password">Confirm Password <span>*</span></label>
                                                <input type="password" class="form-control unicase-form-control text-input" id="cnfpass" name="cnfpass" required="required" >
                                            </div>
                                            
                                            <button type="submit" name="submit" class="btn_2">Change </button>
                                        </form> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php include('includes/myaccount-sidebar.php');?>
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