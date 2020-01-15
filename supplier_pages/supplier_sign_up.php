<?php
ob_start();
include_once 'test.php';
?>
<html>
<head>
    <title>  sign up to our store </title>
    <link rel="stylesheet" text="html\css" href="../css/signUp_style.css"/>
    <script src="../js/script.js"></script><script src="../js/jquery-3.4.1.js"></script>   
    <script src="../js/jquery-3.4.1.min.js"></script> 
           <script src = '../js/plugin.js'></script> 
</head>

<body>
 <!-- start of main  div part -->
    <div class = "main-div" >
        <!--start of header div logo & nav --> 
      <div class = "header" >
         
            <img src ="../imges\photo2.jpg" id="head"/>
          
         
              <ul id="header">
                         <li> <a href ="../index.php" > Home</a></li>
                          <li> <a href ="../all_products.php" >products </a> </li>
                         <li> <a href ="supplier_login.php" >  login </a> </li>
                          <li> <a href ="../contact_us.php" >  contact_us </a></li>
                          <li id="Demo"></li>

               </ul>
             
         
        
      </div>
      <form action = "supplier_sign_up.php" method= "POST" enctype = "multipart/form-data">
      <img src="../imges/drop.PNG" id="drop"/>

     <!--end of header div logo & nav -->
     <div class ="section" >

       

      <h1> supplier signUp..</h1>
      <div class="space"></div>
      <img src="../imges/login.png" id="view_image"/>
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
       <input type="number" placeholder ="national id " name = "t_id" />
       <div class="space"></div>
       <input type="tel" placeholder="phone"  name = "t_phone"/>
       <input type="text" placeholder="address"  name = "t_address"/>
       <input type="email " placeholder="your email or company email " name = "t_email"/>
       <div class="space"></div>
        <input type="text" placeholder=" supplier name "  name = "t_name"/>
        <input type="text" placeholder="gender"  name = "t_gendre"/>
        <input type="number" placeholder="age"  name = "t_age"/>
        <input type="date" placeholder=" register date"  name = "t_date"/>
        <div class="space"></div>
      <input type="password" placeholder="password plz" name = "t_pass"/>
      <div class="space"></div>
      <h4>check if this account for company or individual Business :</h4>  
        Category:   <select value="Category"  name = "t_cat">
            <option >Company</option>
            <option>individual Business</option>
        </select><div class="space"></div><div class="space"></div>
        <input type="submit" name="submit" id="btn_signup" value="Signup" />
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
if(isset($_POST['submit']) and $_POST['submit']=='Signup'){

  //get value from screen
  $id = $_POST['t_id'];
  $phone = $_POST['t_phone'];
  $address= $_POST['t_address'];
  $email =$_POST['t_email'];
  $name = $_POST['t_name'];
  $cat =  $_POST['t_cat'];
  $gendre = $_POST['t_gendre'];
  $age =$_POST['t_age'];
  $pass = $_POST['t_pass'];
  $date = $_POST['t_date'];
 ///check if email exist 

 $sql_check ="select * from suppliers where email ='$email'";
 $sql_check_do = mysqli_query($con,$sql_check);
 if(mysqli_num_rows($sql_check_do)){
   echo '<script>alert("your email checked ")</script>';
 }else{


 //end of check 


      
    //prepare file  upload
    $uploaded_image_name = $_FILES['photo_file']['name'];
    $target_folder  = "supplier_imges/".$uploaded_image_name;
    $target_loc = "http://localhost/Acessories/supplier_pages/supplier_imges/".$uploaded_image_name;
    $supplier_photo = $_FILES['photo_file']['tmp_name'];
    move_uploaded_file($supplier_photo,$target_folder);
//

 //insert  it to DB
 $sql_add="insert into suppliers values('$id' ,'$phone' ,'$address', '$email' ,'$name' ,'$cat' ,'$gendre', 
 '$age','$pass','$target_folder','$date','$target_loc' )";
 $sql_do = mysqli_query($con , $sql_add);
 if($sql_do){
   session_start();
   $_SESSION['s_pass']=$email;
///////////////////////////////////////////////////////////////////////////
   //sending mail welcom to the supplier who first sign up//
   ////////////////////////////////////////////////////////////////////////
   $to = $email;
   $subject = "Welcone to show site";
   $message = "welcom to bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb'$name'";
   $header("From support@show.com");
   mail($to,$subject,$message,$header);
   ///////////////////////////////////////////////////////////////////
   ////////////////////////End of the msg ////////////////////////////
   ///////////////////////////////////////////////////////////////////
   header('location:setting.php');
 }else{
            echo "error".mysqli_error($con);
}//end of brackets session 

}
}
   
    //=================================================================================================




    ?>
   
</body>

</html>