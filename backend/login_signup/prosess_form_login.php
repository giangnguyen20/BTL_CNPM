<?php

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
        $check = "select UserName, PhanQuyen from account where UserName = '$user' and PassWord = '$pwd'";
        $checkpwd = executeSingleResult($check);
        
        if($checkpwd != null){
            if($checkpwd['PhanQuyen'] == 0){
                header('Location: ../');
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