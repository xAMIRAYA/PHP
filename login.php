<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<?php

include_once("conx.php");
?>

<br><br>

<?php
if (isset ($_POST["envoi"])){

 $identifiant = $_POST['identifiant'];
 $password = $_POST['mdp'];

  $req=$connexion->prepare('select * from utilisateur  where identifiant=? and mdp=?');
  $req-> execute(array($identifiant,$password));

  if ($req->rowCount()>0){
      header("location:menu.php");
   }
  else{
     echo "identifiant et mots de passe inouvlable";
  } 
}

  ?>

<form method="post">
<a href="menu.php" type="button" class="btn btn-dark" style="float:center">menu</a>
    <h1>verifier l'existance de lidentifiant et le mots de passe saisie</h1>
    <label for="identifiant">identifiant:</label>
    <input type="text" name="identifiant" id="identifiant" required><br>

    <label for="mdp">Password:</label>
    <input type="mdp" name="mdp" id="mdp" required><br>

    <button type="submit" name="envoi"  class="btn btn-primary">Login</button>
   

<!-- 
    <button class="btn btn-success btn-md" name="envoi">
      <span class="glyphicon glyphicon-print"></span> Login 
    </button> -->

</form>

