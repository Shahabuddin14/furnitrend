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


<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        
        .dropdown-menu{
            background-color: transparent;
        }
    
    
    
    
    </style>
</head>



<div class="showcatinpage">
    <div class="container">
        <?php
            if(!empty($_SESSION['cart'])){
        ?>

        <div class="dropdown dropdown-cart newone">
            <a href="#" class="" >
                <div class="">
                    <div class="row no-gutters">
                        <div class="">
                            <div class="">
                                <span class="" style="padding: 0 5px;">
                                    <i class="fas fa-cart-plus" style="padding: 0 5px;"></i><?php echo $_SESSION['qnty'];?>
                                </span>
                                <span class="">৳. <?php echo $_SESSION['tp']; ?></span>
                            </div> 
                        </div>
                    </div>
                </div>
            </a>


            <ul class="dropdown-menu" style="background-color: transparent;">
                <?php

                    $sql = "SELECT * FROM products WHERE id IN(";
                    foreach($_SESSION['cart'] as $id => $value){
                        $sql .=$id. ",";
                    }
                    $sql = substr($sql,0,-1) . ") ORDER BY id ASC";
                    $query = mysqli_query($con,$sql);
                    $totalprice=0;
                    $totalqunty=0;
                    if(!empty($query)){
                        while($row = mysqli_fetch_array($query)){
                        $quantity = $_SESSION['cart'][$row['id']]['quantity'];
                        $subtotal = $_SESSION['cart'][$row['id']]['quantity']*$row['productPrice']+$row['shippingCharge'];
                        $totalprice += $subtotal;
                        $_SESSION['qnty'] = $totalqunty+= $quantity;

                ?>
                <li class="list-group-item">
                    <div class="cart-item">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="image">
                                    <img  src="admin/productimages/<?php echo $row['id'];?>/<?php echo $row['productImage1'];?>" width="70" height="40" alt="photo">
                                </div>
                            </div>
                            
                            <div class="col-md-7">
                                <hp><?php echo $row['productName']; ?></hp>
                                <div class="price">
                                    ৳.<?php echo ($row['productPrice']+$row['shippingCharge']); ?>*<?php echo $_SESSION['cart'][$row['id']]['quantity']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } }?>
                    
                    
                    <div class="clearfix cart-total">
                        <div class="pull-right">
                            <span class="text">Total :</span>
                            <span class='price'>৳.<?php echo $_SESSION['tp']="$totalprice". ".00"; ?></span>
                        </div>
                        
                        <a href="my-cart.php" class="btn_2">My Cart</a>	
                    </div>
                </li>
            </ul>
        </div>
        <?php } 

        else { ?>

        <div class="dropdown dropdown-cart">
            <a href="#" >
                <div class="">
                    <div class="total-price-basket">
                        <span class="lbl"><i class="fas fa-cart-plus"></i></span>
                        <span class="total-price">
                            <span class="">৳.</span>
                            <span class="value">00.00</span>
                        </span>
                    </div>
                </div>
            </a>

            <ul class="dropdown-menu list-group" style="background-color: transparent;">
                <li class="list-group-item">
                    <div class="cart-item product-summary">
                        <div class="row">
                            <div class="col-md-10 offset-md-1 col-sm-10 offset-sm-1">Cart is Empty.</div>
                        </div>
                    </div>
                    <hr>
                    <div class="clearfix cart-total">
                        <a href="index.php" class="btn_2">Continue Shooping</a>	
                    </div>
                </li>
            </ul>
        </div>

        <?php } ?>
    </div>
</div>

