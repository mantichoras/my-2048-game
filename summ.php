<?php

//Суммирующие метоты

//Метод для суммирования массива вверх
function sum_elements_up($sto, $score)
{	
	for($k=0; $k<=4; $k++){
		for($i=0; $i<=3; $i++){
			if($sto[$i][$k]==!null){
				if($sto[$i][$k]==$sto[$i+1][$k]){
					$sto[$i][$k]=(string)($sto[$i][$k]*2);
					$score=$score+$sto[$i][$k];  
					$sto[$i+1][$k]="";
				}
			}	
		}
	}	
	return [$sto, $score];
}

//Метод для суммирования массива вниз
function sum_elements_down($sto, $score)
{	
	for($k=0; $k<=4; $k++){
		for($i=4; $i>=1; $i--){
			if($sto[$i][$k]==!null){
				if($sto[$i][$k]==$sto[$i-1][$k]){
					$sto[$i][$k]=(string)($sto[$i][$k]*2);
					$score=$score+$sto[$i][$k];
					$sto[$i-1][$k]="";
				}
			}	
		}
	}	
	return [$sto, $score];
}

//Метод для суммирования массива влево
function sum_elements_left($sto, $score)
{	
	for($k=0; $k<=3; $k++){
		for($i=0; $i<=4; $i++){
			if($sto[$i][$k]==!null){
				if($sto[$i][$k]==$sto[$i][$k+1]){
					$sto[$i][$k]=(string)($sto[$i][$k]*2);
					$score=$score+$sto[$i][$k];
					$sto[$i][$k+1]="";
				}
			}	
		}
	}	
	return [$sto, $score];
}

//Метод для суммирования массива вправо
function sum_elements_right($sto, $score)
{	
	for($k=4; $k>=1; $k--){
		for($i=0; $i<=4; $i++){
			if($sto[$i][$k]==!null){
				if($sto[$i][$k]==$sto[$i][$k-1]){
					$sto[$i][$k]=(string)($sto[$i][$k]*2);
					$score=$score+$sto[$i][$k];
					$sto[$i][$k-1]="";
				}
			}	
		}
	}	
	return [$sto, $score];
}

/*Метод выбирающий из суммирующих массивов 
в зависимости от ключевого параметра $direction 
который может принимать значения "up", "down", "left", "right" */

function sum($store, $direction, $score)
{
	if($direction=="up"){
		$result=sum_elements_up($store, $score);
	}elseif($direction=="down"){
		$result=sum_elements_down($store, $score);
	}elseif($direction=="left"){
		$result=sum_elements_left($store, $score);
	}elseif($direction=="right"){
		$result=sum_elements_right($store, $score);
	}else{
		echo "Error invalid operand";
	}
	return $result;
}
