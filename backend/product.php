<?php 
    require_once('../database/connectdb.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chair Shop</title>
    <link rel="stylesheet" href="../assets/style/style.css">
    <link rel="stylesheet" href="../assets/font/themify-icons-font/themify-icons/themify-icons.css">
</head>

<body>
    <div class="main">
        <!-- Header -->
        <div class="header">
            <div class="header-logo">
                <img src="./assets/imgaes/your-logo.png" alt="logo">
            </div>

            <div class="header-content">
                <div class="header-item">
                    <div class="header-item_search">
                        <form action="" method="POST">
                            <input type="text">
                            <button type="submit">
                                <i class="ti-search js_search"></i>
                            </button>
                        </form>
                    </div>

                    <div class="header-nav">
                        <ul class="nav">
                            <li><a href="../backend/index.php">Home</a></li>
                            <li><a href="../backend/product.php">Product</a></li>
                            <li><a href="#">office chair</a></li>
                            <li><a href="#">gamer chair</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>

                <div class="header-item_user">
                    <a href="#">
                        <i class="ti-user js_user">
                            <div class="subnav-user">
                                <ul>
                                    <li>Name</li>
                                    <li><i class="ti-help"></i> Trợ giúp</li>
                                    <li><i class="ti-shift-left"></i> Đăng xuất</li>
                                </ul>
                            </div>
                        </i>
                    </a> |
                    <a href="#"><i class="ti-shopping-cart"></i></a>
                </div>
            </div>
        </div>
        <!-- End Header -->

        <!-- Banner -->
        <div class="banner">
            <div class="banner-img">
                <img src="./assets/imgaes/banner.png" alt="banner">
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
                <h1>PRODUCT</h1>
            </div>

            <div class="product-view">
                    <!-- show product -->
                    <?php
                        $sql = 'select * from sanpham';
                        $ProductList = executeResult($sql);
                        
                        foreach($ProductList as $item){
                            
                            echo '
                            <form action="">
                                <div class="product-item">
                                    <img src="assets/imgaes/chair-while.jpg" alt="" class="item-img">
                                    <div class="item-info">
                                        <h3>Name</h3>
                                        <div class="item-much">
                                            <p>$30.3</p>
                                            <p>$25.9</p>
                                        </div>
                                    </div>
                                </div>  
                            </form>';
                        }
                    ?>
                    <!-- end code -->
                </div>
                <!-- End Product -->
            </div>
        </div>
    </div>

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

    </script>
</body>

</html>