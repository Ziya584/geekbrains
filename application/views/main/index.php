<div class="container">

	<div class="row">
		<!--		<div class="col-lg-4 col-md-4 mx-auto">-->
		<?php if (empty($list)): ?>
			<p>Список товаров пуст</p>
		<?php else: ?>
		<?php foreach ($list as $val): ?>
			<div class="card offer">
				<a href="/offer/<?= $val['id'] ?>"><img src="public/images/big/<?= $val['id'] ?>.png"
														class="card-img-top" alt=""></a>
				<div class="card-body">
					<h5 class="card-title"><?php echo htmlspecialchars($val['title'], ENT_QUOTES); ?></h5>
					<p class="card-text"><?php echo htmlspecialchars($val['short_description'], ENT_QUOTES); ?></p>
					<a href="#" class="btn btn-primary offer_btn_more">В корзину</a>
					<a href="#" class="btn btn-primary offer_btn_more">Купить</a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="row">
		<br>
		<hr>
		<br>
	</div>
	<!--		</div>-->
	<div class="row">
		<div class="clearfix">
			<?php echo $pagination; ?>
		</div>
	</div>
	<?php endif; ?>


</div>