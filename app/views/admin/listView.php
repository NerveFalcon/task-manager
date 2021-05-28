<?php
$pages = $params[0];
$links = $params[2];
$params = $params[1];
?>
<section class="userList Tcenter">
	<div class="Tright"><a href="/<?php echo $links[0] ?>/create" class="add"><button>Добавить <?php echo $links[1] ?></button></a></div>
	<table border="1px">
		<thead>
			<tr>
				<?php foreach (array_keys($params[0]) as $key) : ?>
					<th><?php echo $key ?></th>
				<?php endforeach; ?>
				<th>action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($params as $user) : ?>
				<tr>
					<?php foreach ($user as $data) : ?>
						<td><?php echo $data ?></td>
					<?php endforeach; ?>
					<td>
						<a href="/<?php echo $links[0] ?>/edit/<?php echo $user['id']; ?>" class="green">edit</a>
						<a href="/<?php echo $links[0] ?>/delete/<?php echo $user['id'] ?>" class="red">delete</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<?php echo View::buildPageBtnsContainer($pages[0], $pages[1]) ?>
</section>