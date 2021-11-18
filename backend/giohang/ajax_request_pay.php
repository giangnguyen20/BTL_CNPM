<?php
require_once ('../utils/utility.php');
require_once ('../../db/dbhelper.php');


$pay = getPost('action');

switch($pay){
    case 'pay':
        Pay();
        break;
}

function Pay(){
    $ngaythanhtoan = date('Y-m-d H:i:s');
    $tong = getPost('tonggia');
    execute("insert into hoadon(ID, IDKH, NgayTao, TongGia) values (null, 1, '$ngaythanhtoan', '$tong')");

    $hoahon = executeResult("select * from hoadon");
    $idhoadon = 0;
    foreach($hoahon as $item){
        if($item['ID'] > $idhoadon){
            $idhoadon = $item['ID'];
        }
    }
    $giohang = executeResult("select * from giohang inner join mau on mau.IDMau = giohang.TenMau");
    foreach($giohang as $item){
        $id = $item['IDSP'];
        $gia = $item['Gia'];
        $sl = $item['SoLuong'];
        
        execute("insert into hoadonct(ID, IDSP, IDHD, SoLuong, Gia) values (null, '$id', '$idhoadon', '$sl','$gia')");
        execute("update sanpham set SoLuong = SoLuong - '$sl' where IDSP = '$id'");
    }
    
    $XoaGH = executeResult("select * from giohang");
    foreach($XoaGH as $item){
        $id = $item['IDGioHang'];
        execute("delete from giohang where IDGioHang = '$id'");
    }
    die();
}