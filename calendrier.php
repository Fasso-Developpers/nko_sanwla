<?php

$mois = $_GET['mois'];
$annee = $_GET['annee'];

include("function.php");

?>
<html>
<head>
	<meta charset="utf-8" />
	<title></title>
</head>
<body>

<h1 style="
	text-align:center; 
	font-size:26px; 
	margin:0; padding:5px; 
	border:1px solid #fff;
	"> 
	<?php echo convert_year_to_nko($annee).' '.affiche_nom_mois($mois) ?> 
</h1>

<div>
	<?php calendrier($mois,$annee,"long"); ?>
</div>

</body>
</html>