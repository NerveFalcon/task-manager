<?php
$pages = $params[0];
$params = $params[1];
?>
<section class="tasks">
	<div class="links flex-container-row flex-around">
		<a href="/inTasks" class="<?php if ($params[0]['type'] == 'in') echo 'selected '; ?>flex-item">Входящие</a>
		<a href="/outTasks" class="<?php if ($params[0]['type'] == "out") echo 'selected '; ?>flex-item">Исходящие</a>
	</div>
	<?php echo View::BuildFilter($pages[1]); ?>
	<div class="list">
		<?php var_dump($params) ?>
		<?php foreach ($params as $task) : ?>
			<?php ($task['diff'] > 30) ? $left = "Осталось больше месяца" : $left = "Осатлось " . $task['diff'] . " дней"; ?>
			<div class="task">
				<div class="bg-color1 notify notify-left <?php if (!$task['seen']) echo "hidden"; ?>">!</div>
				<div class="bg-color1 notify notify-right <?php if ($task['diff'] < 30) echo "bg-red"; ?>">
					<abbr title="<?php echo "$task[deadline] $left"; ?>">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 36 36" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);">
							<path d="M11.42 3.43a5.77 5.77 0 0 0-7.64.41a5.72 5.72 0 0 0-.38 7.64a16.08 16.08 0 0 1 8.02-8.05z" class="clr-i-outline--badged clr-i-outline-path-1--badged" />
							<path d="M18.86 9.5a.9.9 0 0 0-1.8 0v9l7.06 3.5a.9.9 0 1 0 .79-1.62l-6.06-3z" class="clr-i-outline--badged clr-i-outline-path-2--badged" />
							<path d="M28 27.78a13.89 13.89 0 0 0 3.21-14.39a7 7 0 0 1-2.11.05a12 12 0 1 1-6.54-6.54a7.54 7.54 0 0 1-.06-.9a7.52 7.52 0 0 1 .11-1.21a14 14 0 0 0-14.5 23.09l-2.55 2.55A1 1 0 1 0 7 31.84l2.66-2.66a13.9 13.9 0 0 0 16.88-.08l2.74 2.74a1 1 0 0 0 1.41-1.41z" class="clr-i-outline--badged clr-i-outline-path-3--badged" />
							<circle cx="30" cy="6" r="5" class="clr-i-outline--badged clr-i-outline-path-4--badged clr-i-badge" />
							<rect x="0" y="0" width="36" height="36" fill="rgba(0, 0, 0, 0)" />
						</svg>
					</abbr>
				</div>
				<div class="top flex-container-row flex-around">
					<h2 class="flex-item flex-item-row-first"><?php echo $task['title'] ?></h2>
					<span class="status flex-item flex-item-row-last"><?php echo $task['status'] ?></span>
				</div>
				<div class="desc">
					<?php $key = (strlen($task['text']) > 256) ? 'short_text' : 'text'; ?>
					<?php echo $task[$key]; ?>
					<!-- <?php var_dump($task); ?> -->
				</div>
				<div class="top flex-container-row flex-between">
					<a href="/<?php echo $task['type']; ?>Task/<?php echo $task['id'] ?>" class="button flex-item flex-item-row-first">Подробнее</a>
					<div class="flex-item flex-item-row-last">
						<?php if (!empty($task['butIn'])) : ?>
							<a href="/chStatus/<?php echo $task['id'] ?>" class="button flex-item"><?php echo $task['butIn'] ?></a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	<?php echo View::buildPageBtnsContainer($pages[0], $pages[1]); ?>
</section>