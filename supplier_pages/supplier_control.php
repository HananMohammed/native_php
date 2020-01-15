
<?php
include_once 'supplier_module.php';
if(isset($_POST['submit']) and $_POST['submit']=='Add'){
      //get value from screen
$id= $_POST['t_id'];
$name= $_POST['t_name'];
$price= $_POST['t_price'];
$expire  = $_POST['t_exp'];
$email=$_POST['t_email'];
$unit = $_POST['t_unit'];
$type=$_POST['t_type'];
$s_desc = $_POST['short_desc'];
$d_desc = $_POST['detailed_desc'];
$cancel =$_POST['cancel_policy'];
$info =$_POST['info_about'];

////////////////////////////////////////////////
  //////preparing file upload image//////////
////////////////////////////////////////////////
$uploaded_image_name=$_FILES['photo_file']['name'];
$target_folder="supplier_imges/".$uploaded_image_name;
$target_location="http://localhost/Acessories/supplier_pages/supplier_imges/".$uploaded_image_name;
$item_photo=$_FILES['photo_file']['tmp_name'];
move_uploaded_file($item_photo ,$target_folder);
//////////////////////////////////////////////////////////////////////////////////////
//taking copy from supplier class 
$ob=new supplier();
$ob->add_item($id,$name,$price,$expire,$email,$unit,$type,$target_folder,$s_desc,$d_desc,$cancel,$info);



 
}
///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////getting value from DB to be edit /////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////

$id=$_GET['v'];
$edit=new supplier();

$sql_get=mysqli_query($edit->get_connect(),"select * from items where case_id='$id'");
if($sql_get){
    $row = mysqli_fetch_assoc($sql_get); 
    $name= $row['item_name'];
    $image=$row['item_image'];
    $full_desc=$row['full_description'];
    $cancel=$row['cancel_policy'];
    $info = $row['info_about'];
    $price= $row['item_price'];
    $expired= $row['item_ex_date'];
    $unit = $row['item_unit'];  
    $desc=$row['short_description'];
    $cat=$row['item_type'];
    $email=$_SESSION['s_pass'];
}
//////
/////////////////////////////////////////////////////////////////////////////////////
      ///////////get value from screen for editing item /////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['submit']) and $_POST['submit']=='Update'){

  //get value from screen
  $email=$_SESSION['s_pass'];
  $item_id = $_POST['t_id'];
  $item_name=$_POST['t_name'];
  $item_price=$_POST['t_price'];
  $image_name=$_FILES['photo_file']['name'];
  $expir_date=$_POST['t_exp'];
  $num_unit=$_POST['t_unit'];
  $item_type=$_POST['t_type'];
  $short_desc = $_POST['short_desc'];
  $detailed_desc=$_POST['detailed_desc'];
  $cancel_policy=$_POST['cancel_policy'];
  $info=$_POST['info_about'];
 $edit->editItem($item_id,$item_name,$item_price,$expir_date,$email,$num_unit,$item_type,$short_desc,$detailed_desc,$cancel_policy,$info);
}

   
//=================================================================================================

if(isset($_POST['submit']) and $_POST['submit']=="Delete this item"){
      $item_id= $_POST['del_id'];
      $edit->deleteItem($item_id);
    }


?>