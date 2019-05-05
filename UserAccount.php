<?php include_once 'user_header.php' ?>
<?php include_once 'classes\CRUD.php' ?>

<?php $offers = CRUD::getOffersList(); ?>


<?php if (isset($offers)) {

	foreach ($offers as $offer) {
		?>
		<ul class="list-unstyled">
			<li class="media">
				<img src="<?= $offer['offer_img_small'] ?>" class="mr-3" alt="...">
				<a href="kartochka.php?id=<?= $offer['id'] ?>">
					<div class=" media-body">
						<h5 class="mt-0 mb-1"><?= $offer['title']; ?></h5>
						<p><?= $offer['short_description']; ?></p>
						<p>Цена: <?= $offer['price']; ?> р.</p>
						<form action="korzinaAdd.php" method="POST">
							<input type="hidden" name="offer_id" value="<?=$offer['id']?>">
							<input type="submit" name="korzina" value="В корзину">
						</form>
						<form action="kartochka.php" method="POST">
							<input type="hidden" name="offer_title" value="<?=$offer['title']?>">
							<input type="hidden" name="offer_desc" value="<?=$offer['full_description']?>">
							<input type="hidden" name="offer_img" value="<?=$offer['offer_img_small']?>">
							<input type="submit" name="kartochka" value="Подробнее">
						</form>
					</div>
				</a>
			</li>
		</ul>
	<?php }
} ?>
