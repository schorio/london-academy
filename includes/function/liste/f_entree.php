<?php

    if(isset($_POST['ajouter_ent'])){
        $piece_ent = htmlspecialchars($_POST['piece_ent']);
        $reference_ent = htmlspecialchars($_POST['reference_ent']);
        $quantite_ent = htmlspecialchars($_POST['quantite_ent']);
        $pu_ent = htmlspecialchars($_POST['pu_ent']);
        $montant_ent = htmlspecialchars($_POST['montant_ent']);
        $date_ent = htmlspecialchars($_POST['date_ent']);
        $observation_ent = htmlspecialchars($_POST['observation_ent']);

        $sql = "INSERT INTO `entree` (`piece_ent`, `reference_ent`, `quantite_ent`, `pu_ent`, `montant_ent`, `date_ent`, `observation_ent`) 
                                VALUES   (:piece_ent, :reference_ent, :quantite_ent, :pu_ent, :montant_ent, :date_ent, :observation_ent)";

        $query = $dbh->prepare($sql);
        $query->bindParam(':piece_ent',$piece_ent,pdo::PARAM_STR);
        $query->bindParam(':reference_ent',$reference_ent,pdo::PARAM_STR);
        $query->bindParam(':quantite_ent',$quantite_ent,pdo::PARAM_STR);
        $query->bindParam(':pu_ent',$pu_ent,pdo::PARAM_STR);
        $query->bindParam(':montant_ent',$montant_ent,pdo::PARAM_STR);
        $query->bindParam(':date_ent',$date_ent,pdo::PARAM_STR);
        $query->bindParam(':observation_ent',$observation_ent,pdo::PARAM_STR);
        $query->execute();
        $lastInsert = $dbh->lastInsertId();
        if($lastInsert>0){
            echo "<script>window.location.href='/epn/liste/entree/entree.php';</script>";
        }else{
            echo "<script>alert('Une erreur s'est survenue');</script>";
        }
    }


    if(isset($_POST['supprimer_ent'])){
		// sql to delete a record
		$supprimer_id = $_POST['supprimer_id'];
		$sql = "DELETE FROM entree WHERE id_ent='$supprimer_id' ";
		if ($conn->query($sql) === TRUE) {
			echo '<script>window.location.href="/epn/liste/entree/entree.php"</script>';
		} else {
			echo "<script>alert('Une erreur s'est survenue');</script>";
		}
	}

?>