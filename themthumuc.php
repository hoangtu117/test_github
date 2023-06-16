<?php
require_once "connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $brand_id=$_POST['brand_id'];
    $brand_name = $_POST['brand_name'];
    $error = '';
    $error2='';
    
    if($brand_id==''){
        $error ="vui lòng nhập tên id";
    }elseif($brand_name==''){
        $error2 ="vui lòng nhập tên thư mục";
    }
    else{
        $sql = "INSERT INTO brands (brand_id, brand_name)values( '$brand_id', '$brand_name')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        header('location: thumuc.php');
        exit;   
    }  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" 
    href="//netdna.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Thêm thư mục</title>
</head>
<body>
    
<h2 class="text-center font-extrabold text-[50px]">Thêm thư mục</h2>
<div class=" ml-[500px] w-[600px] bg-amber-200 ">
    <form class="font-bold" action="themthumuc.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
        <label for="">ID</label>
        <input class="form-control"  type="number" name="brand_id" placeholder="ID" value="<?= $brand_id ?? '' ?>">
        <?php if(!empty($error)) : ?>
            <span style="color:red">
                   <?= $error ?>
            </span>     
        <?php endif ?>
        </div>
        <div class="form-group">
        <label for="">Tên thư mục</label>
        <input class="form-control"  type="text" name="brand_name" placeholder="nhap tên thư mục" value="<?= $brand_name ?? '' ?>"> 
        <?php if(!empty($error2)) : ?>
            <span style="color:red">
                   <?= $error2 ?>
            </span>     
        <?php endif ?>
        </div> 
        <button class="btn btn-danger text-orange-700 ml-[250px]" type="submit">Thêm</button>
    </form>
</div>
</body>
</html>

