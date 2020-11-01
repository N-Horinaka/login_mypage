<?php

mb_internal_encoding("utf8");

session_start();


if(empty($_POST['from_mypage'])){
	header("Location: login_error.php");
}
?>


<!DOCTYPE html>

<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="mypage.css">
		<title>マイページ登録</title>
	</head>

	<body>
		<div class="body">
			<header>
				<img src="4eachblog_logo.jpg">
				<div class="logout"> <a href="log_out.php">ログアウト</a> </div>
			</header>

			<main>
				<form action="mypage_update.php" method="POST" class="form_center" enctype="multipart/form-data">
					<div class="henshu">
						<h2>会員情報</h2>

						<div class="information-contents">
							<div class="hello">こんにちは！　<?php echo $_SESSION['name']; ?> さん</div>

							<img src="<?php echo $_SESSION['picture']; ?>">

							<div class="personal">
								<div class="name">
									氏名 :　<input type="text" class="formbox" name="name" size="40" value="<?php echo $_SESSION['name']; ?>" required>
								</div>

								<div class="mail">
									メール :　<input type="text" class="formbox" name="mail" size="40" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?php echo $_SESSION['mail']; ?>">
								</div>

								<div class="password">
									パスワード :　<input type="text" class="formbox" name="password" size="40" pattern="^[a-zA-Z0-9]{6,}$" value="<?php echo $_SESSION['password']; ?>">
								</div>
							</div>

							<div class="comments">
								<textarea name="comments"><?php echo $_SESSION['comments']; ?></textarea>
							</div>

							<input type="hidden" value="<?php echo rand(1,10); ?>" name="from_mypage">

							<div class="decide-button">
								<input type="submit" class="inside-decide-button" value="この内容に変更する" />
							</div>
						</div>
					</div>
				</form>
			</main>

			<footer>
				Ⓒ2018 InterNous.Inc. All rights reserved
			</footer>
		</div>
	</body>
</html>