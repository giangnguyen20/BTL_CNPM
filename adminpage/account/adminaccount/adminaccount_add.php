<?php
require_once('../../../db/dbhelper.php');

$ID='';
$tenNV='';
$sdt='';
$IDuser='';

if(!empty($_POST)){

    if(isset($_POST['ID'])){
        $ID=$_POST['ID'];
    }
    if(isset($_POST['tenNV'])){
        $tenNV=$_POST['tenNV'];
        $tenNV= str_replace('"','\\"',$tenNV);
    }
    if(isset($_POST['sdt'])){
        $sdt=$_POST['sdt'];
        $sdt= str_replace('"','\\"',$sdt);
    }
    if(isset($_POST['IDuser'])){
        $IDuser=$_POST['IDuser'];
        $IDuser= str_replace('"','\\"',$IDuser);
    }

    if(!empty($tenNV) && !empty($sdt) && !empty($IDuser)){

        if($ID==''){
            $sql='insert into admin(tenNV, sdt, IDuser) 
            values ("'.$tenNV.'", "'.$sdt.'", "'.$IDuser.'")';
        }
        else{
            $sql='update admin set tenNV="'.$tenNV.'", sdt="'.$sdt.'", IDuser="'.$IDuser.'"
            where ID="'.$ID.'"';
        }

    }
    execute($sql);

    header('Location: adminaccount_admin.php');
    die();
}


if(isset($_GET['ID'])){
    $ID=$_GET['ID'];
    $sql='select * from admin where ID="'.$ID.'"';
    $taikhoan= executeSingleResult($sql);
    if($taikhoan != null){
        $tenNV=$taikhoan['tenNV'];
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
	require_once('..\layout\navadminaccount.php');
	?>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Sửa Tài Khoản</h2>
			</div>
			<div class="panel-body">
                <form method="POST">
                <div class="form-group">
                    <label for="tenNV">Tên:</label>
                    <input type="text" name="ID" value="<?=$ID?>" hidden="true">
                    <input type="text" class="form-control" id="tenNV" name="tenNV" value="<?=$tenNV?>">
                </div>
                <div class="form-group">
                    <label for="sdt">Số Điện Thoại:</label>
                    <input type="text" class="form-control" id="sdt" name="sdt" value="<?=$sdt?>" minlength="10" required>
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
    </script>
</body>
</html>