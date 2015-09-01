
<?php 
	$mois = date("m");
	$annee = date("Y");
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="./nko_sanwla/css/style_sanwla_mini.css"> 
	<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
	<title>ߛߊ߲߬ߥߟߊ</title>

</head>

<div id="body">

	<div id="titre_calendar">
		<h1><a href="./nko_sanwla/" target="_blank" title="ߛߊ߲߬ߥߟߊ߬ ߞߎ߲ߓߊ ߟߊߞߊ߬ ߦߊ߲߬">ߒߞߏ ߛߊ߲߬ߥߟߊ</a></h1>
		<p id="copyright_calendar">ߝߊ߬ߛߏ ߓߟߏ߫</p>
	</div>
	
	<div>
		<!--  Nous avons inverser les fleche pour des raison d'orientation en nko qui est rtl
		<img id="prev" src="images/gnei.png" height="40px" width="40px" style="float:left">
		<img id="next" src="images/koh.png" height="40px" width="40px" style="float:right">
		-->
		<img id="prev" class="prevNext" src="./nko_sanwla/images/koh.png" height="25px" width="25px" style="float:right">
		<img id="next" class="prevNext" src="./nko_sanwla/images/gnei.png" height="25px" width="25px" style="float:left">
	</div>
	<div id="content_calendar">
	</div>
</div>

<script type="text/javascript">
	jQuery(function($){
		var mois = <?php echo $mois; ?>;
		var annee = <?php echo $annee; ?>;
		$(document).ready(function(){
			$("#content_calendar").load("./nko_sanwla/calendrier_mini.php?mois="+mois+"&annee="+annee+"");
		});

		// les fleches qui decendent et remonte dans le temps
		$("#prev").click(function(){
			mois--;
			if(mois<1)
			{
			annee--;
			mois=12;
			}
			$("#content_calendar").load("./nko_sanwla/calendrier_mini.php?mois="+mois+"&annee="+annee+"");
		});
		$("#next").click(function(){
			mois++;
			if(mois>12)
			{
			annee++;
			mois=1;
			}
			$("#content_calendar").load("./nko_sanwla/calendrier_mini.php?mois="+mois+"&annee="+annee+"");
		})
	});
	</script>


</html>