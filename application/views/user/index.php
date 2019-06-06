<header class="masthead" style="background-color: #333333;">

</header>
<div class="card bg-light">
	<article class="card-body mx-auto" style="max-width: 400px;">
		<h4 class="card-title mt-3 text-center">Create Account</h4>
		<form action="/user/registration">
			<div class="form-group input-group">
				<input name="nickname" class="form-control" placeholder="Nick name" type="text">
			</div> <!-- form-group// -->
			<div class="form-group input-group">
				<input name="email" class="form-control" placeholder="Email address" type="email">
			</div> <!-- form-group// -->
<!--			<div class="form-group input-group">-->
<!--				<input name="" class="form-control" placeholder="Phone number (+code)" type="text">-->
<!--			</div> <!-- form-group// -->-->
			<!-- form-group end.// -->
			<div class="form-group input-group">
				<input name="password" class="form-control" placeholder="Create password" type="password">
			</div> <!-- form-group// -->
			<div class="form-group input-group">
				<input name="repassword" class="form-control" placeholder="Repeat password" type="password">
			</div> <!-- form-group// -->
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block"> Create Account  </button>
			</div> <!-- form-group// -->
			<p class="text-center">Have an account? <a href="#">Log In</a> </p>
		</form>
	</article>
</div> <!-- card.// -->