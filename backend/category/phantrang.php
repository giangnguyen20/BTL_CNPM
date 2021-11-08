<?php
require_once('../../db/dbhelper.php');

$AllProduct_Sql = $AllProduct_List ='';

$All_page_num = 0;
$page_num = 1;


if(!isset($_GET['tenloai'])){ 
    $AllProduct_Sql = "select IDSP from sanpham";
    $AllProduct_List = executeResult($AllProduct_Sql);
    //tinh tong trang
    foreach($AllProduct_List as $item){
        $All_page_num++;
    }
    $All_page_num = (int)$All_page_num/9;

    //kiem tra trang
    if(isset($_GET['page'])){
        $page_num = $_GET['page'];
    }
}
else{
    $loai = $_GET['tenloai'];
    $AllProduct_Sql = "select IDLoaiSP from loaisp where tenloai = '$loai'";

    $AllProduct_List = executeResult($AllProduct_Sql);
    //tinh tong trang
    foreach($AllProduct_List as $item){
        $All_page_num++;
    }
    $All_page_num = (int)$All_page_num/9;

    //kiem tra trang
    if(isset($_GET['page'])){
        $page_num = $_GET['page'];
    }
}