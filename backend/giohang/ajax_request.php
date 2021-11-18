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
        
        switch($sanphamthem['SoLuong']){
            case 0:
                die();
                break;
            default:
                $tenSP = $sanphamthem['TenSp'];
                $IDMau = $sanphamthem['IDMau'];
                $gia = $sanphamthem['Gia'];
                $anh = $sanphamthem['anh'];
                $create_time = $update_time = date('Y-m-d H:i:s');

                $isFind = executeSingleResult("select * from giohang where TenSP = '$tenSP'");
                if($isFind == null){
                    $sqlgiohang = "insert into giohang(IDGioHang, TenSP, iduser,SoLuong, TenMau, Gia, anh, create_time, update_time) 
                                    values(null, '$tenSP', '2','$num', '$IDMau', '$gia', '$anh', '$create_time', '$update_time')";
        
                    execute($sqlgiohang);
                }
                else{
                    $sqlgiohang = "update giohang set SoLuong = SoLuong + '$num', update_time = '$update_time' where TenSP = '$tenSP'";
                    execute($sqlgiohang);
                }
                break;
        }
    }
}