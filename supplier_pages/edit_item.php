<?php
ob_start();
include_once 'supplier_control.php';
session_start();
if(!isset($_SESSION['s_pass'])){

    header('location:supplier_login.php');
    die();
}
?>

<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
       
                <title><?php echo $name;?></title>
                <link rel="stylesheet"   href="../css/signUp_style.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    </head>
    <body>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>  
<?php  include 'header_supplier.php'?>
<!--delete item -->

<div style="float:right;">

<form action="supplier_control.php" method="POST">
<input type="hidden" value="<?php echo $id;?>" name='del_id'/>
<input type ="submit" class= "btn btn-danger"name="submit" value="Delete this item"/>
</form>
</div>

<!-- end of deleting  item -->

<div class="space" style="width:100%;"></div>
<form action="supplier_control.php" method="POST" enctype ="multipart/form-data">
<div class ="section" >
<h1>  edit Items </h1>
<div class="space"></div>
<img src="<?php echo $image;?>"  id="view_image"/>
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

<input type ="file" class="File" onchange="preview_image(event) " name="photo_file"/>
<input type="text" value = "<?php echo $name;?>" id="name" name="t_name" />
<input type="number" value = "<?php echo $price;?>"  id="name" name="t_price" />
<input type="date"  value = "<?php echo $expired;?>"  id="name" name="t_exp" />
<input type="number" value = "<?php echo $unit;?>" id="name" name="t_unit" /></br>
<div class ="space" style = "width:100%; height:30px;"></div>

            <span>item type :       </span>
           <select value="<?php echo $cat;?>" name = "t_type">
            <option>Acessories</option>
            <option>glasses</option>
           </select>
<input type="text"  value = "<?php echo $desc;?>"  name="short_desc" style ="height:70px; width:60%;" />
<input type="text"  value = "<?php echo $full_desc ;?>"    name="detailed_desc" style ="height:130px; width:60%;" />
<input type="text" value = "<?php echo $cancel ;?>"  name="cancel_policy" style ="height:70px; width:60%;" />
<input type="text" value = "<?php echo $info ;?>"   name="info_about" style ="height:70px; width:60%;" />
<input type="hidden" value = "<?php echo $id ;?>"   name="t_id" style ="height:70px; width:60%;" />

<div class ="space" style = "width:100%; height:30px;"></div>
<input type="submit" name="submit" id="btn_signup" value="Update" />
<div class ="space" style = "width:100%; height:30px;"></div>
</form>
</body>

</html>