<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title']?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/login.css">
</head>
<body><div class="header">
		<a href="">
			<img src="../image/Logo Sifoot.png" alt="" class="logo">
		</a>
		<div class="container-flasher">
			<?php
				Flasher::flash();
			?>
		</div>
	</div>
	<div class="content">
		<div class="login-register">
			<h2 class="sign-in-to">Sign in to</h2>
			<h2 class="continue-access">continue access</h2>
			<h3 class="if-you">If you don’t have an account register</h3>
			<div class="you-can-register">
				<h3 class="you-can">You can</h3>
				<a href="../register" class="register">Register here!</a>
			</div>
		</div>
		<form method="post" action="/login/login">
			<h2 class="sign-in">Sign in</h2>
			<input type="text" placeholder="Enter email or username" class="input username" name="username"required autocomplete="off">
			<div class="input btn-password">
				<input type="password" placeholder="password" class="password" name="password" required autocomplete="off">
				<button type="button" class="show-hide"><i id="eye-icon" class="fa-solid fa-eye-slash"></i></button>
			</div>
			<a href="" class="forgot-password">Forgot password ?</a>
			<input type="submit" value="Login" placeholder="" name="loginbutton"  class="btn-login">
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