<?php
require_once('..\..\..\db\dbhelper.php');

$delete_id='';

if(isset($_GET['delete_id'])){
	$delete_id=$_GET['delete_id'];
	$sql='delete from sanpham where IDSP="'.$delete_id.'"';
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
	<a href="../../home.php">
	<button class="btn btn-danger" style="margin: bottom 15px; float:right;">Back</button>
	</a>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Quản Lý Sản Phẩm</h2>
			</div>
			<div class="panel-body">

				<a href="addsp.php">
				<button class="btn btn-success" style="margin: bottom 15px;">Thêm Sản Phẩm</button>
				</a>
				<br></br>
				<input id="myInput" type="text" placeholder="Nhập từ khóa bạn cần tìm" style="width:20%; margin-bottom:15px"/>
				<table class="table table-bordered table-hover" id="myTable">
					<thead>
						<tr>
							<th width="50px">STT</th>
							<th>Tên sản phẩm</th>
							<th width="120px">Hãng SX</th>
							<th width="120px">Tên loại</th>
							<th width="50px">Giá</th>
							<th width="100px">Số lượng</th>
							<th width="50px">Sửa</th>
							<th width="50px">Xóa</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$limit=10;
					$page=1;
					if(isset($_GET['page'])){
						$page=$_GET['page'];
					}
					$firstIndex=($page-1)* $limit;
					$sql="select sanpham.IDSP,sanpham.TenSp,
					nhasx.TenHangSX,
					loaisp.tenloai, sanpham.Gia, 
					sanpham.SoLuong
					from ((sanpham 
					inner join loaisp
					on sanpham.IDLoai=loaisp.IDLoaiSP)
					inner join nhasx
					on sanpham.IDHangSX=nhasx.IDNSX)
					limit ".$firstIndex.", ".$limit." ";

					$categoryList=executeResult($sql);

					$sql2='select count(IDSP) as total from sanpham';
					$countResult=executeSingleResult($sql2);
					$count= $countResult['total'];
					$number=ceil($count/$limit);

					foreach ($categoryList as $item){
						echo '				
					<tr>
						<td>'.++$firstIndex.'</td>
						<td>'.$item['TenSp'].'</td>
						<td>'.$item['TenHangSX'].'</td>
						<td>'.$item['tenloai'].'</td>
						<td>'.$item['Gia'].'</td>
						<td>'.$item['SoLuong'].'</td>
						<td>
							<a href="addsp.php?IDSP='.$item['IDSP'].'"><button class="btn btn-warning">Sửa</button></a>
						</td>
						<td>
							<a href="?delete_id='.$item['IDSP'].'"><button class="btn btn-danger">Xoá</button></a>
						</td>
					</tr>';
					}
					?>
					</tbody>
				</table>
				<?php
				if($number>1){
				?>
				<ul class="pagination">
					<?php
					if($page>1){
						echo'<li class="page-item"><a class="page-link" href="?page='.($page-1).'">Previous</a></li>';
					}
					?>
					
					<?php
					for($i=0;$i<$number;$i++){
						if($page==($i+1)){
							echo'<li class="page-item active"><a class="page-link" href="#">'.($i+1).'</a></li>';
						}
						else{
							echo'<li class="page-item"><a class="page-link" href="?page='.($i+1).'">'.($i+1).'</a></li>';
						}
					}
					?>
					<?php
					if($page<$number){
						echo'<li class="page-item"><a class="page-link" href="?page='.($page+1).'">Next</a></li>';
					}
					?>
				</ul>
				<?php
				}
				?>
			</div>
		</div>
	</div>

<script>
	function filterTable(event) {
    var filter = event.target.value.toUpperCase();
    var rows = document.querySelector("#myTable tbody").rows;
    
    for (var i = 0; i < rows.length; i++) {
        var firstCol = rows[i].cells[0].textContent.toUpperCase();
        var secondCol = rows[i].cells[1].textContent.toUpperCase();
		var thirdCol = rows[i].cells[2].textContent.toUpperCase();
		var fourthCol = rows[i].cells[3].textContent.toUpperCase();
		var fifthCol = rows[i].cells[4].textContent.toUpperCase();
		var sixthCol = rows[i].cells[5].textContent.toUpperCase();
		var seventhCol = rows[i].cells[6].textContent.toUpperCase();
        if (firstCol.indexOf(filter) > -1 || secondCol.indexOf(filter) > -1 || 
		thirdCol.indexOf(filter) > -1 || fourthCol.indexOf(filter) > -1 || 
		fifthCol.indexOf(filter) > -1 || sixthCol.indexOf(filter) > -1 || 
		seventhCol.indexOf(filter) > -1) {
            rows[i].style.display = "";
        } else {
            rows[i].style.display = "none";
        }      
    }
}

document.querySelector('#myInput').addEventListener('keyup', filterTable, false);
</script>

</body>
</html>
