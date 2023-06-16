<?php
require_once "connection.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $prd_id=$_POST['prd_id'];
    $prd_name = $_POST['prd_name'];
    $price = $_POST['price'];   
    $quantity = $_POST['quantity'];
    $descriptions = $_POST['descriptions'];
    $brand_id = $_POST['brand'];
    $file = $_FILES["image"];
    $file_name = $file['name'];
    $error = '';
    $error2='';
    $error4='';
    $error5='';
    $error6='';

    if($prd_name==''){
        $error ="vui lòng nhập tên sản phẩm";
    }elseif($price==''){
        $error2 ="vui lòng nhập tiền";

    }elseif($quantity==''){
        $error4 ="vui lòng nhập số lượng";

    }elseif($descriptions==''){
        $error6 ="vui lòng nhập mô tả";

    }
    else{
        $img = ['jpg','jpeg','png','gif'];
        if($file['size'] > 0){
            // lấy ra phần mở rộng của file;
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
            //
            $img_err = '';
            if(!in_array($file_ext, $img)){
                $img_err = "File của bạn không phải là ảnh";
            }
            move_uploaded_file($file['tmp_name'],'image/'.$file_name);
            }
        $sql = "INSERT INTO products (prd_id, prd_name, image, price, quantity, descriptions, brand_id)
         values( null, '$prd_name', '$file_name', '$price','$quantity', '$descriptions', '$brand_id')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        header('location: show.php');
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
    <title>Thêm bài viết</title>
</head>
<body>
    <h2 class="text-center font-extrabold text-[50px]">Thêm sản phẩm</h2>
    <div class=" ml-[500px] w-[600px] bg-amber-200 ">
    <form class="ml-[140px] font-bold" action="creat.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
        <input class="form-control w-[300px] " type="hidden" name="prd_id" placeholder="ID" value="<?= $prd_id ?? '' ?>">
        <?php if(!empty($error)) : ?>
            <span style="color:red">
                   <?= $error ?> 
            </span>     
        <?php endif ?>
        </div>

        <div class="form-group">
        <label for="">Tên sản phẩm</label>
        <input class="form-control w-[300px]" type="text" name="prd_name" placeholder="nhap tên sản phẩm" value="<?= $prd_name ?? '' ?>"> 
        <?php if(!empty($error2)) : ?>
            <span style="color:red">
                   <?= $error2 ?>
            </span>     
        <?php endif ?>
        </div>

        <div class="form-group">
        <label for="">anh</label>
        <input class="form-control w-[300px]" type="file" name="image" placeholder="image"> <br>
        </div>

        <div class="form-group">
        <label for="">price</label>
        <input class="form-control w-[300px]" type="number" name="price" placeholder="nhap price" value="<?= $price ?? '' ?>"> 
        <?php if(!empty($error4)) : ?>
            <span style="color:red">
                   <?= $error4 ?>
            </span>     
        <?php endif ?>
        </div>

        <div class="form-group">
        <label for="">số lượng</label>
        <input class="form-control w-[300px]" type="number" name="quantity" placeholder="nhap so luong" value="<?= $quantity ?? '' ?>"> 
        <?php if(!empty($error5)) : ?>
            <span style="color:red">
                   <?= $error5 ?>
            </span>     
        <?php endif ?>
        </div>

        <div class="form-group">
        <label for="">Mô tả</label>
        <input class="form-control w-[300px]" type="text" name="descriptions" placeholder="nhap mo ta" value="<?= $descriptions ?? '' ?>">
        <?php if(!empty($error6)) : ?>
            <span style="color:red">
                   <?= $error6 ?>
            </span>    
        <?php endif ?>
        </div>

        <div class="form-group">
        <label for="">ma thu muc</label>
        <select name="brand">
            <option value="">Tên danh mục</option>
            <option value="1">Lẩu</option>
            <option value="2">Buffe</option>
            <option value="3">Đồ ngọt</option>
            <option value="4"></option>
        </select>
        <br>
        </div>
        <button class="btn btn-danger text-orange-700 ml-[120px]" type="submit">Thêm</button>
    </form>
    </div>
</body>
</html>

