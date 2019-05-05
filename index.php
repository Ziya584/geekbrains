<?php
	include_once("classes\ImageRedakt.php");

?>

<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<title>Галерея</title>
</head>
<body>
<div class="container">
	<h1> Add your photo to the Gallery! :) </h1>
	<div class="row">
		<form action="#" method="post" enctype="multipart/form-data">
			<input type="file" name="photo" accept="image/*">
			<input type="submit" value="download">
		</form>
	</div>
	<div class="row">
		<br>
		<br>
	</div>
	<div class="row">
		<div class="gallery">
			<?php
				if(isset($_FILES['photo'])&&!empty($_FILES['photo'])){
					$img=[];
					$img = $_FILES['photo'];
					$big_img = ImageRedakt::save($img);
					ImageRedakt::convert($big_img,$img);
				}
				$data = DB::getAll('pics','id');
				foreach ($data as $key => $value){
					if(strlen($data[$key][1])<4){ continue;}
					?>
					<a href=<?=$data[$key][2]?> target='_blank'> <img src="<?=$data[$key][3];?>"</a>
					<?php
				}
			?>
		</div>
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