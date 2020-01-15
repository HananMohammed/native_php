
<?php
include_once 'test.php';
?>
<html>
<head>
    <title>  sign up to our store </title>
    <link rel="stylesheet"   href="css/signUp_style.css"/>
    <meta input="viewport" content="width=device-width initial-scale=1" />
    <script src="js/script.js"></script><script src="js/jquery-3.4.1.js"></script>   
    <script src="js/jquery-3.4.1.min.js"></script> 
    <script src = 'js/plugin.js'></script>
    </head>

<body>
 <!-- start of main  div part -->
    <div class = "main-div" >
        <!--start of header div logo & nav --> 
      <div class = "header" >
         
            <img src ="imges\photo2.jpg" id="head"/>
          
         
              <ul id ="header">
                         <li> <a href ="index.html" > Home</a></li>
                         <li> <a href ="all_products.html" >products </a> </li>
                         <li> <a href ="login.html" >  login </a> </li>
                         <li> <a href ="contact_us.html" >  contact_us </a></li>
                         <li id="Demo"></li>

               </ul>
             
         
        
      </div>
      <form action = "sign_up.php" method= "POST" enctype = "multitype/form-data">

      <img src="imges/drop.PNG" id="drop"/>
     <!--end of header div logo & nav -->
     <div class ="section" >
      <h1> signUp..</h1>
      <div class="space"></div>
      <img src="imges/login.png"  id = "view_image"/>
      <div class="space"></div>
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
      <script src="js/validation.js"></script>
      <input type ="file" class="File" onchange="preview_image(event) " name="photo_file"/>
      <div class="space"></div>
      <input type="text" placeholder ="username" id="name" name="t_name" onclick="validate()"/>
      <div class="space"></div>
             <input type="email" placeholder="your email@gmail.com " name = "t_email"id="email"  onclick="validate()"/>
             <div class="space"></div>
             <input type="tel" placeholder="phone number" id="phone" name = "t_tel"  onclick="validate()"/>
             <div class="space"></div>
             <input type="password" placeholder="password plz" id ="pass" name ="t_pass" onclick="validate()"/>
             <div class="space"></div>
             <input name="submit" type = "submit" value= "sign up" id="btn_signup" onclick="validate()" > 
      <button class="btn_cancel" name = "t_submit"> Cancel</button>
      <div class="space"></div>
      <p> if  you have an account plz <a href = "login.html">login</a> ? </p>
  
</div>
</form>
<div class="footer"> 
    

  <p> All right reserved to show inc 2019 </p>
    <div class = "social_div">
        <img src ="imges\icons\icons8-facebook-neu-48.png"  width= "50" height ="50" />
       <img src ="imges\icons\icons8-gmail-48.png"  width= "50" height ="50" />
       <img src ="imges\icons\icons8-twitter-48.png"  width= "50" height ="50" />
       
       <img src ="imges\icons\icons8-whatsapp-48.png"  width= "50" height ="50" />
       <img src ="imges\icons\icons8-yahoo-48.png"  width= "50" height ="50" />
    </div>

<!--  end of footer -->
</div>
    </div>

<?php
if(isset($_POST['submit']) and $_POST['submit']=="sign up"){
  //get vaalues from screen 
  $name = $_POST['t_name'];
  $phone = $_POST['t_tel'];
  $email = $_POST['t_email'];
  $pass = $_POST['t_pass'];
    // $email=$_SESSION['s_pass']  
    //we will get supplier mail from session and put in in DB this will be in add item page ..
 //prepare file  upload
 $uploaded_image_name = $_FILES['photo_file']['name'];
 $target_folder  = "supplier_imges/".$uploaded_image_name;
 $target_loc = "http://localhost/Acessories/supplier_imges/".$uploaded_image_name;
 $supplier_photo = $_FILES['photo_file']['tmp_name'];
 move_uploaded_file($supplier_photo,$target_folder);
//
  // then send it into database
  $sql_command = "insert into test values( '','$name'  , '$phone', '$email' , '$pass' ,'$target_loc') ";
  $sql_add = mysqli_query($con ,$sql_command  );
  if($sql_add){
    echo '<script> alert("customer added")</script>';
  }else{
    echo "Error".mysqli_error($con);
  }
}
?>

</body>

</html>