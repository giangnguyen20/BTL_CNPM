<?php
session_start();
$user = $pwd = $smg ='';

if(isset($_POST['user'])){                                     // kiểm tra có yêu cầu đăng nhập
    $user = getPost('user');                            // lấy username đã nhập
    $pwd = getPost('pass');                             // lấy pass đã nhập
    $pwd = getSecurityMD5($pwd);                        // mã hóa pass

    $sql = "select * from account where UserName = '$user'";        //kiểm tra username có tồn tại

    $userExist = executeSingleResult($sql);

    if($userExist == null){                                         
        $smg = "Tài khoản không tồn tại";
    }
    else{                                                                                           
        $check = "select id, UserName, PhanQuyen from account where UserName = '$user' and pwd = '$pwd'";           //nếu user tồn tại thì kiểm tra pass
        $checkpwd = executeSingleResult($check);
        $checkdate = date('Y-m-d H:i:s');                                                   //lấy ngày đăng nhập để xóa sản phẩm để quá lâu trong giỏ hàng
        if($checkpwd != null){                                                              // kiểm tra pass
            $id = $checkpwd['id'];
            if($checkpwd['PhanQuyen'] == 0){                                                //kiểm tra quyền đăng nhập
                $checkGH = executeResult("select * from giohang where iduser = '$id'");
                foreach($checkGH as $item){                                                 // xóa sản phẩm quá hạn trong giỏ hàng
                    if($item['update_time'] > ($checkdate - 1)){
                        $sp = $item['TenSP'];
                        execute("delete from giohang where TenSP = '$sp'");
                    }
                }                                                                           //đưa về trang chủ
                $_SESSION['user'] = $user;
                header('Location: ../');
                die();
            }
            else{                                                                           // về trang admin
                $_SESSION['user'] = $user;
                header('Location: ../adminpage/home.php');
                die();
            }
        }else{                                                                              // thông báo sai pass
            $smg = "mật khẩu không đúng";
        }
    }
}


