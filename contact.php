<?php
    session_start();
    error_reporting(0);
    include('includes/config.php');
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
  <section class="" style="height: 475px;">
      <div class="cat_img" style="padding: 60px 0 0 0">
     
            
            <div class="container">
                   <img src="img/subscribe_area.png" alt="" height="450px" width="100%">

            </div>
      </div>
       
    </section>
    <!-- breadcrumb start-->



  <!-- ================ contact section start ================= -->
  <section class="contact-section padding_top">
    <div class="container">
      <div class="d-none d-sm-block mb-5 pb-4">
        <div id="map" style="height: 480px;">
            
            
            
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.0180833124477!2d90.42258671550829!3d23.78237038457371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c796e67aeac9%3A0xa4a2d38d0cd30d94!2sWhistle!5e0!3m2!1sen!2sbd!4v1570955962773!5m2!1sen!2sbd" width="1200" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            
        </div>
        
        
        
    
      </div>


      <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Get in Touch</h2>
        </div>
        <div class="col-lg-8">
         
         
         <?php
                               
                                    if(isset($_POST['submit'])){
                                        
                                        $name = $_POST['name'];
                                        $email = $_POST['email'];
                                        $number = $_POST['number'];
                                        $message = $_POST['message'];
                                        
                                        
                                        if(!empty($name) && !empty($email) && !empty($number) && !empty($message)){
                                            
                                            $name = mysqli_real_escape_string($con, $name);
                                            $email = mysqli_real_escape_string($con, $email);
                                            $number = mysqli_real_escape_string($con, $number);
                                            $message = mysqli_real_escape_string($con, $message);
                                                
                                        
                                        
                                        
                                        $query = "INSERT INTO contact (name, email, number, message) ";
                                        $query .= "VALUES ('{$name}', '{$email}', '{$number}', '{$message}' )";
                                        
                                        $contact_query = mysqli_query($con, $query);
                                        
                                        if(!$contact_query){
                                            
                                            die("Query Failed !" .mysqli_error($con));
                                        
                                        }
                                        
                                        
                                            
                                         
                                       
                                    } 
                                    } 
                                    
                                    
                               ?>
                               
                               
         
         
         
         
         
         
         
          <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm"
            novalidate="novalidate">
            <div class="row">
              <div class="col-12">
                <div class="form-group">

                  <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"
                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'"
                    placeholder='Enter Message'></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="name" id="name" type="text" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter your name'" placeholder='Enter your name'>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter email address'" placeholder='Enter email address'>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control" name="number" id="subject" type="text" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter Subject'" placeholder='Enter Subject'>
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <a href="#" class="btn_3 button-contactForm" name="submit">Send Message</a>
            </div>
          </form>
        </div>
        <div class="col-lg-4">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3>Gulshan,Dhaka.</h3>
              <p>Ga 126/2 , Middle Badda</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
            <div class="media-body">
              <h3>02 9815 1909</h3>
              <p>Sat to Thus 10am to 7pm</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3>info@whistlebd.com</h3>
              <p>Send us your query anytime!</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ================ contact section end ================= -->

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