<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Principale</span>
							</li>


							<li class="submenu">
								<a href="#"><i class="la la-dashboard"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="/london-academy/index.php"> -- Accueil</a></li>
									<li><a href="/london-academy/employee-dashboard.php"> -- Mon dashboard</a></li>
								</ul>
							</li>
							

							<li class="menu-title"> 
								<span>Section</span>
							</li>

							<li> 
								<a href="/london-academy/liste/fournisseur/fournisseur.php"><i class="la la-industry"></i> <span>Fournisseur</span></a>
							</li>

							<li class="menu-title"> 
								<span></span>
							</li>

							<li> 
								<a href="/london-academy/liste/categorie/categorie.php"><i class="la la-clipboard"></i> <span>Categorie</span></a>
							</li>
							
							<li class="menu-title"> 
								<span></span>
							</li>

							<li> 
								<a href="/london-academy/liste/technicien/technicien.php"><i class="la la-user"></i> <span>Technicien</span></a>
							</li>
							
							<li class="menu-title"> 
								<span></span>
							</li>

							<li> 
								<a href="/london-academy/liste/inventaire/inventaire.php"><i class="la la-barcode"></i> <span>Inventaire</span></a>
							</li>
							
							<li class="menu-title"> 
								<span></span>
							</li>

							<li> 
								<a href="/london-academy/liste/entree/entree.php"><i class="la la-plus"></i> <span>Entrée</span></a>
							</li>
							
							<li class="menu-title"> 
								<span></span>
							</li>

							<li> 
								<a href="/london-academy/liste/sortie/sortie.php"><i class="la la-share"></i> <span>Sortie</span></a>
							</li>


							<li class="menu-title"> 
								<span></span>
							</li>

							<li class="menu-title"> 
								<span>Autre</span>
							</li>
							<li> 
								<a href="/london-academy/includes/function/utilisateur/changer_mdp.php"><i class="la la-cogs"></i> <span>Paramètre</span></a>
							</li>

							<?php if ($_SESSION["role"] === $config["ROLES"][0]) :?>
							<li class="menu-title"> 
								<span>Administrateur</span>
							</li>
							<li> 
								<a href="/london-academy/liste/utilisateur/ut.php"><i class="la la-user-plus"></i> <span>Utilisateurs</span></a>
							</li>
							<?php endif ?>


							<li class="menu-title"> 
								<span>Sortir</span>
							</li>
							<li> 
								<a href="/london-academy/includes/function/connection/logout.php"><i class="la la-power-off"></i> <span>Déconnection</span></a>
							</li>
									
						</ul>
					</div>
                </div>
            </div>