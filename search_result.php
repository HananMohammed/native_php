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
<?php include "anony_header.php"?>

     <!--  start for main section head -->
     
<?php
$word = $_GET['t_word'];
 $sql_get= mysqli_query($con,"select * from items where item_name like '%".$word."%'");
if($sql_get){
    while($row = mysqli_fetch_assoc($sql_get)){
        $name= $row['item_name'];
        $image = $row['item_image'];
        $desc= $row['short_description'];
        $supplier = $row['supplier_email'];
        $id=$row['case_id'];
        

?>
<div class="card" style="width: 18rem;padding:10px;float:left;margin-left:5%;margin-top:15px;">

  <img src="<?php echo'http://localhost/Acessories/supplier_pages/'.$image;?>" class="card-img-top"style="height: 10rem;" alt="...">
  <div class="card-body">
   <h5 class="card-title" > <span style="color:blue;font-style:italic;">name:   </span><?php echo $name;?></h5>
  <p class="card-text">    <span style="color:blue;font-size:18px;font-style:italic;"> 
  short desc:   </span><?php echo $desc;?></p>
   <p class="card-text"> <span style="color:blue;font-size:18px;font-style:italic;">
   supplier email :   </span><?php echo $supplier;?></p>
    <a href="<?php echo "http://localhost/Acessories/product_detail.php?v=".$id; ?>" class="btn btn-primary">More</a>

  
    </div>
 
</div>
<?php
    }
}
?>


</body>
</html>

      