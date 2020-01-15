<?php
/* MVC 
M> Model
V> view 
c> control 

    created By : 
    Date :
    information about : 
*/
class supplier {
 // connection 
 private $server="localhost";
 private $user ="root";
 private $pass ="ToKa111995";
 private $db_name  ="show_db";
 //function to get connection from db
 public function get_connect(){
return $con=mysqli_connect($this->server,$this->user,$this->pass,$this->db_name);
}
public function add_item($id,$name,$price,$expire,$email,$unit,$type,$target_folder,$s_desc,$d_desc,$cancel,$info){
    $con=$this->get_connect();
    //insert  it to DB
$sql_add= "insert into items values('$id','$name','$price','$expire','$email','$unit','$type',
              '$target_folder','$s_desc','$d_desc','$cancel','$info')";

$sql_do = mysqli_query($con,$sql_add);
if($sql_do){
  session_start();
  $_SESSION['s_pass']=$email;
  header('location:setting.php');  
}else{
  echo "error".mysqli_error($con);
}

}
public function editItem($item_id,$item_name,$item_price,$expir_date,$email,$num_unit,$item_type,$short_desc,$detailed_desc,$cancel_policy,$info){
  $con=$this->get_connect();
  /////////////////////////////////////////////
  if($image_name==null){
    /*update information only cause  image without value */
    //then send it to DB 
    $sql_add="update items set case_id='$item_id',item_name='$item_name',item_price='$item_price',item_ex_date='$expir_date',
                supplier_email='$email',item_unit='$num_unit',item_type='$item_type',short_description='$short_desc',
                full_description='$detailed_desc',cancel_policy='$cancel_policy',info_about='$info' where case_id ='$item_id'";
     $sql_do = mysqli_query($con,$sql_add);
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
    $sql_add="update items set case_id='$item_id',item_name='$item_name',item_price='$item_price',item_ex_date='$expir_date',
                supplier_email='$email',item_unit='$num_unit',item_type='$item_type',item_image='$target_folder',short_description='$short_desc',
                full_description='$detailed_desc',cancel_policy='$cancel_policy'
                ,info_about='$info' where case_id ='$item_id'";
     
    $sql_do = mysqli_query($con , $sql_add);
    if($sql_do){
     session_start();
     $_SESSION['s_pass']=$email;
     header('location:setting.php');
    }else{
              echo "error".mysqli_error($con);
    }
    
     }
    //**************************************************************************************************** */
  /////////////////////////////deleting item //////////////////////////////////////////////////
  }
  public function deleteItem($item_id){
    $con=$this->get_connect();
    $sql_del = "delete from items where case_id='$item_id'";
      $sql_do=mysqli_query($con,$sql_del);
      if($sql_do){
        echo '<script>alert("Item Deleted ")</script>';
        header('location:setting.php');
    
      }else{
        echo '<script>alert("Internet connection error try  again")</script>';
      }
  }
//end class 
}
?>