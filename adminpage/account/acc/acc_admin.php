<?php
require_once('../../../db/dbhelper.php');

$delete_id='';

if(isset($_GET['delete_id'])){
	$delete_id=$_GET['delete_id'];
	$sql='delete from account where id="'.$delete_id.'"';
	execute($sql);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản Lý Tài Khoản</title>
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
	<a href="../../home.php">
	<button class="btn btn-danger" style="margin: bottom 15px; float:right;">Back</button>
	</a>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Quản Lý Tài Khoản</h2>
			</div>
			<div class="panel-body">

				<br></br>
				<input id="myInput" type="text" name="search" placeholder="Nhập từ khóa bạn cần tìm" style="width:20%; margin-bottom:15px"/>
				<table class="table table-bordered table-hover" id="myTable">
					<thead>
						<tr>
							<th width="50px">STT</th>
							<th>Username</th>
                            <th>Password</th>
                            <th>Phân Quyền</th>
                            <th>Thời Gian Tạo</th>
                            <th>Thời Gian Cập Nhật</th>
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
					if($page<=0){
						$page=1;
					}
					$firstIndex=($page-1)*$limit;
					$sql="select * from account limit ".$firstIndex.", ".$limit." ";
					$categoryList=executeResult($sql);

					$sql2='select count(id) as total from account';
					$countResult=executeSingleResult($sql2);
					$count= $countResult['total'];
					$number=ceil($count/$limit);

					foreach ($categoryList as $item){
						echo '				
					<tr>
						<td>'.++$firstIndex.'</td>
						<td>'.$item['UserName'].'</td>
                        <td>'.$item['pwd'].'</td>
                        <td>'.$item['PhanQuyen'].'</td>
                        <td>'.$item['create_time'].'</td>
                        <td>'.$item['update_time'].'</td>
						<td>
							<a href="acc_add.php?id='.$item['id'].'"><button class="btn btn-warning">Sửa</button></a>
						</td>
						<td>
							<a href="?delete_id='.$item['id'].'"><button class="btn btn-danger">Xoá</button></a>
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
					$avaiablePage=[1, $page-1, $page, $page+1, $number];
					$isFirst = $isLast = false;
					for($i=0; $i<$number; $i++){
						if(!in_array($i+1, $avaiablePage)){
							if(!$isFirst && $page>3){
								echo '<li class="page-item"><a class="page-link" href="?page='.($page-2).'">...</a></li>';
								$isFirst=true;
							}
							if(!$isLast && $i>$page){
								echo '<li class="page-item"><a class="page-link" href="?page='.($page+2).'">...</a></li>';
								$isLast=true;
							}
						
						continue;
						}
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
				if (firstCol.indexOf(filter) > -1 || secondCol.indexOf(filter) > -1) {
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
