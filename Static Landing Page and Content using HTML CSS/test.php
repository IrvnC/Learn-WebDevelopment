<?php
$name='';
$username='';
$email='';
$birthday='';
if (isset($_POST['Send'])) {
	$name=$_POST['name'];
	$username=$_POST['username'];
	$email=$_POST['email'];
	$birthday=$_POST['birthday'];
}
?>

<!doctype html>
<html>
<head>
	<title>daftar member</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<header>
	<p>form join membership</p>
	<h1 id="atas"></h1>
</header>	
<div class="isi"><center>
	<div class="dasar">
		<div class="topik">
			<h1>Thousand<span>Life</span>.</h1>
			<p>Welcome smart people, please fill in all the data needed for common purpose. Thankyou...</P>
			<p>if you finish fill the form and back to up click <a href="#bawah">here.</a></p>
			<form action="" method="post">
				<div class="form">
					<div class="kiri">
						<p>Name : </p>
						<input type="text" name="name" id="name" size="50" placeholder="enter your name here..." required>
					</div>
				</div>
				<div class="form">
					<div class="kiri">
						<p>Username : </p>
						<input type="text" name="username" id="username" size="50" placeholder="enter your username here..." required>
					</div>
				</div>
				<div class="form">
					<div class="kiri">
						<p>Email : </p>
						<input type="text" name="email" id="email" size="50" placeholder=" enter your email here..." required>
					</div>
				</div>
				<div class="form">
					<div class="kiri">
						<p>Date of birth : </p>
						<input type="date" name="birthday" id="birthday" required>
					</div>
				</div>
				<div class="form">
					<div class="kiri" >
						<p>Gender : </p>
						<label for="man"> Man</label>
						<input type="radio" name="man" id="man">
						<label for="woman">Woman</label>
						<input type="radio" name="woman" id="woman">
					</div>
				</div>
				<div class="form">
					<div class="kiri">
						<p>Status : </p>
						<label for="student"> Student</label>
						<input type="radio" name="student" id="student">
						<label for="work">Work</label>
						<input type="radio" name="work" id="work">
					</div>
				</div>
				<div class="kirim">
					<input type="submit" name="Send" id="Send" class="btn btn-primary" value="Send">
					<input type="reset" name="reset" id="reset"
					class="btn btn-secondary">
				</div>	
			</form>

		</div>
	</div>
	<p> <a href="index.html"><img src="logo/kembali.png" style="width:50px; height:50px;margin: 5px;"></a>
	<a href="index.html"><img src="logo/beranda.png" style="width:50px; height:50px;margin: 5px;"></a>
	<a href="daftar.html"><img src="logo/menu.jpg" style="width:50px; height:50px;border-radius: 50%;margin: 5px;"></a>
	</p>
	<div class="dasar">
		<div class="topik">
			<h1 id="bawah"></h1>
			<h2>Check u're data here</h2>
			<br>
			<h4>Name : </h4>
			<h4> ----> <?php echo $name; ?> </h4>
			<h4>Username : </h4>
			<h4> ----> <?php echo $username; ?></h4>			
			<h4>Email : </h4>
			<h4> ----> <?php echo $email; ?></h4>
			<h4>Birthday : </h4>
			<h4> ----> <?php echo $birthday;?></h4>

			
		</div>
	</div></center>
</div>
<footer>
	<a href="#atas"><h3>go up here...</h3></a>
	<p>Thank u for joining with us</p>
</footer>
</body>
</html>