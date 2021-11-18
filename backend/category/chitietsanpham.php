<?php
    require_once('../../db/dbhelper.php');
    require_once('../giohang/ajax_request.php');

    $productID = $smg = '';

    if(isset($_GET['id'])){
        $productID = $_GET['id']; 
        
            $sql = "select * from sanpham 
                    inner join loaisp on loaisp.IDLoaiSP = sanpham.IDLoai
                    where IDSP = '$productID'";

        $sqlMau = "select * from mau where IDSP = '$productID'";
        $productMau = executeResult($sqlMau);
        
        $product = executeSingleResult($sql);

        if($product == null){
            $smg = "Sản phẩm không tồn tại";
        }
        else{
            $isSoluong = $product['SoLuong'];
            
            if($isSoluong == 0){
                $smg = 'Sản phẩm hiện đã hết hàng';
            }
        }
    }
    else{
        header('Location: product.php');
    }

    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sản Phẩm</title>
     <!-- CSS only -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
                        <li><a href="product.php?tenloai=Văn Phòng">office chair</a></li>
                        <li><a href="product.php?tenloai=Gaming">gaming chair</a></li>
                        <li><a href="#">About</a></li>
                    </ul>

                    <div class="header-item_user">
                    <i class="ti-user js_user" style="padding: 12px;">
                        <div class="subnav-user">
                            <ul>
                                <li>
                                    Người dùng chưa đăng nhập!
                                </li>
                                <li><i class="ti-help"></i> Trợ giúp</li>
                                <li>
                                    Đăng nhập
                                </li>
                            </ul>
                        </div>
                    </i>
                </div>
                </div>
            </div>
        </div>
        <!-- End Header -->
        
        <!-- chi tiết sản phẩm -->
        <div class="container">
            <div class="chitietproduct" style="margin-bottom: 40px;">
                <?php 
                    if($smg == '' || $smg == 'Sản phẩm hiện đã hết hàng'){
                        echo '
                        <div class="row" style="margin-top: 80px;">
                            <div class="col-md-6 img">
                                <img src="'.$productMau[0]['anh'].'" alt="ảnh sản phẩm">
                            </div>
                            <div class="col-md-6 info" style="display: flex; flex-direction: column;">
                                <p><a href="../">Trang chủ</a> / <a href="product.php">Sản Phẩm</a> / '.$product['TenSp'].'</p>
                                <h2>'.$product['TenSp'].'</h2>
                                <div class="col-md-12">
                                    <ul style="display: flex; list-style-type: none; margin: 0px; padding: 0px;">
                                        <li style="color: orange; font-size: 13pt; padding-top: 2px; margin-right: 5px;">5.0</li>
                                        <li style="color: orange; padding: 2px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                            </svg>
                                        </li>
                                        <li style="color: orange; padding: 2px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                            </svg>
                                        </li>
                                        <li style="color: orange; padding: 2px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                            </svg>
                                        </li>
                                        <li style="color: orange; padding: 2px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                            </svg>
                                        </li>
                                        <li style="color: orange; padding: 2px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                            </svg>
                                        </li>
                                    </ul>
                                </div>
                                <div class="info-sp" style="margin-top: 8px;">
                                    <h4>Chi tiết sản phẩm: </h4>
                                    <div class="col-md-12" style="margin-left: 32px;">
                                        <p style="margin-bottom: 0;">'.$product['chitietsp'].'</p>
                                    </div>
                                </div>
                                <h3 style="color: red; margin: 16px 0;">'.$product['Gia'].' VND</h3>
                                
        
                                <div class="soluong" style="display: flex;">
                                    <button class="btn btn-light" style="border: solid grey 1px; border-radius: 4px;" onclick="addMoreCart(1)">+</button>
                                    <input type="number" name="num" value="1" class="form-control" step="1" style="max-width: 90px; border: solid grey 1px; border-radius: 4px;" onchange="fixnum()">
                                    <button class="btn btn-light" style="border: solid grey 1px; border-radius: 4px;" onclick="addMoreCart(-1)">-</button>
                                </div>

                                <div class="smg"><p style="color: red;">'.$smg.'</p></div>
        
                                <button class="btn btn-success" style="margin-top: 20px; width: 100%;" onclick="addCart('.$product['IDSP'].', $(\'[name=num]\').val())">
                                    Thêm vào giỏ hàng
                                </button>
                                
                                <a href="../giohang/xemgiohang.php" class="btn btn-success" style="width: 100%; margin-top: 20px; background-color: #ccc;">Xem Giỏ Hàng</a>
                                
                            </div>
                        </div>
                        ';
                    }
                    else{
                        if($smg == 'Sản phẩm không tồn tại')
                            echo '
                                <div class="row" style="margin-top: 120px;">
                                    <h2 style="color: red;">'.$smg.'!</h2>
                                </div>
                            '; 
                    }
                ?>
            </div>
        </div>
        <!-- End chi tiết sản phẩm -->
    </div>
    <!-- Sản Phẩm tương tự -->
    <div class="sanphamtuongtu" style="display: flex; margin-top: 40px; flex-wrap: wrap;">
        <?php 
            if($smg == ''){

                $loai = $product['IDLoai'];
                $tensp = $product['TenSp'];
                
                $sqlLoai = "select * from sanpham 
                inner join mau on mau.IDSP = sanpham.IDSP
                where IDLoai = '$loai' and Tensp != '$tensp'";
                
                $producttuongtu = executeResult($sqlLoai);
                
                
                foreach($producttuongtu as $item){
                    echo '
                        <a href="chitietsanpham.php?id='.$item['IDSP'].'" style="width: 25%; color: black;">
                            <div class="product-item">
                                <img style="width: 60%;" src="'.$item['anh'].'">
                                <div class="item-info">
                                    <h5 style="margin: 0 auto;">'.$item['TenSp'].'</h5>
                                    <div class="item-much" style="justify-content: center;">
                                        <p>'.$item['Gia'].'</p>
                                        <p>'.$item['TenMau'].'</p>
                                    </div>
                                </div>
                            </div>  
                        </a>
                    ';
                }
            }
        ?>
    </div>
    <!-- end sản phẩm tương tự -->

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
    <!-- end footer -->
    <script>
        const open_user = document.querySelector('.js_user');
        const show = document.querySelector('.subnav-user');

        open_user.addEventListener('click', (e) => {
            show.classList.toggle('open');
        });

        function addMoreCart(delta){
            num = parseInt($('[name=num]').val())
            num += delta
            if(num < 1) num = 1
            $('[name=num]').val(num)
        }

        function fixnum(){
            $('[name=num]').val(Math.abs($('[name=num]').val()))
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