<?php 
	$id_util = $_SESSION['id_ut'];
	$sql_mdp = "SELECT * FROM utilisateur WHERE id_ut = '$id_util'";
	$query_mdp = $dbh->prepare($sql_mdp);
	$query_mdp->execute();
	$row=$query_mdp->fetch(PDO::FETCH_ASSOC);

?>

<div class="sidebar" id="sidebar">
	<div class="sidebar-inner slimscroll">
		<div class="sidebar-menu">
			<ul>

				<li class="menu-title"> </li>

				<li> 
					<a href="/london-academy/liste/fournisseur/fournisseur.php"><i class="la la-home"></i> <span>Retour a l'accueil</span></a>
				</li>
				
				<li class="menu-title"> </li>
				<li class="menu-title"> </li>
				<li class="menu-title"> </li>
				
				<li class="menu-title">Paramètres</li>
				
				<li class="menu-title"> </li>
				<li class="menu-title"> </li>
				<li class="menu-title"> </li>

				<li> 
					<a href="changer_mdp.php"><i class="la la-lock"></i> <span>Mot de passe</span></a>
				</li>

				<li class="menu-title"> </li>
				<li class="menu-title"> </li>

				<li> 
					<a href="/london-academy/includes/function/connection/logout.php"><i class="la la-power-off"></i> <span>Déconnection</span></a>
				</li>
			</ul>
		</div>
	</div>
</div>