
<style>
     label{
        display: inline-block;
        width: 100px;
        border: 2px;
     }
     input{
        margin: 10px;
        margin-left: 50px;
     }
     body{
        min-height: 100vh;
    }
   
    form{
    color: #000;
    text-decoration: none;
    font-size: 20px;
    margin-left: 30%;
    margin-top: 5%;
    }
</style>
<?php
include_once("conx.php");

if (!empty($_GET["id"])) 
{
    $query="select idclient,nom,prenom,ville,genre from clients where idclient=:idclient";

$pdostmt=$connexion->prepare($query);
$pdostmt->execute(["idclient"=>$_GET["id"]]);
$ligne=$pdostmt->fetch(PDO::FETCH_ASSOC);
  $pdostmt->closeCursor();
}
?>
<form class="row g-3" method="POST">
  <input type="hidden" name="saveId" value=<?php echo $ligne["idclient"] ?>>
  <div class="col-md-6">
    <label  class="form-label">Nom</label>
    <input type="text" class="form-control" id="nom" name="nom" value=<?php echo $ligne["nom"] ?>>
  </div>
  <div class="col-12">
    <label class="form-label">Prenom</label>
    <input type="text" class="form-control" id="prenom" name="prenom" value=<?php echo $ligne["prenom"] ?>>
  </div>
  <div class="col-12">
    <label class="form-label">Ville</label>
    <input type="text" class="form-control" id="ville" name="ville" value=<?php echo $ligne["ville"] ?>>
  </div>
  <div class="col-12">
    <label class="form-label">Genre</label>
    <input type="text" class="form-control" id="genre" name="genre" value=<?php echo $ligne["genre"] ?>>
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary">Modifier</button>
  </div>
</form>
<?php
if (!empty($_POST))
{
      $query="update clients set nom=:nom,prenom=:prenom,ville=:ville,genre=:genre where idclient=:id";
    var_dump($query);
    $pdostmt=$connexion->prepare($query);
    $pdostmt->execute(["nom"=>$_POST["nom"],"prenom"=>$_POST["prenom"],"ville"=>$_POST["ville"],"genre"=>$_POST["genre"],"id"=>$_POST["saveId"]]);
    $pdostmt->closeCursor();
    header("Location:listerclient.php");
}
?>
