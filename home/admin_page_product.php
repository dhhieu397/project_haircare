<?php

@include 'config.php';

if(isset($_POST['add'])){
   $code = $_POST['code'];
   $name = $_POST['name'];
   $description = $_POST['description'];
   $product_infomation = $_POST['product_infomation'];
   $ingredient = $_POST['ingredient'];
   $guide = $_POST['guide'];
   $img = $_FILES['img']['name'];
   $subcategory = $_POST['subcategory'];
   $brand = $_POST['brand'];
   $size = $_POST['size'];
   $sku = $_POST['sku'];
   $price = $_POST['price'];
   $real_price = $_POST['real_price'];
   $rate = $_POST['rate'];
   $rate_number = $_POST['rate_number'];
   $total = $_POST['total'];
   $creation_date = $_POST['creation_date'];

   $product_image_tmp_name = $_FILES['img']['tmp_name'];
   $product_image_folder = 'uploaded_img/'.$img;

   if(empty($name) || empty($price)){
      $message[] = 'please fill out all';
   }else{
      $insert = "INSERT INTO product_item( code, name, description, product_infomation, ingredient, guide, img, subcategory, brand, size, sku, price, real_price, rate, rate_number, total, creation_date) 
      VALUES ('$code','$name','$description','$product_infomation','$ingredient','$guide','$img','$subcategory','$brand','$size','$sku','$price','$real_price','$rate','$rate_number','$total','$creation_date')";
      $upload = mysqli_query($conn,$insert);
      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         $message[] = 'new item added successfully';
      }else{
         $message[] = 'could not add the item';
      }
   }

};

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM product_item WHERE id = $id");
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
         <h3>add</h3>
         <input type="text" placeholder="code" name="code" class="box">
         <input type="text" placeholder="name" name="name" class="box">
         <input type="text" placeholder="description" name="description" class="box">
         <input type="text" placeholder="product_infomation" name="product_infomation" class="box">
         <input type="text" placeholder="ingredient" name="ingredient" class="box">
         <input type="text" placeholder="guide" name="guide" class="box">
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="img" class="box">
         <input type="text" placeholder="subcategory" name="subcategory" class="box">
         <input type="text" placeholder="brand" name="brand" class="box">
         <input type="text" placeholder="size" name="size" class="box">
         <input type="text" placeholder="sku" name="sku" class="box">
         <input type="text" placeholder="price" name="price" class="box">
         <input type="text" placeholder="real_price" name="real_price" class="box">
         <input type="text" placeholder="rate" name="rate" class="box">
         <input type="text" placeholder="rate_number" name="rate_number" class="box">
         <input type="text" placeholder="total" name="total" class="box">
         <input type="date" placeholder="creation_date" name="creation_date" class="box">
         <input type="submit" class="btn" name="add" value="add"> 
      </form>

   </div>

   <?php

   $select = mysqli_query($conn, "SELECT * FROM product_item");
   
   
   ?>
   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>img</th>
            <th>code</th>
            <th>name</th>
            <th>subcategory</th>
            <th>brand</th> 
            <th>price</th>
            <th>total</th>
            <th>creation_date</th>
            <th>action</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><img src="uploaded_img/<?php echo $row['img']; ?>" height="100" alt=""></td>
            <td><?php echo $row['code']; ?></td>
            <td><?php echo $row['name']; ?></td>            
            <td><?php echo $row['subcategory']; ?></td>
            <td><?php echo $row['brand']; ?></td>           
            <td>$<?php echo $row['price']; ?></td>
            <td><?php echo $row['total']; ?></td>
            <td><?php echo $row['creation_date']; ?></td>
            <td>
               <a href="admin_update_product.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
               <a href="admin_page_product.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
            </td>
         </tr>
      <?php } ?>
      </table>
   </div>

</div>


</body>
</html>