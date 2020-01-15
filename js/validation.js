function validate(){

function val_name(){
let name_val = document.getElementById("name").value;
 let reg_name = /^([a-zA-Z]{3,20})$/i;
let reg_test =reg_name.test(name_val);
alert("name is " + reg_test );
    }

   function val_pass(){
    let password =  document.getElementById("pass").Value;
 
    let reg_pass =/^([a-zA-z])*[@#$%]?([0-9]{1,16})*$/i;
    let reg_tes = reg_pass.test(password);
    alert("name is " +reg_test );
    }
function val_phone(){
    let phone_num = document.getElementById("phone").Value;
   let reg_phone = /^(\d{5,11})$/i
   let reg_test = reg_phone.test(phone_num);
   if(reg_test){
       document.getElementById("phone").innerHTML=" wrong phone number try again ";
   }else{
    document.getElementById("phone").innerHTML= phone_num + "<p>    is ok </p>" ;
   }

}    
  
function val_email(){
    let password =  document.getElementById("email").Value;
 
    let reg_email =/^\w+([/._-]?\w+)*@\w+([/._-]?\w+)*([\\w{2,3}])+)$/i ;
    
    let reg_test = reg_email.test(password);
    alert("email is " +reg_test );
    }  
val_phone();
val_pass();
val_name();
val_email();
}