<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="/css/signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>Sign In</title>
</head>
<body>
	<div class="header">
		<a href="">
			<img src="../image/Logo Sifoot.png" alt="" class="logo">
		</a>
	</div>
	<div class="content">
		<div class="register-login">
			<h2 class="sign-up-to">Sign up to</h2>
			<h2 class="continue-access">make your account</h2>
			<h3 class="if-you">If you already have an account</h3>
			<div class="you-can-login">
				<h3 class="you-can">You can</h3>
				<a href="signin.html" class="login">Login here!</a>
			</div>
		</div>
		<form action="" method="post">
			<h2 class="sign-up">Sign up</h2>
			<input type="text" placeholder="Enter email" class="input email" required>
			<input type="text" placeholder="Create username" class="input username" required>
			<input type="text" placeholder="Contact number" class="input contact" required>
			<div class="input btn-password">
				<input type="password" placeholder="password" class="password" required>
				<button type="button" class="show-hide"><i id="eye-icon-pass" class="fa-solid fa-eye-slash"></i></button>
			</div>
			<div class="input btn-password">
				<input type="password" placeholder="Confirm password" class="input confirm" required>
				<button type="button" class="show-hide"><i id="eye-icon-conf" class="fa-solid fa-eye-slash"></i></button>
			</div>
			<button class="btn-register">Register</button>
			<h4 class="continue">or continue with</h4>
			<div class="icon">
				<a href="">
					<i class="fa-brands fa-facebook"></i>
				</a>
				<a href="">
					<i class="fa-brands fa-apple"></i>
				</a><a href="">
					<i class="fa-brands fa-google"></i>
				</a>
			</div>
		</form>
	</div>
	<div class="footer">
		<h4>mausneg©2023</h4>
	</div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="/js/signup.js"></script>
</body>
</html>