<header class="masthead" style="background-color: #333;">
	<div class="container">
		<div class="row">

			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="site-heading">
					<h1><?=$title?></h1>
					<span class="subheading">Все изображения находятся тут.</span>
				</div>
			</div>
		</div>
	</div>
</header>
	<div class="container" style="background-color: #1e7e34">
		<?php if (empty($list)): ?>
			<p> Список фотографий пуст</p>
		<?php else: ?>
		<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
			<div class="carousel-inner">
				<div class="row">
					<!--		<div class="col-lg-4 col-md-4 mx-auto">-->
<?php //var_dump($list); ?>

					<div class="carousel-item active">
						<img src="public/images/big/<?=$list[0]['url']?>" class="d-block w-100" alt="...">
					</div>
					<?php foreach ($list as $val): ?>
						<div class="carousel-item">
							<img src="public/images/big/<?=$val['url']?>" class="d-block w-100" alt="...">
						</div>
					<?php endforeach; ?>

				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		<?php endif; ?>
	</div>