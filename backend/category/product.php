<?php 
    require_once('../../db/dbhelper.php');
    require_once('../utils/utility.php');
    require_once('../login_signup/prosess_form_login.php');
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
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="../category/product.php">Product</a></li>
                        <li><a href="product.php?tenloai=Văn Phòng">office chair</a></li>
                        <li><a href="product.php?tenloai=Gaming">gamer chair</a></li>
                    </ul>

                    <div class="header-item_user">
                    <i class="ti-user js_user" style="padding: 12px;">
                        <div class="subnav-user">
                            <ul>
                                <li>
                                    <?php
                                        if($user != ""){
                                            echo $user;
                                        }else{
                                            echo "Người dùng chưa đăng nhập!";
                                        }
                                    ?>
                                </li>
                                <li><i class="ti-help"></i> Trợ giúp</li>
                                <li>
                                    <?php
                                    if($user != ""){
                                        echo '
                                        <a href="../login_signup/login.php" style="text-decoration: none; color: #000;">
                                            <i class="ti-shift-left"></i>Đăng xuất
                                        </a>
                                        ';
                                        $user = "";
                                    }else {
                                        echo '
                                        <a href="../login_signup/login.php" style="text-decoration: none; color: #000;">Đăng nhập</a>';
                                    }
                                    ?>
                                </li>
                            </ul>
                        </div>
                    </i> |
                    <i class="ti-shopping-cart" style="padding: 12px;"></i>
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
                            <form action="product.php?gia='.$min.'">
                                <ul>
                                    <li>
                                        <span><input type="radio" name="gia_min"> '.$min.'VNĐ - 1500000VNĐ</span>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <span><input type="radio" name="gia_min"> 1500000VNĐ - 2500000VNĐ</span>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <span><input type="radio" name="gia_min"> 2500000VNĐ - 3500000VNĐ</span>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <span><input type="radio" name="gia_max"> 3500000VNĐ trở lên</span>
                                    </li>
                                </ul>
                                <input type="submit" value="chọn" style="    margin: 4px 0 0 70%; padding: 4px 8px; box-shadow: 1px 1px #ccc;">
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
                    
                    if(isset($_GET['tenloai'])){
                        $loai = $_GET['tenloai'];

                        $sql = "select * from sanpham where Loai ='$loai'";

                        $ProductList = executeResult($sql);
                        
                        foreach($ProductList as $item){
                            echo '
                            <a href="chitietsanpham.php?id='.$item['id'].'" style="width: 30%; color: black;">
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
                            </a>';
                        }
                    }
                    else{
                        $sql = 'select * from sanpham';
                        $ProductList = executeResult($sql);
                        
                        foreach($ProductList as $item){
                            
                            echo '
                            <a href="chitietsanpham.php?id='.$item['id'].'" style="width: 30%; color: black;">
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
                            </a>';
                        }
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