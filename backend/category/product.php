<?php 
    require_once('../../db/dbhelper.php');
    require_once('../utils/utility.php');
    require_once('../login_signup/prosess_form_login.php');
    require_once('../giohang/ajax_request.php');
    require_once('phantrang.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="../../assets/style/style.css">
    <link rel="stylesheet" href="../../assets/font/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../../assets/style/product-style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <style>
        .container .chitietproduct .row .img img{
            width: 100%;
            box-shadow: 0 0 4px 4px #ccc;
        }

        .container .chitietproduct .row .info a{
            text-decoration: none;
            color: black; 
        }

        .container .chitietproduct .row .info a:hover {
            text-decoration: underline;
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
            top: -24px;
            z-index: 999;
        }

        .btn {
            background-color: #4fac00; 
            border: 0; 
            padding: 8px; 
            border-radius: 4px; 
            max-width: 50%; 
            margin: 0 auto 32px auto;
            box-shadow: #157347 1px 1px 1px 1px;
        }

        .btn:hover{
            background: #157347;
            cursor: pointer;
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
                        <li><a href="product.php?tenloai=Văn Phòng">office chair</a></li>
                        <li><a href="product.php?tenloai=Gaming">gaming chair</a></li>
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
        <!-- End Header -->

        <div class="container">
            <!-- Slider -->
            <div class="slider">
                <div class="slider-search">
                    <from action="">
                        <input type="text" placeholder="nhập sản phẩm cần tìm">
                        <input type="submit" name="" value="Tìm"></input>
                    </form>
                </div>

                <div class="slider-producer">
                    <h3 style="margin-left: 10%;">Loại sản phẩm:</h3>
                    <br>
                    <ul class="nav-producer">
                        <li><a href="product.php">Tất cả sản phẩm</a></li>
                        <?php
                            $sql = 'select tenloai from loaisp';

                            $nhasxList = executeResult($sql);
                            
                            foreach($nhasxList as $item){
                                echo '
                                    <li><a href="product.php?tenloai='.$item['tenloai'].'">'.$item['tenloai'].'</a></li>
                                ';
                            }
                        ?>
                    </ul>
                </div>

                <div class="slider-price">
                    <?php
                        $sql = 'select Gia from sanpham';

                        $nhasxList = executeResult($sql);
                        
                        $min = $nhasxList[0];

                        foreach($nhasxList as $item){
                            if($item['Gia'] < $min){
                                $min = $item['Gia'];
                            }
                        }

                        echo '
                            <h3 style="margin-left: 10%;">Chọn Mức giá:</h3>
                            <br>
                            <form method="post">
                                <input type="number" name="gia_min" value="0" style="margin-left: 10%; width: 25%;" onchange="fixnum()">
                                <input type="number" name="gia_max" style="margin-left: 8px; width: 25%;" onchange="fixnum()">
                                <input type="submit" value="ok">
                            </form>';
                    ?>
                </div>
            </div>
            <!-- End  Slider-->

            <!-- Product -->
            <div class="product">
                <div class="product-view">
                    <!-- show product -->
                    <?php
                    
                    foreach($result as $item){
                        echo '
                        <div class="item-sp" style="display: flex; flex-direction: column; width: 30%;">
                            <a href="chitietsanpham.php?id='.$item['IDSP'].'" style="width: 30%; color: black;">
                                <div class="product-item">
                                    <img style="width: 70%;" src="'.$item['anh'].'">
                                    <div class="item-info">
                                        <h3>'.$item['TenSp'].'</h3>
                                        <div class="item-much" style="justify-content: center;">
                                                <p>'.$item['Gia'].'</p>
                                                <p>'.$item['TenMau'].'</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <button class="btn btn-success" onclick="addCart('.$item['IDSP'].', 1)">
                                Thêm Sản Phẩm
                            </button>
                        </div>';
                    }
                    ?>
                    <!-- end code -->
                </div>
                <!-- End Product -->
                <!-- Phân trang -->
                <div class="page-num">
                    <?php
                        if(isset($_GET['tenloai'])){
                            $lsp = $_GET['tenloai'];
                            if ($current_page > 1 && $total_page > 1){
                                echo '<a href="product.php?page='.($current_page-1).'?tenloai='.$lsp.'" style="padding: 8px; margin-left: 4px; border: 1px solid #8e80da">Prev</a>';
                            }
                            for ($i = 1; $i <= $total_page; $i++){
                                // Nếu là trang hiện tại thì hiển thị thẻ span
                                // ngược lại hiển thị thẻ a
                                if ($i == $current_page){
                                    echo '<span style="padding: 8px; margin-left: 4px; border: 1px solid #8e80da; color: #000; background: red;">'.$i.'</span> ';
                                }
                                else if($total_page < 2){
                                    echo '<a href="product.php?page='.$i.'?tenloai='.$lsp.'" style="padding: 8px; margin-left: 4px; border: 1px solid #8e80da">'.$i.'</a>';
                                }
                                else{
                                    echo '<a href="product.php?page='.$i.'?tenloai='.$lsp.'" style="padding: 8px; margin-left: 4px; border: 1px solid #8e80da">'.$i.'</a>';
                                }
                            }
                            
                            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                            if ($current_page < $total_page && $total_page > 1){
                                echo '<a href="product.php?page='.($current_page+1).'?tenloai='.$lsp.'" style="padding: 8px; margin-left: 4px; border: 1px solid #8e80da">Next</a> ';
                            }
                        }
                        else{
                            if ($current_page > 1 && $total_page > 1){
                                echo '<a href="product.php?page='.($current_page-1).'" style="padding: 8px; border: 1px solid #8e80da">Prev</a>';
                            }
                            for ($i = 1; $i <= $total_page; $i++){
                                // Nếu là trang hiện tại thì hiển thị thẻ span
                                // ngược lại hiển thị thẻ a
                                if ($i == $current_page){
                                    echo '<span  style="padding: 8px; margin-left: 4px; border: 1px solid #8e80da; color: #000; background: red;">'.$i.'</span> ';
                                }
                                else if($total_page < 2){
                                    echo '<a href="product.php?page='.$i.'" style="padding: 8px; margin-left: 4px; border: 1px solid #8e80da">'.$i.'</a>';
                                }
                                else{
                                    echo '<a href="product.php?page='.$i.'" style="padding: 8px; margin-left: 4px; border: 1px solid #8e80da">'.$i.'</a>';
                                }
                            }
                            
                            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                            if ($current_page < $total_page && $total_page > 1){
                                echo '<a href="product.php?page='.($current_page+1).'" style="padding: 8px; margin-left: 4px; border: 1px solid #8e80da">Next</a> ';
                            }
                        }
                    ?>
                </div>
            </div>
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

    <!-- footer -->
    <div class="footer">
        <div class="footer-about-us">
            <h2 class="text-white">ABOUT US</h2>
            <p style="color: #ccc;">
                Website cung cấp những loại ghế gaming đủ
                các kiểu dáng, màu sắc với giá cả hợp lý
                phù hợp cho tất cả các gamer
            </p>
            <div class="icon">
                <a href="#"><i class="ti-facebook"></i></a>
                <a href="#"><i class="ti-twitter"></i></a>
                <a href="#"><i class="ti-instagram"></i></a>
                <a href="#"><i class="ti-linkedin"></i></a>
            </div>
        </div>

        <div class="footer-information">
            <h2 class="text-white">INFORMATION</h2>
            <a href="#">About us</a>
            <a href="#">Delivery information</a>
            <a href="#">policy</a>
            <a href="#">Tems & Cotdition</a>
            <a href="#">Future</a>
        </div>

        <div class="footer-myaccount">
            <h2 class="text-white">MY ACCOUNT</h2>
            <a href="#">My Account</a>
            <a href="#">My Cart</a>
            <a href="#">Login</a>
            <a href="#">Without</a>
            <a href="#">Checkout</a>
        </div>

        <div class="footer-contact">
            <h2 class="text-white">CONTACT</h2>
            <input type="text" placeholder="Your Mail">
            <a href="#">Send Mail</a>
        </div>
    </div>

    <!-- End footer -->

    <script>
        const open_user = document.querySelector('.js_user');
        const show = document.querySelector('.subnav-user');

        open_user.addEventListener('click', (e) => {
            show.classList.toggle('open');
        });

        function fixnum(){
            $('[name=gia_min]').val(Math.abs($('[name=gia_min]').val()))
            $('[name=gia_max]').val(Math.abs($('[name=gia_max]').val()))
        }

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