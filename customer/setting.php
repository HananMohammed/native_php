<?php
ob_start();
include_once 'test.php';
session_start();
if(!isset($_SESSION['s_pass'])){
    header('location:signup.php');
    die();
}
?>
<!DOCTYPE html>
 <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/setting.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">

    </head>
    <body>
       <?php 
       include "header.php";
       ?>
    <?php
    $email = $_SESSION['s_pass'];
    $sql = "select * from customers where email = '$email'";
    $sql_get =mysqli_query($con2,$sql);
    if($sql_get){
        while($row = mysqli_fetch_assoc($sql_get)){
            $name=$row['cst_name'];
            $add=$row['address'];
            $phone=$row['phone'];
            $image=$row['cst_img'];

    ?>
    
<div class ="profil_info">
    <img src="<?php echo $image;?>" alt="profil_photo"/>
    <div style="width:100%;height:10px;"></div>
    <b> <?php echo $name;?> </b>
    <p> <?php echo $phone;?> </p>
    <p> <?php echo $add;?> </p>

</div>
    
    <?php
    }
}
    ?>
    <div class="space" style="width:100%;height:2px;background-color:orange;margin-top:10px;margin-bottom:10px;"></div>
<h3 style="text-align:centre; font-style:italic;margin-left:30%;color:blue;"> <?php echo "$name"?> wishlists:</h3><br/>
    <?php
    $cst_email=$_SESSION['s_pass'];
    $sql_get="SELECT * FROM `wishlist` WHERE `cst_email`='$cst_email'";
    $sql_do=mysqli_query($con2,$sql_get);
    if($sql_do){
       while( $row = mysqli_fetch_assoc($sql_do)){
        $name= $row['item_name'];
        $image=$row['item_image'];
         $price= $row['price'];
         $desc=$row['short_description'];
         $supplier_email=$row['supplier_email'];
          $id=$row['case_id'];
    ?>
<!-- *************************************wishlist********************************************** -->

<div class="card" style="width: 18rem;padding:10px;float:left;margin-left:5%;margin-top:15px;">

  <img src="<?php echo'http://localhost/Acessories/supplier_pages/'.$image;?>" class="card-img-top"style="height: 10rem;" alt="...">
  <div class="card-body">
   <h3 class="card-title" > <span style="color:blue;font-style:italic;">name:   </span><?php echo $name;?> </h3>
   <p class="card-text">    <span style="color:blue;font-size:18px;font-style:italic;"> 
  price  :   </span><?php echo $price;?></p>

   <p class="card-text"  > <span style="color:blue;font-size:18px;font-style:italic;">
   supplier email :   </span><?php echo $supplier_email;?></p>
   <p class="card-text"> <span style="color:blue;font-size:18px;font-style:italic;">
   short description :   </span><?php echo $desc;?></p>
        <a href="<?php echo "http://localhost/Acessories/customer/product_detail.php?v=".$id; ?>" style="margin-left:30%;" class="btn btn-primary">Detail</a>
    </div>
 
</div>
<?php
       }
       //
    }
?>
<!--wishlist  -->
    </body>
</html>