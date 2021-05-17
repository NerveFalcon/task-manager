<section class="inTask">
	<div class="top flex-container-row">
		<h1 class="flex-item-row flex-item-row-first"><?php echo $params['title'] ?></h1>
		<span class="status flex-item-row flex-item-row-last"><?php echo $params['status'] ?></span>
	</div>
	<span><?php echo $params['from'] ?></span>
	<div class="desc">
		<p><?php echo $params['desc'] ?></p>
		<div class="files">
			<?php if (isset($params['attachment'])) foreach ($params['attachment'] as $file) : ?>
				<a href="<?php echo $file['url'] ?>"><?php echo $file['title'] ?></a>
			<?php endforeach; ?>
		</div>
	</div>
	<div class="comments">
		<h3>Комментарии</h3>
		<?php foreach ($params['comments'] as $comment) : ?>
			<div class="comment">
				<div class="flex-container-row flex-start">
					<span><b><?php echo $comment['author']; ?></b> <?php echo $comment['date'] ?></span>
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
		<a href="/inTasks" class="button flex-item-row">Вернуться</a>
		<a href="#" class="button flex-item-row"><?php echo $params['DoneStatus'] ?></a>
	</div>
</section>