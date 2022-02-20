<?php

@include 'config.php';

$id = $_GET['edit4'];

if(isset($_POST['update_post'])){

   $post_title = $_POST['post_title'];
   $post_content = $_POST['post_content'];
   $post_date = $_POST['post_date'];
   $post_image = $_FILES['post_image']['name'];
   $post_url = $_POST['post_url'];
   $post_image_tmp_name = $_FILES['post_image']['tmp_name'];
   $post_image_folder = 'uploaded_img/'.$post_image;

   if(empty($post_title) || empty($post_content) || empty($post_image) || empty($post_url) || empty($post_date)){
      $message[] = 'please fill out all!';    
   }else{

      $update_data = "UPDATE posts SET title='$post_title', content='$post_content', img='$post_image', url='$post_url', date='$post_date'  WHERE id = '$id'";
      $upload = mysqli_query($conn, $update_data);

      if($upload){
         move_uploaded_file($post_image_tmp_name, $post_image_folder);
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
      
      $select = mysqli_query($conn, "SELECT * FROM posts WHERE id = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">update the post</h3>
      <input type="text" class="box" name="post_title" value="<?php echo $row['title']; ?>" placeholder="enter the title">
      <input type="text" class="box" name="post_content" value="<?php echo $row['content']; ?>" placeholder="enter the content">
      <input type="file" class="box" name="post_image"  accept="image/png, image/jpeg, image/jpg">
      <input type="text" class="box" name="post_url" value="<?php echo $row['url']; ?>" placeholder="enter the url">
      <input type="date" class="box" name="post_date" value="<?php echo $row['date']; ?>" placeholder="enter the date">
      <input type="submit" value="update post" name="update_post" class="btn">
      <a href="admin_page.php" class="btn">go back!</a>
   </form>
   


   <?php }; ?>

   

</div>

</div>

</body>
</html>