<?php
require_once('../../../db/dbhelper.php');

$IDKH='';
$tenkhachhang='';
$tuoi='';
$sdt='';
$IDuser='';
if(!empty($_POST)){

    if(isset($_POST['IDKH'])){
        $IDKH=$_POST['IDKH'];
    }
    if(isset($_POST['tenkhachhang'])){
        $tenkhachhang=$_POST['tenkhachhang'];
        $tenkhachhang= str_replace('"','\\"',$tenkhachhang);
    }
    if(isset($_POST['tuoi'])){
        $tuoi=$_POST['tuoi'];
        $tuoi= str_replace('"','\\"',$tuoi);
    }
    if(isset($_POST['sdt'])){
        $sdt=$_POST['sdt'];
        $sdt= str_replace('"','\\"',$sdt);
    }
    if(isset($_POST['IDuser'])){
        $IDuser=$_POST['IDuser'];
        $IDuser= str_replace('"','\\"',$IDuser);
    }

    if(!empty($tenkhachhang) && !empty($tuoi) && !empty($sdt) && !empty($IDuser)){

        if($IDKH==''){
            $sql='insert into khachhang(tenkhachhang, tuoi, sdt, IDuser) 
            values ("'.$tenkhachhang.'", "'.$tuoi.'", "'.$sdt.'", "'.$IDuser.'")';
        }
        else{
            $sql='update khachhang set tenkhachhang="'.$tenkhachhang.'", tuoi="'.$tuoi.'", sdt="'.$sdt.'", IDuser="'.$IDuser.'"
            where IDKH="'.$IDKH.'" ';
        }

    }
    execute($sql);

    header('Location: customer_admin.php');
    die();
}


if(isset($_GET['IDKH'])){
    $IDKH=$_GET['IDKH'];
    $sql='select * from khachhang where IDKH="'.$IDKH.'"';
    $taikhoan= executeSingleResult($sql);
    if($taikhoan != null){
        $tenkhachhang=$taikhoan['tenkhachhang'];
        $tuoi=$taikhoan['tuoi'];
        $sdt=$taikhoan['sdt'];
        $IDuser=$taikhoan['IDuser'];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sửa Tài Khoản</title>
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
	require_once('..\layout\navmenucustomer.php');
	?>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Sửa Tài Khoản</h2>
			</div>
			<div class="panel-body">
                <form method="POST">
                <div class="form-group">
                    <label for="tenkhachhang">Tên Khách Hàng:</label>
                    <input type="text" name="IDKH" value="<?=$IDKH?>" hidden="true">
                    <input type="text" class="form-control" id="tenkhachhang" name="tenkhachhang" value="<?=$tenkhachhang?>">
                </div>
                <div class="form-group">
                    <label for="tuoi">Tuổi:</label>
                    <input type="text" class="form-control" id="tuoi" name="tuoi" value="<?=$tuoi?>">
                </div>
                <div class="form-group">
                    <label for="sdt">Số Điện Thoại:</label>
                    <input type="text" class="form-control" id="sdt" name="sdt" value="<?=$sdt?>">
                </div>
                <div class="form-group">
                    <label for="IDuser">ID Người Dùng:</label>
                    <input type="text" class="form-control" id="IDuser" name="IDuser" value="<?=$IDuser?>">
                </div>
                <button class="btn btn-success">Lưu</button>
                </form>
			</div>
		</div>
	</div>

    <script>
        const fileUploader = document.getElementById('sdt');

        fileUploader.addEventListener('change', (event) => {
            const vnf_regex = /((09|03)+([0-9]{8})\b)/g;
            const phone_number = $('#sdt').val();

            if(phone_number !==''){
                if (vnf_regex.test(phone_number) == false) 
                {
                    alert('Số điện thoại của bạn không đúng định dạng!');
                }
            }
        })

        const tuoi = document.getElementById('tuoi');
        tuoi.addEventListener('change', (event) => {
            const vnf_regex = /(([1-9]{1}|[0-9]{2}|[0-9]{3})\b)/g;
            const phone_number = $('#tuoi').val();
            
            if(phone_number !== ''){
                if (vnf_regex.test(phone_number) == false) 
                {
                    alert('tuổi bạn nhập không hợp lệ!');
                }
            }
        })
    </script>
</body>
</html>