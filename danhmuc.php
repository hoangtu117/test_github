<?php
require_once "connection.php";
 // câu lệnh sql lấy ra dữ liệu bảng categories
 $id=$_GET['brand_id'];
 $sql = "SELECT * from products where brand_id=$id";
 
 // chuẩn bị
 $stmt = $conn->prepare($sql);
 //thực thi câu lệnh sql 
 $stmt->execute();
 //lấy dữ liệu (toàn bộ bản ghi)
 $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
?>