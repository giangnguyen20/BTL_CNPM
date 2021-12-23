<?php
    require_once('request_search.php');
    require_once('../giohang/ajax_request.php');
    require_once('../utils/utility.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tim Kiem</title>
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../assets/style/style.css">
    <link rel="stylesheet" href="../../assets/font/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../../assets/style/product-style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        a:hover {
            text-decoration: none;
            color: black;
        }

        .cart-icon {
            position: fixed;
            z-index: 999;
            right: 0;
            top: 45%;
        }

        .cart-icon img {
            width: 45px;
        }

        .cart-icon .cart-count {
            background-color: red;
            color: black;
            font-size: 16px;
            padding: 4px;
            border-radius: 5px;
            position: relative;
            right: -16px;
            top: -8px;
            z-index: 999;
        }
    </style>
</head>
<body>
    <div class="main">
        <!-- Header -->
        <div class="header" style=" height: 55px;">
            <div class="header-logo">
                <img src="../../assets/imgaes/your-logo.png" alt="logo" style="height: 55px;">
            </div>

            <div class="header-content">
                <div class="header-nav">
                    <ul class="nav">
                        <li><a href="../homepage/index.php">Home</a></li>
                        <li><a href="../category/sanphamtheoloai.php?tenloai=Văn Phòng">office chair</a></li>
                        <li><a href="../category/sanphamtheoloai.php?tenloai=Gaming">gaming chair</a></li>
                        <li><a href="#">About</a></li>
                    </ul>

                    <div class="header-item_user">
                    <i class="ti-user js_user" style="padding: 12px;">
                        <div class="subnav-user">
                            <ul>
                                <li>
                                    <?php
                                        if(!empty($_SESSION['user'])){
                                            echo 'Xin chào '.$_SESSION['user'];
                                        }
                                        else{
                                            echo 'Người Dùng';
                                        }
                                    ?>
                                </li>
                                    <?php 
                                        if(!empty($_SESSION['user'])){
                                            echo '<li><a href="../login_signup/changePass.php" style="color: black;">Doi Mat Khau</a></li>';
                                        }
                                    ?>
                                <li>
                                    <?php
                                        if(!empty($_SESSION['user'])){
                                            
                                            echo '
                                            <a href="../../backend/login_signup/logout.php" style="text-decoration: none; color: #000;">
                                                Đăng xuất
                                            </a>';
                                        }
                                        else{
                                            echo '<a href="../../backend/login_signup/login.php" style="text-decoration: none; color: #000;">
                                                Đăng Nhập
                                            </a>';
                                        }
                                    ?>
                                </li>
                            </ul>
                        </div>
                    </i>
                </div>
                </div>
            </div>
        </div>
        
        <!-- show result search -->
        <div class="results_search" style="margin-top: 32px;">
        <h3 style="text-align: center;">Ket Qua Tim Kiem</h3>
            <?php
                if(isset($_GET['search'])){
                    $k = $_GET['search'];
                    $results_search = executeResult("select * from sanpham inner join mau on mau.IDSP = sanpham.IDSP where sanpham.TenSp like '%$k%' or Gia like '%$k%'");
                    
                    foreach($results_search as $item){
                        echo '
                            <div class="item" style="border: 1px solid #ccc; display: flex; align-items: center; justify-content: flex-start;">
                                <div class="anh" style="flex: 1;"><img src="../../db/imgs/'.$item['anh'].'" style="width: 50%;"></div>
                                <div class="info-item" style="margin-left: 4px; flex: 3;">
                                    <p>'.$item['TenSp'].'</p>
                                    <p>'.$item['Gia'].'</p>
                                    <p>'.$item['TenMau'].'</p>
                                </div>
                                <div class="addtocar" style="flex: 1;">
                                    <a href="../category/chitietsanpham.php?id='.$item['IDSP'].'" class="xemchitiet btn btn-success" style="color: white;">
                                        xem chi tiết
                                    </a>
                                    <button class="addtocart btn btn-success" onclick="addCart('.$item['IDSP'].', 1)" style="margin-top: 4px;">
                                        Thêm Sản Phẩm
                                    </button>
                                </div>
                            </div>
                        ';
                    }
                }
                
            ?>
        </div>
    </div>

    <?php
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = [];
        }

        $sqlSL = "select * from giohang";
        $SLGH = executeResult($sqlSL);
        $count = 0;
        foreach($SLGH as $item){
            $count++;
        } 
    ?>
    <!-- giỏ hàng -->
    <span class="cart-icon">
        <span class="cart-count"><?=$count?></span>
        <img src="https://gokisoft.com/img/cart.png">
    </span>
    <!-- end giỏ hàng -->

    <script>
        function addCart(productID, num){
            $.post('../giohang/ajax_request.php', {
                'action': 'cart',
                'id': productID,
                'num': num 
            }, function(data){
                location.reload()
            })
        }

        const giohang = document.querySelector('.cart-icon');

        giohang.addEventListener('click', () =>{
            window.location= "../giohang/xemgiohang.php";
        });
    </script>
</body>
</html>