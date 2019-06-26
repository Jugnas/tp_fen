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
		<!-- Forumlaire FEN (non fonctionnel) -->
		<form action="debut_partie.php" method="get">
			FEN: <input type="text" name="fen" size="71" maxlength="71"><input type="submit" value="Relancer">
		</form>
		<!-- Début de l'échéquier -->
		<table>
		<?php
			//Format de l'echéquier
			$ligmax = 8;
			$colmax = 8;
			//Tableau associatif de pièces
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
			//Formulaire FEN (à travailler)
			// if (isset($_GET['fen'])) {
			// 	$fen = $_GET['fen'];
			// }
			// else{
			// 	$fen = '';
			// }
			//Formule FEN (initialement vide)
			$fen = '';
			//Variables des pièces/cases à inserer dans le tableau (point à améliorer)
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
			//Insertion de chaque ligne dans l'interface (en allant de 8 à 1 par convention)
			for($lig = $ligmax; $lig > 0; $lig --){
				echo "<tr>";
				//Insertion des cases sur chaque ligne dans l'interface (de 1 à 8 cette fois-ci)
				for ($col = 1; $col <= $colmax; $col ++){
					//Variable contenant la notation fen
					$fen_notation;
					//Serie de conditions permettant d'écrire la postion initiale d'une partie d'échec en FEN
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
					//Image de la pièce correspondant à la notation FEN
					$piece_img = $piece[$fen_notation];
					//Operation ternaire permettant l'affichage de la couleur des cases (en respectant la convention des cases)
					$couleur = (($lig + $col) % 2 == 0) ? "clair":"sombre";
					//Affichage des cases
					echo '<td class="' . $couleur . '"><img src="' . $piece_img. '">&nbsp;</td>';
					//Insertion de chaque caractère pour la formule complète
					$fen = $fen . $fen_notation;
					//On stocke la valeur case_vide...
					if ($fen_notation == '') {
						$case_vide++;
					}
					//...et on l'affiche le nombre de cases successives dans la formule finale jusqu'à la pièce suivante ou à la ligne suivante
					if (($fen_notation != '' && $case_vide != 0) || ($case_vide != 0 && $col == $colmax)){
						$fen = $fen . $case_vide;
						$case_vide = 0;
					}
				}
				//Affichage des slash (/) pour séparer les lignes
				if ($lig > 1){
					$fen = $fen . "/";
				}
				//Fin de chaque ligne
				echo "</tr>";
			}
		?>
		<!-- Fin de l'échéquier -->
		</table>
	</div>
	<!-- Forumule finale du FEN -->
	<p class="fen"><?php echo "FEN : " . $fen; ?></p>
</body>
</html>
