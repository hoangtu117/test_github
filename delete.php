<?php
require_once "connection.php";

$prd_id = $_GET['prd_id'];

$sql = "DELETE FROM products WHERE prd_id=$prd_id";

$stmt = $conn->prepare($sql);

$stmt->execute();
$msg = "Xóa dữ liệu thành công";
header("location: show.php?msg=$msg");
die;
?>