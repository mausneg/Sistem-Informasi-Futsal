	<div class="header">
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