<html>
    <head>
        <title> login</title>
        <link rel="stylesheet" type ="text/css" href="css/login_style.css"/>
        <meta name="viewport" content="width=device-width,initial-scale=1"/>
        <script src="js/script.js"></script><script src="js/jquery-3.4.1.js"></script>   
 <script src="js/jquery-3.4.1.min.js"></script> 
        <script src = 'js/plugin.js'></script>

    </head>
    <body>
        <!-- Start of main div -->
         <div class ="main" >
                 <div class ="header" >
                     <img src="imges\photo2.jpg" width="100" height="60" alt="logo img"  id="head"/>
                    
                         <ul id="header">
                                <ul>
                                        <li> <a href ="index.html" > Home</a></li>
                                        <li> <a href ="sign_up.html" >  sign_up </a></li>
                                        <li> <a href ="all_products.html" >products </a> </li>
                                        <li> <a href ="contact_us.html" >  contact_us </a></li>
                                        <li id="Demo"></li>

                             </ul>
                            </ul>
                 </div>
                 <img src="imges/drop.PNG" id="drop"/>

            <!-- end of main div -->

            <div class ="section">
<div class="login_design">
    <script src="js/validation.js"></script>
                <h1> login</h1>
                <input  type="email" placeholder="your email" id="email" onclick="validate()" required/>
                <input type= "password" placeholder = "your Password " id="pass" onclick="validate()" required/> <br/>

                     <button class="btn_login" onclick="validate()" >  login </button> 

                     <button class="btn_cancel">  Cancel </button> <br/>
 
              <p> if you don't have account plz  <a href = "sign_up.html"> sign up </a></p>
</div>
           

</div>
<div class="footer"> 
    <!-- <div class = "end_logo">
   
       <img src ="imges\icons\icons8-online-shop-96.png"  width= "50" height ="50" />
          
     </div>
        -->
     <p> All right reserved to show inc 2019 </p>
       <div class = "social_div">
           <img src ="imges\icons\icons8-facebook-neu-48.png"   />
          <img src ="imges\icons\icons8-gmail-48.png"  />
          <img src ="imges\icons\icons8-twitter-48.png" />
          
          <img src ="imges\icons\icons8-whatsapp-48.png"  />
          <img src ="imges\icons\icons8-yahoo-48.png"   />
       </div>
   
   <!--  end of footer -->
   </div>
    </div>       
</body>
</html>