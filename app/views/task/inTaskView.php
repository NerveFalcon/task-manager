<section class="inTask task">
	<div class="top flex-container-row">
		<h1 class="flex-item flex-item-row-first font32	"><?php echo $params['title'] ?></h1>
		<span class="flex-item flex-item-row-last"><?php echo $params['status'] ?></span>
	</div>
	<span><?php echo $params['id_from'] ?></span>
	<div class="desc">
		<p><?php echo $params['text'] ?></p>
		<?php if (isset($params['file_way'])) : ?>
			<div class="files">
				<?php foreach ($params['file_way'] as $file) : ?>
					<a href="/static/files/<?php echo $file['url'] ?>" target="_blank"><?php echo $file['title'] ?></a>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
	<div class="comments">
		<h3>Комментарии</h3>
		<?php foreach ($params['comments'] as $comment) : ?>
			<div class="comment">
				<div class="flex-container-row flex-start">
					<span><b><?php echo $comment['fio']; ?></b> <?php echo $comment['date'] ?></span>
				</div>
				<p><?php echo $comment['text'] ?></p>
			</div>
		<?php endforeach; ?>
		<form action="" method="post">
			<input type="text" multiple>
			<input type="submit" value="Комментировать">
		</form>
	</div>
	<div class="top flex-container-row flex-around">
		<a href="/inTasks" class="button flex-item">Вернуться</a>
		<a href="#" class="button flex-item"><?php echo $params['DoneStatus'] ?></a>
	</div>
</section>