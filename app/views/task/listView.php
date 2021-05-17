<?php
$pages = $params[0];
$params = $params[1];
?>
<section class="inTasks">
	<?php echo View::Filter(); ?>
	<?php foreach ($params as $task) : ?>
		<div class="task">
			<div class="top flex-container-row flex-around">
				<h2 class="flex-item-row flex-item-row-first"><?php echo $task['title'] ?></h2>
				<span class="status flex-item-row flex-item-row-last"><?php echo $task['status'] ?></span>
			</div>
			<div class="desc">
				<?php echo $task['desc'] ?>
			</div>
			<div class="top flex-container-row flex-around">
				<a href="/<?php echo $task['type']; ?>Task/<?php echo $task['id'] ?>" class="button flex-item-row flex-item-row-first">Подробнее</a>
				<div class="flex-item-row flex-around">
					<a href="#" class="button"><?php echo $task['OtherStatus'] ?></a>
					<a href="#" class="button"><?php echo $task['DoneStatus'] ?></a>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
	<?php echo View::buildPageBtnsContainer($pages[0], $pages[1], "inTasks"); ?>
</section>