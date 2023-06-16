<?php
require_once "connection.php";
 // câu lệnh sql lấy ra dữ liệu bảng categories
 $sql = "SELECT * from products inner join brands on products.brand_id = brands.brand_id;";
 
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
    <title>Document</title>
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
                <th>TÊN SẢN PHẨM</th>
                <th>IMAGE</th>
                <th>PRICE</th>
                <th>SỐ LƯỢNG</th>
                <th>MÔ TẢ</th>
                <th>THƯƠNG HIỆU</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($result as $cate) :?>
            <tr>
                <td><?= $cate['prd_id'] ?></td>
                <td><?= $cate['prd_name'] ?></td>
                <td><img src="./image/<?= $cate ['image']?>" alt="" width="100"></td>
                <td><?= $cate['price'] ?></td>
                <td><?= $cate['quantity'] ?></td>
                <td><?= $cate['descriptions'] ?></td>
                <td><?= $cate['brand_name'] ?></td>

                <td>
                    <a href="edit.php?prd_id=<?= $cate['prd_id']?>">Sửa</a>
                </td>
                <td>
                    <a href="delete.php?prd_id=<?= $cate['prd_id']?>" 
                    onclick="return confirm('bạn có chắc chắn muốn xóa không')">Xóa</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <a href="creat.php" class="btn btn-danger"> THÊM SP</a>
</div>
</div>
</body>
</html>