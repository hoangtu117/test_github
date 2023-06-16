<?php
require_once "connection.php";
 // câu lệnh sql lấy ra dữ liệu bảng categories
 $id=$_GET['get_id'];
 $sql = "SELECT * from products inner join brands on brands.brand_id=products.brand_id where brands.brand_id=$id";
 
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
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
</body>
</html>