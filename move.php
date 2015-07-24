<?php

//метод сдвигающий элементы на одну позицию вверх в столбце
function move_one_up($sto)
{
	for($i=0; $i<=3; $i++){
		for($k=0; $k<=4; $k++){
			if($sto[$i][$k]==null){
				$sto[$i][$k]=$sto[$i+1][$k];
				$sto[$i+1][$k]="";
			}
		}
	}	
	return $sto;
}

////метод сдвигающий элементы на одну позицию вниз в столбце
function move_one_down($sto)
{
	for($i=4; $i>=1; $i--){
		for($k=0; $k<=4; $k++){
			if($sto[$i][$k]==null){
				$sto[$i][$k]=$sto[$i-1][$k];
				$sto[$i-1][$k]="";
			}
		}
	}	
	return $sto;
}

//метод сдвигающий элементы на одну позицию влево в строке
function move_one_left($sto)
{
	for($i=0; $i<=4; $i++){
		for($k=0; $k<=3; $k++){
//
//			var_dump($sto[$i][$k]);
			if($sto[$i][$k]==null){
				$sto[$i][$k]=$sto[$i][$k+1];
				$sto[$i][$k+1]="";
			}
		}
	}	
	return $sto;
}

//метод сдвигающий элементы на одну позицию вправо в строке
function move_one_right($sto)
{
	for($i=0; $i<=4; $i++){
		for($k=4; $k>=1; $k--){
			if($sto[$i][$k]==null){
				$sto[$i][$k]=$sto[$i][$k-1];
				$sto[$i][$k-1]="";
			}
		}
	}	
	return $sto;
}

/* Метод сдвигающий все вэлементы в массиве
 в направлении зависящем от ключевого 
 слова в диррективе $direction 
 которая может принимать значения: "up", "down", "left", "right" */
function move($sto, $direction){
	for($i=0; $i<=4; $i++){
		if($direction=="up"){
			$sto=move_one_up($sto);
		}elseif($direction=="down"){
			$sto=move_one_down($sto);
		}elseif($direction=="left"){
			$sto=move_one_left($sto);
		}elseif($direction=="right"){
			$sto=move_one_right($sto);
		}else{
			echo "Error invalid operand";
		}
	}
	return($sto);
}