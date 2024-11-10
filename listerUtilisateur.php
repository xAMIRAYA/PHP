<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>listeUtilisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>

  <body>
<h1 class="mt-5"> Utilisateurs</h1>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<a href="ajoututilisateur.php" class="btn btn-primary" style="float:right;margin-bottom:20px;">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
  <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
</svg>
</a>
<a href="menu.php" type="button" class="btn btn-dark" style="float:center">menu</a>
<?php

$count=0;

include_once("conx.php");

$query="select identifiant,email,mdp from utilisateur";

$pdostmt=$connexion->prepare($query);

$pdostmt->execute();

?>
<table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>identifiant</th>
                <th>email</th>
                <th>Mots De Passe</th>
            </tr>
        </thead>
<?php
while ($ligne=$pdostmt->fetch(PDO::FETCH_ASSOC)):
  $count++;
?>
<tr>
  
    <td> <?php echo $ligne["identifiant"]; ?></td>
    <td> <?php echo $ligne["email"]; ?></td>
    <td> <?php echo $ligne["mdp"]  ; ?></td>
    <td>
        <a href="update.php?id=<?php echo $ligne["identifiant"] ?>" class="btn btn-success">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
            </svg>
        </a>
    </td>

    <td> 
        Bouton au lieu de lien pour Supprimer
              <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button> -->
                <a href="delete.php?id=<?php echo $ligne["identifiant"]; ?>" 
                onclick="return confirm('vous comfirmer la suppresion?');"   type="button" class="btn btn-primary">Supprimer</a>
                
              </div>
            </div>
          </div>
        </div>
      </td>
</tr>
<?php
endwhile;
?>
</table>

</body>
</html>
