<?php

@include 'config.php';

if(isset($_POST['add_product'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'uploaded_img/'.$product_image;

   if(empty($product_name) || empty($product_price) || empty($product_image)){
      $message[] = 'please fill out all';
   }else{
      $insert = "INSERT INTO products(name, price, img) VALUES('$product_name', '$product_price', '$product_image')";
      $upload = mysqli_query($conn,$insert);
      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         $message[] = 'new product added successfully';
      }else{
         $message[] = 'could not add the product';
      }
   }

};

if(isset($_POST['add_solution'])){

    $category_name = $_POST['category_name'];
    $title_name = $_POST['title_name'];
    $solution_image = $_FILES['solution_image']['name'];
    $solution_image_tmp_name = $_FILES['solution_image']['tmp_name'];
    $solution_image_folder = 'uploaded_img/'.$solution_image;
 
    if(empty($category_name) || empty($title_name) || empty($solution_image)){
       $message[] = 'please fill out all';
    }else{
       $insert2 = "INSERT INTO solutions(category, title, img) VALUES('$category_name', '$title_name', '$solution_image')";
       $upload2 = mysqli_query($conn,$insert2);
       if($upload2){
          move_uploaded_file($solution_image_tmp_name, $solution_image_folder);
          $message[] = 'new solution added successfully';
       }else{
          $message[] = 'could not add the solution';
       }
    }
 
 };

 if(isset($_POST['add_equipments'])){

    $equipments_name = $_POST['equipments_name'];
    $equipments_price = $_POST['equipments_price'];
    $equipments_image = $_FILES['equipments_image']['name'];
    $equipments_image_tmp_name = $_FILES['equipments_image']['tmp_name'];
    $equipments_image_folder = 'uploaded_img/'.$equipments_image;
 
    if(empty($equipments_name) || empty($equipments_price) || empty($equipments_image)){
       $message[] = 'please fill out all';
    }else{
       $insert3 = "INSERT INTO equipments(name, price, img) VALUES('$equipments_name', '$equipments_price', '$equipments_image')";
       $upload3 = mysqli_query($conn,$insert3);
       if($upload3){
          move_uploaded_file($equipments_image_tmp_name, $equipments_image_folder);
          $message[] = 'new equipments added successfully';
       }else{
          $message[] = 'could not add the equipments';
       }
    }
 
 };

 if(isset($_POST['add_posts'])){

    $posts_title = $_POST['posts_title'];
    $posts_content = $_POST['posts_content'];
    $posts_date = $_POST['posts_date'];
    $posts_url = $_POST['posts_url'];
    $posts_image = $_FILES['posts_image']['name'];
    $posts_image_tmp_name = $_FILES['posts_image']['tmp_name'];
    $posts_image_folder = 'uploaded_img/'.$posts_image;
 
    if(empty($posts_title) || empty($posts_content) || empty($posts_date) || empty($posts_url) || empty($posts_image)){
       $message[] = 'please fill out all';
    }else{
       $insert4 = "INSERT INTO posts(title, content, img, date, url) VALUES('$posts_title', '$posts_content', '$posts_image', '$posts_date', '$posts_url')";
       $upload4 = mysqli_query($conn,$insert4);
       if($upload4){
          move_uploaded_file($posts_image_tmp_name, $posts_image_folder);
          $message[] = 'new posts added successfully';
       }else{
          $message[] = 'could not add the posts';
       }
    }
 
 };

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM products WHERE id = $id");
   header('location:admin_page.php');
};

if(isset($_GET['delete2'])){
    $id2 = $_GET['delete2'];
    mysqli_query($conn, "DELETE FROM solutions WHERE id = $id2");
    header('location:admin_page.php');
};

if(isset($_GET['delete3'])){
    $id3 = $_GET['delete3'];
    mysqli_query($conn, "DELETE FROM equipments WHERE id = $id3");
    header('location:admin_page.php');
};

if(isset($_GET['delete4'])){
    $id4 = $_GET['delete4'];
    mysqli_query($conn, "DELETE FROM posts WHERE id = $id4");
    header('location:admin_page.php');
 };
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
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

   <div class="admin-product-form-container">

     

      
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>add a new equipments</h3>
         <input type="text" placeholder="enter equipments name" name="equipments_name" class="box">
         <input type="number" placeholder="enter equipments price" name="equipments_price" class="box">
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="equipments_image" class="box">
         <input type="submit" class="btn" name="add_equipments" value="add equipments"> 
      </form>

      

   </div>

   <?php

   $select = mysqli_query($conn, "SELECT * FROM products");
   $select2 = mysqli_query($conn, "SELECT * FROM solutions");
   $select3 = mysqli_query($conn, "SELECT * FROM equipments");
   $select4 = mysqli_query($conn, "SELECT * FROM posts");
   
   ?>
   

   

   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>equipments image</th>
            <th>equipments name</th>
            <th>equipments price</th>
            <th>action</th>
         </tr>
         </thead>
         <?php while($row3 = mysqli_fetch_assoc($select3)){ ?>
         <tr>
            <td><img src="uploaded_img/<?php echo $row3['img']; ?>" height="100" alt=""></td>
            <td><?php echo $row3['name']; ?></td>
            <td>$<?php echo $row3['price']; ?></td>
            <td>
               <a href="admin_update_equipment.php?edit3=<?php echo $row3['id']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
               <a href="admin_page_equipment.php?delete3=<?php echo $row3['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
            </td>
         </tr>
      <?php } ?>
      </table>
   </div>

   

</div>


</body>
</html>