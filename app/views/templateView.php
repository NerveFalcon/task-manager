<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php if (!ini_get("display_errors")) : ?>
		<link rel="stylesheet" href="/static/css/style.css">
		<link rel="stylesheet" href="/static/css/auth.css">
	<?php endif; ?>
	<title>My forum</title>
	<script defer src="/static/js/jQuery.js"></script>
	<script defer src="/static/js/script.js"></script>
</head>

<body>
	<header class="flex-container-row flex-between">
		<div class="logo flex-item-row flex-item-row-first">
		</div>
		<div class="flex-item-row flex-grow2 flex-container-row flex-center">
			<a class="flex-item-row" href="/">Главная</a>
			<a class="flex-item-row" href="#">Страница 2</a>
			<a class="flex-item-row" href="#">Страница 3</a>
		</div>
		<div class="flex-item-row flex-item-row-last">
			<a href="#" class="auth-btn">Регистрация/Авторизация</a>
		</div>
	</header>
	<div id="wrapper" class="flex-container-column flex-between">
		<main>
			<div id="content">
				<div class="box">
					<?php include 'app/views/' . $contentView; ?>
				</div>
				<br class="clearfix">
			</div>
		</main>
		<footer>
			<div id="copyright" class="gray Tright">
				created by NerveFalcon
			</div>
		</footer>
	</div>
</body>

</html>