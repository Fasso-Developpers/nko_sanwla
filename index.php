
<?php 
	$mois = date("m");
	$annee = date("Y");
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="icon" href="images/fassoIcone.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/style_sanwla.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
	<title>ߝߊ߬ߛߏ | ߒߞߏ ߛߊ߲߬ߥߟߊ</title>

</head>

<body>
	<h1 id="titre">ߛߊ߲߬ߥߟߊ߫ ߓߊ߬ߓߊ߫ ߡߊ߬ߡߊ߬ߘߌ߫ ߖߊ߰ߣߍ߬</h1>

	<div>
		<!--  Nous avons inverser les fleche pour des raison d'orientation en nko qui est rtl
		<img id="prev" src="images/gnei.png" height="40px" width="40px" style="float:left">
		<img id="next" src="images/koh.png" height="40px" width="40px" style="float:right">
		-->
		<img id="prev" class="prevNext" src="images/koh.png" height="50px" width="50px" style="float:right">
		<img id="next" class="prevNext" src="images/gnei.png" height="50px" width="50px" style="float:left">
	</div>
	<div id="content">
	</div>

<script type="text/javascript">
	jQuery(function($){
		var mois = <?php echo $mois; ?>;
		var annee = <?php echo $annee; ?>;
		$(document).ready(function(){
			$("#content").load("calendrier.php?mois="+mois+"&annee="+annee+"");
		});

		// les fleches qui decendent et remonte dans le temps
		$("#prev").click(function(){
			mois--;
			if(mois<1)
			{
			annee--;
			mois=12;
			}
			$("#content").load("calendrier.php?mois="+mois+"&annee="+annee+"");
		});
		$("#next").click(function(){
			mois++;
			if(mois>12)
			{
			annee++;
			mois=1;
			}
			$("#content").load("calendrier.php?mois="+mois+"&annee="+annee+"");
		})
	});
	</script>

</body>
</html>