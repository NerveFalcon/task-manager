<section class="editView">
	<form action="" method="post">
		<fieldset>
			<table border="1">
				<caption>Редактор <?php echo $params[1] ?></caption>
				<?php foreach ($params[0] as $key => $value) : ?>
					<tr>
						<th><?php echo $key ?></th>
						<td>
							<input name="<?php echo $key ?>" type="text" value="<?php echo $value ?>">
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
			<div class="Tright">
				<input type="reset" value="Сбросить">
				<input type="submit" value="Сохранить">
			</div>
		</fieldset>

	</form>
</section>