<?php
	include_once 'functionsfortasks.php';
?>
	<form action="#" method="POST">

		<input type="text" name="var1" placeholder="var1" autocomplete="off">
		<input type="text" name="var2" placeholder="var2" autocomplete="off">
		<select name="operation">
			<option value="+">Сумма</option>
			<option value="-">Разность</option>
			<option value="/">Отношение</option>
			<option value="*">Умножение</option>
		</select>
		<input type="submit" value="Вычислить">
	</form>

<?php
	if (isset($_POST['var1']) && isset($_POST['var2']) && isset($_POST['operation'])) {
		$var1 = (int)$_POST['var1'];
		$var2 = (int)$_POST['var2'];
		?> <p> Результат вычисления: <?= mathOperation($var1, $var2, $_POST['operation']); ?> </p> <?php
	}
?>

<hr>

<form action="#" method="POST">
	<?php
		//чтобы сохранить в инпутах
		if (isset($_POST['num1']) && isset($_POST['num2']) && isset($_POST['operation1'])) {
			$num1 = $_POST['num1'];
			$num2 = $_POST['num2'];
		}else {
			$num1 = 'num1';
			$num2 = 'num2';
		}
	?>
	<input type="text" name="num1" placeholder="<?=$num1?>" autocomplete="off">
	<input type="text" name="num2" placeholder="<?=$num2?>" autocomplete="off">
	<input type="submit" value="+" name="operation1">
	<input type="submit" value="-" name="operation1">
	<input type="submit" value="/" name="operation1">
	<input type="submit" value="*" name="operation1">
	<?php
		if (isset($_POST['num1']) && isset($_POST['num2']) && isset($_POST['operation1'])) {
			$var1 = (int)$_POST['num1'];
			$var2 = (int)$_POST['num2'];
			?> <p> Результат вычисления: <?= mathOperation($var1, $var2, $_POST['operation1']); ?> </p> <?php
		}
	?>

</form>
