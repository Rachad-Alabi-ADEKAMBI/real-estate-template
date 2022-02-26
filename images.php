<?php
    if(isset($_POST['valider'])){

        include 'traitements/db.php';

        $reqPicture = $pdo->prepare("insert into images(nom, taille, type,bin, user_id) 
         VALUES (?, ?, ?, ?, ?)");

         $reqPicture->execute(array($_FILES["image"]["name"], $_FILES["image"]["size"],
            $_FILES["image"]["type"],  file_get_contents($_FILES["image"]["tmp_name"], $user_id)));
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data" >
        <input type="file" name="image"> <br>
        <input type="submit" name="valider" value="Charger" >
    </form>
</body>
</html>