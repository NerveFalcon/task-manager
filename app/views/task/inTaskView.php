<?php
$twoWays = $params['status'] == "await" || $params['status'] == "performed";
?>
<section class="inTask task">
	<div class="top flex-container-row">
		<h1 class="flex-item flex-item-row-first font32	"><?php echo $params['title'] ?></h1>
		<span class="flex-item flex-item-row-last"><?php echo $params['status'] ?></span>
	</div>
	<span><?php echo $params['fio'] ?></span>
	<div class="desc">
		<p><?php echo $params['text'] ?></p>
		<?php if (isset($params['files'])) : ?>
			<div class="files">
				<?php foreach ($params['files'] as $file) : ?>
					<a href="/static/files/<?php echo $file['url'] ?>" target="_blank"><?php echo $file['title'] ?></a>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
	<div class="comments">
		<h3>Комментарии</h3>
		<br>
		<?php if (!empty($params['comments'])) : ?>
		<?php foreach ($params['comments'] as $comment) : ?>
			<div class="comment">
				<div class="flex-container-row flex-start">
					<span><b><?php echo $comment['fio']; ?></b> <?php echo $comment['date'] ?></span>
				</div>
				<p><?php echo $comment['text'] ?></p>
			</div>
		<?php endforeach; ?>
		<?php endif; ?>
		<form class="comment-form Tright" action="<?php if ($twoWays) ?>" method="post">
			<textarea name="comment" rows="10"></textarea>
			<div class="Tright">
				<?php if ($twoWays) : ?>
					<input type="submit" name="action" value="На корректировку">
				<?php else : ?>
					<input type="submit" name="action" value="Комментировать">
				<?php endif; ?>
			</div>
		</form>
	</div>
	<div class="top flex-container-row flex-around">
		<a href="/inTasks" class="button flex-item">Вернуться</a>
		<?php if (!empty($params['DoneStatus'])) : ?>
			<a href="/chStatus/<?php echo $params['id']?>" class="button flex-item"><?php echo $params['DoneStatus'] ?></a>
		<?php endif; ?>
	</div>
</section>