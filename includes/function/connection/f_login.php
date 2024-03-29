 <?php   
    if(strlen($_SESSION['userlogin']) > 0){
		header('location:/london-academy/liste/fournisseur/fournisseur.php');
	}
	elseif(isset($_POST['login'])) 
	{
		$username = htmlspecialchars($_POST['username']);
		$password = htmlspecialchars($_POST['password']);
		$sql = "SELECT * from utilisateur where username_ut=:username";
		$query = $dbh->prepare($sql);
		$query->bindParam(':username',$username,PDO::PARAM_STR);
		$query-> execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		if($query->rowCount() > 0) 
		{
			foreach ($results as $row) 
			{
				if (md5($password) == $row->password_ut) 
				{
					session_start();
					$_SESSION['userlogin']=$row->username_ut;
					$_SESSION['id_ut']=$row->id_ut;

					echo "<script>window.location.href='/london-academy/liste/fournisseur/fournisseur.php'; </script>";
				}
				else 
				{
					$wrongpassword='
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Oh Snapp!😕</strong> Alert <b class="alert-link">Password: </b>You entered wrong password.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>';
				}
			}
		}
		//if username or email not found in database
		else 
		{
			$wrongusername='
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Oh Snapp!🙃</strong> Alert <b class="alert-link">UserName: </b> You entered a wrong UserName.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
		}
	}
?>