<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="/static/img/favicon.ico">
	<?php if (!ini_get("display_errors")) : ?>
		<link rel="stylesheet" href="/static/css/style.css">
	<?php endif; ?>
	<title>My forum</title>
	<script defer src="/static/js/jQuery.js"></script>
	<script defer src="/static/js/script.js"></script>
</head>

<body>
	<header class="flex-container-row flex-between bg-gray">
		<div class="flex-item flex-grow flex-item-row-first gray">.</div>
		<div class="flex-item flex-grow flex-container-row flex-center menu">
			<a class="flex-item" href="/">Чат</a>
			<div class="linkInTasks flex-item">
				<a href="/inTasks">Входящие задачи</a>
				<div class="vip-menu Tcenter">
					<a class="vip-item" href="/outTasks">Исходящие задачи</a>
					<a class="vip-item" href="/outTask/create">Создать задачу</a>
				</div>
			</div>
			<?php if (isset($_SESSION['user']) && ISADMIN) : ?>
				<div class="linkInTasks flex-item">
					<a class="flex-item" href="/user">Список пользователей</a>
					<div class="vip-menu Tcenter">
						<a href="/position" class="vip-item">Список должностей</a>
					</div>
				</div>
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
	<div id="copyright" class="gray Tright">created by NerveFalcon</div>
</body>

</html>