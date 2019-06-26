<!doctype html>
<html lang="fr">
<head>
  <title>Echiquier</title>
  <style type="text/css">
	table{ 
		border-collapse: collapse;
	}
	td{ 
		width: 50px; 
		height: 50px; 
		padding: 0;
	}
	.clair{ 
		background: #FCFAE1;
	}
	.sombre{ 
		background: #BD8D46;
	}
	.img{
		margin: 0;
		padding: 0;
	}
	.fen{
		text-align: center;
	}
	#contenu{ 
		width: 500px; 
		margin: 0 auto; 
	}
  </style>
</head>
<body>
	<div id="contenu">
		<table>
		<?php
			$ligmax = 8;
			$colmax = 8;
			$piece = array(
			    'P'    => 'img/pion_b.png',
			    'N'    => 'img/cavalier_b.png',
			    'B'    => 'img/fou_b.png',
			    'R'    => 'img/tour_b.png',
			    'Q'    => 'img/dame_b.png',
			    'K'    => 'img/roi_b.png',
			    'p'    => 'img/pion_n.png',
			    'n'    => 'img/cavalier_n.png',
			    'b'    => 'img/fou_n.png',
			    'r'    => 'img/tour_n.png',
			    'q'    => 'img/dame_n.png',
			    'k'    => 'img/roi_n.png',
			    ''    => 'img/vide.png',
			);
		    $fen = "";
		    $case_vide = 0;
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
			for($lig = $ligmax; $lig > 0; $lig --){
				echo "<tr>";
				for ($col = 1; $col <= $colmax; $col ++){
					$ajout_piece = "false";
					while ($ajout_piece == "false"){
						// $fen_notation = array_rand($piece);
						$fen_notation = array_rand($piece);
						$piece_img = $piece[$fen_notation];
						switch ($fen_notation){
							case 'P':
								if($nb_pion_b < 8){
									$nb_pion_b ++;
									$ajout_piece = "true";
								}
								else{
									$ajout_piece = "false";
								}
								break;
							case 'N':
								if($nb_cavalier_b < 2){
									$nb_cavalier_b ++;
									$ajout_piece = "true";
								}
								else{
									$ajout_piece = "false";
								}
								break;
							case 'B':
								if($nb_fou_b < 2){
									$nb_fou_b ++;
									$ajout_piece = "true";
								}
								else{
									$ajout_piece = "false";
								}
								break;
							case 'R':
								if($nb_tour_b < 2){
									$nb_tour_b ++;
									$ajout_piece = "true";
								}
								else{
									$ajout_piece = "false";
								}
								break;
							case 'Q':
								if($nb_dame_b < 1){
									$nb_dame_b ++;
									$ajout_piece = "true";
								}
								else{
									$ajout_piece = "false";
								}
								break;
							case 'K':
								if($nb_roi_b < 1){
									$nb_roi_b ++;
									$ajout_piece = "true";
								}
								else{
									$ajout_piece = "false";
								}
								break;
							case 'p':
								if($nb_pion_n < 8){
									$nb_pion_n ++;
									$ajout_piece = "true";
								}
								else{
									$ajout_piece = "false";
								}
								break;
							case 'n':
								if($nb_cavalier_n < 2){
									$nb_cavalier_n ++;
									$ajout_piece = "true";
								}
								else{
									$ajout_piece = "false";
								}
								break;
							case 'b':
								if($nb_fou_n < 2){
									$nb_fou_n ++;
									$ajout_piece = "true";
								}
								else{
									$ajout_piece = "false";
								}
								break;
							case 'r':
								if($nb_tour_n < 2){
									$nb_tour_n ++;
									$ajout_piece = "true";
								}
								break;
							case 'q':
								if($nb_dame_n < 1){
									$nb_dame_n ++;
									$ajout_piece = "true";
								}
								else{
									$ajout_piece = "false";
								}
								break;
							case 'k':
								if($nb_roi_n < 1){
									$nb_roi_n ++;
									$ajout_piece = "true";
								}
								else{
									$ajout_piece = "false";
								}
								break;
							case '':
								if($nb_case_vide < 62){
									$nb_case_vide;
									$ajout_piece = "true";
								}
								else{
									$ajout_piece = "false";
								}
								break;
							default:
								$ajout_piece = "false";
								break;
						}
					}
					$couleur = (($lig + $col) % 2 == 0) ? "clair":"sombre"; //Operateur ternaire
					echo '<td class="' . $couleur . '"><img src="' . $piece_img. '">&nbsp;</td>';
					$fen = $fen . $fen_notation;
					if ($fen_notation == '') {
						$case_vide++;
					}
					if (($fen_notation != '' && $case_vide != 0) || ($case_vide != 0 && $col == $colmax)){
						$fen = $fen . $case_vide;
						$case_vide = 0;
					}
				}
				if ($lig > 1){
					$fen = $fen . "/";
				}
				echo "</tr>";
			}
		?>
		</table>
		<span class="fen"><?php echo "FEN : " . $fen; ?></span>
	</div>
</body>
</html>
