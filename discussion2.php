     
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="index.css"/>
		<title>Chat</title>
	</head>
	
	<body>
    <header>
		<?php include('header.php'); 
		if(!isset($_SESSION['login'])){header('Location: index.php');}
?>
		</header>

            <?php
            
            $connexion = mysqli_connect("localhost", "root", "", "discussion");
			$sql = "SELECT messages.message messages.date utilisateurs.login FROM messages INNER JOIN utilisateurs
					ON messages.id_utilisateur = utilisateurs.id ORDER by date DESC";
			$resultat = mysqli_query($connexion, $sql);
						while($data = mysqli_fetch_array($resultat))
						{
                    ?>
            <section>        
			<?php	
		if ($data['id'] % 2 != 0)
		{
			
		?>
		<div class="container">
		 				
      <p class="id"><?php echo $data['login'];?></p>
         <p class="texte"><?php echo $data['message'];?>	</p>	
         <span class="time"><?php echo $data['date'];?></span>
			</div>
		
		<?php
		}
	else{
?>
		<div class='containe'>
		 				
		<p class='ido'><?php echo $data['id_utilisateur'];?></p>
		   <p class='text'><?php echo $data['message'];?>	</p>	
		   <span class='tim'><?php echo $data['date'];?></span>
								 </div>
								 <?php
		  }
			
		


						
				
						}
						mysqli_close($connexion);
					?>
               
  


				
		<section> <div class="titre">
                  <form  method="post" >
			
				<legend>Poster un message</legend>
            
					<textarea name="message"  placeholder="Poster un message"></textarea>
					<input type="submit" name="submit" value="poster">
                </form></div>    
                
  	</section>         


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

</section>
<footer>
				<section>
				<article>
				Copyright © 2020 All rights reserved
			</article>
		</section>
	</footer>	
			</body>	
</html>
