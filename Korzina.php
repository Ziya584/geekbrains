<?php include_once "classes\DB.php";
	  include_once 'user_header.php';

	$sql = "SELECT offers.id, offers.title, offers.short_description,offers.full_description, offers.price,
 				korzina.id as korzina_id FROM `offers` INNER JOIN korzina WHERE offers.id =korzina.offer_id";
	$korzina_offers = DB::get($sql);
	$images = DB::get("SELECT pics.id, pics.url_small FROM pics WHERE pics.id in(SELECT offers.img_url_id FROM `offers` INNER JOIN korzina WHERE offers.id =korzina.offer_id)");

	$i=0;
foreach ($korzina_offers as $offer){

?>
	<ul class="list-unstyled">
		<li class="media">
			<img src="<?= $images["$i"]['url_small'] ?>" class="mr-3" alt="...">
			<a href="EditOffer.php?id=<?= $offer['id'] ?>">
				<div class=" media-body">
					<h5 class="mt-0 mb-1"><?= $offer['title']; ?></h5>
					<p><?= $offer['short_description']; ?></p>
					<p>Цена: <?= $offer['price']; ?> р.</p>
				</div>
			</a>
		</li>
	</ul>
<?php $i++;}