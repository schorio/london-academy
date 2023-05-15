<?php

    if(isset($_POST['ajouter_sort'])){
        $piece_sort = htmlspecialchars($_POST['piece_sort']);
        $technicien_sort = htmlspecialchars($_POST['technicien_sort']);
        $quantite_sort = htmlspecialchars($_POST['quantite_sort']);
        $date_sort = htmlspecialchars($_POST['date_sort']);
        $observation_sort = htmlspecialchars($_POST['observation_sort']);

        $sql = "INSERT INTO `sortie` (`piece_sort`, `technicien_sort`, `quantite_sort`, `date_sort`, `observation_sort`) 
                            VALUES   (:piece_sort,  :technicien_sort,  :quantite_sort,  :date_sort,  :observation_sort)";

        $query = $dbh->prepare($sql);
        $query->bindParam(':piece_sort',$piece_sort,pdo::PARAM_STR);
        $query->bindParam(':technicien_sort',$technicien_sort,pdo::PARAM_STR);
        $query->bindParam(':quantite_sort',$quantite_sort,pdo::PARAM_STR);
        $query->bindParam(':date_sort',$date_sort,pdo::PARAM_STR);
        $query->bindParam(':observation_sort',$observation_sort,pdo::PARAM_STR);
        $query->execute();
        $lastInsert = $dbh->lastInsertId();
        if($lastInsert>0){
            echo "<script>window.location.href='/epn/liste/sortie/sortie.php';</script>";
        }else{
            echo "<script>alert('Une erreur s'est survenue');</script>";
        }
    }


    if(isset($_POST['supprimer_sort'])){
		// sql to delete a record
		$supprimer_id = $_POST['supprimer_id'];
		$sql = "DELETE FROM sortie WHERE id_sort='$supprimer_id' ";
		if ($conn->query($sql) === TRUE) {
			echo '<script>window.location.href="/epn/liste/sortie/sortie.php"</script>';
		} else {
			echo "<script>alert('Une erreur s'est survenue');</script>";
		}
	}



?>