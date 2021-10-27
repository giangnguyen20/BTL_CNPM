<?php
require_once('..\..\db\dbhelper.php');

$delete_id='';

if(isset($_GET['delete_id'])){
	$delete_id=$_GET['delete_id'];
	$sql='delete from loaisp where IDLoaiSP="'.$delete_id.'"';
	execute($sql);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản Lý Danh Mục</title>
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
				<h2 class="text-center">Quản Lý Danh Mục</h2>
			</div>
			<div class="panel-body">

				<a href="add.php">
				<button class="btn btn-success" style="margin: bottom 15px;">Thêm Danh Mục</button>
				</a>
				
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="50px">STT</th>
							<th>Tên Danh Mục</th>
							<th width="50px">Sửa</th>
							<th width="50px">Xóa</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$sql="select * from loaisp";
					$categoryList=executeResult($sql);

					$index=1;
					foreach ($categoryList as $item){
						echo '				
					<tr>
						<td>'.$index++.'</td>
						<td>'.$item['tenloai'].'</td>
						<td>
							<a href="add.php?id='.$item['IDLoaiSP'].'"><button class="btn btn-warning">Sửa</button></a>
						</td>
						<td>
							<a href="?delete_id='.$item['IDLoaiSP'].'"><button class="btn btn-danger">Xoá</button></a>
						</td>
					</tr>';
					}
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</body>
</html>
