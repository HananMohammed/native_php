<?php
ob_start();
include_once 'test.php';
session_start();
if(!isset($_SESSION['s_pass'])){

    header('location:login.php');
    die();
}
?>
<html>
<head>
    <title>  sign up to our store </title>
    <link rel="stylesheet" text="html\css" href="../css/signUp_style.css"/>
    <script src="../js/script.js"></script><script src="../js/jquery-3.4.1.js"></script>   
    <script src="../js/jquery-3.4.1.min.js"></script> 
           <script src = '../js/plugin.js'></script> 
           <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">

</head>

<body>
<!--************************************************************************************-->
<?php
$email =$_SESSION['s_pass'];
$sql_get ="select * from suppliers where email = '$email'";
$sql_do = mysqli_query($con,$sql_get);
if($sql_do){
    $row=mysqli_fetch_assoc($sql_do);
    $national = $row['national_id'];
    $phone=$row['phone'];
    $email=$row['email'];
    $address=$row['address'];
    $name=$row['supplier_name'];
    $cat=$row['category'];
    $gender=$row['gender'];
    $age=$row['age'];
    $pass=$row['password'];
    $image=$row['image'];
    $register=$row['register_date'];
    $image_folder=$row['image_folder'];
}




?>
<!--************************************************************************************-->

 <!-- start of main  div part -->
 <?php include 'header_supplier.php'?>
    <div class = "main-div" >
        <!--start of header div logo & nav --> 
 
      <form action = "edit_profil.php" method= "POST" enctype = "multipart/form-data">
      <img src="../imges/drop.PNG" id="drop"/>
 
     <!--end of header div logo & nav -->
     <div class ="section" >

       

      <h1> Edit profil..</h1>
      <div class="space"></div>
      <img src="<?php echo $image;?>"  id="view_image"/>
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
      <input type ="file" class="File" onchange="preview_image(event) " name="photo_file"/>
      <div class="space"></div>
       <input type="number" value="<?php echo $national ?>" name = "t_id" />
       <div class="space"></div>
       <input type="tel" value="<?php echo $phone ?>" name = "t_phone"/>
       <input type="text" value="<?php echo $address ?>" name = "t_address"/>
       <div class="space"></div>
        <input type="text" value="<?php echo $name ?>"  name = "t_name"/>
        <div class="space"></div>
        <input type="text" value="<?php echo $gender ?>"  name = "t_gendre"/>
        <div class="space"></div>
        <input type="number" value="<?php echo $age?>" name = "t_age"/>
        <div class="space"></div>
        <input type ="password"  value="<?php echo $pass?>" name ="t_pass"/>
        <div class="space"></div>
        <input type="date" value="<?php echo $date?>"  name = "t_date"/>
       
      <div class="space"></div>
      <h4>check if this account for company or individual Business :</h4>  
        Category:   <select value="$cat"  name = "t_cat">
            <option >Company</option>
            <option>individual Business</option>
        </select><div class="space"></div><div class="space"></div>
        <input type="submit" name="submit" id="btn_signup" value="Update" />
       <button class="btn_cancel"> Cancel</button>
      <div class="space"></div><div class="space"></div>
      <p> if  you have an account plz <a href = "supplier_login.html">login</a> ? </p>
       </div>
      
  
</div>
</form>

<div class="footer"> 
    

        <p> All right reserved to show inc 2019 </p>
          <div class = "social_div">
              <img src ="..\imges\icons\icons8-facebook-neu-48.png"  width= "50" height ="50" />
             <img src ="..\imges\icons\icons8-gmail-48.png"  width= "50" height ="50" />
             <img src ="..\imges\icons\icons8-twitter-48.png"  width= "50" height ="50" />
             
             <img src ="..\imges\icons\icons8-whatsapp-48.png"  width= "50" height ="50" />
             <img src ="..\imges\icons\icons8-yahoo-48.png"  width= "50" height ="50" />
          </div>
            <!--  end of footer -->
    </div>
    </div>
    <?php
if(isset($_POST['submit']) and $_POST['submit']=='Update'){

  //get value from screen
  $id = $_POST['t_id'];
  $phone = $_POST['t_phone'];
  $address= $_POST['t_address'];
  $email =$_SESSION['s_pass'];
  $name = $_POST['t_name'];
  $cat =  $_POST['t_cat'];
  $gendre = $_POST['t_gendre'];
  $age =$_POST['t_age'];
  $pass = $_POST['t_pass'];
  $date = $_POST['t_date'];
 $image_name=$_FILES['photo_file']['name'];
 if($image_name==null){
/*update information only cause  image without value */
//then send it to DB 
$sql_add="update suppliers set national_id='$id',phone='$phone',address='$address',
  email='$email',supplier_name='$name',category='$cat',gender='$gendre', 
 age='$age',password='$pass',register_date='$date' where email='$email'";
 $sql_do = mysqli_query($con , $sql_add);
 if($sql_do){
   session_start();
   $_SESSION['s_pass']=$email;
   header('location:setting.php');
 }else{
            echo "error".mysqli_error($con);
 }
//




 }else{
     
      
    //prepare file  upload
    $uploaded_image_name = $_FILES['photo_file']['name'];
    $target_folder  = "supplier_imges/".$uploaded_image_name;
    $target_loc = "http://localhost/Acessories/supplier_pages/supplier_imges/".$uploaded_image_name;
    $supplier_photo = $_FILES['photo_file']['tmp_name'];
    move_uploaded_file($supplier_photo,$target_folder);

//insert  it to DB
$sql_add="update suppliers set national_id ='$id' ,phone='$phone' ,address='$address',
email='$email' ,supplier_name='$name' ,category='$cat' ,gender='$gendre', 
age='$age',password='$pass',image='$target_folder',register_date='$date',image_folder='$target_loc'where email='$email'";
$sql_do = mysqli_query($con , $sql_add);
if($sql_do){
 session_start();
 $_SESSION['s_pass']=$email;
 header('location:setting.php');
}else{
          echo "error".mysqli_error($con);
}

 }


//
}

   
    //=================================================================================================





    ?>
   
</body>

</html>