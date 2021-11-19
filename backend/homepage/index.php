<?php 
    require_once('../../db/dbhelper.php');
    require_once('../../backend/login_signup/prosess_form_login.php');
    require_once('../giohang/ajax_request.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chair Shop</title>
    <link rel="stylesheet" href="../../assets/style/style.css">
    <link rel="stylesheet" href="../../assets/font/themify-icons-font/themify-icons/themify-icons.css">
    <style>
        .header {
            position: fixed;
            z-index: 999;
            top: 0;
            width: 100%;
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
    </style>
</head>

<body>
    <div class="main">
        <!-- Header -->
        <div class="header">
            <div class="header-logo">
                <img src="../../assets/imgaes/your-logo.png" alt="logo">
            </div>

            <div class="header-content">
                <div class="header-item">
                    <div class="header-item_search">
                        <form action="" method="POST">
                            <input type="text" style="width: 85%;">
                            <button type="submit">
                                <i class="ti-search js_search"></i>
                            </button>
                        </form>
                    </div>

                    <div class="header-nav">
                        <ul class="nav">
                            <li><a href="../../backend/index.php">Home</a></li>
                            <li><a href="../category/product.php?tenloai=Văn Phòng">office chair</a></li>
                            <li><a href="../category/product.php?tenloai=Gaming">gaming chair</a></li>
                            <li><a href="#">About</a></li>
                        </ul>
                    </div>
                </div>

                <div class="header-item_user">
                    <i class="ti-user js_user" style="padding: 12px;">
                        <div class="subnav-user">
                            <ul>
                                <li>
                                    Nguoi Dung
                                </li>
                                <li><a href="../login_signup/changePass.php">Doi Mat Khau</a></li>
                                <li>
                                    <?php
                                        echo '
                                        <a href="../../backend/login_signup/login.php" style="text-decoration: none; color: #000;">
                                            <i class="ti-shift-left"></i>Đăng xuất
                                        </a>
                                        ';
                                    ?>
                                </li>
                            </ul>
                        </div>
                    </i>
                </div>
            </div>
        </div>
        <!-- End Header -->

        <!-- Banner -->
        <div class="banner">
            <div class="banner-img">
                <img src="../../assets/imgaes/banner.png" alt="banner">
                <div class="about">
                    <div class="about-banner">
                        <p>Collection 2021</p>
                        <h1>nice chair</h1>
                    </div>
                    <div class="btn-banner">
                        <a href="#" class="btn-shop">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End banner -->

        <!-- Product -->
        <div class="product">
            <div class="heading">
                <h1>Sản phẩm mới</h1>
            </div>

            <div class="product-view">
                <!-- show product -->
                <?php
                    $sql = 'select * from sanpham  
                            inner join mau on mau.IDSP = sanpham.IDSP
                            group by sanpham.IDSP desc limit 4';
                    $ProductList = executeResult($sql);
                    
                    // var_dump($ProductList);

                    foreach($ProductList as $item){
                        echo '
                        <a href="../category/chitietsanpham.php?id='.$item['IDSP'].'" style="width: 25%; color: black;">
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
                        </a>';
                    }
                ?>
                <!-- end code -->
            </div>
        </div>
        <!-- End Product -->

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
        const open_user = document.querySelector('.js_user');
        const show = document.querySelector('.subnav-user');

        open_user.addEventListener('click', (e) => {
            show.classList.toggle('open');
        });
        
        const giohang = document.querySelector('.cart-icon');

        giohang.addEventListener('click', () =>{
            window.location= "../giohang/xemgiohang.php";
        });
    </script>
</body>

</html>