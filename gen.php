<?php

//Генерация в случайном порядке чисел 2 и 4
function random_base_twoo()
{
	$base = ["2", "4"];
	$position = mt_rand(0, 1);
	$value = $base[$position];
	return $value;
}

//выбирает случайным образом ячейку из множества пустых
function random_free_position($sto)
{
	$empt = count_empty($sto);
	if($empt==null){
		return "full";
	}else{
		$x_y = $empt[mt_rand(0, (count($empt)-1))];
		return $x_y;
	}
}

/* вставляет значение сгенерированное методом random_base_twoo 
в ячейку выбранную методом random_free_position */
function input_rand_number_in_rand_position($sto)
{
	$i_k=random_free_position($sto);
	if($i_k == 'full'){
		return $sto;
	}else{
		$i=$i_k[0];
		$k=$i_k[1];
		$sto[$i][$k]= random_base_twoo();
		return $sto;
	}
}
