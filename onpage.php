<?php
function onpage($stor, $err, $scor){
	require_once "./vendor/autoload.php";
	$loader = new Twig_Loader_Filesystem('html');
	$twig = new Twig_Environment($loader);
	$color =[];
		for($i=0; $i<=4; $i++){
			for($k=0; $k<=4; $k++){
				$color[$i][$k]= dechex(($stor[$i][$k]*14737632)+500);
			}
		}		

	echo $twig->render('2048.html', array('score' => $scor, 'ERROR'=>$err,
		'AA' => $stor[0][0],
		'AAcolor'=> $color[0][0],
		'AB' => $stor[0][1], 
		'ABcolor' => $color[0][1], 
		'AC' => $stor[0][2], 
		'ACcolor' => $color[0][2], 
		'AD' => $stor[0][3], 
		'ADcolor' => $color[0][3], 
		'AE' => $stor[0][4], 
		'AEcolor' => $color[0][4], 
		'BA' => $stor[1][0], 
		'BAcolor' => $color[1][0], 
		'BB' => $stor[1][1], 
		'BBcolor' => $color[1][1], 
		'BC' => $stor[1][2], 
		'BCcolor' => $color[1][2], 
		'BD' => $stor[1][3], 
		'BDcolor' => $color[1][3], 
		'BE' => $stor[1][4], 
		'BEcolor' => $color[1][4], 
		'CA' => $stor[2][0], 
		'CAcolor' => $color[2][0], 
		'CB' => $stor[2][1], 
		'CBcolor' => $color[2][1], 
		'CC' => $stor[2][2], 
		'CCcolor' => $color[2][2], 
		'CD' => $stor[2][3], 
		'CDcolor' => $color[2][3], 
		'CE' => $stor[2][4], 
		'CEcolor' => $color[2][4], 
		'DA' => $stor[3][0], 
		'DAcolor' => $color[3][0], 
		'DB' => $stor[3][1], 
		'DBcolor' => $color[3][1], 
		'DC' => $stor[3][2], 
		'DCcolor' => $color[3][2], 
		'DD' => $stor[3][3], 
		'DDcolor' => $color[3][3], 
		'DE' => $stor[3][4], 
		'DEcolor' => $color[3][4], 
		'EA' => $stor[4][0], 
		'EAcolor' => $color[4][0], 
		'EB' => $stor[4][1], 
		'EBcolor' => $color[4][1], 
		'EC' => $stor[4][2], 
		'ECcolor' => $color[4][2], 
		'ED' => $stor[4][3], 
		'EDcolor' => $color[4][3], 
		'EE' => $stor[4][4],
		'EEcolor' => $color[4][4]));
}