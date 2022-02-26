<?php
//$user_id = $_GET['id'];
//$token = $_GET['token'];
require 'db.php';



$req = $pdo->prepare('SELECT token FROM users WHERE id = ?');

$req->execute(array($_GET['id']));

echo '<ul>';

while ($user = $req->fetch())
{
	echo '<li>' . $user['confirmation_token'] . ' </li>';
}
echo '</ul>';


/*
if ($user &&  $user->confirmation_token == $token){
    die('pas ok');
}
else{
    die('ok');
}
*/
?>