<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="/static/img/favicon.ico">
	<?php if (!ini_get("display_errors")) : ?>
		<link rel="stylesheet" href="/static/css/style.css">
		<link rel="stylesheet" href="/static/css/auth.css">
	<?php endif; ?>
	<title>My forum</title>
	<script defer src="/static/js/jQuery.js"></script>
	<script defer src="/static/js/script.js"></script>
</head>

<body>
	<div id="wrapper" class="flex-container-column flex-between">
		<h1 class="Tcenter flex-item">Добро пожаловать</h1>
		<main class="flex-item flex-grow">
			<?php include 'app/views/' . $contentView; ?>
		</main>
	</div>
	<div id="copyright" class="gray">
		created by NerveFalcon
	</div>
</body>
<?php echo View::JsAlertOnLoad("Входит с test@test и pass: test")?>

</html>