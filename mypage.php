<?php

mb_internal_encoding("utf8");

session_start();


if(empty($_SESSION['id'])){

	try{$pdo = new PDO ("mysql:dbname=php_exercise; host=localhost;", "root","mysql");
	   } catch(PDOException $e){
		die(" <p>申し訳ございません。現在サーバーが混み合っており一時的にアクセスが出来ません。<br>しばらくしてから再度ログインをしてください。</p> <a href='http://localhost/login_mypage/login.php'>ログイン画面へ</a> "
		);
	}

	//prepared statement
	$stmt = $pdo->prepare("SELECT * FROM login_mypage WHERE mail = ? && password = ?");

	$stmt -> bindValue(1, $_POST['mail']);
	$stmt -> bindValue(2, $_POST['password']);

	$stmt -> execute();
	$pdo = NULL;

	while($row = $stmt->fetch()){
		$_SESSION['id'] = $row['id'];
		$_SESSION['name'] = $row['name'];
		$_SESSION['mail'] = $row['mail'];
		$_SESSION['password'] = $row['password'];
		$_SESSION['picture'] = $row['picture'];
		$_SESSION['comments'] = $row['comments'];
	}


	if(empty($_SESSION['id'])){
		header("Location: login_error.php");
	}

	if(!empty($_POST['login_keep'])){
		$_SESSION['login_keep'] = $_POST['login_keep'];
	}
}


if(!empty($_SESSION['id']) && !empty($_SESSION['login_keep'])){

	setcookie('mail', $_SESSION['mail'], time()+60*60*24*7);
	setcookie('password', $_SESSION['password'], time()+60*60*24*7);
	setcookie('login_keep', $_SESSION['login_keep'], time()+60*60*24*7);

} else if (empty($_SESSION['login_keep'])){

	setcookie('mail', '', time()-1);
	setcookie('password','', time()-1);
	setcookie('login_keep', '', time()-1);
}
?>


<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="mypage.css">
		<title>マイページ</title>
	</head>

	<body>
		<header>
			<img src="4eachblog_logo.jpg">
			<div class="logout"> <a href="log_out.php">ログアウト</a> </div>
		</header>

		<main>
			<div class="information">
				<h2>会員情報</h2>

				<div class="information-contents">
					<div class="hello">こんにちは！　<?php echo $_SESSION['name']; ?> さん</div>

					<img src="<?php echo $_SESSION['picture']; ?>">

					<div class="personal">
						<div class="name">
							氏名 : <?php echo $_SESSION['name']; ?>
						</div>

						<div class="mail">
							メール : <?php echo $_SESSION['mail']; ?>
						</div>

						<div class="password">
							パスワード : <?php echo $_SESSION['password']; ?>
						</div>
					</div>

					<div class="comments">
						<?php echo $_SESSION['comments']; ?>
					</div>

					<form action="mypage_henshu.php" method="POST" class="form_center">
						<input type="hidden" value="<?php echo rand(1,10); ?>" name="from_mypage">
						<div class="button">
							<input type="submit" class="edit_button" value="編集する" />
						</div>
					</form>
				</div>
			</div>
		</main>

		<footer>
			Ⓒ2018 InterNous.Inc. All rights reserved
		</footer>
	</body>
</html>