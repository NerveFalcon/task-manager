<?php
$pages = $params[0];
$params = $params[1];
?>
<section class="tasks">
	<div class="links flex-container-row flex-around">
		<a href="/inTasks" class="<?php if ($params[0]['type'] == 'in') echo 'selected '; ?>flex-item">Входящие</a>
		<a href="/outTasks" class="<?php if ($params[0]['type'] == "out") echo 'selected '; ?>flex-item">Исходящие</a>
	</div>
	<?php echo View::Filter(); ?>
	<div class="list">
		<?php foreach ($params as $task) : ?>
			<div class="task">
				<div class="top flex-container-row flex-around">
					<h2 class="flex-item flex-item-row-first"><?php echo $task['title'] ?></h2>
					<span class="status flex-item flex-item-row-last"><?php echo $task['id_status'] ?></span>
				</div>
				<div class="desc">
					<?php echo $task['text'] ?>
				</div>
				<div class="top flex-container-row flex-between">
					<a href="/<?php echo $task['type']; ?>Task/<?php echo $task['id'] ?>" class="button flex-item flex-item-row-first">Подробнее</a>
					<div class="flex-item flex-item-row-last">
						<a href="#" class="button"><?php echo $task['OtherStatus'] ?></a>
						<a href="#" class="button"><?php echo $task['DoneStatus'] ?></a>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	<?php echo View::buildPageBtnsContainer($pages[0], $pages[1]); ?>
</section>