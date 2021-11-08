<?php
session_start();

require_once ('../utils/utility.php');
require_once ('../../db/dbhelper.php');

$action = getPost('action');

switch($action){
    case 'cart':
        addToCart();
        break;
}

function addToCart(){
    $id = getPost('id');
    $num = getPost('num');

    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = [];
    }
    else{
        $sql = "select * from sanpham 
                inner join mau on mau.IDSP = sanpham.IDSP
                where sanpham.IDSP = '$id'";
        $sanphamthem = executeSingleResult($sql);
        $tenSP = $sanphamthem['TenSp'];
        $IDMau = $sanphamthem['IDMau'];
        $gia = $sanphamthem['Gia'];
        $anh = $sanphamthem['anh'];
        $isFind = executeSingleResult("select * from giohang where TenSP = '$tenSP'");
        if($isFind == null){
            $sqlgiohang = "insert into giohang(IDGioHang, TenSP, SoLuong, TenMau, Gia, anh) 
                            values(null, '$tenSP', '$num', '$IDMau', '$gia', '$anh')";

            execute($sqlgiohang);
        }
        else{
            $sqlgiohang = "update giohang set SoLuong = SoLuong + '$num' where TenSP = '$tenSP'";
            execute($sqlgiohang);
        }
    }
}