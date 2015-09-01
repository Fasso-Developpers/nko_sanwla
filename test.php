<html>
<head>
	<meta charset="utf-8" />
	<title></title>
</head>
<body>

<?php
include("function.php");
function convert_number_to_nko($i)
{
	// This function convert the latin number to nko number
	if (is_numeric($i)) 
	{
		if(abs($i) > 9)
		{

		}
		$nko_number = array('߀','߁','߂','߃','߄','߅','߆','߇','߈','߉','߁߀','߁߁','߁߂','߁߃','߁߄','߁߅',
							'߁߆','߁߇','߁߈','߁߉','߂߀','߂߁','߂߂','߂߃','߂߄','߂߅','߂߆','߂߇','߂߈','߂߉','߃߀','߃߁');
		$latin_to_nko = $nko_number[$i];
		return $latin_to_nko;
	}else{
		echo "This variable is not a number";
	}

}

?>

<p>Voici certaines conversion du chiffre arabe en chiffre nko</p>
<?php echo convert_number_to_nko(20).'<br />' ?>
<?php 
/*
	$exp_ch = explode(' ', '1 25 0');

	$mois = date("m"); $annee = date("Y");
	$nbre_jour = cal_days_in_month(CAL_GREGORIAN, $mois+4, $annee);
	foreach ($exp_ch as $key => $value) 
	{
		echo '<br/>'.$value.'<br/>';
	}
	echo $nbre_jour;
*/
	echo get_today();
	$today = date('Y m d');
	//$today= $today['year'].$today['mon'].$today['mday'];
	
	echo $today;
	// jour-mois-annee
	//print_r ($today['mday'].' '.$today['mon'].' '.$today['year']);
?>


</body>
</html>