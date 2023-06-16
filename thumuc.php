<?php
require_once "connection.php";
 // câu lệnh sql lấy ra dữ liệu bảng categories
 $sql = "SELECT * FROM brands";
 
 // chuẩn bị
 $stmt = $conn->prepare($sql);
 //thực thi câu lệnh sql 
 $stmt->execute();
 //lấy dữ liệu (toàn bộ bản ghi)
 $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" 
    href="//netdna.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Thư mục</title>
</head>
<body>
<div class="container max-w-[1440px]">
        <h1 class="text-center font-extrabold text-[50px]">ADMIN QUẢN LÍ</h1>
    <header class="w-[100%] ml-[500px] ">
            <nav>
                <ul class="font-bold flex gap-[100px] mt-[30px] ">
                    <li><a href="show.php">QUẢN LÍ SẢN PHẨM</a></li>
                    <li><a href="thumuc.php">QUẢN LÍ THƯ MỤC</a></li>
                    <li><a href="quantri.php">TRANG CHỦ</a></li>
                </ul>
            </nav>
        </header>
<div class="card-body">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>TÊN THƯ MỤC</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($result as $cate) :?>
            <tr>
                <td><?= $cate['brand_id'] ?></td>
                <td><?= $cate['brand_name'] ?></td>
                <td>
                    <a href="suathumuc.php?brand_id=<?= $cate['brand_id']?>">Sửa</a>
                </td>
                <td>
                    <a href="xoa.php?brand_id=<?= $cate['brand_id']?>" 
                    onclick="return confirm('bạn có chắc chắn muốn xóa không')">Xóa</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <a href="themthumuc.php" class="btn btn-danger">Thêm thư mục</a>
</div>
</div>
</body>
</html>