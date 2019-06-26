<!doctype html>
<html lang="fr">
<head>
  <title>Echiquier</title>
  <style type="text/css">
	table 	      {border-collapse: collapse;}
	td 	      	  {width:50px; height:50px; padding:0}
	.clair	      {background:#FCFAE1;}
	.sombre	      {background:#BD8D46;}
	.img	      {margin:0;padding:0;}
	.fen	      {text-align: center;}
	#contenu      {width:500px; margin: 0 auto;}
  </style>
</head>
<body>
<div id="contenu">
<table>
<?php
	$piece_liste = array("P", "N", "B", "R", "Q", "K", "p", "n", "b", "r", "q", "k", "");
	// Mettre un string repeat
	$ligmax = 8;
	$colmax = 8;
	$case_vide = 0;
	$fen = "";
	$nb_pion_b = 0;
	$nb_cavalier_b = 0;
	$nb_fou_b = 0;
	$nb_tour_b = 0;
	$nb_dame_b = 0;
	$nb_roi_b = 0;
	$nb_pion_n = 0;
	$nb_cavalier_n = 0;
	$nb_fou_n = 0;
	$nb_tour_n = 0;
	$nb_dame_n = 0;
	$nb_roi_n = 0;
	$nb_case_vide = 0;
	//$fen_char = str_repeat($piece, 64);
	for ($lig = $ligmax; $lig > 0; $lig --){
		echo "<tr>";
		for ($col = 1; $col <= $colmax; $col ++){
			$ajoutPieces = "false";
			while ($ajoutPieces == "false"){
				$piece = array_rand($piece_liste, 1);
				$fen_char = $piece_liste[$piece];
				switch ($fen_char){
					case 'P':
						if($nb_pion_b < 8){
							$nb_pion_b ++;
							$piece_image = "img/pion_b.png";
							$ajoutPieces = "true";
						}
						else{
							$ajoutPieces = "false";
						}
						break;
					case 'N':
						if($nb_cavalier_b < 2){
							$nb_cavalier_b ++;
							$piece_image = "img/cavalier_b.png";
							$ajoutPieces = "true";
						}
						else{
							$ajoutPieces = "false";
						}
						break;
					case 'B':
						if($nb_fou_b < 2){
							$nb_fou_b ++;
							$piece_image = "img/fou_b.png";
							$ajoutPieces = "true";
						}
						else{
							$ajoutPieces = "false";
						}
						break;
					case 'R':
						if($nb_tour_b < 2){
							$nb_tour_b ++;
							$piece_image = "img/tour_b.png";
							$ajoutPieces = "true";
						}
						else{
							$ajoutPieces = "false";
						}
						break;
					case 'Q':
						if($nb_dame_b < 1){
							$nb_dame_b ++;
							$piece_image = "img/dame_b.png";
							$ajoutPieces = "true";
						}
						else{
							$ajoutPieces = "false";
						}
						break;
					case 'K':
						if($nb_roi_b < 1){
							$nb_roi_b ++;
							$piece_image = "img/roi_b.png";
							$ajoutPieces = "true";
						}
						else{
							$ajoutPieces = "false";
						}
						break;
					case 'p':
						if($nb_pion_n < 8){
							$nb_pion_n ++;
							$piece_image = "img/pion_n.png";
							$ajoutPieces = "true";
						}
						else{
							$ajoutPieces = "false";
						}
						break;
					case 'n':
						if($nb_cavalier_n < 2){
							$nb_cavalier_n ++;
							$piece_image = "img/cavalier_n.png";
							$ajoutPieces = "true";
						}
						else{
							$ajoutPieces = "false";
						}
						break;
					case 'b':
						if($nb_fou_n < 2){
							$nb_fou_n ++;
							$piece_image = "img/fou_n.png";
							$ajoutPieces = "true";
						}
						else{
							$ajoutPieces = "false";
						}
						break;
					case 'r':
						if($nb_tour_n < 2){
							$nb_tour_n ++;
							$piece_image = "img/tour_n.png";
							$ajoutPieces = "true";
						}
						break;
					case 'q':
						if($nb_dame_n < 1){
							$nb_dame_n ++;
							$piece_image = "img/dame_n.png";
							$ajoutPieces = "true";
						}
						else{
							$ajoutPieces = "false";
						}
						break;
					case 'k':
						if($nb_roi_n < 1){
							$nb_roi_n ++;
							$piece_image = "img/roi_n.png";
							$ajoutPieces = "true";
						}
						else{
							$ajoutPieces = "false";
						}
						break;
					case '':
						if($nb_case_vide < 62){
							$nb_case_vide;
							$piece_image = "img/vide.png";
							$ajoutPieces = "true";
						}
						else{
							$ajoutPieces = "false";
						}
						break;
					default:
						$ajoutPieces = "false";
						break;
				}
			}
			if ($fen_char == $piece_liste[12]) {
				$case_vide++;
			}
			if (($fen_char != $piece_liste[12] && $case_vide != 0) || ($case_vide != 0 && $col == $colmax)){
				$fen = $fen . "$case_vide";
				$case_vide = 0;
			}
			$fen = $fen . "$fen_char";
			if ($col == $colmax && $lig != 1) {
				$fen = $fen . "/";
			}
		$couleur = (($lig+$col)%2==0)?"clair":"sombre"; //Operateur ternaire
		echo "<td class=\"$couleur\"><img src=\"$piece_image\">&nbsp;</td>";
	}
	echo "</tr>";
}
?>
</table>
</div>
<p class="fen"><?php echo "FEN : " . $fen; ?></p>
</body>
</html>
