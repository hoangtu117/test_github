<?php
    require_once "connection.php";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $brand_id=$_POST['brand_id'];
        $brand_name = $_POST['brand_name'];
        $error2='';
        if(empty($brand_id)||empty($brand_name)){
            $error2 ="vui lòng không để trống dữ liệu cần sửa";
            echo $error2;
        }else{
           $sql="UPDATE brands SET brand_name='$brand_name'
           where brand_id='$brand_id'";
           $stmt =$conn->prepare($sql);
           $stmt->execute();
           $msg="sửa dữ liệu thành công";
           header("location: thumuc.php?msg=$msg");
           exit;
        }
    }
    $brand_id=$_GET['brand_id'];

    $sql ="SELECT*FROM brands Where brand_id='$brand_id'";

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
    <link rel="stylesheet" 
    href="//netdna.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>cập nhật thư mục</title>
</head>
<body>
<h2 class="text-center font-extrabold text-[50px]">Sửa thư mục</h2>
<div class=" ml-[500px] w-[600px] bg-amber-200 ">
    <form action="suathumuc.php?brand_id=<?=$_GET['brand_id']?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="brand_id" value="<?= $cate['brand_id']?>"> <br>
            <div class="form-group">
            <label for="">Tên thư mục</label>
            <input class="form-control" type="text" name="brand_name" value="<?=$cate['brand_name']?>" placeholder="ten thu muc"> <br>
            <div>
            <button class="btn btn-danger text-orange-700 ml-[250px]" type="submit">Cập nhật</button> 
    </form>
</div>
</body>
</html>