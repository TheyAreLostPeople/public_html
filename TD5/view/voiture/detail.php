		
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
			';
		?>
		