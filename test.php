<?php 
	session_start();
	error_reporting(0);
	include('includes/config.php');
	if(strlen($_SESSION['userlogin'])==0){
		header('location:login.php');
	}

    $sql5 = "SELECT * FROM employee WHERE avancement BETWEEN '$now' AND '$trois_jours' ";
	$query5 = $dbh->prepare($sql5);
	$query5->execute();
	$results = $query5->fetchAll(PDO::FETCH_OBJ);
	$totalcount_avancement = $query5->rowCount();

?>