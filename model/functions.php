<?php


//local
try
{
	$pdo = new PDO('mysql:host=localhost;dbname=fares;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


function debug ($variable){
    echo'<pre>'  .print_r($variable,  true). '</pre';
}

function str_random($length){
    $alphabet="0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";

    return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
}

// obtenir le titre de la page
function PageName() {
    return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
  }
  
  $current_page = PageName();

//controle des input
function verifyInput($inputContent){
    $inputContent = htmlspecialchars(
        $inputContent
    );

    $inputContent = trim($inputContent);

    return $inputContent;
}


//function Mail
/*<?php
ini_set( 'display_errors', 1);
//$from = "contact@fineblock.eu";
//$to ="adekambirachad@gmail.com";
$subject = "Finalisation de votre adhésion";
$message = "Fineblock vous remercie de votre patience, vous pouvez finaliser votre adhésion en suivant ce lien:\n
            https://fineblock.eu/inscription-definitive-particuliers.php?id=06qwkiXxTTIG82LwwDRXS9s6l01zP1IGE5GuHXFyiY6AiSK0rKENvDePKnPK";
$headers = "From:" . $from;
mail($to,$subject,$message, $headers);
echo "L'email a été envoyé.";
?>
*/


