<?php
    if(isset($_POST['ajouter_cat'])){
		$libelle_cat = htmlspecialchars($_POST['libelle_cat']);
		$sql = "INSERT INTO `categorie`(`libelle_cat`) VALUES (:libelle_cat)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':libelle_cat',$libelle_cat,pdo::PARAM_STR);
		$query->execute();
		$lastInsert = $dbh->lastInsertId();
		if($lastInsert>0){
			echo "<script>window.location.href='/epn/liste/categorie/categorie.php';</script>";
		}else{
			echo "<script>alert('Une erreur s'est survenue');</script>";
		}
	}


    if(isset($_POST['supprimer_cat'])){
		// sql to delete a record
		$supprimer_id = $_POST['supprimer_id'];
		$sql = "DELETE FROM categorie WHERE id_cat='$supprimer_id' ";
		if ($conn->query($sql) === TRUE) {
			echo '<script>window.location.href="/epn/liste/categorie/categorie.php"</script>';
		} else {
			echo "<script>alert('Une erreur s'est survenue');</script>";
		}
	}
?>