<?php

$user = $pwd = $smg ='';

if(!empty($_POST)){
    $user = getPost('user');
    $pwd = getPost('pass');
    $pwd = getSecurityMD5($pwd);

    $sql = "select * from account where UserName = '$user'";

    $userExist = executeSingleResult($sql);

    if($userExist == null){
        $smg = "Tài khoản hoặc mật khẩu không chính xác!";
    }
    else{
        header('Location: ../');
        die();
    }
}