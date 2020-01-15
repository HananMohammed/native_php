<?php
ob_start();
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
/*
if(isset($_GET['v'])){
    $p_id=$_GET['v'];
    $update_view =mysqli_query($con2,"update items set viewed_number=viewed_number+2 where case_id='$p_id'");
    if($update_view){
        
    }
}
*/
?>
<!--viewd by -->
<?php include "header.php"?>
        <!--  start for main section head -->
     <div class= "space"></div>     <div class= "space"></div>
<?php
$id =$_GET['v'];
$sql_get="select * from items where case_id='$id'";
$sql_do=mysqli_query($con2,$sql_get);
if($sql_do){
    $row = mysqli_fetch_assoc($sql_do); 
    $name= $row['item_name'];
    $image=$row['item_image'];
     $price= $row['item_price'];
     $desc=$row['short_description'];
     $email=$row['supplier_email'];
     session_start();
    $cst_email=$_SESSION['s_pass'];
  $wish_add=mysqli_query($con2,"insert into wishlist values('$name','$price','$id','$image','$desc','$email','$cst_email')");
header('location:setting.php');
?>
<form action="wish_list.php" method="POST" enctype="multipart/form-data">
<div class="card" style="width: 18rem;padding:10px;float:left;margin-left:5%;margin-top:15px;">

  <img name='t_image' src="<?php echo'http://localhost/Acessories/supplier_pages/'.$image;?>" class="card-img-top"style="height: 10rem;" alt="...">
  <div class="card-body">
   <h3 name='t_name' class="card-title" > <span style="color:blue;font-style:italic;">name:   </span><?php echo $name;?> </h3>
   <p class="card-text">    <span style="color:blue;font-size:18px;font-style:italic;"> 
  price  :   </span><?php echo $price;?></p>

   <p name='t_email'class="card-text"  > <span style="color:blue;font-size:18px;font-style:italic;">
   supplier email :   </span><?php echo $email;?></p>
   <p name="t_desc"class="card-text"> <span style="color:blue;font-size:18px;font-style:italic;">
   short description :   </span><?php echo $desc;?></p>
    
    <input type="hidden" value = "<?php echo $id ;?>" name="t_id"/>
    <a href="<?php echo "http://localhost/Acessories/customer/view_item.php"; ?>" class="btn btn-primary">Back</a>
    <a href="" class="btn btn-primary" style="margin-left:25%;" name="submit">Confirm</a>
    </div>
 
</div>
</form>
<?php
    
}
?>
<?php 
//////////////////////////////////////////////////////////////////////////////////////
    ////////////adding data to wish table///////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

//////
if(isset($_POST['submit']) and $_POST['submit']=='Confirm'){
    
}
?>
</body>
</html>
