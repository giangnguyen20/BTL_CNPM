<?php
require_once('../../db/dbhelper.php');
session_start();
$user = $pwd = $smg ='';

if(!empty($_POST)){
    $user = getPost('user');
    $pwd = getPost('pass');
    $pwd = getSecurityMD5($pwd);

    $sql = "select * from account where UserName = '$user'";

    $userExist = executeSingleResult($sql);

    if($userExist == null){
        $smg = "Tài khoản không tồn tại";
    }
    else{
        $check = "select id, UserName, PhanQuyen from account where UserName = '$user' and pwd = '$pwd'";
        $checkpwd = executeSingleResult($check);
        $checkdate = date('Y-m-d H:i:s');
        if($checkpwd != null){
            $id = $checkpwd['id'];
            if($checkpwd['PhanQuyen'] == 0){
                $checkGH = executeResult("select * from giohang where iduser = '$id'");
                foreach($checkGH as $item){
                    if($item['update_time'] > ($checkdate - 1)){
                        $sp = $item['TenSP'];
                        execute("delete from giohang where TenSP = '$sp'");
                    }
                }
                $_SESSION['user'] = $user;
                header('Location: ../homepage/');
                die();
            }
            else{
                header('Location: ../../admin/product/adminsp.php');
                die();
            }
        }else{
            $smg = "mật khẩu không đúng";
        }
    }
}


