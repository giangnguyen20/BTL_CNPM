<?php
require_once ('../utils/utility.php');
require_once ('../../db/dbhelper.php');

$action = getPost('action');    // lấy ra value của cation đã được post

switch($action){                // kiểm tra xem đã nhận được yêu cầu chưa
    case 'cart':                
        addToCart();
        break;
}

function addToCart(){
    $id = getPost('id');    
    $num = getPost('num');

        $sql = "select * from sanpham 
                inner join mau on mau.IDSP = sanpham.IDSP
                where sanpham.IDSP = '$id'";
        
        $sanphamthem = executeSingleResult($sql);               //lấy ra sản phẩm trong bảng sản phẩm
 
        switch($sanphamthem['SoLuong']){                        // kiểm tra xem số lượng còn hay không
            case 0:
                die();
                break;
            default:                                            // add sản phẩm vào giỏ hàng
                $tenSP = $sanphamthem['TenSp'];
                $IDMau = $sanphamthem['IDMau'];
                $gia = $sanphamthem['Gia'];
                $anh = $sanphamthem['anh'];
                $create_time = $update_time = date('Y-m-d H:i:s');

                $isFind = executeSingleResult("select * from giohang where TenSP = '$tenSP'");
            
                if($isFind == null){                              //nếu sản phẩm chưa có trong giỏ hàng thì thêm mới
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