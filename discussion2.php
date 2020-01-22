
                <?php
     session_start();
					$connexion = mysqli_connect("localhost", "root", "", "discussion");
					$sql = "SELECT * FROM messages";
					$resultat = mysqli_query($connexion, $sql);
				?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="index.css"/>
		<title>Admin</title>
	</head>
	
	<body>
		
		<section class="container">
		 					<?php
						while($data = mysqli_fetch_array($resultat))
						{
					?>

         <p><?php echo $data['message'];?>	</p>	
         <p><?php echo $data['id_utilisateur'];?></p>	
         <span class="time-right"><?php echo $data['date'];?></span>
                            
         
                        </section>

		<section class="container darker">				<
								
        <p class="right"><?php echo $data['message'];?>	</p>	
         <p><?php echo $data['id_utilisateur'];?></p>	
         <span class="time-left"><?php echo $data['date'];?></span>



						
					<?php
						}
						mysqli_close($connexion);
					?>
               </section>
  

<div >
  <img src="/w3images/avatar_g2.jpg" alt="Avatar" >
  <p>Hey! I'm fine. Thanks for asking!</p>
  <span class="">11:01</span>
</div>
	</body>
</html>
					</section>
		<section>
                  <form class="formu" method="post" >
			<div class="titre">
				<legend>Ajouter un commentaire</legend>
            </div> 
					<textarea name="message"  placeholder="ÉCRIVEZ VOTRE COMMENTAIRE"></textarea>
					<input type="submit" name="submit">
                </form>
                
              


<?php

if(isset($_POST['submit']))
{
    $utilisateur = $_SESSION['id'];
    $commentaire = $_POST['message'];
    $commentaire2 = addslashes($commentaire);
    
    $connexion = mysqli_connect("localhost", "root", "", "discussion");
    $requete= "INSERT INTO messages (message,id_utilisateur, date) VALUES ('$commentaire2','". $utilisateur."', NOW())";

    mysqli_query($connexion, $requete);
    mysqli_close($connexion);
    header("Location:discussion.php");
						
}
				?>