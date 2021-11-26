<?php
require_once('..\..\..\db\dbhelper.php');

$IDMau='';
$IDSP='';
$TenMau='';
$anh='';

if(!empty($_POST)){
    if(isset($_POST['IDMau'])){
        $IDMau=$_POST['IDMau'];
    }
    if(isset($_POST['IDSP'])){
        $IDSP=$_POST['IDSP'];
    }
    if(isset($_POST['TenMau'])){
        $TenMau=$_POST['TenMau'];
        $TenMau= str_replace('"','//"',$TenMau);
    }
    if(isset($_FILES['anh'])){
        $anh= basename($_FILES['anh']['name']);
        $targer_dir="../../../db/imgs/";
        $targer_file=$targer_dir.$anh;
        if(move_uploaded_file($_FILES["anh"]["tmp_name"],$targer_file)){
            echo'upload thành công';
        }
        else{
            echo'upload không thành công';
        }
        
    }
    
    if(!empty($IDSP) && !empty($TenMau)){

        
        if($IDMau==''){
            $sql='insert into mau(IDSP,anh,TenMau,tenanhupload) 
            values ("'.$IDSP.'", "'.$anh.'", "'.$TenMau.'")';
            
        }
        else{
            $sql='update mau set IDSP="'.$IDSP.'", anh="'.$anh.'",
            TenMau="'.$TenMau.'"
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
                    <option>Tên sản phẩm</option>
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
                    <label for="imgupload">Ảnh(Tải file ảnh lên):</label>
                    <input type="file" class="form-control" id="anh" name="anh" value="<?=$anh?>">
                    <img src="../../../db/imgs/<?=$anh?>" style="max-width:200px" id="img_pic">
                </div>
                <button class="btn btn-success">Lưu</button>
                </form>
			</div>
		</div>
	</div>
    <script>
        const fileUploader = document.getElementById('anh');
        
        fileUploader.addEventListener('change', (event) => {
            const files = event.target.files;
            const src = '../../../db/imgs/' + files[0].name;
            $('#img_pic').attr('src',src)
        });

    </script>
</body>
</html>