<?php
session_start();

require_once ('../utils/utility.php');
require_once ('../../db/dbhelper.php');

$action = getPost('action');

switch($action){
    case 'cart':
        addToCart();
        break;
}

function addToCart(){
    $id = getPost('id');
    $num = getPost('num');

    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = [];
    }

    // var_dump($_SESSION['cart']);
    $isFind = false;
    for($i = 0; $i < count($_SESSION['cart']); $i++){
        if($_SESSION['cart'][$i]['id'] == $id){
            $_SESSION['cart'][$i]['num'] += $num;
            $isFind = true;
            break;
        }
    }

    if(!$isFind){
        $sql = "select * from sanpham where id = '$id'";
        $product = executeSingleResult($sql);
        $product['SoLuong'] = $num;
        $_SESSION['cart'][] = $product;
    }
}