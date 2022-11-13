		
		<?php
			foreach ($tab_v as $v) {
				$vImmatriculation = htmlspecialchars($v->getImmatriculation());
				echo '
					<p>
						Voiture d\'immatriculation :
						<a href="index.php?controller=voiture&action=read&immat='.rawurlencode($v->getImmatriculation()).'">
							'.$vImmatriculation.'
						</a>
						.
					</p>
				';
			}
		?>
		