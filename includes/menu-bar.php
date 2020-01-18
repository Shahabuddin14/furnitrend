<?php 

    if(isset($_Get['action'])){
        if(!empty($_SESSION['cart'])){
            foreach($_POST['quantity'] as $key => $val){
                if($val==0){
                    unset($_SESSION['cart'][$key]);
                }else{
                    $_SESSION['cart'][$key]['quantity']=$val;
                }
            }
        }
    }
?>

<!--::header part start::-->
<header class="main_menu home_menu" style="margin: 67px 0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="index.php">
                        <img src="img/logo.png" alt="logo" class="imf-responsive LOGO"> 
                    </a>
                    
                    <button class="navbar-toggler" type="button" data-toggle="collapse"data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_icon"><i class="fas fa-bars"></i></span>
                    </button>
                    
                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <?php 
                            
                                $sql=mysqli_query($con,"select id,categoryName  from category limit 6");
                                while($row=mysqli_fetch_array($sql)){
                            ?>
                            <li class="nav-item dropdown">
                                <a href="category.php?cid=<?php echo $row['id'];?>" class="nav-link"> 
                                    <?php echo $row['categoryName'];?>
                                </a>
                            </li>
                            <?php } ?>                            
                        </ul>
                    </div>
                    
                    <div class="hearer_icon d-flex">
                        <div class="hearer_icon d-flex">
                            <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <p><?php include('includes/main-header.php');?></p>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>


    <div class="search_input fixed-top" id="search_input_box">
        <div class="container ">
            <form class="d-flex justify-content-between search-inner" name="search" method="post" action="search-result.php">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here" name="product" required="required">
                <button type="submit" class="btn" name="search"></button>
                <span class="ti-close" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>

<!-- Header part end-->