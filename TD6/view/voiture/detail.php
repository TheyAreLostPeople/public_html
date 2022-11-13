		
		<?php
			$vImmatriculation = htmlspecialchars($v->getImmatriculation());
			$vMarque = htmlspecialchars($v->getMarque());
			$vCouleur = htmlspecialchars($v->getCouleur());
			echo '
				Les informations de ce véhicule :
				<ul>
					<li> Son immatriculation : '.$vImmatriculation.'</li>
					<li> Sa marque : '.$vMarque.'</li>
					<li> Sa couleur : '.$vCouleur.'</li>
				</ul>

				<div style="display: flex;flex-direction: row;">
					
					<a href="index.php?controller=voiture&action=update&immat='.$vImmatriculation.'">
						<button>modifier</button>
					</a>
					
					<a href="index.php?controller=voiture&action=delete&immat='.$vImmatriculation.'">
						<button>supprimer</button>
					</a>
					
				</div>
			';
		?>
		