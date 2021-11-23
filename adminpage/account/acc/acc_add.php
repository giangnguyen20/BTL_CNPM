<?php
require_once('../../../db/dbhelper.php');

$id='';
$UserName='';
$pwd='';
$PhanQuyen= '';

if(!empty($_POST)){

    if(isset($_POST['id'])){
        $id=$_POST['id'];
    }
    if(isset($_POST['UserName'])){
        $UserName=$_POST['UserName'];
        $UserName= str_replace('"','\\"',$UserName);
    }
    if(isset($_POST['pwd'])){
        $pwd=$_POST['pwd'];
        $pwd= str_replace('"','\\"',$pwd);
    }
    if(isset($_POST['PhanQuyen'])){
        $PhanQuyen=$_POST['PhanQuyen'];
        $PhanQuyen= str_replace('"','\\"',$PhanQuyen);
    }
    if(!empty($UserName) && !empty($pwd) && $PhanQuyen != ''){
        $create_time = $update_time = date('Y-m-d H:s:i');
        $sql='update account set UserName="'.$UserName.'", pwd="'.$pwd.'", PhanQuyen="'.$PhanQuyen.'", update_time = "'.$update_time.'"
        where id="'.$id.'"';

    }
    execute($sql);

    header('Location: acc_admin.php');
    die();
}

// lấy iduser sửa thông tin
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql='select * from account where id="'.$id.'"';
    $taikhoan= executeSingleResult($sql);
    if($taikhoan != null){
        $UserName=$taikhoan['UserName'];
        $pwd=$taikhoan['pwd'];
        $PhanQuyen=$taikhoan['PhanQuyen'];
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
	require_once('..\layout\navmenuacc.php');
	?>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Sửa Tài Khoản</h2>
			</div>
			<div class="panel-body">
                <form method="POST">
                    <div class="form-group">
                        <label for="UserName">UserName:</label>
                        <input type="text" name="id" value="<?=$id?>" hidden="true">
                        <input type="text" class="form-control" id="UserName" name="UserName" value="<?=$UserName?>">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="text" class="form-control" id="pwd" name="pwd" value="<?=$pwd?>">
                    </div>
                    <div class="form-group">
                        <label for="PhanQuyen">Phân Quyền:</label>
                        <input type="text" class="form-control" id="PhanQuyen" name="PhanQuyen" value="<?=$PhanQuyen?>">
                    </div>
                    <button class="btn btn-success" type="submit">Lưu</button>
                </form>
			</div>
		</div>
	</div>
</body>
</html>