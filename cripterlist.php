<?PHP
include_once ("conx.php");

if (isset($_POST['envoi']))
{
  if (!empty($_POST['identifiant']) and !empty($_POST['mdp1']) and !empty($_POST['mdp2']))
  {
    if ($_POST['mdp1']<>$_POST['mdp2'])
    {
        echo "Les mots de passe ne sont pas identiques !" ;
    }
    else
    {
    $id=$_POST['identifiant'];
    $pass=sha1($_POST['mdp1']); // sha1 est une fonction de cryptage predefinie dans PHP 
    $req=$connexion->prepare('insert into utilisateur(identifiant,mdp) values (?,?) ');
    $req->execute(array($id,$pass));
    header("Location:menu.php");
    }
  }
  else{
  echo "Attention, Identifiant ou mot de passe vide !";
}
}
?>
    
<!DOCTYPE html>
<html>
  <head>
  </head>

  <body>
    <form method="POST" action="" align="center">
     <p> Votre identifiant : 
     <input type="text" name="identifiant"> </p>
     <p> Votre mot de passe : 
     <input type="password" name="mdp1"> </p>
     <p> Votre mot de passe a nouveau : 
     <input type="password" name="mdp2"> </p>
     <br>
     <input type="submit" name="envoi">
  </form>
  </body>
</html>


