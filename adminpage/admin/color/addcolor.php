<?php
require_once('..\..\..\db\dbhelper.php');

$IDMau='';
$IDSP='';
$TenMau='';
$anh='';
$anhupload='';
$tenanhupload='';

if(!empty($_POST)){

    if(isset($_POST['IDMau'])){
        $IDMau=$_POST['IDMau'];
    }
    if(isset($_POST['IDSP'])){
        $IDSP=$_POST['IDSP'];
    }
    if(isset($_POST['TenMau'])){
        $TenMau=$_POST['TenMau'];
        $TenMau= str_replace('"','\\"',$TenMau);
    }
    if(isset($_POST['anh'])){
        $anh=$_POST['anh'];
    }
    if(isset($_FILES['anhupload'])){
        $anhupload= basename($_FILES['anhupload']['name']);
        $targer_dir="../../uploads/";
        $targer_file=$targer_dir.$anhupload;
        if(move_uploaded_file($_FILES["anhupload"]["tmp_name"],$targer_file)){
            echo'upload thành công';
        }
        else{
            echo'upload không thành công';
        }
        
    }

    if(!empty($IDSP) && !empty($TenMau)){

        
        if($IDMau==''){
            $sql='insert into mau(IDSP,anh,TenMau,tenanhupload) 
            values ("'.$IDSP.'", "'.$anh.'", "'.$TenMau.'", "'.$anhupload.'")';
            
        }
        else{
            $sql='update mau set IDSP="'.$IDSP.'", anh="'.$anh.'",
            TenMau="'.$TenMau.'", tenanhupload="'.$anhupload.'"
            where IDMau="'.$IDMau.'" ';
        }

    }
    execute($sql);
    echo $sql;

    header('Location: admincolor.php');
    die();
}


if(isset($_GET['IDMau'])){
    $IDMau=$_GET['IDMau'];
    $sql='select * from mau where IDMau="'.$IDMau.'"';
    $mau= executeSingleResult($sql);
    if($mau != null){
        $IDSP=$mau['IDSP'];
        $TenMau=$mau['TenMau'];
        $anh=$mau['anh'];
        $tenanhupload=$mau['tenanhupload'];
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
	require_once('..\layout\navmenucolor.php');
	?>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm/Sửa Danh Mục</h2>
			</div>
			<div class="panel-body">
                <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="tensp">Tên Sản Phẩm:</label>
                    <input type="text" name="IDMau" value="<?=$IDMau?>" hidden="true">
                    <select class="form-control" id="IDSP" name="IDSP" value="<?=$IDSP?>">
                    <option>Lựa chọn hãng sản xuất</option>
                    <?php
                    $sql='select * from sanpham';
                    $sanpham= executeResult($sql);
                    foreach($sanpham as $item){
                        echo'<option value="'.$item['IDSP'].'">'.$item['TenSp'].'</option>';
                    }
                    ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tensp">Tên Màu:</label>
                    <input type="text" class="form-control" id="TenMau" name="TenMau" value="<?=$TenMau?>">
                </div>
                <div class="form-group">
                    <label for="img">Ảnh(Dùng URL):</label>
                    <input type="text" class="form-control" id="anh" name="anh" value="<?=$anh?>" onchange="updateimg()">
                    <img src="<?=$anh?>" style="max-width:200px" id="img_pic">
                </div>
                <div class="form-group">
                    <label for="imgupload">Ảnh(Tải file ảnh lên):</label>
                    <input type="file" class="form-control" id="anhupload" name="anhupload" value="<?=$tenanhupload?>" onchange="updateimg()">
                    <img src="<?=$anh?>" style="max-width:200px" id="img_pic">
                </div>
                <button class="btn btn-success">Lưu</button>
                </form>
			</div>
		</div>
	</div>
    <script>
        function updateimg(){
            $('#img_pic').attr('src',$('#anh').val())
        }
    </script>
</body>
</html>