<?php 
    require_once('../db/dbhelper.php');
    require_once('../utils/utility.php');
    require_once('../login_signup/prosess_form_login.php');
    require_once('../giohang/ajax_request.php');
    require_once('phantrangloaisp.php');
    require_once('../search/request_search.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="../assets/style/style.css">
    <link rel="stylesheet" href="../assets/font/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../assets/style/product-style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <style>
        a{
            color: black;
        }
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
                <img src="../assets/imgaes/your-logo.png" alt="logo" style="height: 55px;">
            </div>

            <div class="header-content">
                <div class="header-nav">
                    <ul class="nav">
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="sanphamtheoloai.php?tenloai=V??n Ph??ng">office chair</a></li>
                        <li><a href="sanphamtheoloai.php?tenloai=Gaming">gaming chair</a></li>
                        <li><a href="#">About</a></li>
                    </ul>

                    <div class="header-item_user">
                    <i class="ti-user js_user" style="padding: 12px;">
                        <div class="subnav-user">
                            <ul>
                                <li>
                                    <!-- x??? l?? ????ng nh???p -->
                                    <?php   
                                        if(!empty($_SESSION['user'])){  //ki???m tra user ????ng nh???p
                                            echo 'Xin ch??o '.$_SESSION['user'];
                                        }
                                        else{
                                            echo 'Ng?????i D??ng';
                                        }
                                    ?>
                                </li>
                                    <?php 
                                        if(!empty($_SESSION['user'])){      // n???u user th?? cho ph??p ?????i pass
                                            echo '<li><a href="../login_signup/changePass.php" style="color: black;">Doi Mat Khau</a></li>';
                                        }
                                    ?>
                                <li>
                                    <?php
                                        if(!empty($_SESSION['user'])){  //ki???m tra ???? ????ng nh???p hay ch??a
                                            
                                            echo '
                                            <a href="../login_signup/logout.php" style="text-decoration: none; color: #000;">
                                                ????ng xu???t
                                            </a>';
                                        }
                                        else{
                                            echo '<a href="../login_signup/login.php" style="text-decoration: none; color: #000;">
                                                ????ng Nh???p
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
                    <form action="../search/request_search.php">
                        <input type="text" name="txt_search" placeholder="nh???p s???n ph???m c???n t??m">
                        <input type="submit" value="T??m">
                    </form>
                </div>

                <div class="slider-producer">
                    <h3 style="margin-left: 10%;">Lo???i s???n ph???m:</h3>
                    <br>
                    <ul class="nav-producer">
                        <li><a href="product.php">T???t c??? s???n ph???m</a></li>
                        <?php                                                       //show lo???i s???n ph???m
                            $sql = 'select tenloai from loaisp';

                            $nhasxList = executeResult($sql);
                            
                            foreach($nhasxList as $item){
                                echo '
                                    <li><a href="sanphamtheoloai.php?tenloai='.$item['tenloai'].'">'.$item['tenloai'].'</a></li>
                                ';
                            }
                        ?>
                    </ul>
                </div>

                <!-- <div class="slider-price">
                    <?php                                                           //ch???n gi?? ch??a ho??n th??nh
                        $sql = 'select Gia from sanpham';

                        $nhasxList = executeResult($sql);
                        
                        $min = $nhasxList[0];

                        foreach($nhasxList as $item){
                            if($item['Gia'] < $min){
                                $min = $item['Gia'];
                            }
                        }

                        echo '
                            <h3 style="margin-left: 10%;">Ch???n M???c gi??:</h3>
                            <br>
                            <form method="post">
                                <input type="number" name="gia_min" value="0" style="margin-left: 10%; width: 25%;" onchange="fixnum()">
                                <input type="number" name="gia_max" style="margin-left: 8px; width: 25%;" onchange="fixnum()">
                                <input type="submit" value="ok">
                            </form>';
                    ?>
                </div> -->
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
                                    <img style="width: 70%;" src="../db/imgs/'.$item['anh'].'">
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
                                Th??m S???n Ph???m
                            </button>
                        </div>';
                    }
                    ?>
                    <!-- end code -->
                </div>
                <!-- End Product -->
                <!-- Ph??n trang -->
                <div class="page-num">
                    <?php
                            if ($current_page > 1 && $total_page > 1){
                                echo '<a href="sanphamtheoloai.php?page='.($current_page-1).'" style="padding: 8px; margin-left: 4px; border: 1px solid #8e80da">Prev</a>';
                            }
                            for ($i = 1; $i <= $total_page; $i++){
                                // N???u l?? trang hi???n t???i th?? hi???n th??? th??? span
                                // ng?????c l???i hi???n th??? th??? a
                                if ($i == $current_page){
                                    echo '<span style="padding: 8px; margin-left: 4px; border: 1px solid #8e80da; color: #000; background: red;">'.$i.'</span> ';
                                }
                                else if($total_page < 2){
                                    echo '<a href="sanphamtheoloai.php?page='.$i.'?" style="padding: 8px; margin-left: 4px; border: 1px solid #8e80da">'
                                    .$i.'
                                    </a>';
                                }
                                else{
                                    echo '<a href="sanphamtheoloai.php?page='.$i.'" style="padding: 8px; margin-left: 4px; border: 1px solid #8e80da">
                                    '.$i.'
                                    </a>';
                                }
                            }
                            
                            // n???u current_page < $total_page v?? total_page > 1 m???i hi???n th??? n??t prev
                            if ($current_page < $total_page && $total_page > 1){
                                echo '<a href="sanphamtheoloai.php?page='.($current_page+1).'" style="padding: 8px; margin-left: 4px; border: 1px solid #8e80da">Next</a> ';
                            }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php
        //l???y s??? l?????ng s???n ph???m trong gi??? h??ng 
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
    <!-- gi??? h??ng -->
    <span class="cart-icon">
        <span class="cart-count"><?=$count?></span>
        <img src="https://gokisoft.com/img/cart.png">
    </span>
    <!-- end gi??? h??ng -->

    <!-- footer -->
    <div class="footer">
        <div class="footer-about-us">
            <h2 class="text-white">ABOUT US</h2>
            <p style="color: #ccc;">
                Website cung c???p nh???ng lo???i gh??? gaming ?????
                c??c ki???u d??ng, m??u s???c v???i gi?? c??? h???p l??
                ph?? h???p cho t???t c??? c??c gamer
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

        //show menu user
        open_user.addEventListener('click', (e) => {
            show.classList.toggle('open');
        });

        // fix gi?? tr??? ??? input
        function fixnum(){
            $('[name=gia_min]').val(Math.abs($('[name=gia_min]').val()))
            $('[name=gia_max]').val(Math.abs($('[name=gia_max]').val()))
        }

        //th??m s???n ph???m v??o cart
        function addCart(productID, num){
            $.post('../giohang/ajax_request.php', {
                'action': 'cart',
                'id': productID,
                'num': num 
            }, function(data){
                location.reload()
            })
        }

        //Xem gi??? h??ng
        const giohang = document.querySelector('.cart-icon');
    
        giohang.addEventListener('click', () =>{
            window.location= "../giohang/xemgiohang.php";
        });
    </script>
</body>

</html>