<?php

    if(strlen($_SESSION['userlogin'])==0){
        header('location:/london-academy/includes/function/connection/login.php');
    }

    if(isset($_POST['changer_mdp'])){

        $sql = "SELECT password_ut as password_ut FROM utilisateur WHERE username_ut='admin'";
        $query = $dbh->prepare($sql);
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $mdp = $row['password_ut'];

        $a_mdp = md5($_POST['a_mdp']);
		$n_mdp = md5($_POST['n_mdp']);
		$n__mdp = md5($_POST['n__mdp']);

        if ($a_mdp !== $mdp) {
            echo "<script>alert('Ancien mot de passe incorrect');</script>";
			echo "<script>window.location.href='/london-academy/includes/function/utilisateur/changer_mdp.php';</script>";
        }
        else {
            if ($n_mdp !== $n__mdp) {
                echo "<script>alert('Confirmer votre nouveau mot de passe');</script>";
                echo "<script>window.location.href='/london-academy/includes/function/utilisateur/changer_mdp.php';</script>";
            }
            else {
                $sql = "UPDATE utilisateur SET 
                            password_ut='$n_mdp'
                        WHERE username_ut='admin' ";

                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('Mot de passe changer avec succes');</script>";
                    echo "<script>window.location.href='/london-academy/includes/function/utilisateur/changer_mdp.php';</script>";
                } 
                else {
                    echo "<script>alert('Une erreur s'est survenue');</script>";
                }
            }
        }


		
	}
?>