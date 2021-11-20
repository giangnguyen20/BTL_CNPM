<?php
require_once('../../db/dbhelper.php');
require_once ('../utils/utility.php');

$key = '';

if(isset($_GET['txt_search'])){             //lấy từ khóa đã search
    $key = getGet('txt_search');
    header('Location: result_search.php?search='.$key.'');
}