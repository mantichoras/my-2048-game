<?php

//Проверяем наличие одинакового содержимого в соседних ячейках столбца
function check_same_neighbor_column($sto){
$equal_column=0;
	for($i=0; $i<=3; $i++){
		for($k=0; $k<=4; $k++){
			if($sto[$i][$k]==$sto[$i+1][$k]){
				$equal_column++;
			}
		}
	}
	return $equal_column;
}

//Проверяем наличие одинакового содержимого в ячейках строки
function check_same_neighbor_string($sto){
$equal_string=0;
	for($i=0; $i<=4; $i++){
		for($k=0; $k<=3; $k++){
			if($sto[$i][$k]==$sto[$i][$k+1]){
				$equal_string++;
			}
		}
	}
	return $equal_string;
}

//Проверяем наличие одинакового содержимого в ячейках столбцов и строк
function check_same_neighbor($sto){
	if((check_same_neighbor_column($sto)==0)&&(check_same_neighbor_string($sto)==0)){
		return "no way";
	}else{
		return "ok";
	}
}
