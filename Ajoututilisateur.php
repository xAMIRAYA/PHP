<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <?php

    include_once("conx.php");
    $conn = include_once("conx.php");

    $error_password = ' ';
    if (!empty($_POST["identifiant"]) && !empty($_POST["email"]) && !empty($_POST["mdp"])) {
        if ($_POST["mdp1"] !== $_POST["mdp"]) {
            $error_password = 'Password Incorrect';
        } else {

           //criptage de mots de passe
            
            $id=$_POST['identifiant'];
            $pass=sha1($_POST['mdp']); // sha1 est une fonction de cryptage predefinie dans PHP 
            $req=$connexion->prepare('insert into utilisateur(identifiant,mdp,email) values (?,?,?) ');
            $req->execute(array($id,$pass,$_POST["email"]));
           
            
            // $query = "insert into utilisateur values (:identifiant,:email,:mdp)";
            // var_dump($query);
            // $pdostmt = $connexion->prepare($query);
            // $pdostmt->execute(["identifiant" => $_POST["identifiant"], "email" => $_POST["email"], "mdp" => $_POST["mdp"]]);
            $req->closeCursor();
            header("location:listerUtilisateur.php");
        }
    }

    ?>
</head>
<style>
    label {
        display: inline-block;
        width: 100px;
        border: 2px;
    }

    input {
        margin: 10px;
        margin-left: 50px;
    }

    body {
        min-height: 100vh;
    }

    form {
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
        <h1>entrer votre information utilisateur</h1>
        <label for="identifiant">utilisateur</label>
        <input type="" name="identifiant">
        <br>
        <label for="email">Email</label>
        <input type="text" name="email">
        <br>
        <label for="mdp1">Mots De Passe</label>
        <input type="password" name="mdp1">
        <br>
        <br>
        <label for="mdp">Confirmer_MDP</label>
        <input type="password" name="mdp">
        <br>
        <div style="color: red;">
            <?php echo $error_password ?>
        </div>
        <br>
        <button type="submit" name="submit" class="btn btn-primary">envoyer</button>
    </form>



    
</body>

</html>

