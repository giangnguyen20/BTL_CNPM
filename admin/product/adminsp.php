<?php
require_once('..\..\db\dbhelper.php');

$delete_id='';

if(isset($_GET['delete_id'])){
	$delete_id=$_GET['delete_id'];
	$sql='delete from sanpham where id="'.$delete_id.'"';
	execute($sql);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản Lý Sản Phẩm</title>
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
				<h2 class="text-center">Quản Lý Sản Phẩm</h2>
			</div>
			<div class="panel-body">

				<a href="addsp.php">
				<button class="btn btn-success" style="margin: bottom 15px;">Thêm Sản Phẩm</button>
				</a>
				
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="50px">STT</th>
							<th>Tên sản phẩm</th>
							<th width="90px">ID hãng SX</th>
							<th>Mẫu</th>
							<th>Loại</th>
							<th>Giá</th>
							<th>Số lượng</th>
							<th>Ảnh</th>
							<th width="50px">Sửa</th>
							<th width="50px">Xóa</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$sql="select * from sanpham";
					$categoryList=executeResult($sql);

					$index=1;
					foreach ($categoryList as $item){
						echo '				
						<tr>
							<td>'.$index++.'</td>
							<td>'.$item['TenSp'].'</td>
							<td>'.$item['IDHangSX'].'</td>
							<td>'.$item['Mau'].'</td>
							<td>'.$item['Loai'].'</td>
							<td>'.$item['Gia'].'</td>
							<td>'.$item['SoLuong'].'</td>
							<td><img src="'.$item['img'].'"
							style="max-width:100px"/></td>
							<td>
								<a href="addsp.php?id='.$item['id'].'"><button class="btn btn-warning">Sửa</button></a>
							</td>
							<td>
								<a href="?delete_id='.$item['id'].'"><button class="btn btn-danger">Xoá</button></a>
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
