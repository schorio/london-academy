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
            $sql_1 = "UPDATE inventaire SET 
				entree_inv=entree_inv+'$quantite_ent' WHERE id_inv='$piece_ent' ";
            $sql_2 = "UPDATE inventaire SET 
                sa_inv=sa_inv+'$quantite_ent' WHERE id_inv='$piece_ent' ";
            $sql_3 = "UPDATE fournisseur SET 
                nbEntree_frn=nbEntree_frn+'$quantite_ent' 
                WHERE id_frn=(SELECT fournisseur_inv from inventaire WHERE id_inv='$piece_ent')";
            $sql_4 = "UPDATE fournisseur SET 
                ca_frn=ca_frn+'$montant_ent' 
                WHERE id_frn=(SELECT fournisseur_inv from inventaire WHERE id_inv='$piece_ent')";
            $sql_5 = "UPDATE categorie SET 
                quantite_cat=quantite_cat+'$quantite_ent' 
                WHERE id_cat=(SELECT categorie_inv from inventaire WHERE id_inv='$piece_ent')";

            if ($conn->query($sql_1) === TRUE and $conn->query($sql_2) === TRUE and $conn->query($sql_3) === TRUE and $conn->query($sql_4) === TRUE and $conn->query($sql_5) === TRUE) {
                echo "<script>window.location.href='/london-academy/liste/entree/entree.php';</script>";
            } else {
                echo "<script>alert('Une erreur s'est survenue');</script>";
            }
            
        }else{
            echo "<script>alert('Une erreur s'est survenue');</script>";
        }
    }







    if(isset($_POST['supprimer_ent'])){
		// sql to delete a record
		$supprimer_id = htmlspecialchars($_POST['supprimer_id']);
        $quantite_ent = htmlspecialchars($_POST['quantite_ent']);
        $piece_ent = htmlspecialchars($_POST['piece_ent']);
        $montant_ent = htmlspecialchars($_POST['montant_ent']);
		$sql = "DELETE FROM entree WHERE id_ent='$supprimer_id' ";
		if ($conn->query($sql) === TRUE) {
			$sql_1 = "UPDATE inventaire SET 
				entree_inv=entree_inv - '$quantite_ent' WHERE id_inv='$piece_ent' ";
            $sql_2 = "UPDATE inventaire SET 
                sa_inv=sa_inv - '$quantite_ent' WHERE id_inv='$piece_ent' ";
            $sql_3 = "UPDATE fournisseur SET 
                nbEntree_frn=nbEntree_frn - '$quantite_ent' 
                WHERE id_frn=(SELECT fournisseur_inv from inventaire WHERE id_inv='$piece_ent')";
            $sql_4 = "UPDATE fournisseur SET 
                ca_frn=ca_frn - '$montant_ent' 
                WHERE id_frn=(SELECT fournisseur_inv from inventaire WHERE id_inv='$piece_ent')";
            $sql_5 = "UPDATE categorie SET 
                quantite_cat=quantite_cat-'$quantite_ent' 
                WHERE id_cat=(SELECT categorie_inv from inventaire WHERE id_inv='$piece_ent')";

            if ($conn->query($sql_1) === TRUE and $conn->query($sql_2) === TRUE and $conn->query($sql_3) === TRUE and $conn->query($sql_4) === TRUE and $conn->query($sql_5) === TRUE) {
                echo "<script>window.location.href='/london-academy/liste/entree/entree.php';</script>";
            } else {
                echo "<script>alert('Une erreur s'est survenue');</script>";
            }

		} else {
			echo "<script>alert('Une erreur s'est survenue');</script>";
		}
	}







    if(isset($_POST['modifier_ent'])){
		$modifier_id = htmlspecialchars($_POST['modifier_id']);
        $piece_ent = htmlspecialchars($_POST['piece_ent']);
		$n_piece_ent = htmlspecialchars($_POST['n_piece_ent']);
        $n_reference_ent = htmlspecialchars($_POST['n_reference_ent']);
        $quantite_ent = htmlspecialchars($_POST['quantite_ent']);
        $n_quantite_ent = htmlspecialchars($_POST['n_quantite_ent']);
        $n_pu_ent = htmlspecialchars($_POST['n_pu_ent']);
        $montant_ent = htmlspecialchars($_POST['montant_ent']);
        $n_montant_ent = htmlspecialchars($_POST['n_montant_ent']);
        $n_date_ent = htmlspecialchars($_POST['n_date_ent']);
        $n_observation_ent = htmlspecialchars($_POST['n_observation_ent']);

		$sql = "UPDATE entree SET 
			piece_ent='$n_piece_ent',
            reference_ent='$n_reference_ent',
            quantite_ent='$n_quantite_ent',
            pu_ent='$n_pu_ent',
            montant_ent='$n_montant_ent',
            date_ent='$n_date_ent',
            observation_ent='$n_observation_ent'
			WHERE id_ent='$modifier_id' ";

		if ($conn->query($sql) === TRUE) {
            if ($piece_ent != $n_piece_ent or $quantite_ent != $n_quantite_ent or $montant_ent != $n_montant_ent) {
                $n_sql_1 = "UPDATE inventaire SET 
                    entree_inv=entree_inv-'$quantite_ent' WHERE id_inv='$piece_ent' ";
                $sql_1 = "UPDATE inventaire SET 
                    entree_inv=entree_inv+'$n_quantite_ent' WHERE id_inv='$n_piece_ent' ";

                $n_sql_2 = "UPDATE inventaire SET 
                    sa_inv=sa_inv-'$quantite_ent' WHERE id_inv='$piece_ent' ";
                $sql_2 = "UPDATE inventaire SET 
                    sa_inv=sa_inv+'$n_quantite_ent' WHERE id_inv='$n_piece_ent' ";

                $n_sql_3 = "UPDATE fournisseur SET 
                    nbEntree_frn=nbEntree_frn-'$quantite_ent' 
                    WHERE id_frn=(SELECT fournisseur_inv from inventaire WHERE id_inv='$piece_ent')";
                $sql_3 = "UPDATE fournisseur SET 
                    nbEntree_frn=nbEntree_frn+'$n_quantite_ent' 
                    WHERE id_frn=(SELECT fournisseur_inv from inventaire WHERE id_inv='$n_piece_ent')";

                $n_sql_4 = "UPDATE fournisseur SET 
                    ca_frn=ca_frn-'$montant_ent' 
                    WHERE id_frn=(SELECT fournisseur_inv from inventaire WHERE id_inv='$piece_ent')";
                $sql_4 = "UPDATE fournisseur SET 
                    ca_frn=ca_frn+'$n_montant_ent' 
                    WHERE id_frn=(SELECT fournisseur_inv from inventaire WHERE id_inv='$n_piece_ent')";
                $n_sql_5 = "UPDATE categorie SET 
                    quantite_cat=quantite_cat-'$quantite_ent' 
                    WHERE id_cat=(SELECT categorie_inv from inventaire WHERE id_inv='$piece_ent')";
                $sql_5 = "UPDATE categorie SET 
                    quantite_cat=quantite_cat+'$n_quantite_ent' 
                    WHERE id_cat=(SELECT categorie_inv from inventaire WHERE id_inv='$n_piece_ent')";

                if ($conn->query($n_sql_1) === TRUE and $conn->query($n_sql_2) === TRUE and $conn->query($n_sql_3) === TRUE and $conn->query($n_sql_4) === TRUE and $conn->query($n_sql_5) === TRUE 
                    and $conn->query($sql_1) === TRUE and $conn->query($sql_2) === TRUE and $conn->query($sql_3) === TRUE and $conn->query($sql_4) === TRUE and $conn->query($sql_5) === TRUE) {
                    echo "<script>window.location.href='/london-academy/liste/entree/entree.php';</script>";
                } else {
                    echo "<script>alert('Une erreur s'est survenue');</script>";
                }
            } else {
                echo "<script>window.location.href='/london-academy/liste/entree/entree.php';</script>";
            }

		} else {
			echo "<script>alert('Une erreur s'est survenue');</script>";
		}
	}

?>