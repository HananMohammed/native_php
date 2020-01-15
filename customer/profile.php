<?php 
ob_start();
include_once 'test.php';
session_start();
if(!isset($_SESSION['s_pass'])){
  header('location:login.php');
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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>

    <?php
//retreiving data from the table 
$email=$_SESSION['s_pass'];
$sql_get = "select * from customers where email='$email'";
$sql_do=mysqli_query($con2,$sql_get);
if($sql_do){
  $row=mysqli_fetch_assoc($sql_do);
  $name=$row['cst_name'];
  $address=$row['address'];
  $phone=$row['phone'];
  $gender=$row['gender'];
  $nationality=$row['nationality'];
  $pass=$row['cst_pass'];
  $image=$row['cst_img'];

}
?>
       <?php include "header.php";?>

   <!--  photo code -->
   <form action="profile.php" method="POST" enctype="multipart/form-data">

      <div style = "margin-left:30%;">
       <h1> Edit Profil..</h1>
      <div class="space"></div>
      <img src="<?php echo $image;?>" style="width:120px;height:120px;border-radius:50%;border:2px solid green;" id="view_image"/>
      <script>
          function preview_image(event){
                var reader = new FileReader();
                reader.onload = function(){
                  var output = document.getElementById('view_image');
                  output.src = reader.result ; 
                };
              reader.readAsDataURL(event.target.files[0]);
          };
          
          
          </script>

<div class="space"></div>
      <input type ="file" class="File"onchange="preview_image(event) " name="photo_file"/>
      <div class="space"></div>

      
      </div>  

        <!--End of photo code  -->
    

<!--**********************************************************************************************-->
<div class="input-group mb-3" style="width:70%;margin-left:15%;">
  <div class="input-group-prepend">
    <button type="button" class="btn btn-outline-secondary">Name</button>
  </div>
  <input type="text" class="form-control" name="t_name" value="<?php echo $name;?>" aria-label="Text input with segmented dropdown button">
</div>
<!--**********************************************************************************************-->
<!--**********************************************************************************************-->
<div class="input-group mb-3" style="width:70%;margin-left:15%;">
  <div class="input-group-prepend">
    <button type="button" class="btn btn-outline-secondary" >address</button>
  </div>
  <input type="text" class="form-control" name="t_address" value="<?php echo $address;?>" aria-label="Text input with segmented dropdown button">
</div>
<!--**********************************************************************************************-->
<!--**********************************************************************************************-->
<div class="input-group mb-3" style="width:70%;margin-left:15%;">
  <div class="input-group-prepend">
    <button type="button" class="btn btn-outline-secondary"  >phone</button>
  </div>
  <input type="text" class="form-control" name="t_phone" value="<?php echo $phone;?>" aria-label="Text input with segmented dropdown button">
</div>
<!--**********************************************************************************************-->
<!--**********************************************************************************************-->
<div class="input-group mb-3" style="width:70%;margin-left:15%;">
  <div class="input-group-prepend">
    <button type="button" class="btn btn-outline-secondary">email</button>
  </div>
  <input type="text" class="form-control" name="t_email" value="<?php echo $email;?>" aria-label="Text input with segmented dropdown button">
</div>
<!--**********************************************************************************************-->
<!--**********************************************************************************************-->
<div class="input-group mb-3" style="width:70%;margin-left:15%;">
  <div class="input-group-prepend">
    <button type="button" class="btn btn-outline-secondary" >gender</button>
  </div>
  <input type="text" class="form-control" name="t_gender" value="<?php echo $gender;?>" aria-label="Text input with segmented dropdown button">
</div>
<!--**********************************************************************************************-->
<!--**********************************************************************************************-->
<div class="input-group mb-3" style="width:70%;margin-left:15%;">
  <div class="input-group-prepend">
    <button type="button" class="btn btn-outline-secondary" >nationality</button>
  </div>
  <input type="text" class="form-control" name="t_nation"value="<?php echo $nationality;?>" aria-label="Text input with segmented dropdown button">
</div>
<!--**********************************************************************************************-->
<!--**********************************************************************************************-->
<div class="input-group mb-3" style="width:70%;margin-left:15%;">
  <div class="input-group-prepend">
    <button type="button" class="btn btn-outline-secondary" >password</button>
  </div>
  <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" name="t_pass" value="<?php echo $pass;?>">
</div>
<input type="submit" name="submit" class="btn btn-dark"style="margin-left:40%;width:5%;" value="Edit"/>
<div class="space"></div>
<!--**********************************************************************************************-->
</form>

<?php
//getting data from screen 
if(isset($_POST['submit']) and $_POST['submit']=="Edit"){
$name=$_POST['t_name'];
  $address=$_POST['t_address'];
  $phone=$_POST['t_phone'];
  $gender=$_POST['t_gender'];
  $nationality=$_POST['t_nation'];
  $email=$_SESSION['s_pass'];
  $pass=$_POST['t_pass'];
  $image_name=$_FILES['photo_file']['name'];
  if($image_name==null){
   /*update information only cause  image without value */
//then send it to DB 
$sql_add= "update customers set cst_name='$name',address='$address',phone='$phone',
email='$email',gender='$gender',nationality='$nationality',cst_pass='$pass'where email='$email'" ;
$sql_do=mysqli_query($con2,$sql_add);
if($sql_do){
  $_SESSION['s_pass']=$email;
  header('location:setting.php');
}else{echo "error".mysqli_error($con2);}
  }else{
    //prepare image upload
    $uploaded_image_name=$_FILES['photo_file']['name'];
    $targeted_folder='cst_images/'.$uploaded_image_name;
    $targeted_loc='http://localhost/Acessories/customer/cst_images/'.$uploaded_image_name;
    $cst_photo=$_FILES['photo_file']['tmp_name'];
    move_uploaded_file($cst_photo,$targeted_folder);
///////////////////////////////////////////////////////////////////////
          //////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////
//then send it to DB 
$sql_add= "update customers set cst_name='$name',address='$address',phone='$phone',
email='$email',gender='$gender',nationality='$nationality',
cst_pass='$pass',cst_img='$targeted_loc'
    where email='$email'" ;
$sql_do=mysqli_query($con2,$sql_add);
if($sql_do){
  $_SESSION['s_pass']=$email;
  header('location:setting.php');
}else{echo "error".mysqli_error($con2);}
    
  }
}
?>

    </body>
</html>