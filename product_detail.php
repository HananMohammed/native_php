<?php
include_once 'test.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title> Products Available</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <script src="js/jquery-3.4.1.js"></script>  <script src="js/jquery-3.4.1.min.js"></script> 
    <script src = 'js/plugin.js'></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    
    <script src = 'js/script.js'></script>

   </head>
<body class="body">

<!--viewed  by -->
<?php
if(isset($_GET['v'])){
    $p_id=$_GET['v'];
    $update_view =mysqli_query($con,"update items set viewed_number=viewed_number+2 where case_id='$p_id'");
    if($update_view){
        
    }
}
?>
<!--viewd by -->
<?php include "anony_header.php"?>
        <!--  start for main section head -->
     <div class= "space"></div>     <div class= "space"></div>
<?php
$id =$_GET['v'];
$sql_get="select * from items where case_id='$id'";
$sql_do=mysqli_query($con,$sql_get);
if($sql_do){
    $row = mysqli_fetch_assoc($sql_do); 
    $name= $row['item_name'];
    $image=$row['item_image'];
    $full_desc=$row['full_description'];
    $cancel=$row['cancel_policy'];
    $info = $row['info_about'];
    $price= $row['item_price'];
    $expired= $row['item_ex_date'];
    $unit = $row['item_unit'];  
    $desc=$row['short_description'];
    $cat=$row['item_type'];
    $email=$row['supplier_email'];

?>

<div class="card" style="width: 18rem;padding:10px;float:left;margin-left:5%;margin-top:15px;">

  <img src="<?php echo'http://localhost/Acessories/supplier_pages/'.$image;?>" class="card-img-top"style="height: 10rem;" alt="...">
  <div class="card-body">
   <h3 class="card-title" > <span style="color:blue;font-style:italic;">name:   </span><?php echo $name;?></h3>
   <p class="card-text">    <span style="color:blue;font-size:18px;font-style:italic;"> 
  price  :   </span><?php echo $price;?></p>

  <p class="card-text">    <span style="color:blue;font-size:18px;font-style:italic;"> 
   expired date :   </span><?php echo $expired;?></p>
  <p class="card-text">    <span style="color:blue;font-size:18px;font-style:italic;"> 
   product details :   </span><?php echo $full_desc;?></p>
   <p class="card-text">    <span style="color:blue;font-size:18px;font-style:italic;"> 
   product information :   </span><?php echo $info;?></p>
   <p class="card-text">    <span style="color:blue;font-size:18px;font-style:italic;"> 
   canceltion policy :   </span><?php echo $cancel;?></p>

   <p class="card-text"> <span style="color:blue;font-size:18px;font-style:italic;">
   supplier email :   </span><?php echo $email;?></p>
    <a href="<?php echo "http://localhost/Acessories/products.php"; ?>" class="btn btn-primary">less</a>

  
    </div>
 
</div>
<?php
    
}
?>
</body>
</html>
    