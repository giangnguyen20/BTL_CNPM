<?php
require_once ('../utils/utility.php');
require_once ('../../db/dbhelper.php');
require_once('../login_signup/prosess_form_login.php');

$action = getPost('action');    // get value cation
$smg = '';
switch($action){                // kiểm tra yêu cầu
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
                $smg = "Sản phẩm đã hết";
                die();
                break;
            default:                                            // add sản phẩm vào giỏ hàng
                $tenSP = $sanphamthem['TenSp'];
                $IDMau = $sanphamthem['IDMau'];
                $gia = $sanphamthem['Gia'];
                $anh = $sanphamthem['anh'];
                $create_time = $update_time = date('Y-m-d H:i:s');

                $isFind = executeSingleResult("select * from giohang where TenSP = '$tenSP'");
            
                if($isFind == null){                             //nếu sản phẩm chưa có trong giỏ hàng thì thêm mới
                    if( $num < $sanphamthem['SoLuong']){
                        if($_SESSION['user'] != null && isset($_SESSION['user'])){   
                            $user = $_SESSION['user'];
                            $iduser = executeSingleResult("select id from account where UserName = '$user'");
                            (int)$id = $iduser['id'];                      // kiểm tra đăng nhâp   
                            $sqlgiohang = "insert into giohang(IDGioHang, TenSP, iduser,SoLuong, TenMau, Gia, anh, create_time, update_time) 
                                        values(null, '$tenSP', '$id','$num', '$IDMau', '$gia', '$anh', '$create_time', '$update_time')";
            
                            execute($sqlgiohang);
                        }
                    }
                    else{
                        $smg = "Sản phẩm không đủ hàng yêu cầu!";
                    }
                }
                else{
                    $checkSL = executeSingleResult("select SoLuong from giohang where TenSP = '$tenSP'");
                    if($checkSL['SoLuong'] + $num <= $sanphamthem['SoLuong']){                              // check số lượng
                        if($_SESSION['user'] != null && isset($_SESSION['user'])){                           
                            $user = $_SESSION['user'];                                                                  
                            $iduser = executeSingleResult("select id from account where UserName = '$user'");      //get iduser
                            (int)$id = $iduser['id'];                                                   
                            $sqlgiohang = "update giohang set SoLuong = SoLuong + '$num', update_time = '$update_time' where TenSP = '$tenSP' and iduser = '$id'";
                            execute($sqlgiohang);                                                             // add giỏ hàng
                        }
                    }
                    else{
                        $smg = "Sản phẩm không đủ hàng yêu cầu!";
                    }
                }
                break;
        }
    
}