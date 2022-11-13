		
		<?php
			foreach ($tab_t as $t) {
				$tId = htmlspecialchars($t->get('id'));
				echo '
					<p>
						Trajet :
						<a href="index.php?controller=trajet&action=read&id='.rawurlencode($t->get('id')).'">
							'.$tId.'
						</a>
						.
					</p>
				';
			}
		?>
		