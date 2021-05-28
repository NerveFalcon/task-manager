<?php
$pages = $params[0];
$params = $params[1];
?>
<section class="userList Tcenter">
	<table border="1px">
		<thead>
			<tr>
				<th>№</th>
				<th>Название</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($params as $post) : ?>
				<tr>
					<td><?php echo $post['id'] ?></td>
					<td>
						<a href="/user/edit/<?php echo $user['id']; ?>" class="green">edit</a>
						<a href="/user/delete/<?php echo $user['id'] ?>" class="red">delete</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<?php echo View::buildPageBtnsContainer($pages[0], $pages[1]) ?>
</section>