<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
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
<body>
<a href="menu.php" type="button" class="btn btn-dark" style="float:center">menu</a>
<form class="" method="post" autocomplete="off">
        <h1>entrer votre information client</h1>
        <label for="idclient">Identifiant</label>
        <input type="" name="idclient">
        <br>
        <label for="nom">Nom</label>
        <input type="" name="nom">
        <br>
        <label for="prenom">Prenom</label>
        <input type="" name="prenom">
        <br>
        <br>
        <label for="ville">Ville</label>
        <input type="" name="ville">
        <br>
        <label for="genre">Genre</label>
        <input type="" name="genre">
        <br>

        <br>
        <button type="submit" name="submit" class="btn btn-primary">envoyer</button>
    </form>
</body>
</html>
<?php

include_once("conx.php"); 
// $conn=include_once("conx.php"); 

if(!empty($_POST["idclient"])&&!empty($_POST["nom"])&&!empty($_POST["prenom"])&&!empty($_POST["ville"])&&!empty($_POST["genre"]))
{
    $query="insert into clients values (:idclient,:nom,:prenom,:ville,:genre)";
    var_dump($query);
    $pdostmt=$connexion->prepare($query);
    $pdostmt->execute(["idclient"=>$_POST["idclient"],"nom"=>$_POST["nom"],"prenom"=>$_POST["prenom"],"ville"=>$_POST["ville"],"genre"=>$_POST["genre"]]);
    $pdostmt->closeCursor();
    header("location:listerclient.php");
}

?>