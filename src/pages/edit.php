<?php
$get_id=$_GET["id"];
$query2="SELECT * FROM products WHERE id='$get_id'";
$result2=$link->query($query2);
$prod=$result2->fetch(PDO::FETCH_ASSOC);
if (isset($_POST["edit"])) {
  $productId = $_POST["productId"];
  $title = $_POST["title"];
  $price = $_POST["price"];
  $text = $_POST["text"];



  if (empty($error)) {

    $editProductQuery = "UPDATE products SET title = '$title', price = '$price', text = '$text' WHERE id = '{$get_id}'";

    $link->query($editProductQuery);
    echo '<script>alert("Товар успешно отредактировна!");</script>';
  } else { ?>
    <div class="error-container">
      <?= $error ?>
    </div>
<? }  
} ?>
<section class="add-product">
<div class="container">
    <h1 class="section__title">Редактировать товар</h1>
    <form name="edit" method="post" class="form reg-form" enctype="multipart/form-data">
    <input name="title" type="text" class="input" value="<? echo $prod['title']?>">
    <input name="price" type="text" class="input" value="<? echo $prod['price']?>">
    <textarea name="text" class="input" id="" cols="30" rows="10"><? echo $prod['text']?></textarea>

    <button name="edit" class="btn">Отредактировать</button>
    </form>
    <form name="edit2" method="post" class="form reg-form" enctype="multipart/form-data">
        <?php 
        if(isset($_POST["edit2"])){
            $image_name = $_FILES['img']['name'];
            $img = 'img/' . time() . $_FILES['img']['name'];
            move_uploaded_file($_FILES['img']['tmp_name'], $img);
            if (empty($error)) {

                $editProductQuery2 = "UPDATE products SET img = '$img' WHERE id = '{$get_id}'";
            
                $link->query($editProductQuery2);
                echo '<script>alert("Фотография успешно отредактировна!");</script>';
              } else { ?>
                <div class="error-container">
                  <?= $error ?>
                </div>
            <? }  
            } ?>
        

        
    <input type="file" name="img" class="input">
    <button name="edit2" class="btn">Отредактировать фотографию</button>
    </form>
</div>
</section>