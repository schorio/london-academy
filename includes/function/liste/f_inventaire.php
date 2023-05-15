<?php

    if(isset($_POST['ajouter_inv'])){
		$piece_inv = htmlspecialchars($_POST['piece_inv']);
        $fournisseur_inv = htmlspecialchars($_POST['fournisseur_inv']);
        $categorie_inv = htmlspecialchars($_POST['categorie_inv']);
        $description_inv = htmlspecialchars($_POST['description_inv']);
        $si_inv = htmlspecialchars($_POST['si_inv']);
        $sa_inv = htmlspecialchars($_POST['sa_inv']);
        $stockage_inv = htmlspecialchars($_POST['stockage_inv']);

		$sql = "INSERT INTO `inventaire` (`piece_inv`, `fournisseur_inv`, `categorie_inv`, `description_inv`, `si_inv`, `sa_inv`, `stockage_inv`) 
                                VALUES   (:piece_inv, :fournisseur_inv, :categorie_inv, :description_inv, :si_inv, :sa_inv, :stockage_inv)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':piece_inv',$piece_inv,pdo::PARAM_STR);
        $query->bindParam(':fournisseur_inv',$fournisseur_inv,pdo::PARAM_STR);
        $query->bindParam(':categorie_inv',$categorie_inv,pdo::PARAM_STR);
        $query->bindParam(':description_inv',$description_inv,pdo::PARAM_STR);
        $query->bindParam(':si_inv',$si_inv,pdo::PARAM_STR);
        $query->bindParam(':sa_inv',$sa_inv,pdo::PARAM_STR);
        $query->bindParam(':stockage_inv',$stockage_inv,pdo::PARAM_STR);
		$query->execute();
		$lastInsert = $dbh->lastInsertId();
		if($lastInsert>0){
			echo "<script>window.location.href='/epn/liste/inventaire/inventaire.php';</script>";
		}else{
			echo "<script>alert('Une erreur s'est survenue');</script>";
		}
	}

?>