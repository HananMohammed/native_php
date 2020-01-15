
<?php 
ob_start();
include_once 'test.php'; ?>
<html>
    <head>
        <title> login</title>
        <link rel="stylesheet" type ="text/css" href="../css/login_style.css"/>
        <script src="../js/script.js"></script><script src="../js/jquery-3.4.1.js"></script>   
        <script src="../js/jquery-3.4.1.min.js"></script> 
               <script src = '../js/plugin.js'></script> 
    </head>
    <body>
        <!-- Start of main div -->
         <div class ="main" >
                 <div class ="header" >
                     <img src="../imges\photo2.jpg" id="head"  />
                    
                        <ul id="header">
                         
                            <li> <a href ="sign_up.html" > help </a></li>
                            <li> <a href ="contact_us.html" >  contact_us </a></li>   
                            <li id="Demo"></li>

                 </ul>
                
                    
                 </div>
            <!-- end of main div -->
<form action = "login.php" method="POST">
            <div class ="section">
     <img src="../imges/drop.PNG" id="drop"/>
  <div class="login_design">
                <h1> login</h1>
                <input  name = "t_email" type ="email" placeholder="your email"/>
                <input name = "t_pass" type= "password" placeholder = "your Password "/> <br/>

                     <input class= "btn_login" name="submit"  type="submit" value="login"> 
                     <input class="btn_cancel" name="submit"  type="submit" value="cancel"> 
 
<p>if you don't have  account plz  <a href = "signup.php"> sign up </a></p>
<p><a href="forget.php"> Forget password</a></p>
</div>
           

</div>
</form>
<?php
if(isset($_POST['submit']) and $_POST['submit']=="login"){
$email = $_POST['t_email'];
$pass = $_POST['t_pass'];
$sql_get= "select * from customers where email='$email' and cst_pass='$pass'";
$sql_do = mysqli_query($con2,$sql_get);
if($sql_do){

if(mysqli_num_rows($sql_do)>0){

    session_start();
    $_SESSION['s_pass']=$email;
    header('location:setting.php');
}else{
$c=time();
$req_time = date('y-m-d',$c);
$ip_add = $_SERVER['REMOTE_ADDR'] ;
$ip_add_local =$_SERVER['HTTP_CLIENT_IP'];
$ip_from_proxy = $_SERVER['HTTP_X_FORWARDED_FOR'];
$sql_f = mysqli_query($con2,"insert into bad_boy(email,req_time,ip_address,ip_local_address,ip_proxy) 
values('$email','$req_time','$ip_add','$ip_add_local','$ip_from_proxy')");
}



}else{
    echo '<script> alert("be sure from your password ");</script>';
}

}
?>
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
</body>
</html>