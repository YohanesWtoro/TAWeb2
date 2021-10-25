<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>




<body class="bg-secondary">
	<div class="container">
		<div class="row justify-content-center">
			<div class="card mt-3 col-lg-7 ">
				  <div class="card-header text-center">
				    <h1>LOGIN</h1>
				  </div>
		<?php 
			if(isset($_GET['pesan'])){
				if($_GET['pesan'] == "gagal"){
				echo "<div class='alert alert-danger' align='center'>Anda Harus Login Terlebih Dahulu</div>";
				}else if($_GET['pesan'] == "logout"){
					echo "<div class='alert alert-success' align='center'>Anda Telah Logout</div>";
				}else if($_GET['pesan'] == "salah"){
					echo "<div class='alert alert-danger' align='center'>Username atau Password Salah</div>";
				}
			}
		?>

				<div class="text-center"><img src="img/user1.jpg" width="200px" height="200px"></div>
				  <div class="card-body ">
				    <form method="post" action="cek_login.php">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username" name="username">
                      
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                      
                    </div>
						  <button type="submit"class="btn btn-primary form-control">Login</button>
					</form>
				  </div>
			</div>


		</div>		
	</div>
	






</body>
</html>