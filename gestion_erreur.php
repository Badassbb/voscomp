<?php
if(!file_exists("inconnu.txt")){
    die("Fichier non trouvé");
}else{
    $fichier = fopen("inconnu.txt","r");
}

function Division($x, $y){
    if($y == 0){
        throw new Exception("Division par zéro impossible");
    }
    return $x/$y;

}

try{
    echo Division(2,4);
    echo Division(2,0);
}

catch(Exception $e){
    echo "Message d'erreur : " .$e -> getMessage();
}
?>