<?php
require_once "connection.php";
// câu lệnh sql lấy ra dữ liệu bảng categories
$sql = "SELECT * from brands";
 
// chuẩn bị
$stmt = $conn->prepare($sql);
//thực thi câu lệnh sql 
$stmt->execute();
//lấy dữ liệu (toàn bộ bản ghi)
$result = $stmt->fetchAll(PDO::FETCH_ASSOC)
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/30d0976aea.js" crossorigin="anonymous"></script>
    <script src='/APP.js'></script>
</head>
<style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Times New Roman', Times, serif;
}
.container{
    max-width: 1980px;
    margin: 0 auto;
}
.banner2 img{
    width: 100%;
    height: 700px;
    position: relative;
    filter: brightness(50%);
}
.banner2 h2{
    position: absolute;
    top: 350px;
    left:520px;
    font-size: 110px;
    font-weight: 800;
    color: #fff;
}
.banner2 p{
    position: absolute;
    top: 450px;
    left: 580px;
    font-size: 24px;
    font-weight: 800;
    padding-top: 20px;
    color: #fff;
}
/* main */
main h1{
    text-align: center;
    margin: 100px 0px 50px 0px;
    font-size: 40px;
    font-weight: 800;
}
.row {
    display: flex;
    list-style: none;
    justify-content: center;
    gap: 50px;
    align-items: center;
  }
  .boxsp {
    width: 300px;
    height: 350px;
    background:#362f2f;
    border-radius: 10px;
    margin-bottom: 50px;
  }
  .boxsp img {
    display: block;
    margin:0px auto;
    margin-top:17px;
    width: 220px;
    height: 150px;
  }
  .a {
    color:#f42424;
    font-weight: bold;
    margin-top:21px;
    text-decoration: none;
  }
  .p{
    text-align: center;
    color:yellow;
    font-weight: bold;
    margin-top:21px;
    text-decoration: none;
    font-size: 22px;
    margin-bottom: 10px;
  }
  .boxsp button{
    width: 150px;
    height: 40px;
    font-size: 20px;
    background-color: #626A67;
    color: #fff;
    margin: 10px 0px 0px 80px;
  }
  .boxsp button:hover{
    background-color: #f42424;
  }
/* footer */
footer .img{
    width: 100%;
    height: 600px;
    filter: brightness(20%);
}
footer{
    position: relative;
    margin-top: 200px;
}
.end{
    position: absolute;
    top: 50px;
    margin-left: 200px;
    gap: 50px;
}
.footer_1 img{
    width: 200px;
    height: 200px;
    border-radius: 50%;
}
.location{
    display: flex;
    gap:50px;
    position: absolute;
    top: 260px;
    margin:20px 0px 0px 150px;
}
.location h2{
    font-size: 35px;
    color: #fff;
    margin-bottom: 20px;
    font-weight: 800;
}
.location span{
    font-size: 23px;
    color: aliceblue;
}
/* 1234 */
.list-page {
    width: 50%;
    margin:90px 0px 0px 370px;
}
.list-page {
    display: flex;
    list-style: none;
    justify-content: center;
    align-items: center;
}
.list-page .item {
    margin:0px 15px;
    width: 37px;
    height: 37px;
    background:#362f2f;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.list-page .item a {
    color:#fff;
    font-size: 20px;
    text-decoration: none;
}
.item a:hover{
    color: #000;
}

</style>
<body>
    <div class="container">
        <!-- header -->
        <header class="relative mt-4 max-w-[1440px] mx-auto px-6">
        <div class=" flex justify-between">
        <div>
                <a href="#">
                    <img class="w-[100px] h-[100px]" src="./anh/banner/logo.jpg" alt="" class="img-fluid">
                </a>
        </div>
        <div class="mt-[10px]">
            <nav class="flex">
                <ul class="mt-5">
                    <li class="inline-block text-[25px] font-[600] mr-8"><a href="index.php">Home</a></li>
                    <li class="inline-block text-[25px] font-[600]  mr-8"><a href="#">Products</a></li>
                    <li class="inline-block text-[25px] font-[600]  mr-8"><a href="">About Us</a></li>
                    <li class="inline-block text-[25px] font-[600]  mr-8"><a href="">Contact Us</a></li>
                </ul>
                <a href="javascript:void(0)" onclick="show_admin()"><img src="./image/icons8-male-user-60.png" alt="" class="w-[50px] h-[50px] mr-6 rounded-[50%]"></a>
            </nav>
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
        </div>
        </header>
        <section class="banner2">
            <img src="./anh/page3/anh1.jpg">
            <h2>Our Menus</h2>
            <p>Perfect for all Breakfast, Lunch and Dinner</p>
        </section>

    <!-- main -->
    <main>
       
        <h1>MENU CỬA HÀNG</h1>
        <p class="font-bold text-[25px] ml-[250px] text-rose-600">DANH MỤC SẢN PHẨM</p>
       <nav class="flex ml-[300px] gap-[30px] mb-[30px]">
        <?php foreach ($result as $cate) :?>
            <ul >
              <li><a class="w-[100px]  font-bold text-[20px] hover:text-[#FF0000]" href="showall.php?get_id=<?php echo  $cate['brand_id'] ?>"><?php echo $cate['brand_name'] ?></a></li>
            </ul>
        <?php endforeach ?>
       </nav>
          <!--  -->
          <div class="row">
            <div class="boxsp mr">
                <img class="anh1" src="./anh/page3/lau.jpg" alt="">
                <p class="p"><span>600.000</span></p>
                <p class="p"><a class="a" href="#">Lẩu Hải Sản Đặc Biệt</a></p>
                <button >Đặt hàng</button>
            </div>
            <div class="boxsp mr">
                <img class="anh1" src="./anh/page3/sushi.jpg" alt="">
                <p class="p"><span>450.000</span></p>
                <p class="p"><a class="a" href="#">ShuShi Nhật Bản</a></p>
                <button ">Đặt hàng</button>
            </div>
            <div class="boxsp ">
                <img class="anh1" src="./anh/page3/product_4.png" alt="">
                <p class="p"><span>300.000</span></p>
                <p class="p"><a class="a" href="#">Hamburger Pháp</a></p>
                <button >Đặt hàng</button>
            </div>    
        </div>
        <div class="row">
            <div class="boxsp mr">
                <img class="anh1" src="./anh/page3/tôm.jpg" alt="">
                <p class="p"><span>799.000</span></p>
                <p class="p"><a class="a" href="#">Tôm sốt bơ tỏi</a></p>
                <button >Đặt hàng</button>
            </div>
            <div class="boxsp mr">
                <img class="anh1" src="./anh/page3/cơmcuon.jpg" alt="">
                <p class="p"><span>199.000</span></p>
                <p class="p"><a class="a" href="#">Cơm cuộn đặc biệt</a></p>
                <button ">Đặt hàng</button>
            </div>
            <div class="boxsp ">
                <img class="anh1" src="./anh/page3/súp.jpg" alt="">
                <p class="p"><span>999.000</span></p>
                <p class="p"><a class="a" href="#">Súp vi cá mập</a></p>
                <button >Đặt hàng</button>
            </div>    
        </div>
        <section class="list-page">
            <section class="item">
                <a href="#">1</a>
            </section>
            <section class="item">
                <a href="#">2</a>
            </section>
            <section class="item">
                <a href="#">3</a>
            </section>
            <section class="item">
                <a href="#">4</a>
            </section>
        </section>
        </div>
    <!-- foooter -->
    <footer>
        <img class="img" src="./anh/banner/daan-evers-tKN1WXrzQ3s-unsplash.jpg">
        <section class="end">
            <section class="footer_1">
                <img src="./anh/banner/logo.jpg">
            </section>
        </section>
        <section class="location">
            <section>
                <h2>Location:</h2>
                <span>02 P.Phạm Ngọc Thạch, Kim Liên, Đống Đa, <br>Hà Nội, Việt Nam</span> 
            </section>
            <section>
                <h2>Opening Hours:</h2>
                <span>Monday-Friday</span>
                <span>9:00 AM - 22:00 AM</span><br><br>
                <span>TEL:096170695</span>
            </section>
            <Section>
                <h2>Social:</h2>
                <span>Copyright © 2022 Crispy Kitchen Co., Ltd.
                   <br><br> Design: Tooplate</span>
            </Section>
        </section>
    </footer>
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