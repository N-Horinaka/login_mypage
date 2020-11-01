<?php

session_start();

if(isset($_SESSION['id'])){
	header("Location: mypage.php");
}
?>


<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="login.css">
		<title>マイページ登録</title>
	</head>

	<body>
		<header>
			<img src="4eachblog_logo.jpg">
			<div class="to_login_field">
				<a href="login.php">ログイン</a>
			</div>
		</header>

		<main>
			<form action="mypage.php" method="POST">
				<div class="login_contents">
					<div class="mail">
						<label>メールアドレス</label>
						<br>
						<input type="text" class="formbox" name="mail" value=" <?php if(isset($_COOKIE['mail'])){echo $_COOKIE['mail'];} ?> ">
					</div>

					<div class="password">
						<label>パスワード</label>
						<br>
						<input type="text" class="formbox" name="password" value=" <?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];} ?> ">
					</div>

					<div class="checkbox">
						<label><input type="checkbox" name="login_keep" value="login_keep" <?php if(isset($_COOKIE['login_keep'])){
								echo " checked='checked' ";} ?> >
						ログイン状態を保持する</label>
					</div>
					
					<div class="login">
						<input type="submit" class="login_button" value="ログイン">
					</div>
				</div>
			</form>
		</main>

		<footer>
			Ⓒ2018 InterNous.Inc. All rights reserved
		</footer>
	</body>
</html>