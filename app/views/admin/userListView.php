<?php
$pages = $params[0];
$params = $params[1];
?>
<section class="userList Tcenter">
	<a href="/user/create" class="button add">Добавить пользователя</a>
	<table border="1px">
		<thead>
			<tr>
				<th>№</th>
				<th>ФИО</th>
				<th>email</th>
				<th>Должности</th>
				<th>action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($params as $user) : ?>
				<tr>
					<td><?php echo $user['id'] ?></td>
					<td><?php echo $user['fio'] ?></td>
					<td><?php echo $user['email'] ?></td>
					<td></td>
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