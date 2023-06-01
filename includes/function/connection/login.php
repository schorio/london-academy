<?php
	session_start();
	error_reporting(0);
	include_once('../../config.php');
	include_once('f_login.php');
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
		<title>Login - London Academy</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="/london-academy/assets/img/logo.png">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="/london-academy/assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="/london-academy/assets/css/font-awesome.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="/london-academy/assets/css/style.css">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="/london-academy/assets/js/html5shiv.min.js"></script>
			<script src="/london-academy/assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="account-page">
	
		<!-- Main Wrapper -->
		<div class="main-wrapper">
			<div class="account-content">
				<div class="container">
					
					
					<div class="account-box">
						<!-- Account Logo -->
						
						<!-- /Account Logo -->
						<div class="account-wrapper">
							<div class="account-logo">
								<a href="index.php"><img src="/london-academy/assets/img/logo.png" width="170" height="105" alt="Company Logo"></a>								
							</div>
							<h3 class="account-title">Login Administrateur </h3>
							<!-- Account Form -->
							<form method="POST" enctype="multipart/form-data">
								<div class="form-group">
									<label>Nom d'utilisateur</label>
									<input class="form-control" name="username" required type="text">
								</div>
								<?php if($wrongusername){echo $wrongusername;}?>
								<div class="form-group">
									<div class="row">
										<div class="col">
											<label>Mot de passe</label>
										</div>
									</div>
									<input class="form-control" name="password" required type="password">
								</div>
								<?php if($wrongpassword){echo $wrongpassword;}?>
								
								<div class="form-group text-center">
									<button class="btn btn-primary account-btn" name="login" type="submit">Login</button>
								</div>
							</form>
							<!-- /Account Form -->
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
		<script src="/london-academy/assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="/london-academy/assets/js/popper.min.js"></script>
		<script src="/london-academy/assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="/london-academy/assets/js/app.js"></script>
		
	</body>
</html>