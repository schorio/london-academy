<?php

    if(isset($_POST['ajouter_inv'])){
		$piece_inv = htmlspecialchars($_POST['piece_inv']);
        $fournisseur_inv = htmlspecialchars($_POST['fournisseur_inv']);
        $categorie_inv = htmlspecialchars($_POST['categorie_inv']);
        $description_inv = htmlspecialchars($_POST['description_inv']);
        $si_inv = htmlspecialchars($_POST['si_inv']);
        $sa_inv = htmlspecialchars($_POST['si_inv']);
        $stockage_inv = htmlspecialchars($_POST['stockage_inv']);
		$observation_inv = htmlspecialchars($_POST['observation_inv']);

		$sql = "INSERT INTO `inventaire` (`piece_inv`, `fournisseur_inv`, `categorie_inv`, `description_inv`, `si_inv`, `sa_inv`, `stockage_inv`, `observation_inv`) 
                                VALUES   (:piece_inv,  :fournisseur_inv,  :categorie_inv,  :description_inv,  :si_inv,  :sa_inv,  :stockage_inv,  :observation_inv)";

		$query = $dbh->prepare($sql);
		$query->bindParam(':piece_inv',$piece_inv,pdo::PARAM_STR);
        $query->bindParam(':fournisseur_inv',$fournisseur_inv,pdo::PARAM_STR);
        $query->bindParam(':categorie_inv',$categorie_inv,pdo::PARAM_STR);
        $query->bindParam(':description_inv',$description_inv,pdo::PARAM_STR);
        $query->bindParam(':si_inv',$si_inv,pdo::PARAM_STR);
        $query->bindParam(':sa_inv',$sa_inv,pdo::PARAM_STR);
        $query->bindParam(':stockage_inv',$stockage_inv,pdo::PARAM_STR);
		$query->bindParam(':observation_inv',$observation_inv,pdo::PARAM_STR);
		$query->execute();
		$lastInsert = $dbh->lastInsertId();

		if($lastInsert>0){

			$sql_1 = "UPDATE categorie SET 
				quantite_cat=quantite_cat+'$si_inv' WHERE id_cat='$categorie_inv' ";

			if ($conn->query($sql_1) === TRUE) {
				echo '<script>window.location.href="/london-academy/liste/inventaire/inventaire.php"</script>';
			} else {
				echo "<script>alert('Une erreur s'est survenue');</script>";
			}

		}else{
			echo "<script>alert('Une erreur s'est survenue');</script>";
		}
	}


    if(isset($_POST['supprimer_inv'])){
		// sql to delete a record
		$supprimer_id = $_POST['supprimer_id'];
		$categorie_inv = $_POST['categorie_inv'];
		$si_inv = $_POST['si_inv'];
		$sql = "DELETE FROM inventaire WHERE id_inv='$supprimer_id' ";
		
		if ($conn->query($sql) === TRUE) {
			$sql_1 = "UPDATE categorie SET 
				quantite_cat=quantite_cat-'$si_inv' WHERE id_cat='$categorie_inv' ";

			if ($conn->query($sql_1) === TRUE) {
				echo '<script>window.location.href="/london-academy/liste/inventaire/inventaire.php"</script>';
			} else {
				echo "<script>alert('Une erreur s'est survenue');</script>";
			}

		} else {
			echo "<script>alert('Une erreur s'est survenue');</script>";
		}
	}


    if(isset($_POST['modifier_inv'])){
		$modifier_id = htmlspecialchars($_POST['modifier_id']);
		$si_inv = $_POST['si_inv'];
		$n_piece_inv = htmlspecialchars($_POST['n_piece_inv']);
        $n_fournisseur_inv = htmlspecialchars($_POST['n_fournisseur_inv']);
		$categorie_inv = htmlspecialchars($_POST['categorie_inv']);
		$n_categorie_inv = htmlspecialchars($_POST['n_categorie_inv']);
        $n_description_inv = htmlspecialchars($_POST['n_description_inv']);
        $n_stockage_inv = htmlspecialchars($_POST['n_stockage_inv']);
        $n_observation_inv = htmlspecialchars($_POST['n_observation_inv']);

		$sql = "UPDATE inventaire SET 
			piece_inv='$n_piece_inv',
            fournisseur_inv='$n_fournisseur_inv',
            categorie_inv='$n_categorie_inv',
            description_inv='$n_description_inv',
            stockage_inv='$n_stockage_inv',
            observation_inv='$n_observation_inv'
			WHERE id_inv='$modifier_id' ";

		if ($conn->query($sql) === TRUE) {
			if ($categorie_inv != $n_categorie_inv) {
				$sql_1 = "UPDATE categorie SET 
				quantite_cat=quantite_cat-'$si_inv' WHERE id_cat='$categorie_inv' ";
				$sql_2 = "UPDATE categorie SET 
				quantite_cat=quantite_cat+'$si_inv' WHERE id_cat='$n_categorie_inv' ";

				if ($conn->query($sql_1) === TRUE and $conn->query($sql_2) === TRUE) {
					echo '<script>window.location.href="/london-academy/liste/inventaire/inventaire.php"</script>';
				} else {
					echo "<script>alert('Une erreur s'est survenue');</script>";
				}
			}
			else {
				echo '<script>window.location.href="/london-academy/liste/inventaire/inventaire.php"</script>';
			}
			
		} else {
			echo "<script>alert('Une erreur s'est survenue');</script>";
		}
	}


?>