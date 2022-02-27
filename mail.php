<?php
ini_set( 'display_errors', 1);
$from = "contact@fineblock.eu";
$to ="rayliota90@gmail.com";
$subject = "Finalisation de votre adhésion";
$message = "Fineblock vous remercie de votre patience, vous pouvez finaliser votre adhésion en suivant ce lien:\n
            https://fineblock.eu/inscription-definitive-particuliers.php?id=06qwkiXxTTIG82LwwDRXS9s6l01zP1IGE5GuHXFyiY6AiSK0rKENvDePKnPK";
$headers = "From:" . $from;
mail($to,$subject,$message, $headers);
echo "fait.";
?>