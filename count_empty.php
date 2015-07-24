<?php

//вычисляет все позиции незанятых ячеек и записывает их в массив
function count_empty($sto){
	$all = 0;
	$empty_column = [];
	for ($i=0; $i <= 4; $i++){
		for ($k=0; $k <= 4; $k++) {
			if($sto[$i][$k]== null){
				$empty_column[$all]=$i.$k;
				$all++;
			}	
		}
	}
	return $empty_column;
}