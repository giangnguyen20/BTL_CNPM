<?php 
    require_once('../db/dbhelper.php');
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
                        <li><a href="../backend/index.php">Home</a></li>
                        <li><a href="../backend/product.php">Product</a></li>
                        <li><a href="#">office chair</a></li>
                        <li><a href="#">gamer chair</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>

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
                    <ul class="nav-producer">
                        <?php
                            $sql = 'select tenloai from loaisp';

                            $nhasxList = executeResult($sql);

                            foreach($nhasxList as $item){
                                echo '
                                    <li><a href="#">'.$item['tenloai'].'</a></li>
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
                            <ul>
                                <li>
                                    <span><input type="radio" name="gia"> '.$min.'VNĐ - 1500000VNĐ</span>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <span><input type="radio" name="gia"> 1500000VNĐ - 2500000VNĐ</span>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <span><input type="radio" name="gia"> 2500000VNĐ - 3500000VNĐ</span>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <span><input type="radio" name="gia"> 3500000VNĐ trở lên</span>
                                </li>
                            </ul>';

                    ?>


                </div>
            </div>
            <!-- End  Slider-->

            <!-- Product -->
            <div class="product">
                <div class="product-view">
                    <!-- show product -->
                    <?php
                        $sql = 'select * from sanpham';
                        $ProductList = executeResult($sql);
                        
                        foreach($ProductList as $item){
                            
                            echo '
                            <form action="" style="width: 30%;">
                                <div class="product-item">
                                    <img style="width: 80%;" src="'.$item['img'].'">
                                    <div class="item-info">
                                        <h3>'.$item['TenSp'].'</h3>
                                        <div class="item-much" style="justify-content: center;">
                                            <p>'.$item['Gia'].'</p>
                                            <p>'.$item['Mau'].'</p>
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