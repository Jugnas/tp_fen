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
		<form action="fen.php" method="get">
			FEN: <input type="text" name="fen" size="71" maxlength="71"><input type="submit" value="Relancer">
		</form>
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
					// $fen_notation = array_rand($piece);
					$fen_notation = 'p';
					if ($lig == 2 || $lig == 7){
						$fen_notation = ($lig == 7) ? "p":"P";
					}
					elseif ($lig <= 6 && $lig >= 3){
						$fen_notation = '';
					}
					else{
						if ($col == 1 || $col == 8) {
							$fen_notation = ($lig == 8) ? "r":"R";
						}
						elseif ($col == 2 || $col == 7) {
							$fen_notation = ($lig == 8) ? "n":"N";
						}
						elseif ($col == 3 || $col == 6) {
							$fen_notation = ($lig == 8) ? "b":"B";
						}
						elseif ($col == 4) {
							$fen_notation = ($lig == 8) ? "q":"Q";
						}
						else{
							$fen_notation = ($lig == 8) ? "k":"K";
						}
					}
					$piece_img = $piece[$fen_notation];
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
	</div>
	<p class="fen"><?php echo "FEN : " . $fen; ?></p>
</body>
</html>
