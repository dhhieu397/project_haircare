<?php

@include 'config.php';

$id = $_GET['edit3'];

if(isset($_POST['update_equipment'])){

   $equipment_name = $_POST['equipment_name'];
   $equipment_price = $_POST['equipment_price'];
   $equipment_image = $_FILES['equipment_image']['name'];
   $equipment_image_tmp_name = $_FILES['equipment_image']['tmp_name'];
   $equipment_image_folder = 'uploaded_img/'.$equipment_image;

   if(empty($equipment_name) || empty($equipment_price) || empty($equipment_image)){
      $message[] = 'please fill out all!';    
   }else{

      $update_data = "UPDATE equipments SET name='$equipment_name', price='$equipment_price', img='$equipment_image'  WHERE id = '$id'";
      $upload = mysqli_query($conn, $update_data);

      if($upload){
         move_uploaded_file($equipment_image_tmp_name, $equipment_image_folder);
         header('location:admin_page.php');
      }else{
         $$message[] = 'please fill out all!'; 
      }

   }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style_admin.css">
</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>

<div class="container">


<div class="admin-product-form-container centered">

   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM equipments WHERE id = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">update the product</h3>
      <input type="text" class="box" name="equipment_name" value="<?php echo $row['name']; ?>" placeholder="enter the product name">
      <input type="number" min="0" class="box" name="equipment_price" value="<?php echo $row['price']; ?>" placeholder="enter the product price">
      <input type="file" class="box" name="equipment_image"  accept="image/png, image/jpeg, image/jpg">
      <input type="submit" value="update equipment" name="update_equipment" class="btn">
      <a href="admin_page.php" class="btn">go back!</a>
   </form>
   


   <?php }; ?>

   

</div>

</div>

</body>
</html>