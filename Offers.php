<?php include_once 'admin_header.php';
	include_once 'classes\CRUD.php' ?>
<?php $offers = CRUD::getOffersList(); ?>


<?php if (isset($offers)) {

	foreach ($offers as $offer) {
		?>
		<ul class="list-unstyled">
			<li class="media">
				<img src="<?= $offer['offer_img_small'] ?>" class="mr-3" alt="...">
				<a href="EditOffer.php?id=<?= $offer['id'] ?>">
					<div class=" media-body">
						<h5 class="mt-0 mb-1"><?= $offer['title']; ?></h5>
						<p><?= $offer['short_description']; ?></p>
						<p>Цена: <?= $offer['price']; ?> р.</p>
					</div>
				</a>
			</li>
		</ul>
	<?php }
} ?>



<?php include_once 'footer.php'; ?>


