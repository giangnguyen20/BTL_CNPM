<?php
require_once('..\..\db\dbhelper.php');

$tensp='';
$idhangsx='';
$mau='';
$loai='';
$gia='';
$soluong='';
$img='';

if(!empty($_POST)){

    if(isset($_POST['tensp'])){
        $tensp=$_POST['tensp'];
    }
    if(isset($_POST['idhangsx'])){
        $idhangsx=$_POST['idhangsx'];
    }
    if(isset($_POST['mau'])){
        $mau=$_POST['mau'];
    }
    if(isset($_POST['loai'])){
        $loai=$_POST['loai'];
    }
    if(isset($_POST['gia'])){
        $gia=$_POST['gia'];
    }
    if(isset($_POST['soluong'])){
        $soluong=$_POST['soluong'];
    }
    if(isset($_POST['img'])){
        $img=$_POST['img'];
    }

    if(!empty($tensp) && !empty($idhangsx)
    && !empty($mau) && !empty($loai) && !empty($gia)
    && !empty($soluong) && !empty($img)){

        if($id==''){
            $sql='insert into sanpham(TenSp, IDHangSX, Mau, Loai, Gia, SoLuong, img) 
            values ("'.$tensp.'", "'.$idhangsx.'", "'.$mau.'"
            , "'.$loai.'", "'.$gia.'", "'.$soluong.'", "'.$img.'")';
        }
        else{
            $sql='update sanpham set TenSp="'.$tensp.'"
            , IDHangSX="'.$idhangsx.'", Mau="'.$mau.'", Loai="'.$loai.'"
            , Gia="'.$gia.'", SoLuong="'.$soluong.'", img="'.$img.'" 
            where id="'.$id.'" ';
        }

    }
    execute($sql);

    header('Location: adminsp.php');
    die();
}


if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql='select * from sanpham where id="'.$id.'"';
    $sanpham= executeSingleResult($sql);
    if($sanpham != null){
        $tensp=$sanpham['TenSp'];
        $idhangsx=$sanpham['IDHangSX'];
        $mau=$sanpham['Mau'];
        $loai=$sanpham['Loai'];
        $gia=$sanpham['Gia'];
        $soluong=$sanpham['SoLuong'];
        $img=$sanpham['img'];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm/Sửa Sản Phẩm</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<?php
	require_once('..\layout\navmenusp.php');
	?>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm/Sửa Sản Phẩm</h2>
			</div>
			<div class="panel-body">
                <form method="POST">
                <div class="form-group">
                    <label for="tensp">Tên SP:</label>
                    <input type="text" class="form-control" id="tensp" name="tensp" value="<?=$tensp?>">
                </div>
                <div class="form-group">
                    <label for="idhangsx">ID Hãng SX:</label>
                    <input type="text" class="form-control" id="idhangsx" name="idhangsx" value="<?=$idhangsx?>">
                </div>
                <div class="form-group">
                    <label for="mau">Mẫu:</label>
                    <input type="text" class="form-control" id="mau" name="mau"value="<?=$mau?>">
                </div>
                <div class="form-group">
                    <label for="loai">Loại:</label>
                    <input type="text" class="form-control" id="loai" name="loai" value="<?=$loai?>">
                </div>
                <div class="form-group">
                    <label for="gia">Giá:</label>
                    <input type="text" class="form-control" id="gia" name="gia" value="<?=$gia?>">
                </div>
                <div class="form-group">
                    <label for="soluong">Số Lượng:</label>
                    <input type="text" class="form-control" id="soluong" name="soluong" value="<?=$soluong?>">
                </div>
                <div class="form-group">
                    <label for="img">Ảnh:</label>
                    <input type="text" class="form-control" id="img" name="img" value="<?=$img?>">
                </div>
                <button class="btn btn-success">Lưu</button>
                </form>
			</div>
		</div>
	</div>
</body>
</html>