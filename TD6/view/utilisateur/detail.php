		
		<?php
			$uLogin = htmlspecialchars($u->getLogin());
			$uNom = htmlspecialchars($u->getNom());
			$uPrenom = htmlspecialchars($u->getPrenom());
			echo '
				Les informations de cet utilisateur :
				<ul>
					<li> Son login : '.$uLogin.'</li>
					<li> Son nom : '.$uNom.'</li>
					<li> Son prenom : '.$uPrenom.'</li>
				</ul>

				<div style="display: flex;flex-direction: row;">
					
					<a href="index.php?controller=utilisateur&action=update&login='.$uLogin.'">
						<button>modifier</button>
					</a>
					
					<a href="index.php?controller=utilisateur&action=delete&login='.$uLogin.'">
						<button>supprimer</button>
					</a>
					
				</div>
			';
		?>
		