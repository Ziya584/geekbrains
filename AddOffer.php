<?php include_once 'admin_header.php'; include_once 'classes\CRUD.php'?>

<div class="row">
	<form action="#" method="post" enctype="multipart/form-data">
			<p><input type="text" name="title" placeholder="Название товара" required autocomplete="off"></p>
			<p><textarea name="short_description" cols="30" rows="5" required placeholder="Коротокое описание"></textarea></p>
			<p><textarea name="full_description" cols="160" rows="5" required placeholder="Полное описание"></textarea></p>
			<p><input type="text" name="price" placeholder="Цена товара" required autocomplete="off"></p>

			<input type="file" name="photo" accept="image/*" required>
			<input type="submit" value="Добавить">
	</form>
</div>

<?php
	if(isset($_POST)&& isset($_FILES['photo'])) {
		foreach ($_POST as $key => $value) {
			$formdata["$key"] = htmlentities($value);
		}
		foreach ($_FILES['photo'] as $k => $v) {
			$formdata['photo']["$k"] = htmlentities($v);
		}
		$info = CRUD::create($formdata);
	}
?>
<?php if(isset($info)){?>
<h1>Товар добавлен!</h1>
<ul class="list-unstyled">
	<li class="media">
		<img src="<?=$info['photo']['url_small']?>" class="mr-3" alt="...">
		<div class="media-body">
			<h5 class="mt-0 mb-1"><?=$info['title'];?></h5>
			<p><?=$info['short_description'];?></p>
			<p><?=$info['full_description'];?></p>
			<p><?=$info['price'];?></p>
		</div>
	</li>
</ul>
<?php } ?>

<?php include_once 'footer.php'; ?>
