<?php
require_once "connection.php";
$sql = "SELECT * FROM brands";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
if(isset($_GET['brand_id']) && !empty($_GET['brand_id'])){
    $id1=$_GET['brand_id'];
    $name1 = $_GET['prd_name'];
    $sql1 = "SELECT * FROM products WHERE brand_id = $id1";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->execute();
    $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>QUAN TRI</title>
    <style>
        .catalog th{
            width: 20%;
        }
        .catalog th , .catalog td{
            height: 50px;
        }
        .edit{
            width: 40%;
        }
        .catalog,.catalog td,.catalog tr,.catalog th{
            border: 1px solid black;
        }
        .product,.product td,.product tr,.product th{
            border: 1px solid black;
        }
    </style>
</head>
<body>
<div class="container max-w-[1440px]">
    <div class="flex justify-between">
            <h1 class="text-center font-extrabold ml-[500px] text-[50px]">ADMIN QUẢN LÍ</h1>
            <a href="javascript:void(0)" onclick="show_admin()"><img src= "./image/icons8-male-user-60.png"  alt="" class="w-[50px] h-[50px] mr-6 rounded-[50%]"></a>
    </div>
            <div class="person min-h-[300px] w-0 bg-[#999] absolute right-0 pb-[20px] top-[10px] z-10 truncate">
                <ul>
                    <li class="block border-b-[1px] border-solid border-black">
                        <p class="absolute px-3 left-[5px] top-[5px] text-[32px] border-[1px] border-solid border-red-700 rounded-[10px]" onclick="remove_admin()">X</p>
                        <img src="./image/icons8-male-user-60.png" alt="" class="h-[140px] w-[140px] mx-auto block border-[1px] border-solid border-red-700 rounded-[50%] mt-3">
                    </li>
                    <li class="block mt-3 py-3 text-center">
                        <a href="login.php" class="border-[1px] border-solid border-red-700 rounded-[10px] py-3 px-5 hover:bg-red-700 hover:text-white">LOGINT</a>
                        <a href="logout.php" class="border-[1px] border-solid border-red-700 rounded-[10px] py-3 px-5 hover:bg-red-700 hover:text-white">LOGOUT</a>
                    </li>
                </ul>
    </div>
    <header class="w-[100%] ml-[500px] ">
            <nav>
                <ul class="font-bold flex gap-[100px] mt-[30px] ">
                    <li><a href="show.php">QUẢN LÍ SẢN PHẨM</a></li>
                    <li><a href="thumuc.php">QUẢN LÍ THƯ MỤC</a></li>
                </ul>
            </nav>
        </header>
    <?php if(!isset($id1)|| empty($id1)||!isset($name1)|| empty($name1)): ?>
    <h2 class="text-center text-red-700 text-[32px] font-[700] mt-6">TRANG QUẢN LÝ DANH MỤC VÀ SẢN PHẨM</h2>
    <table class="catalog w-[80%] mx-auto mt-6  text-center text-black">
        <tr class="bg-red-700 text-white">
            <th>Ma Danh Muc</th>
            <th>Ten Danh Muc</th>
            <th>So San Pham</th>
        </tr>
        <?php if(isset($result)){
            foreach($result as $item){
                $brand_id = $item['brand_id'];
                $sql2 = "SELECT count(prd_id) FROM products where brand_id =$brand_id";
                $stmt2=$conn->prepare($sql2);
                $stmt2->execute();
                $result2 = $stmt2->fetch(PDO::FETCH_ASSOC);
                ?>
                <tr>
                    <td><?php echo $item['brand_id'] ?></td>
                    <td><?php echo $item['brand_name'] ?></td>
                    <td><?php echo $result2['count(prd_id)']  ?></td>
                </tr>
                <?php
            }
        }
        
        ?>
        <tr>
            <?php
            $sql3 = "SELECT count(prd_id) FROM products ";
            $stmt3=$conn->prepare($sql3);
            $stmt3->execute();
            $result3 = $stmt3->fetch(PDO::FETCH_ASSOC);
            $sql4 = "SELECT count(brand_id) FROM brands";
            $stmt4=$conn->prepare($sql4);
            $stmt4->execute();
            $result4 = $stmt4->fetch(PDO::FETCH_ASSOC);
            ?>
            <td class="bg-red-700 text-white" colspan="2">Tong So Danh Muc: <?php echo isset($result4)? $result4['count(brand_id)']:0 ?></td>
            <td class="bg-red-700 text-white " colspan="2">Tong So San Pham: <?php echo isset($result3)? $result3['count(prd_id)']:0 ?></td>
        </tr>
    </table>
    <?php else: ?>
    <?php endif ?>
</div>
<script>
        var admin = document.getElementsByClassName('person')[0];
        function show_admin() {
            admin.classList.toggle("w-[300px]");
        }

        function remove_admin() {
            admin.classList.toggle("w-[300px]");
        }
    </script>
</body>
</html>