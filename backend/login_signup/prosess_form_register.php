<?php

$user = $smg = '';

if(!empty($_POST)){
    $user = getPost('user');
    $pwd = getPost('pass');

    //validate
    if(empty($user) || empty($pwd) || strlen($pwd) < 6){

    }else{
        $userExist = executeSingleResult("select * from account where UserName = '$user'");

        if($userExist != null){
            $smg = "Tài khoản đã tồn tại!";
        }
        else{
            $create_time = date('Y-m-d H:i:s');
            $pwd = getSecurityMD5($pwd);

            $sql = "insert into account(id, UserName, pwd, PhanQuyen, create_time, update_time) value (null, '$user', '$pwd', 0, '$create_time', null)";
            execute($sql);

            header('Location: login.php');
            die();
        }
    }
}
