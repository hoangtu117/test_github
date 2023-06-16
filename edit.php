<?php
    require_once "connection.php";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $prd_id=$_POST['prd_id'];
        $prd_name = $_POST['prd_name'];
        $price = $_POST['price'];   
        $quantity = $_POST['quantity'];
        $descriptions = $_POST['descriptions'];
        $brand_id = $_POST['brand_id'];
        $file = $_FILES["image"];
        $file_name = $file['name'];
        $error2='';
        if(empty($prd_id)||empty($prd_name)||empty($price)||empty($quantity)||empty($descriptions)||empty($brand_id)){
            $error2 ="vui lòng không để trống dữ liệu cần sửa";
            echo $error2;
        }else{
           move_uploaded_file($file['tmp_name'],'image/'.$file_name);
           $sql="UPDATE products SET prd_name='$prd_name',image='$file_name',price='$price',quantity='$quantity',descriptions='$descriptions',brand_id='$brand_id'
           where prd_id='$prd_id'";
           $stmt =$conn->prepare($sql);
           $stmt->execute();
           $msg="sửa dữ liệu thành công";
           header("location:show.php?msg=$msg");
           exit;
        }
    }
   

    $prd_id=$_GET['prd_id'];

    $sql ="SELECT*FROM products Where prd_id='$prd_id'";

    $stmt =$conn->prepare($sql);

    $stmt->execute();

    $cate= $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>cập nhật bài viết</title>
</head>
<body>
<h2 class="text-center font-extrabold text-[50px]">Cập nhật sản phẩm</h2>
<div class=" ml-[500px] w-[600px] bg-amber-200 ">
    <form class="font-bold" action="edit.php?prd_id=<?=$_GET['prd_id']?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="prd_id" value="<?= $cate['prd_id']?>"> <br>
            <div class="form-group">
            <label for="">Tên sản phẩm</label>
            <input class="form-control" type="text" name="prd_name" value="<?=$cate['prd_name']?>" placeholder="ten san pham">
            </div>

            <div class="form-group">
            <label for="">anh</label>
            <input class="form-control" type="file" name="image" value="">
            </div>

            <div class="form-group">
            <label for="">price</label>
           <input class="form-control" type="number" name="price" value="<?=$cate['price']?>" placeholder="price">
            </div>

            <div class="form-group">
           <label for="">số lượng</label>
            <input class="form-control" type="number" name="quantity" value="<?=$cate['quantity']?>" placeholder="so luong">
            </div>

            <div class="form-group">
            <label for="">Mô tả</label>
            <input class="form-control" type="text" name="descriptions" value="<?=$cate['descriptions']?>" placeholder="mo ta">
            </div>
            <div class="form-group">
            <label for="">ma thu muc</label>
            <input class="form-control" type="number" name="brand_id" value="<?=$cate['brand_id']?>" placeholder="muc sp"> 
            </div>
            <button class="btn btn-danger text-orange-700 ml-[250px]" type="submit">Cập nhật</button> 
    </form>
    </div>
</body>
</html>