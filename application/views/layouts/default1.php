<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="/public/styles/style.css" rel="stylesheet">


	<title><?= $title ?></title>
</head>
<body>
<div class="container">
	<hr>
	<div class="row">
		<nav class="navbar navbar-expand-lg navbar-light fixed-top " id="mainNav">
			<div class="container">
				<a class="navbar-brand" href="/">Аптека №20</a>
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
						data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
						aria-label="Toggle navigation">
					<i class="fa fa-bars"></i>
				</button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="/about">О нас</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/contact">Обратная связь</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/auth">Авторизация</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/registration">Регистрация</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>
	<div class="content">

		<?php echo $content; ?>
		<hr>
	</div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
		crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
		crossorigin="anonymous"></script>
</body>
</html>