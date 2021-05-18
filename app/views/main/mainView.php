<section id="main" class="Tcenter">
	<div>
		<?php foreach ($params as $message) : ?>
			<div class="message">
				<div class="Tleft"><?php echo "$message[author] $message[date]"; ?></div>
				<p><?php echo $message['text']; ?></p>
			</div>
		<?php endforeach; ?>
	</div>
	<form action="" method="post">
		<input type="text">
		<input type="submit" value="Отправить">
	</form>
</section>