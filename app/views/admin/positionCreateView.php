<section class="postCreateView">
	<form action="" method="post">
		<fieldset>
			<table border="1">
				<caption>Добавление должности</caption>
				<?php foreach ($params as $key => $value) : ?>
					<tr>
						<th><?php echo $key ?></th>
						<td>
							<input name="<?php echo $key ?>" type="text">
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
			<div class="Tright">
				<input type="reset" value="Сбросить">
				<input type="submit" value="Добавить">
			</div>
		</fieldset>

	</form>
</section>