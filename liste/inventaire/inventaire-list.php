﻿<?php 
	session_start();
	error_reporting(0);
	include_once('../../includes/config.php');
	include_once('../../includes/function/liste/f_inventaire.php');
	if(strlen($_SESSION['userlogin'])==0){
		header('location: ../../login.php');
	}

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
        <title>Inventaires</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/logo.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
		
		<!-- Lineawesome CSS -->
        <link rel="stylesheet" href="../../assets/css/line-awesome.min.css">
		
		<!-- Datatable CSS -->
		<link rel="stylesheet" href="../../assets/css/dataTables.bootstrap4.min.css">
		
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
								<h3 class="page-title">Inventaire</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Listes</a></li>
									<li class="breadcrumb-item active">Listes des inventaires</li>
								</ul>
							</div>
							<div class="col-auto float-right ml-auto">
								<a href="#" class="btn add-btn" data-toggle="modal" data-target="#ajouter_inventaire"><i class="fa fa-plus"></i> Ajouter un(e) inventaire</a>
								<div class="view-icons">
									<a href="inventaire.php" title="Grid View" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
									<a href="inventaire-list.php" title="Tabular View" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
								</div>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<!-- Search Filter -->
					<div class="row filter-row">
						<div class="col-sm-6 col-md-8">  
							<div class="form-group form-focus">
								<input type="text" name="search" id="search" class="form-control floating">
								<label class="focus-label">Entrer les mots clés</label>
							</div>
						</div>
                    </div>
					<!-- /Search Filter -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<!-- <table class="table table-striped custom-table datatable"> -->
								<table class="table table-striped custom-table datatable" id="myTable">
									<thead>
										<!-- <tr> -->
										<th>Nom et fournisseur</th>
										<th>Categorie</th>
										<th>Stock initial</th>
										<th>Stock actuel</th>
										<th>Description</th>
										<th>Quantité entrée</th>
										<th>Quantité sortie</th>
										<th>Observation</th>
										<th class="text-right no-sort">Action</th>
										<!-- </tr> -->
									</thead>
									<tbody>
									<?php

										$sql = "SELECT * FROM inventaire
													JOIN fournisseur ON fournisseur_inv=id_frn
													JOIN categorie ON categorie_inv=id_cat
												ORDER BY piece_inv ASC
										";
										$query = $dbh->prepare($sql);
										$query->execute();
										$results=$query->fetchAll(PDO::FETCH_OBJ);
										$cnt=1;
										if($query->rowCount() > 0)
										{
											foreach($results as $row)
											{	

									?>	
										<tr>
											<td>
												<h2 class="table-avatar">
													<a href=""> <?php echo htmlentities($row->piece_inv); ?><span><?php echo htmlentities($row->libelle_frn); ?></span></a>
												</h2>
											</td>														
											<td><?php echo htmlentities($row->libelle_cat); ?></td>
											<td><?php echo htmlentities($row->si_inv); ?></td>
											<td><?php echo htmlentities($row->sa_inv); ?></td>
											<td><?php echo htmlentities($row->description_inv); ?></td>
											<td><?php echo htmlentities($row->entree_inv); ?></td>
											<td><?php echo htmlentities($row->sortie_inv); ?></td>
											<td><?php echo htmlentities($row->observation_inv); ?></td>
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#modifier_inventaire<?php echo htmlentities($row->id_inv); ?>"><i class="fa fa-trash-o m-r-5"></i> Modifier</a>
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#supprimer_inventaire<?php echo htmlentities($row->id_inv); ?>"><i class="fa fa-trash-o m-r-5"></i> Supprimer</a>
													</div>
												</div>
											</td>
										</tr>
											
									<?php
						
										include("../../includes/modals/inventaire/modifier_inventaire.php");			
										include("../../includes/modals/inventaire/supprimer_inventaire.php");

												}
										$cnt +=1; 
											}
									?>	
									</tbody>

								</table>
							</div>
						</div>
					</div>
                </div>
				<!-- /Page Content -->
				
				<!-- Add inventaire Modal -->
				<?php include_once("../../includes/modals/inventaire/ajouter_inventaire.php"); ?>
				<!-- /Add inventaire Modal -->
				
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
		
		<!-- Datatable JS -->
		<script src="../../assets/js/jquery.dataTables.min.js"></script>
		<script src="../../assets/js/dataTables.bootstrap4.min.js"></script>
				
		<!-- Custom JS -->
		<script src="../../assets/js/app.js"></script>
		
		<!-- Generer les dates -->
		<script src="../../assets/js/condition_date_.js"></script>

		<!-- Recherche instantannée -->
		<script src="../../assets/js/recherche.js"></script>

		<script>
			$(document).ready(function(){
			$('.action').change(function(){
				if($(this).val() != '')
				{
				var action = $(this).attr("id");
				var query = $(this).val();
				var result = '';

				if(action == "id_departement")
				{
					result = 'id_etablissement';
				}

				$.ajax({
				url:"../../includes/fetchdata.php",
				method:"POST",
				data:{action:action, query:query},
					success:function(data)
					{
					$('#'+result).html(data);
					}
				})
				
				}
			});
			});
		</script>

    </body>
</html>
