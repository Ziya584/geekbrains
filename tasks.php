<?php
	/* task2 */
//	1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. Затем написать скрипт, который работает по следующему принципу:
//если $a и $b положительные, вывести их разность;
//если $а и $b отрицательные, вывести их произведение;
//если $а и $b разных знаков, вывести их сумму;
//ноль можно считать положительным числом.
//2. Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора switch организовать вывод чисел от $a до 15.
//3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать оператор return.
//4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).
//5. Посмотреть на встроенные функции PHP. Используя имеющийся HTML шаблон, вывести текущий год в подвале при помощи встроенных функций PHP.
//6. *С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val – заданное число, $pow – степень.
//7. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
//22 часа 15 минут
//21 час 43 минуты
	echo " *************** TASK 1 *************** <br>";
	$a = 3;
	$b = 5;

	if ($a >= 0 && $b >= 0) {
		echo $a - $b;
	} elseif ($a < 0 && $b < 0) {
		echo $a * $b;
	} else {
		echo $a + $b;
	}

	echo "<br> *************** TASK 2 *************** <br><br>";

	$a = 7;
	if ($a > 15) {
		echo "a must be integer less than 16";
	} else {
		switch ($a) {
			case 1:
				echo $a++ . " ";
			case 2:
				echo $a++ . " ";
			case 3:
				echo $a++ . " ";
			case 4:
				echo $a++ . " ";
			case 5:
				echo $a++ . " ";
			case 6:
				echo $a++ . " ";
			case 7:
				echo $a++ . " ";
			case 8:
				echo $a++ . " ";
			case 9:
				echo $a++ . " ";
			case 10:
				echo $a++ . " ";
			case 11:
				echo $a++ . " ";
			case 12:
				echo $a++ . " ";
			case 13:
				echo $a++ . " ";
			case 14:
				echo $a++ . " ";
			case 15:
				echo $a++ . " ";
		}
	}

	echo "<br> *************** TASK 3 *************** <br><br>";

	$x = 5;
	$y = 2;
//budet arifmeticheskoye deystviye pervoqo chisla ko vtoromu
	echo sum($x, $y) . "<br>";
	echo vichet($x, $y) . "<br>";
	echo umnoj($x, $y) . "<br>";
	echo del($x, $y) . "<br>";

	function sum($x, $y)
	{
		return $x + $y;
	}

	function vichet($x, $y)
	{
		return $x - $y;
	}

	function umnoj($x, $y)
	{
		return $x * $y;
	}

	function del($x, $y)
	{
		if ($y == 0) {
			return " На ноль делить нельзя! ";
		}
		return $x / $y;
	}

	echo "<br> *************** TASK 4 *************** <br><br>";
// можем объединить задание 3 с четвёртым
	echo mathOperation($x, $y, '+') . "<br>";

	function mathOperation($arg1, $arg2, $operation)
	{
		switch ($operation) {
			case '+':
				echo sum($arg1, $arg2);
				break;
			case '-':
				echo vichet($arg1, $arg2);
				break;
			case '*':
				echo umnoj($arg1, $arg2);
				break;
			case '/':
				echo del($arg1, $arg2);
				break;
			default:
				echo " Надо указать операцию над числами: + - * / ";
		}
	}

	echo "<br> *************** TASK 5 *************** <br><br>";

	echo "<a href='index.php' target='_blank'> Вот тут мы его уже выполнили </a> <br>";

	echo "<br> *************** TASK 6 *************** <br><br>";

	echo power(2, 3);
	function power($val, $pow)
	{
		if ($pow != 1) {
			$pow--;
			return $val * power($val, $pow);
		}
		return $val;
	}

	echo "<br> *************** TASK 7 *************** <br><br>";

	$currentTime = date('H:m:s');


	echo tellMetime($currentTime);


	function tellMetime($currentTime)
	{
		$e = explode(":", $currentTime);
		$res = '';
		$chasi = $e[0];
		$minuti = $e[1];
		$sekundi = $e[2];

		switch ($chasi % 10) {
			case 1:
				$res .= $chasi . " час ";
				break;
			case 2:
				$res .= $chasi . " часа ";
				break;
			case 3:
				$res .= $chasi . " часа ";
				break;
			case 4:
				$res .= $chasi . " часа ";
				break;
			default:
				$res .= $chasi . " часов ";
				break;
		}
		switch ($minuti % 10) {
			case 1:
				$res .= $minuti . " минута ";
				break;
			case 2:
				$res .= $minuti . " минуты ";
				break;
			case 3:
				$res .= $minuti . " минуты ";
				break;
			case 4:
				$res .= $minuti . " минуты ";
				break;
			default:
				$res .= $minuti . " минут ";
				break;
		}
		switch ($sekundi % 10) {
			case 1:
				$res .= $sekundi . " секунда ";
				break;
			case 2:
				$res .= $sekundi . " секунды ";
				break;
			case 3:
				$res .= $sekundi . " секунды ";
				break;
			case 4:
				$res .= $sekundi . " секунды ";
				break;
			default:
				$res .= $sekundi . " секунд ";
				break;
		}

		return $res;
	}


	// Со следующего урока коммитов будет больше для практики. Уже смог настроить.

?>