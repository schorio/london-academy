<?php
    //calling the config file
    include_once("includes/config.php"); 

    if(isset($_POST['ajouter_resp'])){

        $libelle_resp = htmlspecialchars($_POST['libelle_resp']);
        $matricule_resp = htmlspecialchars($_POST['matricule_resp']);
        $fonction_resp = htmlspecialchars($_POST['fonction_resp']);
        $image_resp = htmlspecialchars($_POST['image_resp']);
        //grabbing the picture
        $file = $_FILES['image_resp']['name'];
        $file_loc = $_FILES['image_resp']['tmp_name'];
        $folder="../../assets/img/responsable/"; 
        $new_file_name = strtolower($file);
        $final_file=str_replace(' ','-',$new_file_name);

        if(move_uploaded_file($file_loc,$folder.$final_file)){
            $image_resp=$final_file;
        }

        $sql = "INSERT INTO `responsable` (`libelle_resp`, `matricule_resp`, `fonction_resp`,  `image_resp`) 
                                    VALUES (:libelle_resp, :matricule_resp,  :fonction_resp,   :pic)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':libelle_resp',$libelle_resp,PDO::PARAM_STR);
        $query->bindParam(':matricule_resp',$matricule_resp,PDO::PARAM_STR);
        $query->bindParam(':fonction_resp',$fonction_resp,PDO::PARAM_STR);
        $query->bindParam(':pic',$image_resp,PDO::PARAM_STR);
        $query->execute();
        $lastInsert = $dbh->lastInsertId();
        if($lastInsert>0){
            echo "<script>window.location.href='/london-academy/liste/responsable/responsable.php';</script>";
        }else{
            echo "<script>alert('ERREUR');</script>";
        }
    }
    

    if(isset($_POST['supprimer_resp'])){
		// sql to delete a record
		$supprimer_id = $_POST['supprimer_id'];
		$sql = "DELETE FROM responsable WHERE id_resp='$supprimer_id' ";
		if ($conn->query($sql) === TRUE) {
			echo '<script>window.location.href="/london-academy/liste/responsable/responsable.php"</script>';
		} else {
			echo "<script>alert('Une erreur s'est survenue');</script>";
		}
	}
    

    if(isset($_POST['modifier_resp'])){
		$modifier_id = $_POST['modifier_id'];
		$n_libelle_resp = $_POST['n_libelle_resp'];
        $n_matricule_resp = $_POST['n_matricule_resp'];
        $n_fonction_resp = $_POST['n_fonction_resp'];
		$n_observation_resp = $_POST['n_observation_resp'];
		$sql = "UPDATE responsable SET 
			libelle_resp='$n_libelle_resp',
            matricule_resp='$n_matricule_resp',
            fonction_resp='$n_fonction_resp',
			observation_resp='$n_observation_resp'
			WHERE id_resp='$modifier_id' ";
		if ($conn->query($sql) === TRUE) {
			echo '<script>window.location.href="/london-academy/liste/responsable/responsable.php"</script>';
		} else {
			echo "<script>alert('Une erreur s'est survenue');</script>";
		}
	}

?>