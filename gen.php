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
/**
 * @param Board $board
 *
 * @return Cell|null
 */
function random_empty_cell(Board $board)
{
	$emptyCells = get_empty_cells($board);
	if(false == empty($emptyCells)){
		$randomIndex = mt_rand(0, (count($emptyCells)-1));

		return $emptyCells[$randomIndex];
	}else{
		return null;
	}
}

/* вставляет значение сгенерированное методом random_base_twoo 
в ячейку выбранную методом random_free_position */
function input_rand_number_in_rand_position(Board $board)
{
	if($cell = random_empty_cell($board)){
		$cell->setV(random_base_twoo());

		return true;
	} else {
		return false;
	}
}
