<!-- tao file connection ket noi den db -->
<?php
/**
 *  file connection de ket noi csdl
 */
$host='localhost';
$username='root';
$password='123456a@';
$dbname ='php1';
try{
    //chuoi ket noi den csdl
    $conn= new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $username, $password);
    // dat che do thong bao loi
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Ket noi du lieu thanh cong";
} catch(PDOException $e){
    echo "Loi ket noi csdl:<br>" .$e->getMessage();
}