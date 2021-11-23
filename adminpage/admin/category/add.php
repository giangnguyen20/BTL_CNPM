<?php
require_once('..\..\db\dbhelper.php');

$IDLoaiSP='';
$tenloai='';

if(!empty($_POST)){

    if(isset($_POST['IDLoaiSP'])){
        $IDLoaiSP=$_POST['IDLoaiSP'];
    }
    if(isset($_POST['tenloai'])){
        $tenloai=$_POST['tenloai'];
        $tenloai= str_replace('"','\\"',$tenloai);
    }

    if(!empty($tenloai)){

        if($IDLoaiSP==''){
            $sql='insert into loaisp(tenloai) 
            values ("'.$tenloai.'")';
        }
        else{
            $sql='update loaisp set tenloai="'.$tenloai.'" 
            where IDLoaiSP="'.$IDLoaiSP.'" ';
        }

    }
    execute($sql);

    header('Location: admin.php');
    die();
}


if(isset($_GET['IDLoaiSP'])){
    $IDLoaiSP=$_GET['IDLoaiSP'];
    $sql='select * from loaisp where IDLoaiSP="'.$IDLoaiSP.'"';
    $sanpham= executeSingleResult($sql);
    if($sanpham != null){
        $tenloai=$sanpham['tenloai'];
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
	require_once('..\layout\navmenu.php');
	?>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm/Sửa Danh Mục</h2>
			</div>
			<div class="panel-body">
                <form method="POST">
                <div class="form-group">
                    <label for="tensp">Tên Danh Mục:</label>
                    <input type="text" name="IDLoaiSP" value="<?=$IDLoaiSP?>" hidden="true">
                    <input type="text" class="form-control" id="tenloai" name="tenloai" value="<?=$tenloai?>">
                </div>
                <button class="btn btn-success">Lưu</button>
                </form>
			</div>
		</div>
	</div>
</body>
</html>