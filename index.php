<?php 
    require_once('db/dbhelper.php');
    require_once('login_signup/prosess_form_login.php');
    // require_once('../giohang/ajax_request.php');
    require_once('search/request_search.php');
    //
    if($_SESSION['user'] != null && isset($_SESSION['user'])){
        $us = $_SESSION['user'];
        $idus_result = executeSingleResult("select id from account where UserName = '$us'");
        $idus = $idus_result['id'];
        $deleteGH = executeResult("select * from giohang where iduser = '$idus'");
        foreach($deleteGH as $item){
            if($item['create_time'] < date('Y-m-d')){
                $idGH = $item['IDGioHang'];
                execute("delete from giohang where IDGioHang = '$idGH'");

            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chair Shop</title>
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="stylesheet" href="assets/font/themify-icons-font/themify-icons/themify-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                <img src="assets/imgaes/your-logo.png" alt="logo">
            </div>

            <div class="header-content">
                <div class="header-item">
                    <div class="header-item_search">
                        <form action="search/request_search.php">
                            <input type="text" name="txt_search" style="width: 85%;">
                            <button type="submit">
                                <i class="ti-search js_search"></i>
                            </button>
                        </form>
                    </div>

                    <div class="header-nav">
                        <ul class="nav">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="category/sanphamtheoloai.php?tenloai=V??n Ph??ng">office chair</a></li>
                            <li><a href="category/sanphamtheoloai.php?tenloai=Gaming">gaming chair</a></li>
                            <li><a href="#">About</a></li>
                        </ul>
                    </div>
                </div>

                <div class="header-item_user">
                    <i class="ti-user js_user" style="padding: 12px;">
                        <div class="subnav-user">
                            <ul>   
                                <li>
                                    <?php                                               //ki???m tra ????nhg nh???p
                                        if(!empty($_SESSION['user'])){
                                            echo 'Xin ch??o '.$_SESSION['user'];
                                        }
                                        else{
                                            echo 'Ng?????i D??ng';
                                        }
                                    ?>
                                </li>
                                    <?php 
                                        if(!empty($_SESSION['user'])){                 // ???? ????ng nh???p th?? cho ?????i m???t kh???u
                                            echo '<li><a href="login_signup/changePass.php" style="color: black;">Doi Mat Khau</a></li>';
                                        }
                                    ?>
                                <li>
                                    <?php
                                        if(!empty($_SESSION['user'])){                  //???? ????ng nh???p th?? hi???n ????ng xu???t
                                            echo '
                                            <a href="login_signup/logout.php" style="text-decoration: none; color: #000;">
                                                ????ng xu???t
                                            </a>';
                                        }
                                        else{
                                            echo '<a href="login_signup/login.php" style="text-decoration: none; color: #000;">
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
                <h1>S???n ph???m m???i</h1>
            </div>

            <div class="product-view">
                <!-- show product -->
                <?php
                    $sql = 'select * from sanpham  
                            inner join mau on mau.IDSP = sanpham.IDSP
                            where IDLoai = 1
                            group by sanpham.IDSP desc limit 4';
                    $ProductList = executeResult($sql);
                    
                    // var_dump($ProductList);

                    foreach($ProductList as $item){
                        echo '
                        <a href="category/chitietsanpham.php?id='.$item['IDSP'].'" style="width: 25%; color: black;">
                            <div class="product-item">
                                <img style="width: 70%;" src="db/imgs/'.$item['anh'].'">
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
        

    <script>
        const open_user = document.querySelector('.js_user');
        const show = document.querySelector('.subnav-user');

        open_user.addEventListener('click', (e) => {
            show.classList.toggle('open');
        });
        
        // const giohang = document.querySelector('.cart-icon');

        // giohang.addEventListener('click', () =>{
        //     window.location= "../giohang/xemgiohang.php";
        // });

    </script>
</body>

</html>