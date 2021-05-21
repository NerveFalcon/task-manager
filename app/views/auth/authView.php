<section class="auth flex-container-column flex-center">
	<form action="" method="post" class="flex-item">
		<fieldset>
			<div>
				<input type="email" name="email" placeholder="Ваш email">
			</div>
			<div>
				<input type="password" name="password" placeholder="Ваш пароль">
			</div>
			<div class="Tcenter">
				<input type="submit" value="Войти">
			</div>
		</fieldset>
	</form>
	<?php View::JsAlertOnLoad("Пока что входит с любыми данными")?>
</section>