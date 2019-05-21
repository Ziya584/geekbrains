<header class="masthead" style="background-image: url('/public/images/big/<?php echo $data['id']; ?>.jpg')">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="page-heading">
					<h1><?php echo htmlspecialchars($data['title'], ENT_QUOTES); ?></h1>

				</div>
			</div>
		</div>
	</div>
</header>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
			<span class="subheading"><?php echo htmlspecialchars($data['description'], ENT_QUOTES); ?></span>        </div>
    </div>
</div>