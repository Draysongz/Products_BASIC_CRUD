<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




$error=[];

$title ='';
$price='';
$description='';
if($_SERVER['REQUEST_METHOD']=== 'POST'){

    $title= $_POST['title'];
    $description= $_POST['description'];
    $price= $_POST['price'];
    $date = date('Y-m-d H:i:s');
    


    if(!$title){
        $errors[]='Product title is required';
    }
    if(!$price){
        $errors[]='Price is required';
    }
    
    if(empty($errors)){
        $statement = $pdo->prepare("INSERT INTO products (title, image, description, price, create_date)
        VALUES(:title, :image, :description, :price, :date);

");
$statement->bindValue(':title', $title);
$statement->bindValue(':image', null);
$statement->bindValue(':description', $description);
$statement->bindValue(':price', $price);
$statement->bindValue(':date', $date);
$statement->execute();
    }

};


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">
</head>
<body>
    <h1>Create new Product</h1>
    <?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach($errors as $error):?>
            <div> <?php echo $error?></div>

            <?php endforeach ?>
    </div>
    <?php endif?>

    <form method="post" action="" enctype="multipart/form-data">
  <div class="form-group">
    <label>Product Image</label>
    <br>
    <input type="file" name="image" >
  </div>
  <div class="form-group">
    <label>Product Title</label>
    <input type="text" class="form-control" name="title" value="<?php echo $title ?>"  >
  </div>
  <div class="form-group">
    <label>Product Description</label>
    <textarea type="text" class="form-control" name="description" value="<?php echo $description ?>"></textarea>
  </div>
  <div class="form-group">
    <label>Product Price</label>
    <input type="number" step=".01" class="form-control" name="price" value="<?php echo $price ?>"  >
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</body>
</html>
