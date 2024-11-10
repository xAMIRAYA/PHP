<?php
include_once("conx.php"); 
if(!empty($_GET["id"]))
{
    $query="delete from utilisateur  where identifiant=:Id";//client2
    var_dump($query);
    $pdostmt=$connexion->prepare($query);
    $pdostmt->execute(["Id"=>$_GET["id"]]);
    $pdostmt->closeCursor();
    header("location:menu.php");
}



include_once("conx.php"); 
if(!empty($_GET["id"]))
{
    $query="delete from clients  where idclient=:Id";//client2
    var_dump($query);
    $pdostmt=$connexion->prepare($query);
    $pdostmt->execute(["Id"=>$_GET["id"]]);
    $pdostmt->closeCursor();
    header("location:menu.php");
}

?>