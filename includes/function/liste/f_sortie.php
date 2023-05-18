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
            $sql_1 = "UPDATE inventaire SET 
				sortie_inv=sortie_inv+'$quantite_sort' WHERE id_inv='$piece_sort' ";
            $sql_2 = "UPDATE inventaire SET 
                sa_inv=sa_inv-'$quantite_sort' WHERE id_inv='$piece_sort' ";
            $sql_3 = "UPDATE technicien SET 
                nbSortie_tech=nbSortie_tech+'$quantite_sort' 
                WHERE id_tech='$technicien_sort'";

            if ($conn->query($sql_1) === TRUE and $conn->query($sql_2) === TRUE and $conn->query($sql_3) === TRUE) {
                echo "<script>window.location.href='/london-academy/liste/sortie/sortie.php';</script>";
            } else {
                echo "<script>alert('Une erreur s'est survenue');</script>";
            }
            
            
        }else{
            echo "<script>alert('Une erreur s'est survenue');</script>";
        }
    }


    if(isset($_POST['supprimer_sort'])){
		// sql to delete a record
		$supprimer_id = $_POST['supprimer_id'];
        $quantite_sort = $_POST['quantite_sort'];
        $piece_sort = $_POST['piece_sort'];
        $technicien_sort = $_POST['technicien_sort'];
		$sql = "DELETE FROM sortie WHERE id_sort='$supprimer_id' ";

		if ($conn->query($sql) === TRUE) {
            $sql_1 = "UPDATE inventaire SET 
				sortie_inv=sortie_inv-'$quantite_sort' WHERE id_inv='$piece_sort' ";
            $sql_2 = "UPDATE inventaire SET 
                sa_inv=sa_inv+'$quantite_sort' WHERE id_inv='$piece_sort' ";
            $sql_3 = "UPDATE technicien SET 
                nbSortie_tech=nbSortie_tech-'$quantite_sort' 
                WHERE id_tech='$technicien_sort'";

            if ($conn->query($sql_1) === TRUE and $conn->query($sql_2) === TRUE and $conn->query($sql_3) === TRUE) {
                echo "<script>window.location.href='/london-academy/liste/sortie/sortie.php';</script>";
            } else {
                echo "<script>alert('Une erreur s'est survenue');</script>";
            }

		} else {
			echo "<script>alert('Une erreur s'est survenue');</script>";
		}
	}


    if(isset($_POST['modifier_sort'])){
		$modifier_id = htmlspecialchars($_POST['modifier_id']);
        $piece_sort = htmlspecialchars($_POST['piece_sort']);
		$n_piece_sort = htmlspecialchars($_POST['n_piece_sort']);
        $technicien_sort = htmlspecialchars($_POST['technicien_sort']);
        $n_technicien_sort = htmlspecialchars($_POST['n_technicien_sort']);
        $quantite_sort = htmlspecialchars($_POST['quantite_sort']);
        $n_quantite_sort = htmlspecialchars($_POST['n_quantite_sort']);
        $n_date_sort = htmlspecialchars($_POST['n_date_sort']);
        $n_observation_sort = htmlspecialchars($_POST['n_observation_sort']);

		$sql = "UPDATE sortie SET 
			piece_sort='$n_piece_sort',
            technicien_sort='$n_technicien_sort',
            quantite_sort='$n_quantite_sort',
            date_sort='$n_date_sort',
            observation_sort='$n_observation_sort'
			WHERE id_sort='$modifier_id' ";

		if ($conn->query($sql) === TRUE) {
            if ($piece_sort != $n_piece_sort or $quantite_sort != $n_quantite_sort or $technicien_sort != $n_technicien_sort) {
                $n_sql_1 = "UPDATE inventaire SET 
				    sortie_inv=sortie_inv-'$quantite_sort' WHERE id_inv='$piece_sort' ";
                $sql_1 = "UPDATE inventaire SET 
				    sortie_inv=sortie_inv+'$n_quantite_sort' WHERE id_inv='$n_piece_sort' ";

                $n_sql_2 = "UPDATE inventaire SET 
                    sa_inv=sa_inv+'$quantite_sort' WHERE id_inv='$piece_sort' ";
                $sql_2 = "UPDATE inventaire SET 
                    sa_inv=sa_inv-'$n_quantite_sort' WHERE id_inv='$n_piece_sort' ";

                $n_sql_3 = "UPDATE technicien SET 
                    nbSortie_tech=nbSortie_tech-'$quantite_sort' 
                    WHERE id_tech='$technicien_sort'";
                $sql_3 = "UPDATE technicien SET 
                    nbSortie_tech=nbSortie_tech+'$n_quantite_sort' 
                    WHERE id_tech='$n_technicien_sort'";


                if ($conn->query($n_sql_1) === TRUE and $conn->query($n_sql_2) === TRUE and $conn->query($n_sql_3) === TRUE 
                    and $conn->query($sql_1) === TRUE and $conn->query($sql_2) === TRUE and $conn->query($sql_3) === TRUE) {
                        echo '<script>window.location.href="/london-academy/liste/sortie/sortie.php"</script>';
                } else {
                    echo "<script>alert('Une erreur s'est survenue');</script>";
                }
            } else {
                echo '<script>window.location.href="/london-academy/liste/sortie/sortie.php"</script>';
            }

		} else {
			echo "<script>alert('Une erreur s'est survenue');</script>";
		}
	}


?>