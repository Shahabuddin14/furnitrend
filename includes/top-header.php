<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <style>
        
        .cnt-account{
            margin-bottom: 50px;
        }

        .cnt-account ul li a {
            color: rgb(102, 12, 0);
        }

        .cnt-account ul li a i{
            padding-right: 5px;
        }
        
        @media screen and (max-width: 420px){
            .cnt-account{
                margin-bottom: 200px;
            }
        }

    </style>   
</head>

<div class="container">
<div class="row">
    <div class="col-md-12">
            <div class="cnt-account">
                <ul class="nav justify-content-center">
                   
                    <?php 
                        if(strlen($_SESSION['login'])){   
                    ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="icon fa fa-user"></i><?php echo htmlentities($_SESSION['username']);?>
                        </a>
                    </li>
                    <?php } ?>

                    <li class="nav-item">
                        <a href="my-account.php" class="nav-link"><i class="icon fa fa-user"></i>My Account</a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="my-wishlist.php" class="nav-link"><i class="icon fa fa-heart"></i>Wishlist</a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="my-cart.php" class="nav-link"><i class="icon fa fa-shopping-cart"></i>My Cart</a>
                    </li>
                    
                    <?php 
                        if(strlen($_SESSION['login'])==0){   
                    ?>
                    <li class="nav-item">
                        <a href="login.php" class="nav-link"><i class="fas fa-sign-in-alt"></i>Login</a>
                    </li>
                    <?php }
                    
                    else{ ?>

                    <li class="nav-item">
                        <a href="logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i>Logout</a>
                    </li>
                    <?php } ?>	

                </ul>
            </div>
        </div>
    </div>
</div>
