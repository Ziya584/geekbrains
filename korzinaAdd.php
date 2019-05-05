<?php include_once "classes\DB.php"; ?>

<?php

	if(isset($_POST['korzina'])&& isset($_POST['offer_id'])){
		$offer_id = $_POST['offer_id'];
		DB::insert('korzina','user_id, offer_id', "0,$offer_id");
	}

	header("Location: UserAccount.php");
