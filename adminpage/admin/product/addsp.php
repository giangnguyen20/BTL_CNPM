<?php
require_once('..\..\..\db\dbhelper.php');

$IDSP='';
$TenSp='';
$IDHangSX='';
$IDLoai='';
$Gia='';
$SoLuong='';
$chitietsp='';

if(!empty($_POST)){

    if(isset($_POST['IDSP'])){
        $IDSP=$_POST['IDSP'];
    }
    if(isset($_POST['TenSp'])){
        $TenSp=$_POST['TenSp'];
        $TenSp= str_replace('"','\\"',$TenSp);
    }
    if(isset($_POST['IDHangSX'])){
        $IDHangSX=$_POST['IDHangSX'];
    }
    if(isset($_POST['IDLoai'])){
        $IDLoai=$_POST['IDLoai'];
    }
    if(isset($_POST['Gia'])){
        $Gia=$_POST['Gia'];
    }
    if(isset($_POST['SoLuong'])){
        $SoLuong=$_POST['SoLuong'];
    }
    if(isset($_POST['chitietsp'])){
        $chitietsp=$_POST['chitietsp'];
        $chitietsp= str_replace('"','\\"',$chitietsp);
    }

    if(!empty($TenSp) && !empty($IDHangSX)
    && !empty($IDLoai) && !empty($Gia)
    && !empty($SoLuong)){
        $create_time = date('Y-m-d H:i:s');
        $update_time = date('Y-m-d H:i:s');
        if($IDSP==''){
            $sql='insert into sanpham(TenSp, IDHangSX, IDLoai, Gia, SoLuong, chitietsp, create_time, update_time) 
            values ("'.$TenSp.'", "'.$IDHangSX.'", 
            "'.$IDLoai.'", "'.$Gia.'", "'.$SoLuong.'", "'.$chitietsp.'","'.$create_time.'", "'.$update_time.'")';
        }
        else{
            $sql='update sanpham set TenSp="'.$TenSp.'"
            , IDHangSX="'.$IDHangSX.'", IDLoai="'.$IDLoai.'"
            , Gia="'.$Gia.'", SoLuong="'.$SoLuong.'", chitietsp="'.$chitietsp.'","'.$update_time.'"
            where IDSP="'.$IDSP.'" ';
        }

    }
    echo $sql;
    execute($sql);

    header('Location: adminsp.php');
    die();
}


if(isset($_GET['IDSP'])){
    $IDSP=$_GET['IDSP'];
    $sql='select * from sanpham where IDSP="'.$IDSP.'"';
    $sanpham= executeSingleResult($sql);
    if($sanpham != null){
        $TenSp=$sanpham['TenSp'];
        $idhangsx=$sanpham['IDHangSX'];
        $IDLoai=$sanpham['IDLoai'];
        $Gia=$sanpham['Gia'];
        $SoLuong=$sanpham['SoLuong'];
        $chitietsp=$sanpham['chitietsp'];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Th??m/S???a S???n Ph???m</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>
<body>
	<?php
	require_once('..\layout\navmenusp.php');
	?>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Th??m/S???a S???n Ph???m</h2>
			</div>
			<div class="panel-body">
                <form method="POST">
                    <div class="form-group">
                        <label for="TenSp">T??n SP:</label>
                        <input type="text" name="IDSP" value="<?=$IDSP?>" hidden="true">
                        <input type="text" class="form-control" id="TenSp" name="TenSp" value="<?=$TenSp?>">
                    </div>
                    <div class="form-group">
                        <label for="IDHangSX">H??ng SX:</label>
                        <select class="form-control" name="IDHangSX" id="IDHangSX" value="<?=$IDHangSX?>">
                        <option>L???a ch???n h??ng s???n xu???t</option>
                        <?php
                        $sql='select * from nhasx';
                        $sanpham= executeResult($sql);
                        foreach($sanpham as $item){
                            echo'<option value="'.$item['IDNSX'].'">'.$item['TenHangSX'].'</option>';
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="IDLoai">Lo???i SP:</label>
                        <select class="form-control" name="IDLoai" id="IDLoai" value="<?=$IDLoai?>">
                        <option>L???a ch???n lo???i s???n ph???m</option>
                        <?php
                        $sql='select * from loaisp';
                        $sanpham= executeResult($sql);
                        foreach($sanpham as $item){
                            echo'<option value="'.$item['IDLoaiSP'].'">'.$item['tenloai'].'</option>';
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Gia">Gi??:</label>
                        <input type="text" class="form-control" id="Gia" name="Gia" value="<?=$Gia?>">
                    </div>
                    <div class="form-group">
                        <label for="SoLuong">S??? L?????ng:</label>
                        <input type="text" class="form-control" id="SoLuong" name="SoLuong" value="<?=$SoLuong?>">
                    </div>
                    <div class="form-group">
                        <label for="img">Chi ti???t s???n ph???m:</label>
                        <textarea class="form-control" rows="5" name="chitietsp" id="chitietsp" ><?=$chitietsp?></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">L??u</button>
                </form>
			</div>
		</div>
	</div>
    <script>
        $(function(){
            $('#chitietsp').summernote({
            height: 350,   //set editable area's height
            codemirror: { // codemirror options
            theme: 'monokai'
        }
        });
        })
    </script>
</body>
</html>