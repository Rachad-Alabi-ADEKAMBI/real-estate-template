<?php
    require_once 'traitements/db.php';
    include 'traitements/functions.php';

                    if(!empty($_POST)){

                        $errors = array ();

                        if(isset($_POST['email'], $_POST['pass'])
                            &&!empty($_POST['email'] && !empty($_POST['pass']))
                            ){
                                if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                                    $errors['email'] = 'Veuillez entrer un email correct';
                                }
                            $sql = "SELECT * FROM `users` WHERE `email` = ?";

                            $query = $pdo -> prepare($sql);

                            $query->execute([verifyInput($_POST['email'])]);

                            $user = $query->fetch();

                            if(!$user){
                                $req = "SELECT * FROM `users` WHERE `username` = ?";

                                $queryy = $pdo -> prepare($req);
    
                                $queryy->execute([verifyInput($_POST['email'])]);
    
                                $user_username = $queryy->fetch();

                                if(!$user_username){
                                     $errors['email'] = 'Utilisateur/mot de passe incorrect';
                               
                                }

                                else{
                                    if(!password_verify($_POST['pass'], $user_username['pass'])){
                                        $errors['email'] = 'Utilisateur/mot de passe incorrect';
                                       
                                    }

                                    else{
                                        $infos = "SELECT * FROM `users` WHERE `username` = ?";

                                        $infos_query = $pdo -> prepare($infos);
            
                                        $infos_query->execute([verifyInput($_POST['email'])]);
            
                                        $user = $infos_query->fetch();
            
                                        session_start(); 
    
                                        $_SESSION['user'] = [
                                            "id" =>$user['id'],
                                            "username" => $user['username'],
                                            "email" => $user['email'],
                                            "first_name" => $user['first_name'],
                                            "last_name" => $user['last_name'],
                                            "role" => $user['role']
                                        ];
                                        
                                        header("Location: tableau-de-bord.php"); 
                                    }
                                }
    
                            
                            }

                            else{
                                if(!password_verify($_POST['pass'], $user['pass'])){
                                    $errors['email'] = 'Utilisateur/mot de passe incorrect';
                                }
    
                                if(empty($errors)){
    
                                    session_start(); 
    
                                    $_SESSION['user'] = [
                                        "id" =>$user['id'],
                                        "username" => $user['username'],
                                        "email" => $user['email'],
                                        "first_name" => $user['first_name'],
                                        "last_name" => $user['last_name'],
                                        "role" => $user['role']
                                    ];
                                    
                                    header("Location: tableau-de-bord.php"); 
                                }    
                            }     
                        } 
                    }
                               
                ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'meta.php'; ?>

    <title>Connexion</title>
</head>

<body>
    <?php include 'header.php'; ?>

    <div class="login">
           <div class="login__content">

               <div class="login__content__image">
                    <img src="public/images/login.jpeg">
               </div>

               <form action="" method="POST" name="fo" class="form">
              
                    <a href="index.php" class="form__close-btn">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>

                    <?php include 'errors.php'; ?>

                    <h1 class="form__title">
                        Connexion
                    </h1>

                    <div class="form__label inputElemt" for="pwd"> 
                        Pseudo ou email : <br>
                        <input type="text" placeholder="Pseudo ou email" name="email" required>
                    </div               > <br><br> <br>

                    <div class="form__label inputElemt" for="pwd"> 
                        Mot de passe : <br>
                    <input type="password" placeholder="Mot de passe" id="pass"
                     name="pass"  required >
                     <i class="fas fa-eye" onClick="changer()" id="eye"></i>
                    </div> 

                    <div  class="form__button inputElemt submit" 
                        onClick="document.fo.submit()"> 
                        Se connecter
                    </div>

                    <p class="form__text1">
                        Pas encore de compte ? <a href="inscription.php">Inscrivez-vous ici</a>
                    </p>

                    <a class="form__text2" href="mot-de-passe-oublie.php">
                        Mot de passe oublié ?
                    </a>
               </form>
           </div>
       </div>
    </div>

    <?php include 'footer.php'; ?>
    <script>
        e=true;
        function changer(){
            if(e){
                pass= document.getElementById("pass");
                pass.setAttribute("type", "text");
                e=false;
                eye= document.getElementById("eye").setAttribute("style", "color:red");
            }else{
                pass.setAttribute("type", "password");
                eye= document.getElementById("eye").setAttribute("style", "color:$blue");
                e=true;
            }
        }

    </script>
</body>
</html>
