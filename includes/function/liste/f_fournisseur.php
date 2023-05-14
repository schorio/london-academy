<?php

    if(isset($_POST['ajouter_frn'])){
		$libelle_frn = htmlspecialchars($_POST['libelle_frn']);
		$sql = "INSERT INTO `fournisseur`(`libelle_frn`) VALUES (:libelle_frn)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':libelle_frn',$libelle_frn,pdo::PARAM_STR);
		$query->execute();
		$lastInsert = $dbh->lastInsertId();
		if($lastInsert>0){
			echo "<script>alert('Le nouveau fournisseur est ajouter avec succes');</script>";
			echo "<script>window.location.href='/epn/liste/fournisseur/fournisseur.php';</script>";
		}else{
			echo "<script>alert('Une erreur s'est survenue');</script>";
		}
	}
    if(isset($_POST['supprimer_frn'])){
		// sql to delete a record
		$supprimer_id = $_POST['supprimer_id'];
		$sql = "DELETE FROM fournisseur WHERE id_frn='$supprimer_id' ";
		if ($conn->query($sql) === TRUE) {
			echo '<script>window.location.href="/epn/liste/fournisseur/fournisseur.php"</script>';
		} else {
			echo "Error";
		}
	}



?>