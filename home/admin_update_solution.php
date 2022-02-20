<?php

@include 'config.php';

$id = $_GET['edit2'];

if(isset($_POST['update_solution'])){

   $solution_category = $_POST['solution_category'];
   $solution_title = $_POST['solution_title'];
   $solution_image = $_FILES['solution_image']['name'];
   $solution_url = $_POST['solution_url'];
   $solution_image_tmp_name = $_FILES['solution_image']['tmp_name'];
   $solution_image_folder = 'uploaded_img/'.$solution_image;

   if(empty($solution_title) || empty($solution_category) || empty($solution_image) || empty($solution_url)){
      $message[] = 'please fill out all!';    
   }else{

      $update_data = "UPDATE solutions SET category='$solution_category', title='$solution_title', img='$solution_image', url='$solution_url'  WHERE id = '$id'";
      $upload = mysqli_query($conn, $update_data);

      if($upload){
         move_uploaded_file($solution_image_tmp_name, $solution_image_folder);
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
      
      $select = mysqli_query($conn, "SELECT * FROM solutions WHERE id = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">update the solution</h3>
      <input type="text" class="box" name="solution_category" value="<?php echo $row['category']; ?>" placeholder="enter the category">
      <input type="text" class="box" name="solution_title" value="<?php echo $row['title']; ?>" placeholder="enter the title">
      <input type="file" class="box" name="solution_image"  accept="image/png, image/jpeg, image/jpg">
      <input type="text" class="box" name="solution_url" value="<?php echo $row['url']; ?>" placeholder="enter the url">
      <input type="submit" value="update solution" name="update_solution" class="btn">
      <a href="admin_page.php" class="btn">go back!</a>
   </form>
   


   <?php }; ?>

   

</div>

</div>

</body>
</html>