<?php session_start(); 

if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}
require_once 'traitements/db.php';

$req = $pdo->prepare("SELECT * FROM tfbk_history_admin 
ORDER BY id DESC LIMIT 1 ");
$req->execute();

$datas = $req->fetch();
$marketcap = $datas['marketcap'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'meta.php'; ?>

    <title>Fineblock - fiche particuliers</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <?php
       

             $req =  $pdo->prepare('SELECT *
         FROM btoc
         INNER JOIN users
         ON btoc.user_id = users.id
         WHERE users.id = ?');

        $req->execute(array($_GET['id']));

        while ($datas = $req->fetch()){
             
       ?>

    <div class="entreprise">
               
        <h2 class="entreprise__title">
                    Fiche adhérant particulier
                </h2> 

                <div class="entreprise__content">

                
                            <?php if ($datas['account_status'] == 'inactive'){ ?>
                    <a href="prospects-en-attente.php" class="form__close-btn">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
                <?php } ?>

                <?php if ($datas['account_status'] == 'active'){ ?>
                    <a href="liste-des-particuliers.php" class="form__close-btn">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
                <?php } ?>
                <h2 class="entreprise__content__title">Informations générales </h2> <br>
                
                            
                <div class="entreprise__content__infos">

                
                    <div class="left">
                    <p>Email: <?php echo $datas['email'] ?> </p> 
                            <p> Type Adhérant: <?php echo $datas['role'] ?>  </p> 
                            <p>Pseudo:  <?php echo $datas['username'] ?></p>
                            <p>Source:  <?php echo $datas['source'] ?></p>

                            <?php
                                if ($datas['source'] == 'parrainage'){ 
                                        $sponsor = $pdo->prepare("SELECT * FROM
                                        sponsorships WHERE sponsored_id =?");

                                        $sponsor->execute(array($_GET['id']));

                                            while ($res = $sponsor->fetch()){
                                                $sponsor_name = $res['sponsor_name'];
                                            } ?>
                                            <p>Parrain:  <?php echo $sponsor_name; ?></p>
                                <?php } 
                            ?>
                            
                    </div> 

                    <div class="right">
                        <p> Date de l'inscription: <?php
                        
                        $originalDate = $datas['date_of_insertion'];       
                        echo date("d/m/Y", strtotime($originalDate)); 

                        ?></p>

                     
                        
                        <p> Adhésion choisie: <?php echo $datas['offer_id'] ?> </p> 
                        <p> Type d'adhésion: <?php echo $datas['offer_type'] ?> </p> 
                        <p> Volume en PF: <span> <?php echo number_format($datas['total_quantity'], 4, ',', ' '); ?> </span</p>
                        <p> Volume en €: <span> <?php echo number_format($datas['total_quantity'] * $marketcap, 2, ',', ' ')." €" ?> </span</p>
                    
                    </div>
                </div>
                <hr>

                <div class="entreprise__content__infos">
                    <div class="left">
                        <p>Nom prénom: <?php echo $datas['first_name']."<br> ".$datas['last_name'] ?></p> 
                        <p>Adresse postale: <?php echo $datas['zip_code'] ?></p>
                    </div>

                    <div class="right">
                    <p>Téléphone: <?php echo "+" .$datas['mobile_phone_code']." ".$datas['mobile_phone_number'] ?></p>
                        <p>Ville: <?php echo $datas['city'] ?></p>
                        <p>Pays: <?php echo $datas['country'] ?></p>
                    </div>
                </div>

                <hr>
                <div class="entreprise__content__infos">
                    
                    <div class="left">
                    <img src="public/images/filesOfCustomers/<?=$datas['card_picture']?>" alt=""
                        class="picture">
                        <br>  <p>Justificatif utilisé: <?php echo $datas['user_card'] ?></p>
                    </div>
                </div>

                <hr>
                
                <div class="entreprise__content__infos">
                    
                    <div class="left">

                    <?php
                    $modality = $pdo->prepare("SELECT * FROM products_membership_btoc
                    WHERE id = ?");

?>
                                        <h2  class="entreprise__content__title">Situation de l'adhérant</h2> <br>
                                        <p>Total de modalités: <?= $datas['total_modality'] ?></p> <br>
                                        <p>Modalités déjà payées: <?= $datas['done_modality'] ?></p>
                    </div>
                </div>
                </div>
            <?php
                }   
                ?>
    </div>

    
<?php include 'footer.php'; ?>
</body>
</html>