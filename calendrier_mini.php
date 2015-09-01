<?php

$mois = $_GET['mois'];
$annee = $_GET['annee'];
$jour = date('d');
include("./function.php");

?>
<html>
<head>
	<meta charset="utf-8" />
	<title></title>
</head>
<body>

<h1 style="
	text-align:center; 
	font-size:14px; 
	margin:0;
	padding-top:5px; 
	padding-bottom:5px; 
	width: 240px;
	"> 
	<?php echo convert_year_to_nko($annee).' '.affiche_nom_mois($mois) ?> 
</h1>

<div>
	<?php 
	calendrier($mois,$annee,"short"); 
	?>
</div>

</body>
</html>