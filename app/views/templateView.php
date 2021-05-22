<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php if (!ini_get("display_errors")) : ?>
		<link rel="stylesheet" href="/static/css/style.css">
	<?php endif; ?>
	<title>My forum</title>
	<script defer src="/static/js/jQuery.js"></script>
	<script defer src="/static/js/script.js"></script>
</head>

<body>
	<header class="flex-container-row flex-between bg-gray">
		<div class="flex-item flex-grow flex-item-row-first">.</div>
		<div class="flex-item flex-grow flex-container-row flex-center menu">
			<a class="flex-item" href="/">Чат</a>
			<div id="linkInTasks">
				<a id="" class="flex-item" href="/inTasks">Входящие задачи</a>
				<div class = "vip-menu">
					<a class="vip-item" href ="/outTasks">Исходящие задачи</a>
					<a class="vip-item" href ="/outTask/Create">Создать задачу</a>
				</div>
			</div>
			<?php if (isset($_SESSION['user']) && ISADMIN) : ?>
			<a class="flex-item" href="/user">Список пользователей</a>
			<?php endif; ?>
		</div>
		<div class="flex-item flex-grow flex-item-row-last">
			<a href="/auth/logout" class="auth-btn">Выход</a>
		</div>
	</header>
	<div id="wrapper">
		<main>
			<?php include 'app/views/' . $contentView; ?>
		</main>
	</div>
	<div id="copyright" class="gray Tright">
		created by NerveFalcon
	</div>
</body>

</html>