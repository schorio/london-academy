<?php 
	session_start();
	error_reporting(0);
	include_once('../../includes/config.php');
	include_once("../../includes/functions.php");
	if(strlen($_SESSION['userlogin'])==0){
		header('location: ../../login.php');
	}

	if(isset($_GET['code_e']))
	{
		$value_e = $_GET['code_e'];


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
        <title> Listes des employés</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/EPN.png">
		
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
								<h3 class="page-title">Employés</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">Listes</li>
									<li class="breadcrumb-item"><a href="etablissement.php">Liste des etablissements</a></li>
									<li class="breadcrumb-item active"><a href="">Employé(s) de l'Etablissement <?php echo $value_e ?></a></li>
								</ul>
							</div>
							<div class="col-auto float-right ml-auto">
								<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i class="fa fa-plus"></i> Ajouter un(e) employé(e)</a>
						
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
								<table class="table table-striped custom-table datatable" id="myTable">
									<thead>
										<tr>
											<th>Nom</th>
											<th>Matricule</th>
											<th>Categorie</th>
											<th>Statut</th>
											<th>Grade</th>
											<th>Date d'avancement</th>
											<th>Fin de contrat</th>
											<th>Date de retraite</th>
											<th class="text-right no-sort">Action</th>
										</tr>
									</thead>
									<?php
											$ut_departement = $_SESSION['departement'];

											if ($_SESSION["role"] !== $config["ROLES"][0]) {
												$sql = "SELECT * FROM employee 
															JOIN departement ON employee.id_departement=departement.id_departement 
															JOIN etablissement ON employee.id_etablissement=etablissement.id_etablissement 
															JOIN grade ON employee.id_grade=grade.id_grade 
															JOIN categorie ON employee.id_categorie=categorie.id_categorie 
															JOIN statut ON employee.id_statut=statut.id_statut 
														WHERE code_etablissement = '$value_e' and code_departement='$ut_departement' ORDER BY nom ASC ";
											}
											else {
												$sql = "SELECT * FROM employee 
															JOIN departement ON employee.id_departement=departement.id_departement 
															JOIN etablissement ON employee.id_etablissement=etablissement.id_etablissement 
															JOIN grade ON employee.id_grade=grade.id_grade 
															JOIN categorie ON employee.id_categorie=categorie.id_categorie 
															JOIN statut ON employee.id_statut=statut.id_statut 
														WHERE code_etablissement = '$value_e' ORDER BY nom ASC ";
											}
									
											$query = $dbh->prepare($sql);
											$query->execute();
											$results=$query->fetchAll(PDO::FETCH_OBJ);
											$cnt=1;
											if($query->rowCount() > 0)
											{
												foreach($results as $row)
												{	
													$id_employee = htmlentities($row->id_employee);
													$matricule = htmlentities($row->matricule);
													$nom = htmlentities($row->nom);
													$prenom = htmlentities($row->prenom);
													$date_naissance = htmlentities($row->date_naissance);
													$code_departement = htmlentities($row->code_departement);
													$code_etablissement = htmlentities($row->code_etablissement);
													$code_categorie = htmlentities($row->code_categorie);
													$code_grade = htmlentities($row->code_grade);
													$d_contrat = htmlentities($row->d_contrat);
													$avancement = htmlentities($row->avancement);
													$f_contrat = htmlentities($row->f_contrat);
													$d_retraite = htmlentities($row->d_retraite);
													$image = htmlentities($row->image);
									?>
									<tbody>
										<tr>
											<td>
												<h2 class="table-avatar">
													<a href="profile.php?id=<?php echo $id_employee ?>" class="avatar"><img alt="image" src="/london-academy/assets/img/employee/<?php echo htmlentities($row->image);?>"></a>
													<a href="profile.php?id=<?php echo $id_employee ?>"><?php echo htmlentities($row->nom)." ".htmlentities($row->prenom); ?><span><?php echo htmlentities($row->code_departement);?></span></a>
												</h2>
											</td>
											<td><?php echo htmlentities($row->matricule);?></td>
											<td><?php echo htmlentities($row->code_categorie);?></td>
											<td><?php echo htmlentities($row->code_statut);?></td>
											<td><?php echo htmlentities($row->code_grade);?></td>
											<td><?php echo htmlentities($row->avancement);?></td>
											<td><?php echo htmlentities($row->f_contrat);?></td>
											<td><?php echo htmlentities($row->d_retraite);?></td>
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_employee<?php echo $id_employee ?>"><i class="fa fa-pencil m-r-5"></i> Modifier</a>
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee<?php echo $id_employee ?>"><i class="fa fa-trash-o m-r-5"></i> Supprimer</a>
													</div>
												</div>
											</td>
										</tr>
									</tbody>
									<?php 
									
									include("../../includes/modals/employee/edit_employee.php");			
									include("../../includes/modals/employee/delete_employee.php");
									
									$cnt +=1;
												}
											}
										}?>
								</table>
							</div>
						</div>
					</div>
                </div>
				<!-- /Page Content -->
				
				<!-- Add Employee Modal -->
				<?php include_once("../../includes/modals/employee/add_employee.php"); ?>
				<!-- /Add Employee Modal -->
				
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
		<script src="../../assets/js/condition_date.js"></script>

		<!-- Recherche instantannée -->
		<script src="../../assets/js/recherche.js"></script>

    </body>
</html>