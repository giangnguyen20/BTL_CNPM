<?php
require_once('..\..\..\db\dbhelper.php');

$IDNSX='';
$TenHangSX='';
$SDT='';

if(!empty($_POST)){

    if(isset($_POST['IDNSX'])){
        $IDNSX=$_POST['IDNSX'];
    }
    if(isset($_POST['TenHangSX'])){
        $TenHangSX=$_POST['TenHangSX'];
        $TenHangSX= str_replace('"','\\"',$TenHangSX);
    }
    if(isset($_POST['SDT'])){
        $SDT=$_POST['SDT'];
        $SDT= str_replace('"','\\"',$SDT);
    }

    if(!empty($TenHangSX) && !empty($SDT)){

        if($IDNSX==''){
            $sql='insert into nhasx(TenHangSX, SDT) 
            values ("'.$TenHangSX.'","'.$SDT.'")';
        }
        else{
            $sql='update nhasx set TenHangSX="'.$TenHangSX.'", SDT="'.$SDT.'" 
            where IDNSX="'.$IDNSX.'" ';
        }

    }
    execute($sql);

    header('Location: adminmanufacturer.php');
    die();
}


if(isset($_GET['IDNSX'])){
    $IDNSX=$_GET['IDNSX'];
    $sql='select * from nhasx where IDNSX="'.$IDNSX.'"';
    $nhasx= executeSingleResult($sql);
    if($nhasx != null){
        $TenHangSX=$nhasx['TenHangSX'];
        $SDT=$nhasx['SDT'];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm/Sửa Nhà Sản Xuất</title>
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
	require_once('..\layout\navmenumanufacturer.php');
	?>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm/Sửa Nhà Sản Xuất</h2>
			</div>
			<div class="panel-body">
                <form method="POST">
                <div class="form-group">
                    <label for="TenHangSX">Tên Nhà Sản Xuất:</label>
                    <input type="text" name="IDNSX" value="<?=$IDNSX?>" hidden="true">
                    <input type="text" class="form-control" id="TenHangSX" name="TenHangSX" value="<?=$TenHangSX?>">
                </div>
                <div class="form-group">
                    <label for="SDT">Số Điện Thoại:</label>
                    <input type="text" class="form-control" id="SDT" name="SDT" value="<?=$SDT?>">
                </div>
                <button class="btn btn-success">Lưu</button>
                </form>
			</div>
		</div>
	</div>
</body>
</html>