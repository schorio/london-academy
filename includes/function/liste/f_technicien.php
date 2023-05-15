<?php
    //calling the config file
    include_once("includes/config.php"); 

    if(isset($_POST['ajouter_tech'])){

        $libelle_tech = htmlspecialchars($_POST['libelle_tech']);
        $image_tech = htmlspecialchars($_POST['image_tech']);
        //grabbing the picture
        $file = $_FILES['image_tech']['name'];
        $file_loc = $_FILES['image_tech']['tmp_name'];
        $folder="../../assets/img/technicien/"; 
        $new_file_name = strtolower($file);
        $final_file=str_replace(' ','-',$new_file_name);

        if(move_uploaded_file($file_loc,$folder.$final_file)){
            $image_tech=$final_file;
        }

        $sql = "INSERT INTO `technicien` (`libelle_tech`,  `image_tech`) 
                                    VALUES (:libelle_tech,  :pic)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':libelle_tech',$libelle_tech,PDO::PARAM_STR);
        $query->bindParam(':pic',$image_tech,PDO::PARAM_STR);
        $query->execute();
        $lastInsert = $dbh->lastInsertId();
        if($lastInsert>0){
            echo "<script>window.location.href='/epn/liste/technicien/technicien.php';</script>";
        }else{
            echo "<script>alert('ERREUR');</script>";
        }
    }
    

    if(isset($_POST['supprimer_tech'])){
		// sql to delete a record
		$supprimer_id = $_POST['supprimer_id'];
		$sql = "DELETE FROM technicien WHERE id_tech='$supprimer_id' ";
		if ($conn->query($sql) === TRUE) {
			echo '<script>window.location.href="/epn/liste/technicien/technicien.php"</script>';
		} else {
			echo "<script>alert('Une erreur s'est survenue');</script>";
		}
	}
    

    if(isset($_POST['modifier_tech'])){
		$modifier_id = $_POST['modifier_id'];
		$n_libelle_tech = $_POST['n_libelle_tech'];
		$n_observation_tech = $_POST['n_observation_tech'];
		$sql = "UPDATE technicien SET 
			libelle_tech='$n_libelle_tech',
			observation_tech='$n_observation_tech'
			WHERE id_tech='$modifier_id' ";
		if ($conn->query($sql) === TRUE) {
			echo '<script>window.location.href="/epn/liste/technicien/technicien.php"</script>';
		} else {
			echo "<script>alert('Une erreur s'est survenue');</script>";
		}
	}

?>