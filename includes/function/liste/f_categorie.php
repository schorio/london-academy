<?php

	if(strlen($_SESSION['userlogin'])==0){
		header('location:/london-academy/includes/function/connection/login.php');
	}

    if(isset($_POST['ajouter_cat'])){
		$libelle_cat = htmlspecialchars($_POST['libelle_cat']);
		$sql = "INSERT INTO `categorie`(`libelle_cat`) VALUES (:libelle_cat)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':libelle_cat',$libelle_cat,pdo::PARAM_STR);
		$query->execute();
		$lastInsert = $dbh->lastInsertId();
		if($lastInsert>0){
			echo "<script>window.location.href='/london-academy/liste/categorie/categorie.php';</script>";
		}else{
			echo "<script>alert('Une erreur s'est survenue');</script>";
		}
	}


    if(isset($_POST['supprimer_cat'])){
		// sql to delete a record
		$supprimer_id = $_POST['supprimer_id'];
		$sql = "DELETE FROM categorie WHERE id_cat='$supprimer_id' ";
		if ($conn->query($sql) === TRUE) {
			echo '<script>window.location.href="/london-academy/liste/categorie/categorie.php"</script>';
		} else {
			echo "<script>alert('Une erreur s'est survenue');</script>";
		}
	}


    if(isset($_POST['modifier_cat'])){
		$modifier_id = $_POST['modifier_id'];
		$n_libelle_cat = $_POST['n_libelle_cat'];
		$n_observation_cat = $_POST['n_observation_cat'];
		$sql = "UPDATE categorie SET 
			libelle_cat='$n_libelle_cat',
			observation_cat='$n_observation_cat'
			WHERE id_cat='$modifier_id' ";
		if ($conn->query($sql) === TRUE) {
			echo '<script>window.location.href="/london-academy/liste/categorie/categorie.php"</script>';
		} else {
			echo "<script>alert('Une erreur s'est survenue');</script>";
		}
	}



?>