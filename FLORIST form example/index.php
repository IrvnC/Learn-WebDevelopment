<<?php 
	session_start();
	include"koneksi.php";
 ?>

<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

</head>
<body>
	<header>
		<ul>
			<a href="index.php"><li>Home</li></a>
			<a href="profil.php"><li>Profil</li></a>
		</ul>
	</header>
	<section>
	<footer>
		<center>
			<font style="font-size: 40px; color: pink;">Flower Shop</font><br>
			<font style="font-size: 15px; color: white;">Ranzeeq Raya Street 212, Istanbul, Turkey</font><br>
			<font style="font-size: 15px; color: white;">Telephone (21) 525-2121 or email: queenflowershop@mfa.gov.tr</font>
		</center>
	</footer>
	</section>
	<div class="container">
    <div class="jumbotron mt-5"><center>
		<div class="card border-primary mb-3" style="max-width: 18rem;" >
  			<div class="card-header">Welcome to Florist</div>
  				<div class="card-body text-primary">
    				<h5 class="card-title">Please Login Here...</h5>
    					<form method="post">
							<label> Id Seller : </label>
							<input type="text" name="fid_seller"required="" placeholder="id seller here" ><br>
							<label>Password : </label>
							<input type="password" name="fpassword" required="" placeholder="password here" >
							<br><br>
							<button type="login" class="btn btn-info" name="fmasuk">Login</button>
						</form>
    			</div><
		</div>
	</div></center>
</div>

	
	<<?php 
		if (isset($_POST['fmasuk'])) {
			$id_seller=$_POST['fid_seller'];
			$password=$_POST['fpassword'];
			$qry=mysqli_query($koneksi,"SELECT * FROM seller WHERE id_seller='$id_seller' AND password='$password'");
			$cek=mysqli_num_rows($qry);    
			if ($cek==1) {
				$_SESSION['userweb']=$id_seller;
				header("location:table.php");
				exit;
			}
			else{
				echo "
                <script>
                    alert('The data you entered is wrong, try again!');
                    document.location.href = 'login.php';
                </script>
            ";
			}

		}

	 ?>

	
	<footer>
		<center><font styles="font-size: 16px;">CopyRight &copy; ErnitaTriyani2021</font></center>
	</footer>
</body>
</html>