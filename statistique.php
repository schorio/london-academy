<?php 
	session_start();
	error_reporting(0);
	include('includes/config.php');
	if(strlen($_SESSION['userlogin'])==0){
		header('location:login.php');
	}

	$sql = mysqli_query($link, "SELECT * FROM fournisseur");
	$i = $k = 0;

	foreach($sql as $data) {
		$libelle[] = $data['libelle_frn'];
		$id[] = $data['id_frn'];

		$libelle_frn = $libelle[$i];
		$id_frn = $id[$i];

		if ($id_frn) {
			$sql_month = "SELECT SUM(quantite_ent) as somme FROM entree 
							JOIN inventaire ON inventaire.id_inv=entree.piece_ent
						WHERE MONTH(date_ent)=:month and fournisseur_inv=:id_frn";
			$query_month = $dbh->prepare($sql_month);

			for ($month = 1; $month <= 12; $month++) {
				$query_month->bindParam(':month', $month, PDO::PARAM_INT);
				$query_month->bindParam(':id_frn', $id_frn, PDO::PARAM_INT);
				$query_month->execute();
				$row_month = $query_month->fetch(PDO::FETCH_ASSOC);

				switch ($month) {
					case 1:
						$total_janvier[$k] = $row_month['somme'];
						break;
					case 2:
						$total_fevrier[$k] = $row_month['somme'];
						break;
					case 3:
						$total_mars[$k] = $row_month['somme'];
						break;
					case 4:
						$total_avril[$k] = $row_month['somme'];
						break;
					case 5:
						$total_mai[$k] = $row_month['somme'];
						break;
					case 6:
						$total_juin[$k] = $row_month['somme'];
						break;
					case 7:
						$total_juillet[$k] = $row_month['somme'];
						break;
					case 8:
						$total_aout[$k] = $row_month['somme'];
						break;
					case 9:
						$total_septembre[$k] = $row_month['somme'];
						break;
					case 10:
						$total_octobre[$k] = $row_month['somme'];
						break;
					case 11:
						$total_novembre[$k] = $row_month['somme'];
						break;
					case 12:
						$total_decembre[$k] = $row_month['somme'];
						break;
				}
			}
		}

		$i++;
		$k++;
	}



	$sql_1 = mysqli_query($link, "SELECT * FROM responsable");
	$i = $k = 0;

	foreach($sql_1 as $data_1) {
		$libelle_1[] = $data_1['libelle_resp'];
		$id_1[] = $data_1['id_resp'];

		$libelle_resp = $libelle_1[$i];
		$id_resp = $id_1[$i];

		if ($id_resp) {
			$sql_month_1 = "SELECT SUM(quantite_sort) as somme_1 FROM sortie 
						WHERE MONTH(date_sort)=:month and responsable_sort=:id_resp";
			$query_month_1 = $dbh->prepare($sql_month_1);

			for ($month_1 = 1; $month_1 <= 12; $month_1++) {
				$query_month_1->bindParam(':month', $month_1, PDO::PARAM_INT);
				$query_month_1->bindParam(':id_resp', $id_resp, PDO::PARAM_INT);
				$query_month_1->execute();
				$row_month_1 = $query_month_1->fetch(PDO::FETCH_ASSOC);

				switch ($month_1) {
					case 1:
						$total_janvier_1[$k] = $row_month_1['somme_1'];
						break;
					case 2:
						$total_fevrier_1[$k] = $row_month_1['somme_1'];
						break;
					case 3:
						$total_mars_1[$k] = $row_month_1['somme_1'];
						break;
					case 4:
						$total_avril_1[$k] = $row_month_1['somme_1'];
						break;
					case 5:
						$total_mai_1[$k] = $row_month_1['somme_1'];
						break;
					case 6:
						$total_juin_1[$k] = $row_month_1['somme_1'];
						break;
					case 7:
						$total_juillet_1[$k] = $row_month_1['somme_1'];
						break;
					case 8:
						$total_aout_1[$k] = $row_month_1['somme_1'];
						break;
					case 9:
						$total_septembre_1[$k] = $row_month_1['somme_1'];
						break;
					case 10:
						$total_octobre_1[$k] = $row_month_1['somme_1'];
						break;
					case 11:
						$total_novembre_1[$k] = $row_month_1['somme_1'];
						break;
					case 12:
						$total_decembre_1[$k] = $row_month_1['somme_1'];
						break;
				}
			}
		}

		$i++;
		$k++;
	}

	$sql_2 = mysqli_query($link, "SELECT * FROM categorie");
	foreach($sql_2 as $data) {
		$libelle_cat[] = $data['libelle_cat'];
		$quantite_cat[] = $data['quantite_cat'];
	}


	$sql_3 = "SELECT id_inv from inventaire";
	$query_3 = $dbh->prepare($sql_3);
	$query_3->execute();
	$results_3 = $query_3->fetchAll(PDO::FETCH_OBJ);
	$totalcount_produit = $query_3->rowCount();

	$sql_4 = "SELECT id_resp from responsable";
	$query_4 = $dbh->prepare($sql_4);
	$query_4->execute();
	$results_4 = $query_4->fetchAll(PDO::FETCH_OBJ);
	$totalcount_responsable = $query_4->rowCount();

	$sql_5 = "SELECT id_frn from fournisseur";
	$query_5 = $dbh->prepare($sql_5);
	$query_5->execute();
	$results_5 = $query_5->fetchAll(PDO::FETCH_OBJ);
	$totalcount_fournisseur = $query_5->rowCount();

	$sql_6 = "SELECT id_cat from categorie";
	$query_6 = $dbh->prepare($sql_6);
	$query_6->execute();
	$results_6 = $query_6->fetchAll(PDO::FETCH_OBJ);
	$totalcount_categorie = $query_6->rowCount();

	$sql_7 = "SELECT SUM(si_inv) as somme FROM inventaire";
	$query_7 = $dbh->prepare($sql_7);
	$query_7->execute();
	$row_7 = $query_7->fetch(PDO::FETCH_ASSOC);
	$totalcount_si = $row_7['somme'];

	$sql_8 = "SELECT SUM(sa_inv) as somme FROM inventaire";
	$query_8 = $dbh->prepare($sql_8);
	$query_8->execute();
	$row_8 = $query_8->fetch(PDO::FETCH_ASSOC);
	$totalcount_sa = $row_8['somme'];

	$sql_9 = "SELECT SUM(entree_inv) as somme FROM inventaire";
	$query_9 = $dbh->prepare($sql_9);
	$query_9->execute();
	$row_9 = $query_9->fetch(PDO::FETCH_ASSOC);
	$totalcount_entree = $row_9['somme'];

	$sql_10 = "SELECT SUM(sortie_inv) as somme FROM inventaire";
	$query_10 = $dbh->prepare($sql_10);
	$query_10->execute();
	$row_10 = $query_10->fetch(PDO::FETCH_ASSOC);
	$totalcount_sortie = $row_10['somme'];

	$sql_11 = "SELECT SUM(montant_ent) as somme FROM entree";
	$query_11 = $dbh->prepare($sql_11);
	$query_11->execute();
	$row_11 = $query_11->fetch(PDO::FETCH_ASSOC);
	$totalcount_montant = $row_11['somme'];
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
        <title>Statistique - EPN</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Lineawesome CSS -->
        <link rel="stylesheet" href="assets/css/line-awesome.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Loader -->
			<div id="loader-wrapper">
				<div id="loader">
					<div class="loader-ellips">
					  <span class="loader-ellips__dot"></span>
					  <span class="loader-ellips__dot"></span>
					  <span class="loader-ellips__dot"></span>
					  <span class="loader-ellips__dot"></span>
					</div>
				</div>
			</div>
			<!-- /Loader -->
		
			<!-- Header -->
            <?php include_once("includes/header.php");?>
			<!-- /Header -->
			
			<!-- Sidebar -->
            <?php include_once("includes/sidebar.php");?>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
					
					<div class="row">
						<div class="col-lg-8 col-md-8 chart-p">						
							<div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas height="200px" id="myChart"></canvas>
                                    </div><hr>
                                    <p>Diagramme des produits entrées</p>
                                </div>
                            </div>
							<div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas height="170px" id="myChart_1"></canvas>
                                    </div><hr>
                                    <p>Diagramme des produits sorties</p>
                                </div>
                            </div>
						</div>

						<div class="col-lg-4 col-md-4 chart-p">
							<div class="dash-sidebar">
								<h5 class="dash-title">Montant</h5>
								<div class="card shadow">
									<div class="card-body">
										<div class="time-list">
											<div class="dash-stats-list">
												<h1> </h1>
												<h4><?php echo $totalcount_montant; ?> $</h4>
												<p>Valeur des produits entrées</p>
											</div>
										</div>
									</div>
								</div>
							</div>						
							<div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas height="300px" id="myChart_2"></canvas>
                                    </div><hr>
                                    <p>Diagramme des produits par categorie</p>
                                </div>
                            </div>
							<div class="dash-sidebar">
								<h5 class="dash-title">Total</h5>
								<div class="card shadow">
									<div class="card-body">
										<div class="time-list">
											<div class="dash-stats-list">
												<h4><?php echo $totalcount_produit; ?></h4>
												<p>Produit</p>
											</div>
											<div class="dash-stats-list">
												<h4><?php echo $totalcount_responsable; ?></h4>
												<p>responsable</p>
											</div>
										</div>
										<div class="time-list">
											<div class="dash-stats-list">
												<h4><?php echo $totalcount_fournisseur; ?></h4>
												<p>Fournisseur</p>
											</div>
											<div class="dash-stats-list">
												<h4><?php echo $totalcount_categorie; ?></h4>
												<p>Categorie</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div>
								<section class="dash-sidebar">
									<h1 class="dash-sec-title">Quantitée total</h1>
									<div class="dash-sec-content">
										<div class="dash-info-list">
											<a href="" class="dash-card text-danger shadow">
												<div class="dash-card-container">
													<div class="dash-card-icon">
														<i class="fa fa-hourglass-o"></i>
													</div>
													<div class="dash-card-content">
														<p><?php echo $totalcount_si; ?> stock initial</p>
													</div>
												</div>
											</a>
										</div>

										<div class="dash-info-list">
											<a href="" class="dash-card text-danger shadow">
												<div class="dash-card-container">
													<div class="dash-card-icon">
														<i class="fa fa-clipboard"></i>
													</div>
													<div class="dash-card-content">
														<p><?php echo $totalcount_sa; ?> stock actuel</p>
													</div>
												</div>
											</a>
										</div>

										<div class="dash-info-list">
											<a href="" class="dash-card text-danger shadow">
												<div class="dash-card-container">
													<div class="dash-card-icon">
														<i class="fa fa-plus"></i>
													</div>
													<div class="dash-card-content">
														<p><?php echo $totalcount_entree; ?> produit entrée</p>
													</div>
												</div>
											</a>
										</div>

										<div class="dash-info-list">
											<a href="" class="dash-card text-danger shadow">
												<div class="dash-card-container">
													<div class="dash-card-icon">
														<i class="fa fa-share"></i>
													</div>
													<div class="dash-card-content">
														<p><?php echo $totalcount_sortie; ?> produit sortie</p>
													</div>
												</div>
											</a>
										</div>

									</div>
								</section>
							</div>
						</div>
					</div>

				</div>
				<!-- /Page Content -->

            </div>
			<!-- /Page Wrapper -->
			
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
		<script src="assets/js/jquery.slimscroll.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/app.js"></script>

		<!-- Page level plugins -->
		<script src="assets/js/Chart.min.js"></script>
		<!-- <script src="assets/js/Chart .js"></script> -->


		<!-- Page level custom scripts -->
		<!-- <script src="assets/js/chart-area-demo.js"></script> -->
		<script>
			const labels = <?php echo json_encode($libelle)?>;
			const labels_1 = <?php echo json_encode($libelle_1)?>;

			const data = {
				labels: labels,
				datasets: [
					{
						label: 'Janvier',
						backgroundColor: 'rgb(255, 99, 132)',
						borderColor: 'rgb(255, 99, 132)',
						data: <?php echo json_encode($total_janvier)?>,
						backgroundColor: '#4e73df',
						// hoverBackgroundColor: '#2e59d9',
					},
					{
						label: 'Fevrier',
						backgroundColor: 'rgb(255, 99, 132)',
						borderColor: 'rgb(255, 99, 132)',
						data: <?php echo json_encode($total_fevrier)?>,
						backgroundColor: '#ff4000',
						// hoverBackgroundColor: '#ff8000',
					},
					{
						label: 'Mars',
						backgroundColor: 'rgb(255, 99, 132)',
						borderColor: 'rgb(255, 99, 132)',
						data: <?php echo json_encode($total_mars)?>,
						backgroundColor: '#40ff00',
						// hoverBackgroundColor: '#00ff40',
					},
					{
						label: 'Avril',
						backgroundColor: 'rgb(255, 99, 132)',
						borderColor: 'rgb(255, 99, 132)',
						data: <?php echo json_encode($total_avril)?>,
						backgroundColor: '#ffff00',
						// hoverBackgroundColor: '#bfff00',
					},
					{
						label: 'Mai',
						backgroundColor: 'rgb(255, 99, 132)',
						borderColor: 'rgb(255, 99, 132)',
						data: <?php echo json_encode($total_mai)?>,
						backgroundColor: '#ff8f00',
						// hoverBackgroundColor: '#bfff00',
					},
					{
						label: 'Juin',
						backgroundColor: 'rgb(255, 99, 132)',
						borderColor: 'rgb(255, 99, 132)',
						data: <?php echo json_encode($total_juin)?>,
						backgroundColor: '#663300',
						// hoverBackgroundColor: '#bfff00',
					},
					{
						label: 'Juillet',
						backgroundColor: 'rgb(255, 99, 132)',
						borderColor: 'rgb(255, 99, 132)',
						data: <?php echo json_encode($total_juillet)?>,
						backgroundColor: '#000000',
						// hoverBackgroundColor: '#bfff00',
					},
					{
						label: 'Aout',
						backgroundColor: 'rgb(255, 99, 132)',
						borderColor: 'rgb(255, 99, 132)',
						data: <?php echo json_encode($total_aout)?>,
						backgroundColor: '#ff0066',
						// hoverBackgroundColor: '#bfff00',
					},
					{
						label: 'Septembre',
						backgroundColor: 'rgb(255, 99, 132)',
						borderColor: 'rgb(255, 99, 132)',
						data: <?php echo json_encode($total_septembre)?>,
						backgroundColor: '#9933ff',
						// hoverBackgroundColor: '#bfff00',
					},
					{
						label: 'Octobre',
						backgroundColor: 'rgb(255, 99, 132)',
						borderColor: 'rgb(255, 99, 132)',
						data: <?php echo json_encode($total_octobre)?>,
						backgroundColor: '#003366',
						// hoverBackgroundColor: '#bfff00',
					},
					{
						label: 'Novembre',
						backgroundColor: 'rgb(255, 99, 132)',
						borderColor: 'rgb(255, 99, 132)',
						data: <?php echo json_encode($total_novembre)?>,
						backgroundColor: '#6600cc',
						// hoverBackgroundColor: '#bfff00',
					},
					{
						label: 'Decembre',
						backgroundColor: 'rgb(255, 99, 132)',
						borderColor: 'rgb(255, 99, 132)',
						data: <?php echo json_encode($total_decembre)?>,
						backgroundColor: '#339966',
						// hoverBackgroundColor: '#bfff00',
					},
				]
			};

			const data_1 = {
				labels: labels_1,
				datasets: [
					{
						label: 'Janvier',
						backgroundColor: 'rgb(255, 99, 132)',
						borderColor: 'rgb(255, 99, 132)',
						data: <?php echo json_encode($total_janvier_1)?>,
						backgroundColor: '#4e73df',
						// hoverBackgroundColor: '#2e59d9',
					},
					{
						label: 'Fevrier',
						backgroundColor: 'rgb(255, 99, 132)',
						borderColor: 'rgb(255, 99, 132)',
						data: <?php echo json_encode($total_fevrier_1)?>,
						backgroundColor: '#ff4000',
						// hoverBackgroundColor: '#ff8000',
					},
					{
						label: 'Mars',
						backgroundColor: 'rgb(255, 99, 132)',
						borderColor: 'rgb(255, 99, 132)',
						data: <?php echo json_encode($total_mars_1)?>,
						backgroundColor: '#40ff00',
						// hoverBackgroundColor: '#00ff40',
					},
					{
						label: 'Avril',
						backgroundColor: 'rgb(255, 99, 132)',
						borderColor: 'rgb(255, 99, 132)',
						data: <?php echo json_encode($total_avril_1)?>,
						backgroundColor: '#ffff00',
						// hoverBackgroundColor: '#bfff00',
					},
					{
						label: 'Mai',
						backgroundColor: 'rgb(255, 99, 132)',
						borderColor: 'rgb(255, 99, 132)',
						data: <?php echo json_encode($total_mai_1)?>,
						backgroundColor: '#ff8f00',
						// hoverBackgroundColor: '#bfff00',
					},
					{
						label: 'Juin',
						backgroundColor: 'rgb(255, 99, 132)',
						borderColor: 'rgb(255, 99, 132)',
						data: <?php echo json_encode($total_juin_1)?>,
						backgroundColor: '#663300',
						// hoverBackgroundColor: '#bfff00',
					},
					{
						label: 'Juillet',
						backgroundColor: 'rgb(255, 99, 132)',
						borderColor: 'rgb(255, 99, 132)',
						data: <?php echo json_encode($total_juillet_1)?>,
						backgroundColor: '#000000',
						// hoverBackgroundColor: '#bfff00',
					},
					{
						label: 'Aout',
						backgroundColor: 'rgb(255, 99, 132)',
						borderColor: 'rgb(255, 99, 132)',
						data: <?php echo json_encode($total_aout_1)?>,
						backgroundColor: '#ff0066',
						// hoverBackgroundColor: '#bfff00',
					},
					{
						label: 'Septembre',
						backgroundColor: 'rgb(255, 99, 132)',
						borderColor: 'rgb(255, 99, 132)',
						data: <?php echo json_encode($total_septembre_1)?>,
						backgroundColor: '#9933ff',
						// hoverBackgroundColor: '#bfff00',
					},
					{
						label: 'Octobre',
						backgroundColor: 'rgb(255, 99, 132)',
						borderColor: 'rgb(255, 99, 132)',
						data: <?php echo json_encode($total_octobre_1)?>,
						backgroundColor: '#003366',
						// hoverBackgroundColor: '#bfff00',
					},
					{
						label: 'Novembre',
						backgroundColor: 'rgb(255, 99, 132)',
						borderColor: 'rgb(255, 99, 132)',
						data: <?php echo json_encode($total_novembre_1)?>,
						backgroundColor: '#6600cc',
						// hoverBackgroundColor: '#bfff00',
					},
					{
						label: 'Decembre',
						backgroundColor: 'rgb(255, 99, 132)',
						borderColor: 'rgb(255, 99, 132)',
						data: <?php echo json_encode($total_decembre_1)?>,
						backgroundColor: '#339966',
						// hoverBackgroundColor: '#bfff00',
					},
				]
			};

			
			var options = {
				scales: {
					yAxes: [{
					ticks: {
						beginAtZero: true
					}
					}]
				}
			};

			const config = {
				type: 'bar',
				data: data,
				options: options
			};

			const config_1 = {
				type: 'bar',
				data: data_1,
				options: options
			};
		</script>

		<script>
			var ctx = document.getElementById("myChart_2");

			var myPieChart = new Chart(ctx, {
				type: 'pie',
				data: {
					labels: <?php echo json_encode($libelle_cat)?>,
					datasets: [{
									data: <?php echo json_encode($quantite_cat)?>,
									backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', 'ffff00', '40ff00'],
									hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', 'cc0000', '40ff00'],
									hoverBorderColor: "rgba(234, 236, 244, 1)",
								}],
				},
				options: {
							maintainAspectRatio: false,
							tooltips: {
											backgroundColor: "rgb(255,255,255)",
											bodyFontColor: "#858796",
											borderColor: '#dddfeb',
											borderWidth: 1,
											xPadding: 15,
											yPadding: 15,
											displayColors: false,
											caretPadding: 10,
										},
							legend: {
										display: true
									},
							cutoutPercentage: 50,
						},
			});
		</script>

		<script>
			const myChart = new Chart(
				document.getElementById('myChart'),
				config
			);
			const myChart_1 = new Chart(
				document.getElementById('myChart_1'),
				config_1
			);
		</script>

		
    </body>
</html>