<div class="card bg-light">
	<article class="card-body mx-auto" style="max-width: 400px;">
		<h4 class="card-title mt-3 text-center"><?=$title?></h4>
		<form action="/user/login" method="post">
			<div class="form-group input-group">
				<input name="email" class="form-control" autocomplete="off" placeholder="Email address" type="email">
			</div>
			<div class="form-group input-group">
				<input name="password" class="form-control" autocomplete="off" placeholder="Create password" type="password">
			</div> <!-- form-group// -->
			<div class="form-group">
				<button type="submit"  class="btn btn-primary btn-block"> Войти  </button>
			</div> <!-- form-group// -->
			<p class="text-center">Забыли пароль? <a href="/user/forgotpassword">Да</a> </p>
		</form>
	</article>
</div>