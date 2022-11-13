		
		<?php
			$tId = htmlspecialchars($t->get('id'));
			$tDepart = htmlspecialchars($t->get('depart'));
			$tArrivee = htmlspecialchars($t->get('arrivee'));
			$tDate = htmlspecialchars($t->get('date'));
			$tNbplaces = htmlspecialchars($t->get('nbplaces'));
			$tPrix = htmlspecialchars($t->get('prix'));
			$tConducteurLogin = htmlspecialchars($t->get('conducteur_login'));
			echo '
				Les informations de ce trajet :
				<ul>
					<li> Son Identifiant : '.$tId.'</li>
					<li> Son lieu de départ : '.$tDepart.'</li>
					<li> Son lieu d'."'".'arrivée : '.$tArrivee.'</li>
					<li> Sa date : '.$tDate.'</li>
					<li> Son nombre de places : '.$tNbplaces.'</li>
					<li> Son prix : '.$tPrix.'</li>
					<li> Le login de son conducteur : '.$tConducteurLogin.'</li>
				</ul>

				<div style="display: flex;flex-direction: row;">
					
					<a href="index.php?controller=trajet&action=update&id='.$tId.'">
						<button>modifier</button>
					</a>
					
					<a href="index.php?controller=trajet&action=delete&id='.$tId.'">
						<button>supprimer</button>
					</a>
					
				</div>
			';
		?>
		