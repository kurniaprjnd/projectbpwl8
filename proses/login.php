<?php 
	
	session_start();
	include 'config.php';

	if(isset($_POST['daftar'])){
		$nama 				= $_POST['nama'];
		$email 				= $_POST['email'];
		$noHp 				= $_POST['noHp'];
		$username 			= $_POST['username'];
		$pass 				= $_POST['pass'];
		$confirmPass 		= $_POST['confirmPass'];

		if($pass != $confirmPass){
			echo "<script>
				alert('Password tidak cocok !');
			</script>";
		}
		else{
			$sql = $conn -> query("INSERT INTO user(nama, email, noHp, username, pass) VALUES ('$nama','$email'
				,'$noHp','$username','$pass')");		

			if($sql){
				$_SESSION['nama'] = $nama;
				echo '<script>
					alert("Welcome to Music World, '.$nama.' !");
					window.location = "../";
				</script>';		
			}
			else{
				echo "<script>
					alert('Gagal Registrasi');
				</script>";
			}
		}
	}

	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$pass  = $_POST['pass'];

		$sql = $conn -> query("SELECT * FROM user WHERE email = '$email' AND password ='$pass' ");
		$total = mysqli_num_rows($sql);
		$tampil = $sql -> fetch_assoc();

		if($total != 1){
			echo "<script>
					alert('Login Gagal');
				</script>";
		}
		else{
			$_SESSION['nama'] = $tampil['nama'];
			echo "<script>
					alert('Selamat Datang,".$tampil['nama']."');
					window.location = '../';
				</script>";
		}
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Register | Login Akun</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
	<link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css">	
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<style>
		body{
			/*background: #7dbb26;*/
		}

		.body{
			border-radius: 10px;
			margin-top: 100px;
			min-height: 200px;
			background: #ffe577;
			border: 3px solid #ed5f07;
			box-shadow: 0px 10px 10px rgba(0,0,0,.2);
		}

		.form-regis{
			width: 70%;
			padding: 5px;
			margin-bottom: 15px;
			border-radius: 5px;
			border:2px solid #ed5f07;
			color: #ed5f07;
			transition: .4s;
			font-family: cursive;
		}

		.btn{
			border-radius: 200px;
			max-height: 40px;
		}

		input:focus{
			outline: none;
		}

		.form-regis:focus{
			width: 100%;
			padding:5px 10px;
		}

		.button {
			font-size: 20pt;
		}

		.btn-signup{
			width: 100%; 
			background: #ed5f07; 
			color: #d53c00; 
			border:1px solid #ed5f07; 
			font-size: 15pt;
		}

		.btn-signup:hover, .btn-signup:focus{
			background: #ed5f07;
			border:1px solid #ed5f07;
		}

		.btn-signup:active:hover{		  
		  background-color: #d53c00;
		}
	</style>

</head>
<body>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="body">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="header-signUp" style="text-align: center">
							<h1 style="color: #d53c00">Sign Up</h1>
							<hr style="border:1px solid #d53c00">
						</div>
						<form action="" method="POST">
							<div class="body-signUp">
								<div class="row">
									<div class="col-md-6" style="border-right: .2px solid #d53c00">
										<input type="text" name="nama" class="form-regis" maxlength="25" required placeholder="Your Name...">
										<br>
										<input type="email" name="email" class="form-regis" maxlength="50" required placeholder="Email ..." >
										<br>
										<input type="text" name="noHp" class="form-regis" maxlength="13" required placeholder="Phone Number ...">
									</div>
									<div class="col-md-6" align="right" >

										<input type="text" name="username" class="form-regis" maxlength="20"  required placeholder="Username ....">
										<br>
										<input type="password" name="pass" class="form-regis" maxlength="20" minlength="8" required placeholder="Password ...">
										<br>
										<input type="password" name="confirmPass" class="form-regis" maxlength="20" minlength="8" required placeholder="Confirm Password ...">
										<br>
									</div>
								</div>	
							</div>

							<div class="footer">
								<br>
								<button class="btn btn-primary btn-sm btn-signup" style="" type="submit" name="daftar" >Sign Up!</button>
								<br>
								<br>
								<div class="row">
									<div class="col-md-6">
										<a class="btn btn-sm btn-primary" href="#" style="width: 100%;"  type="button" data-toggle="modal" data-target="#login">
											<p style="margin-top: 6px">	Already Have an Account ?</p>
										</a>
									</div>
									<div class="col-md-6">
										<a class="btn btn-sm btn-info" href="../auth.php" style="width: 100%;">
											<span class="pull-left" style="margin-top: 6px; margin-left: 25%">Or Login With</span>
											<span class="pull-right fa fa-google-plus" style="font-size: 20pt; margin-right: 25%"></span>
										</a>
									</div>
								</div>
							</div>	
							<br>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade bs-example-modal-sm" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
    	<form action="" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Login</h4>
	      </div>
	      <div class="modal-body">
	        <label>Email</label>
	        <br>
	        <center>
	       		<input type="email" name="email" class="form-regis" placeholder="Your Email...">
	        </center>	
	        <br>
	        <label>Password</label>
	        <br>
	        <center>	
	        	<input type="password" name="pass" class="form-regis" placeholder="Your Password...">
	        </center>
	      </div>
	      <div class="modal-footer">
	        <input type="submit" name="login" class="btn btn-sm btn-primary" style="width: 100%; border-radius: 5px" value="Login">
	        
	      </div>
	    </form>
    </div>
  </div>
</div>

<script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

</body>
</html>