<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="index.css"/>
		<title>Inscription</title>
	</head>




<body>
		
<header>
		<?php include('header.php') ;
		if(isset($_SESSION['login']) || isset($_SESSION['pass']))
		{
			header('Location: index.php');
		}
		
		?>

		</header>

<main>
				<section>	<div class="titre"><legend>Inscription</legend>
				<form  method="post">
						
						
					
				
						<input class="submi" type="text" name="login" placeholder="login"required/></br>
						
						<input class="submi" type="password" name="pass"  placeholder="mot de passe"required/></br>
						
						<input class="submi"  type="password" name="confirmpass" placeholder="confirme mot de passe"required/></br>
						
						<input class="submit"  type="submit" value="Inscription" name="inscription"required/></br>
					
						
				</form> </div>
			
</section>
</main>
</body>
</html>

<?php
if(isset($_POST["inscription"]))
{

	$login=$_POST["login"];
	$password=$_POST["pass"];
	$confirmpassword=$_POST["confirmpass"];
    $connexion=mysqli_connect("localhost","root","","discussion");
	$requete = "SELECT login FROM utilisateurs WHERE login = '$login'"; 
   $query=mysqli_query($connexion, $requete);
	$resultat = mysqli_num_rows($query); 

	if ($resultat==1) 
	{	


	?>
	<h2 class='titre'><p>Ce Login déjà existant</p></h2>
	<?php 
	  }
elseif ($_POST["pass"] != $_POST["confirmpass"]) 
{
?>
<h2 class='titre'> <p>Attention ! Mot de passe différent</p></h2>
<?php
}
else 
{
$requete2 = "INSERT INTO utilisateurs(login,  password) VALUES ('$login','$password')";
$query2 = mysqli_query($connexion, $requete2);
header('Location:connexion.php');
}
}

?>	
