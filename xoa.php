<?php
require_once "connection.php";

$brand_id = $_GET['brand_id'];

$sql = "DELETE FROM brands WHERE brand_id=$brand_id";

$stmt = $conn->prepare($sql);

$stmt->execute();
$msg = "Xóa dữ liệu thành công";
header("location: thumuc.php?msg=$msg");
die;
?>