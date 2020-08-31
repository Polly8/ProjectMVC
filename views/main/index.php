
<br>
<br>
<form enctype="multipart/form-data" action="main" method="post">

	<b>Сообщение:</b><br><br>

	<textarea name="message"></textarea><br><br>


	Добавить изображение:<br><br>
	<input name="userfile" type="file" /><br><br>


	<input type="submit" value="Отправить">

</form>

<br>
<hr>



<?php foreach($datas as $data): ?>

	<form action="deletemessage" class="message-form" method="post">

		<div class="message">
			<div class="info">
				<div class="name">Сообщение от: <b><?php echo $data['name'] ?></b></div>
				<div class="date"><?php echo $data['date'] ?></div>

			</div>

			<div class="text">
				<?php echo $data['text'] ?>
			</div>

			<? if (file_exists('../../images/' . $data['id'] . '.png')):?>
				<img src="/image.php/?id=<?=$data['id'];?>" alt="No image">


			<? endif; ?>
		</div>

	<?php if( strpos($_SESSION['user_id'], 'admin')): ?>

		<input type="text" class="hidden" name="message-id" value="<?php echo $data['id'] ?>">
		<input type="submit" value="удалить" class="delete-btn">

	<?php endif ?>

	</form>

<?php endforeach ?>















