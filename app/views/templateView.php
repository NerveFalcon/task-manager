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
			<a class="flex-item-row" href="/">Чат</a>
			<a class="flex-item-row" href="/outTasks">Исходящие задачи</a>
			<a class="flex-item-row" href="/inTasks">Входящие задачи</a>
			<!-- < ?php if (isset($_SESSION['user']) && $_SESSION['user']->isAdmin()) : ?> -->
				<a class="flex-item-row" href="/user">Список пользователей</a>
				<a class="flex-item-row" href="/position">Список должностей</a>
			<!-- < ?php endif; ?> -->
		</div>
		<div class="flex-item-row flex-item-row-last">
			<a href="/auth/logout" class="auth-btn">Выход</a>
		</div>
	</header>
	<div id="wrapper" class="flex-container-column flex-between">
		<main>
			<div id="content">
					<?php include 'app/views/' . $contentView; ?>
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