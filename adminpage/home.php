<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<style>
		body{
			font-family: 'Roboto', sans-serif;
			
		}

		*{
			margin: 0;
			padding: 0;
			list-style: none;
			text-decoration: none;
		}

		.sidebar{
			position: fixed;
			top: 0;
			left: -250px;
			width: 250px;
			height: 100%;
			background: #042331;
			transition: all .5s ease;
		}

		.sidebar header{
			font-size: 22px;
			color: white;
			text-align: center;
			line-height: 70px;
			background: #063146;
			user-select: none;
		}

		.sidebar ul a{
			display: block;
			height: 100%;
			width: 100%;
			line-height: 65px;
			font-size: 20px;
			color: white;
			padding-left: 40px;
			box-sizing: border-box;
			border-top: 1px solid rgba(255,255,255,.1);
			border-bottom: 1px solid black;
			transition: .4s;
		}

		ul li:hover a{
			padding-left: 50px;
		}
		
		#check{
			display: none;
		}

		label #btn,label #cancel{
			position: absolute;
			cursor: pointer;
			background: #042331;
			border-radius: 3px;
		}
		label #btn{
			left: 40px;
			top: 25px;
			font-size: 35px;
			color: white;
			padding: 6px 12px;
			transition: all .5s;
		}

		label #cancel{
			z-index: 999;
			left: -195px;
			top: 17px;
			font-size: 30px;
			color: #0a5275;
			padding: 4px 9px;
			transiotion: all .5s ease;
		}

		#check:checked ~ .sidebar{
			left: 0;
		}

		#check:checked ~ label #btn{
			left: 250px;
			opacity: 0;
			pointer-events: none;
		}

		#check:checked ~ label #cancel{
			left: 195px;
		}
	</style>
</head>
<body>
	<input type="checkbox" id="check">
	<label for="check">
		<i class="fas fa-bars" id="btn"></i>
		<i class="fas fa-times" id="cancel"></i>
	</label>
	<div class="sidebar">
		<header>ADMIN</header>
		<ul>
			<li><a href="account/acc/acc_admin.php">Quản lý tài Khoản</a></li>
			<li><a href="admin/category/admin.php">Quản lý sản phẩm</a></li>
			<li><a href="../backend/login_signup/logout.php">đăng xuất</a></li>
		</ul>
	</div>
	<!-- <div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Home</h2>
			</div>
			<div class="panel-body">
            <a href="account/acc/acc_admin.php">
				<button class="btn btn-success" style="margin: bottom 15px;">Tài Khoản</button>
			</a>
            <a href="admin/category/admin.php">
				<button class="btn btn-success" style="margin: bottom 15px;">Sản Phẩm</button>
			</a>
			<a href="../backend/login_signup/logout.php">
				<button class="btn btn-success" style="margin: bottom 15px;">đăng xuất</button>
			</a>
			</div>
		</div>
	</div> -->
</body>
</html>