<?php
//Стартуем сессию
session_start();
//Подключаем Twig
require_once "./vendor/autoload.php";
$loader = new Twig_Loader_Filesystem('html');
$twig = new Twig_Environment($loader);
//Подключаем внешние файлы с методами
include 'count_empty.php';
include 'summ.php';
include 'gen.php';
include 'move.php';
include 'check.php';
include 'onpage.php';
//разрушаем сессию используется при отладке
//session_destroy();

//Проверяем нажатие кнопки NEW_GAME
if(isset($_POST['NEW_GAME'])){
	session_unset("store");
}
//Проверяем наличия массива в сессии "направление"
if (isset($_SESSION["store"])&&isset($_POST['DIRECTION'])){
//Вытягиваем данные из сессии
		$direction = $_POST['DIRECTION'];
		$input_score = $_SESSION["score"];
		$input_store = $_SESSION["store"];
//Фиксируем исходное значение для дальнейшего сравнения
		$input_old_store = $_SESSION["store"];
//Производим сдвиг элементов в сторону выбранную игроком для устранения пустых ячеек
		$first_move_store = move($input_store, $direction);
//Суммируем рядомстоящие элементы
		$res = sum($first_move_store, $direction, $input_score);
		$aftersumm_store = $res[0];
		$aftersumm_score = $res[1];
//Производим сдвиг поскольку после суммирования появились пустые ячейки
		$second_move_store = move($aftersumm_store, $direction);
//Проверяем выпонлилось ли изменение состояния матрицы
		if($second_move_store!=$input_old_store){
	//Если изменения произошли, генерируется число 2 или 4 и вставляется в пустую ячейку выбранную случайным образом
			$after_gen_store = input_rand_number_in_rand_position($second_move_store);
		}else{
	//Если изменений небыло, присваивается значение полученное на предыдущей итерации
			$after_gen_store = $second_move_store;
		}
//Проверка есть ли пустые ячейки в массиве и есть ли одинаковые значения в рядомстоящих ячейках
		if((count(get_empty_cells($after_gen_store)) == 0)&&(check_same_neighbor($after_gen_store) == "no way")){
	//Записываем значения в сессию
			$_SESSION["score"] = $aftersumm_score;
			$_SESSION["store"] = $after_gen_store;
	//Записываем значения и передаем их шаблонизатору
			$error='Game over your score: '.$aftersumm_score;
			onpage($after_gen_store, $error, $aftersumm_score);
		}else{
	//Записываем значения в сессию
			$_SESSION["score"] = $aftersumm_score;
			$_SESSION["store"] = $after_gen_store;
	//Записываем значения и передаем их шаблонизатору
			$error='';
			onpage($after_gen_store, $error, $aftersumm_score);
		}
}else{
//Устанавливаем нулевое значение колличества очков
	$score = 0;
//Устанавливаем пустой массив
//	$store = [
//	["", "", "", "", ""],
//	["", "", "", "", ""],
//	["", "", "", "", ""],
//	["", "", "", "", ""],
//	["", "", "", "", ""],
//	];
	$board = Board::create();

//Генерируем первое значение и записываем его в пустую ячейку выбранную случайным образом
	input_rand_number_in_rand_position($board);

//Генерируем второе значение и записываем его в пустую ячейку выбранную случайным образом
	input_rand_number_in_rand_position($board);

//Отправляем значения в сессию
	$_SESSION["store"] = $board;
	$_SESSION["score"] = $score;
//Записываем значения и передаем их шаблонизатору
	$error='';
	onpage($second_gen_store, $error, $score);
}