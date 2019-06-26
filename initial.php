<!doctype html>
<html lang="fr">
<head>
  <title>Echiquier</title>
  <style type="text/css">
	table 	      { border-collapse: collapse;}
	td 	      { width:50px; height:50px; padding:0}
	.clair	      { background:#FCFAE1;}
	.sombre	      { background:#BD8D46;}
	.img	      { margin:0;padding:0;}
	#contenu      { width:500px; margin: 0 auto; }
  </style>
</head>
<body>
<div id="contenu">
<table>
<?php
$ligmax=8;
$colmax=8;



for ($lig=$ligmax; $lig>0; $lig--){

	echo "<tr>";


	for ($col=1; $col<=$colmax; $col++){

		$couleur=(($lig+$col)%2==0)?"clair":"sombre"; //Operateur ternaire

		echo "<td class=\"$couleur\">&nbsp;</td>";
	}
	echo "</tr>";
}

?>
</table>


</div>
</body>
</html>
