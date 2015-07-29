<?php

//вычисляет все позиции незанятых ячеек и записывает их в массив
function get_empty_cells(Board $board){
	/** @var Cell[] $emptyCells */
	$emptyCells = [];
	for ($i=0; $i <= 4; $i++){
		for ($k=0; $k <= 4; $k++) {
			$cell = $board->getCell($i, $k);

			if($cell->isEmpty()) {
				$emptyCells[] = $cell;
			}
		}
	}

	return $emptyCells;
}