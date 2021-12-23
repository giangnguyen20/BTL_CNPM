<?php
require_once('../login_signup/prosess_form_login.php');
require_once ('../utils/utility.php');
require_once ('../db/dbhelper.php');


if(isset($_SESSION['user']) && $_SESSION['user'] != null){                      //kiểm tra đăng nhập
    $user = $_SESSION['user'];
    $idkh = executeResult("select IDKH from khachhang inner join account on account.id = khachhang.IDuser where account.UserName = '$user'");
}
else{
    header('Location: ../login_signup/login.php');          // về trang đăng nhập khi chưa đăng nhập
}

$pay = getPost('action');                          // lấy key

switch($pay){                                       // kiểm tra thanh toán
    case 'pay':
        Pay();
        break;
}

function Pay(){                                     // thực hiện thêm thông tin thanh toán vào database
    $ngaythanhtoan = date('Y-m-d H:i:s');           // lấy ngày thanh toán
    $tong = getPost('tonggia');
    // execute("insert into hoadon(ID, IDKH, NgayTao, TongGia) values (null, '$idkh', '$ngaythanhtoan', '$tong')");        // thêm vào bảng hóa đơn

    $hoahon = executeResult("select * from hoadon");
    $idhoadon = 0;
    foreach($hoahon as $item){                  // lấy ra hóa đơn cuối cùng
        if($item['ID'] > $idhoadon){
            $idhoadon = $item['ID'];
        }
    }
    $giohang = executeResult("select * from giohang inner join mau on mau.IDMau = giohang.TenMau");    //lấy sản phẩm trong giỏ hàng 
    foreach($giohang as $item){
        $id = $item['IDSP'];
        $gia = $item['Gia'];
        $sl = $item['SoLuong'];
        
        //add thông tin sản phẩm vào chi tiết hóa đơn
        execute("insert into hoadonct(ID, IDSP, IDHD, SoLuong, Gia) values (null, '$id', '$idhoadon', '$sl','$gia')");
        execute("update sanpham set SoLuong = SoLuong - '$sl' where IDSP = '$id'");
    }
    
    $XoaGH = executeResult("select * from giohang");                    //xóa giỏ hàng sau khi thanh toán
    foreach($XoaGH as $item){
        $id = $item['IDGioHang'];
        execute("delete from giohang where IDGioHang = '$id'");
    }
    die();
}