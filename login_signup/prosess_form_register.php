<?php

$user = $smg = '';

if(!empty($_POST)){                                 // kiểm tra yêu cầu đăng ký
    $user = getPost('user');
    $pwd = getPost('pass');

    //validate
    if(empty($user) || empty($pwd) || strlen($pwd) < 6){            //ktra thông tin nhập
        $smg = 'bạn chưa nhập đầy đủ thông tin!';
    }else{
        $userExist = executeSingleResult("select * from account where UserName = '$user'");        //kiểm tra user đã tồn tại chưa      

        if($userExist != null){                             //thông báo user đã tồn tại
            $smg = "Tài khoản đã tồn tại!";
        }
        else{                                               // thực hiện thêm user
            $create_time = date('Y-m-d H:i:s');
            $pwd = getSecurityMD5($pwd);

            $sql = "insert into account(id, UserName, pwd, PhanQuyen, create_time, update_time) value (null, '$user', '$pwd', 0, '$create_time', null)";
            execute($sql);

            header('Location: login.php');
            die();
        }
    }
}
