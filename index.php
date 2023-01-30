<?php
//connection a la base de donnée
require_once ("config/connect.php");

//  lire la page templaates / page
$page =file_get_contents('templates/page.inc.php');

// creation de la variable bordy qui contien un titre et paragraphe
 //$body = "\t\t<h1>Hello</h1>\n\t\t<p>Mon paragraphe<br>\n</p>\n";
 $body = null;

 //Filtre pour vérifier que le paramètre id existe
if(isset($_GET['id'])) {
    $id = $_GET["id"];
} else {
    $id = 1;
}

//Filtre pour savoir si $id est un entier
if (filter_var($id, FILTER_VALIDATE_INT)!== false) {
  //echo("Variable is an integer");
} else {
  //echo("Variable is not an integer");
  $id_sql = 1;
}

try {
    
    $sql= "SELECT * FROM pages WHERE id= :id LIMIT 1;";
    $sth = $pdo->prepare($sql);
    $sth->bindParam('id', $id, PDO::PARAM_INT);
    $sth->execute();
    $body = $sth->fetchall();
    }
    catch (PDOException $e) {
                die("ERROR: Could not able to execute" . $e->getMessage());
            } 

//remplacement du contenu de la variable corps qui est dans page par le contenu de la variable body 
$find = array("{titre}","{corps}");
$replace = array($body[0]['titre'],$body[0]['contenu']);

$remplacement = str_replace($find,$replace,$page);

// affichage 
echo $remplacement;