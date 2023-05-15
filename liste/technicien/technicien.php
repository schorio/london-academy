<?php 
	session_start();
	error_reporting(0);
	include_once('../../includes/config.php');
	include_once("../../includes/function/liste/f_technicien.php"); 
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title> Listes des technicien</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/EPN.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
		
		<!-- Lineawesome CSS -->
        <link rel="stylesheet" href="../../assets/css/line-awesome.min.css">
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="../../assets/css/select2.min.css">
		
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="../../assets/css/bootstrap-datetimepicker.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="../../assets/css/style.css">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="../../assets/js/html5shiv.min.js"></script>
			<script src="../../assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <?php include_once("../../includes/header.php");?>
			<!-- /Header -->
			
			<!-- Sidebar -->
            <?php include_once("../../includes/sidebar.php");?>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Technicien</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="technicien.php">Listes</a></li>
									<li class="breadcrumb-item active">Listes des technicien</li>
								</ul>
							</div>
							<div class="col-auto float-right ml-auto">
								<a href="#" class="btn add-btn" data-toggle="modal" data-target="#ajouter_technicien"><i class="fa fa-plus"></i> Ajouter un(e) technicien(ne)</a>
								<div class="view-icons">
									<a href="technicien.php" title="Vue en grille" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
									<a href="technicien-list.php" title="Vue en Tableau" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
								</div>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<!-- Search Filter -->
					<div class="row filter-row">
						<div class="col-sm-6 col-md-8">  
							<div class="form-group form-focus">
								<input type="text" name="search_1" id="search_1" class="form-control floating">
								<label class="focus-label">Entrer les mots clés</label>
							</div>
						</div>
                    </div>
					<!-- Search Filter -->

					<!-- user profiles list starts her -->
					<div class="row staff-grid-row">

					<?php

                        $sql = "SELECT * FROM technicien";
                        $query = $dbh->prepare($sql);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        $cnt=1;
                        if($query->rowCount() > 0)
                        {
                            foreach($results as $row)
                            {	

					?>

						<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
							<div class="profile-widget">
								<div class="profile-img">
									<a href="/epn/profile.php?id=<?php echo htmlentities($row->id_tech); ?>" class="avatar"><img src="/epn/assets/img/technicien/<?php echo htmlentities($row->image_tech); ?>" alt="image"></a>
								</div>
									<div class="dropdown profile-action">
										<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
										<div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modifier_technicien<?php echo htmlentities($row->id_tech); ?>"><i class="fa fa-trash-o m-r-5"></i> Modifier</a>
											<a class="dropdown-item" href="#" data-toggle="modal" data-target="#supprimer_technicien<?php echo htmlentities($row->id_tech); ?>"><i class="fa fa-trash-o m-r-5"></i> Supprimer</a>
										</div>
									</div>
								<div>
									<h4 class="user-name m-t-10 mb-0 text-ellipsis"><?php echo htmlentities($row->libelle_tech); ?></h4>
									<h6 class="user-name text-ellipsis"><?php echo htmlentities($row->libelle_tech); ?></h6>
								</div>
								<div class="small text-muted" style="font-weight: 500">
									fonction
								</div>
							</div>
						</div>	

				    <?php
						
						include("../../includes/modals/technicien/modifier_technicien.php");			
						include("../../includes/modals/technicien/supprimer_technicien.php");

								}
						$cnt +=1; 
							}
					?>		
					</div>

    			</div>
				<!-- /Page Content -->
				
				<!-- Add technicien Modal -->
				<?php include_once("../../includes/modals/technicien/ajouter_technicien.php"); ?>
				<!-- /Add technicien Modal -->
				
		
            </div>
			<!-- /Page Wrapper -->
			
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="../../assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="../../assets/js/popper.min.js"></script>
        <script src="../../assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
		<script src="../../assets/js/jquery.slimscroll.min.js"></script>
		
		<!-- Select2 JS -->
		<script src="../../assets/js/select2.min.js"></script>
		
		<!-- Datetimepicker JS -->
		<script src="../../assets/js/moment.min.js"></script>
		<script src="../../assets/js/bootstrap-datetimepicker.min.js"></script>
		
		<!-- Custom JS -->
		<script src="../../assets/js/app.js"></script>

		<!-- Generer les dates -->
		<script src="../../assets/js/condition_date_.js"></script>
		
		<!-- Recherche instantannée -->
		<script src="../../assets/js/recherche.js"></script>
		
    </body>
</html>