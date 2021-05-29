<section class="chat">
	<div class="header Tcenter">Ваш чат</div>
	<div class="main" id="chat">
		<?php foreach ($params as $message) : ?>
			<div class="message <?php if ($message['id'] == $_SESSION['id']) echo "mymessage"; ?>">
				<span class="author"><?php echo $message['fio']; ?></span>
				<span class="date"><?php echo $message['date']; ?></span>
				<p><?php echo $message['text']; ?></p>
			</div>
		<?php endforeach; ?>
	</div>
	<form action="" method="post" id="formChat">
		<fieldset>
			<input type="text" name="text" id="inputChat" placeholder="Введите сообщение">
			<input type="submit" value="Отправить">
		</fieldset>
	</form>
</section>