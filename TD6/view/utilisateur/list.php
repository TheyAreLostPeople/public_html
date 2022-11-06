		
		<?php
			foreach ($tab_u as $u) {
				$uLogin = htmlspecialchars($u->getLogin());
				echo '
					<p>
						Utilisateur :
						<a href="index.php?controller=utilisateur&action=read&login='.rawurlencode($u->getLogin()).'">
							'.$uLogin.'
						</a>
						.
					</p>
				';
			}
		?>
		