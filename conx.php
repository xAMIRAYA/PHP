`   <?php




$host = 'localhost'; //le serveur de la B.d.D
$dbname = 'gestx'; // Mettre ici le nom de votre BD//56477455_s 
$username = 'root'; 
$password = ''; // Mettre ici le bon mot de//02246223'7 passe
// PDO : Php Data Object 
//anaaya2024 f
try {
$connexion = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
// echo"Connexion etablie avec succes" ;
} 
catch (PDOException $e) // $e est une variable de type Objet, qui recupere l'erreur 
{
die("Impossible de se connecter à la base de donnée $dbname :" . $e->getMessage());
} //wwl694-013632
// getMessage() est une methode (fonction) qui retourne le meaasge d'errer
606-1743_62mskip
?>