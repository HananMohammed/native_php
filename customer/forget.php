
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

           
     <img src="../imges/drop.PNG" id="drop"/>
                 <div class="login_design">
                 <form action = "forget.php" method="POST">
                <h1> Recover your password</h1>
                <input  name = "t_email" type ="email" placeholder="your email"/>
                <input class= "btn_login" name="submit"  type="submit" value="send message">  
                <p> Try another way   <a href = "qa.php"> help</a></p>
                </form>
</div>
           



<?php
 ///check if email exist 

 $sql_check ="select * from suppliers where email ='$email'";
 $sql_check_do = mysqli_query($con2,$sql_check);
 if(mysqli_num_rows($sql_check_do)){
///////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['submit']) and $_POST['submit']=="send message"){
    $email = $_POST['t_email'];
    //////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////
     $c=time();
     $req_time=date('y-m-d',$c);
     $ip_add=$_SERVER['REMOTE_ADDR'];
     $ip_add_local=$_SERVER['HTTP_CLIENT_IP'];
     $ip_from_proxy=$_SERVER['HTTP_X_FORWARDED_FOR'];
     /////////////////////////////////////////////////////////////////////////////
     $sql_f=mysqli_query($con,"insert into forget_password values('$email','$ip_add_local','$ip_add','$ip_from_proxy','$req_time')");
     if($sql_f){
         $header="Acessories.com";
         $to=$email;
         $subject="Reset your password";
         $message="please click on this mail to Reset your password \n
          https://www.Acessories.com/reset_password.php?e=$email";
          mail($to,$subject,$message,$header);
          header('location:check_email_msg.php');
    
     }
    }else{
        echo '<script>alert("try again please ");</script>';
    }
    
    /////////////////////////////////////////////////////////////////
 }else{
echo '<script>alert("   mail not exist  ");</script>';
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