<?php
require_once('../../db/dbhelper.php');

$limit = 9;
$result;
$count = $current_page = $total_page = 0;
if(isset($_GET['tenloai'])){
    $_SESSION['tenloai'] = $_GET['tenloai'];
}

if(!empty($_SESSION['tenloai'])){
    $loaisp = $_SESSION['tenloai'];
    // tinh tong so ban ghi
    $records_product = executeResult("select count(IDSP) as total from sanpham inner join loaisp on loaisp.IDLoaiSP = sanpham.IDLoai where loaisp.tenloai = '$loaisp' and sanpham.SoLuong > 0");
    $count = $records_product[0]['total'];

    //current page
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

    // paging
    //tong so trang
    $total_page = ceil((int)$count / $limit);
    // Giới hạn current_page trong khoảng 1 đến total_page
    if ($current_page > $total_page){
        $current_page = $total_page;
    }
    else if ($current_page < 1){
        $current_page = 1;
    }
    //tim Start
    $start = ($current_page - 1) * $limit;

    //lay danh sach
    $result = executeResult("select * FROM sanpham inner join mau on mau.IDSP = sanpham.IDSP inner join loaisp on loaisp.IDLoaiSP = sanpham.IDLoai where loaisp.tenloai = '$loaisp' and SoLuong > 0 LIMIT $start, $limit");
}
