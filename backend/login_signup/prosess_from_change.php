<?php
require_once('prosess_form_login.php');
require_once('../utils/utility.php');
$user = $old_pass = $smg = '';

if(!empty($_POST)){
    $user = $_SESSION['user'];
    $old_pwd = getPost('old_pass');
    $new_pass = getPost('new_pass');
    var_dump(getSecurityMD5($new_pass));
    if(empty($user) || empty($old_pwd) || empty($new_pass) || strlen($old_pwd) < 6 || strlen($new_pass) < 6){
        $smg = 'Bạn chưa nhập đầy đủ thông tin';
    }
    else{
        $userExist = executeSingleResult("select * from account where UserName = '$user'");
        
        if($userExist == null){
            $smg = "Tài khoản không tồn tại!";
        }
        else{
            $old_pwd = getSecurityMD5($old_pwd);

            if($old_pwd == $userExist['pwd']){
                $update_time = date('Y-m-d H:i:s');
                $new_pass = getSecurityMD5($new_pass);

                $sql = "update account
                        set pwd = '$new_pass', update_time = '$update_time'
                        where UserName = '$user'";

                execute($sql);
                header('Location: login.php');
                die();
            }
            else{
                $smg = "mật khẩu cũ không chính xác";
            }
        }
    }
}   