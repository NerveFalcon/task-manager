<section class="createUser">
	<form action="" method="post">
		<fieldset class="Tcenter">
			<legend>Добавление пользователя</legend>
			<div class="fio">
				<label for="family">Фамилия</label>
				<input type="text" name="family" id="family">
				<label for="name">Имя</label>
				<input type="text" name="name" id="name">
				<label for="patronomyc">Отчество</label>
				<input type="text" name="patronomyc" id="patronomyc">
			</div>
			<div>
				<label for="email">Почта</label>
				<input type="email" name="email" id="email">
				<label for="password">Пароль</label>
				<input type="password" name="password" id="password">
				<label for="position">Должность</label>
				<input type="text" name="position" id="position">
			</div>
			<div>
				<select name="selected" id="selected" multiple></select>
				<select name="possible" id="possible" multiple>
					<?php foreach ($params as $position) : ?>
						<option onclick="selectPossible(this)" value="<?php echo $position['id'] ?>"><?php echo $position['name'] ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</fieldset>
	</form>
</section>