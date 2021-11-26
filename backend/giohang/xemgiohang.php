<?php
    require_once('../../backend/login_signup/prosess_form_login.php');  
    require_once('../utils/utility.php');
    require_once('ajax_request_pay.php');
    require_once('ajax_request.php');

    $GH = executeResult("select * from giohang inner join mau on mau.IDMau = giohang.TenMau");
    
    //chưa hoàn thành xóa
    if(isset($_GET['delete_SP'])){
        $delete_SP = $_GET['delete_SP'];
        foreach($GH as $item){
            if($item['TenSP'] == $delete_SP){
                execute("delete from giohang where TenSP = '$delete_SP'");
            }
        }
        header('Location: xemgiohang.php');
    }

    if(isset($_POST['index'])){
        $getindex =  "SL".$_POST['index'];
        $update_time = date('Y-m-d H:i:s');
        $id = $_POST['id'];
        $SL = $_POST[$getindex];
        foreach($GH as $item){
            if($SL == 0){
                if($item['IDGioHang'] == $id){
                    execute("delete from giohang where IDGioHang = '$id'");
                }
            }
            else
            {   
                if($item['IDGioHang'] == $id){
                    $checkSL = executeSingleResult("select SoLuong,TenSP from giohang where IDGioHang = '$id'");
                    $tensp = $checkSL['TenSP'];
                    $SP = executeSingleResult("select SoLuong from sanpham where TenSp = '$tensp'");
                    if($SL <= $SP['SoLuong']){
                        execute("update giohang set SoLuong = '$SL', update_time = '$update_time' where IDGioHang = '$id'");
                    }
                }
            }
        }
        header('Location: xemgiohang.php');
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem Giỏ Hàng</title>
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
    <div class="list-product" style="margin-top: 32px;">
        <h2 style="text-align: center;">Danh Sách Sản Phẩm</h2>
        <table class="table table-bordered table-hover">
            <thead>
			    <tr>
					<th width="50px">STT</th>
					<th>Tên sản phẩm</th>
					<th>Màu</th>
					<th>Giá</th>
					<th>Số lượng</th>
			        <th>Ảnh</th>
                    <th>Thành Giá</th>
					<th width="50px">Xóa</th>
				</tr>
			</thead>
            <tbody>
                <?php
                    $tong = [];
                    $index = 0;
                    
                    $thanhgiaint = 0;
                    

                    foreach($GH as $item){

                        $gia = explode(",", $item['Gia']); 
                        
                        $thanhgia = '';
                        $sthanhgia = '';

                        foreach($gia as $i){
                            $thanhgia .=  $i;
                        }

                        $thanhgia = (int)$thanhgia * $item['SoLuong'];
                        $tong[$index] = $thanhgia;                       

                        $thanhgia = str_split($thanhgia);
                        //thêm dấu ,
                        for($i = 0; $i < sizeof($thanhgia); $i++){
                            switch(sizeof($thanhgia)%3){
                                case 0:
                                    if($i == 0){
                                        $sthanhgia .= $thanhgia[$i];
                                    }
                                    elseif(($i + 1) % 3 == 0)
                                    {
                                        if($i == sizeof($thanhgia) - 1){
                                            $sthanhgia .= $thanhgia[$i];
                                        }else{
                                            $sthanhgia .= $thanhgia[$i].',';
                                        }
                                    }else{
                                        $sthanhgia .= $thanhgia[$i];
                                    }
                                    break;
                                case 1:
                                    if($i == 0){
                                        $sthanhgia .= $thanhgia[$i].',';
                                    }
                                    elseif($i%3 == 0){
                                        if($i == sizeof($thanhgia) - 1){
                                            $sthanhgia .= $thanhgia[$i];
                                        }else{
                                            $sthanhgia .= $thanhgia[$i].',';
                                        }
                                    }
                                    else{
                                        $sthanhgia .= $thanhgia[$i];
                                    }
                                    break;
                                case 2:
                                    if($i == 1){
                                        $sthanhgia .= $thanhgia[$i].',';
                                    }
                                    elseif(($i-1)%3 == 0){
                                        if($i == sizeof($thanhgia) - 1){
                                            $sthanhgia .= $thanhgia[$i];
                                        }else{
                                            $sthanhgia .= $thanhgia[$i].',';
                                        }
                                    }
                                    else{
                                        $sthanhgia .= $thanhgia[$i];
                                    }
                                    break;
                            }

                        }

                        echo '
                        <tr>
                            <td>'.$index.'</td>
                            <td>'.$item['TenSP'].'</td>
                            <td>'.$item['TenMau'].'</td>
                            <td>'.$item['Gia'].'</td>
                            <td>
                                <form method="post">
                                    <input type="number" name="index" value="'.$index.'" style="display: none;">
                                    <input type="number" name="id" value="'.$item['IDGioHang'].'" style="display: none;">
                                    <input type="number" name="SL'.$index.'" value="'.$item['SoLuong'].'" class="form-control" step="1" style="max-width: 90px; border: solid grey 1px; border-radius: 4px; float: left;" onchange="fixnum('.$index.')">
                                    <input type="submit" value="OK" style="margin-left: 4px; margin-top: 4px;">
                                </form>
                            </td>
                            <td><img src="../../db/imgs/'.$item['anh'].'"
                            style="max-width:100px"/></td>
                            <td>'.$sthanhgia.'</td>
                            <td>
                                <a href="?delete_SP='.$item['TenSP'].'"><button class="btn btn-danger">Xoá</button></a>
                            </td>
                        </tr>
                        ';
                        $index++;
                    }
                ?>
                <tr>
                    <th>Tổng:</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <?php
                            $tonggia = 0;
                            foreach($tong as $item){
                                $tonggia += $item;
                            }
                            
                            $stonggia = '';
                            //thêm dấu ,
                            if($tonggia == 0){
                                $stonggia = '0';
                            }
                            else{
                                $tonggia = str_split($tonggia);
                                
                                for($i = 0; $i < sizeof($tonggia); $i++){
                                    switch(sizeof($tonggia)%3){
                                        case 0:
                                            if($i == 0){
                                                $stonggia .= $tonggia[$i];
                                            }
                                            elseif(($i + 1) % 3 == 0)
                                            {
                                                if($i == sizeof($thanhgia) - 1){
                                                    $stonggia .= $tonggia[$i];
                                                }else{
                                                    $stonggia .= $tonggia[$i].',';
                                                }
                                            }else{
                                                $stonggia .= $tonggia[$i];
                                            }
                                            break;
                                        case 1:
                                            if($i == 0){
                                                $stonggia .= $tonggia[$i].',';
                                            }
                                            else if($i%3 == 0){
                                                if($i == (sizeof($thanhgia) - 1)){
                                                    $stonggia .= $tonggia[$i];
                                                }else{
                                                    $stonggia .= $tonggia[$i].',';
                                                }
                                            }
                                            else{
                                                $stonggia .= $tonggia[$i];
                                            }
                                            break;
                                        case 2:
                                            if($i == 1){
                                                $stonggia .= $tonggia[$i].',';
                                            }
                                            else if(($i - 1) % 3 == 0){
                                                if($i == (sizeof($tonggia) - 1)){
                                                    $stonggia .= $tonggia[$i];
                                                    
                                                }else{
                                                    $stonggia .= $tonggia[$i].',';
                                                }
                                            }
                                            else{
                                                $stonggia .= $tonggia[$i];
                                            }
                                            break;
                                    }

                                }  
                            }
                            echo $stonggia;
                        ?>
                    </td>
                    <td>
                        <?php
                            $t = 0;
                            foreach($tong as $item){
                                $t += $item;
                            }
                            // echo '<button class="btn btn-success" onclick="thanhtoan('.$t.')">Thanh toán</button>';
                        ?>
                        
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

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

    <script>
        const open_user = document.querySelector('.js_user');
        const show = document.querySelector('.subnav-user');

        open_user.addEventListener('click', (e) => {
            show.classList.toggle('open');
        });

        function fixnum(index){
            name = "num=SL" + index;
            $('['+name+']').val(Math.abs($('['+name+']').val()))
        }

        function thanhtoan(thanhgia){
            console.log(thanhgia);
            $.post('ajax_request_pay.php', {
                'action': 'pay',
                'tonggia': thanhgia
            }, 
            function(data){
                location.reload()
            })
        }
    </script>
</body>
</html>