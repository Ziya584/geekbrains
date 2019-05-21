<div class="container">
	<div class="card card-login mx-auto mt-5">
		<div class="card-header"><?=$title?></div>
		<div class="card-body">
			<form action="/registration" method="post">
				<div class="form-group">
					<label>Логин</label>
					<input class="form-control" type="text" name="login" autocomplete="off" placeholder="Введите ваш никнэйм">
				</div>
				<div class="form-group">
					<label>Пароль</label>
					<input class="form-control" type="password" name="password" autocomplete="off" placeholder="Введите ваш пароль">
				</div>
				<div class="form-group">
					<label>Введите пароль повторно</label>
					<input class="form-control" type="password" name="repassword" autocomplete="off" placeholder="Введите ваш пароль повторно">
				</div>
				<button type="submit" class="btn btn-primary btn-block">Зарегистрироваться</button>
			</form>
		</div>
	</div>
</div>