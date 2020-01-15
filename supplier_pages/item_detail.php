<?php
ob_start();
include_once 'test.php';
session_start();
if(!isset($_SESSION['s_pass'])){

    header('location:sign_up.php');
    die();


}

?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    </head>
    <body>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>  
<?php  include 'header_supplier.php'?>
<?php
$email=$_SESSION['s_pass']; 
$sql_get= mysqli_query($con,"select * from items WHERE supplier_email='$email'");
if($sql_get){
    while($row = mysqli_fetch_assoc($sql_get)){
        $name= $row['item_name'];
        $image=$row['item_image'];
        $desc=$row['short_description'];


?>
<div class="card" style="width: 18rem;padding:10px;float:left;margin-left:5%;margin-top:15px;">

  <img src="<?php echo $image;?>" class="card-img-top"style="height: 10rem;" alt="...">
  <div class="card-body">
    <h5 class="card-title" ><?php echo $name;?></h5>
    <p class="card-text"><?php echo $desc;?></p>
    <a href="item_detail.php" class="btn btn-primary">details</a>
   
  
    </div>
 
</div>
<?php
    }
}
?>
  </body>

</html>

