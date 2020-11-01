<?php

if(isset($_SESSION['id'])){
	header("Location: http://localhost/login_mypage/mypage.php");
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
			<form action="mypage.php" method="POST" enctype="multipart/form-data" class="re-form">
				<div class="login_error_contents">
					<div class="caution">メールアドレスまたはパスワードが間違っています。</div>
					
					<div class="mail">
						<label>メールアドレス</label>
						<br>
						<input type="text" class="formbox" name="mail" value="">
					</div>

					<div class="password">
						<label>パスワード</label>
						<br>
						<input type="text" class="formbox" name="password" value="">
					</div>
					
					
					<div class="checkbox">
						<label><input type="checkbox" name="login_keep" value="login_keep">ログイン状態を保持する</label>
					</div>

				
					<div class="re-login">
						<input type="submit" class="re-login_button" value="ログイン">
					</div>
				</div>
			</form>
		</main>

		<footer>
			Ⓒ2018 InterNous.Inc. All rights reserved
		</footer>
	</body>
</html>