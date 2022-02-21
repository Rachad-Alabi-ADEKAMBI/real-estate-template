<?php session_start(); 

/*
if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}
*/

include 'model/functions.php';

$title = "Fares Immobilier - Tableau de bord";

ob_start(); 


//stock restant admin
$volume = $pdo->prepare('SELECT *
FROM tfbk_history_admin
ORDER BY id
DESC LIMIT 1');

$volume->execute();

while ($datas = $volume->fetch()){
    $initial_quantity = $datas['final_quantity']+$datas['total_Tfbk'];
    $totalTfbk = $datas['total_Tfbk'];
    $final_quantity = $datas['final_quantity'];
    $marketcap = $datas['marketcap'];
}

//nombres d'adhérants
$btob = $pdo->query("SELECT id FROM users WHERE role= 'btob' and account_status='active'
");

$numberOfBtob = $btob->rowCount();

$btoc = $pdo->query("SELECT id FROM users WHERE role= 'btoc'  and account_status='active'
");

$numberOfBtoc = $btoc->rowCount();

//customer
$req = $pdo->prepare('SELECT *
FROM users WHERE id = ?');

$req->execute([$_SESSION['user']['id']]);

while ($datas = $req->fetch()){
    $total_quantity = $datas['total_quantity'];
}

//recuperation du 
$role = $_SESSION['user']['role'];
$id = $_SESSION['user']['id'];
if($role == 'btoc'){
    $sql = $pdo->prepare("SELECT * from btoc WHERE user_id = ?");
    $sql->execute(array($id));
    $res = $sql->fetch();

$fullname = $res['first_name'].' '.$res['last_name'];

}

if($role == 'btob'){
    $sql = $pdo->prepare("SELECT * from btob WHERE user_id = ?");
    $sql->execute(array($id));
    $res = $sql->fetch();

$fullname = $res['first_name'].' '.$res['last_name'];
}

if($role == 'admin'){
    
$fullname = $_SESSION['user']['username'];
}

?>
   <title>Fineblock - Tableau de bord</title>

<?php 
include 'header.php';
include 'menu.php'; 

?>

<div class="dashboard">
    <div class="dashboard__menu">
        <?php 
        include 'menu-du-tableau-de-bord.php';
        
         ?> 
    </div>

    <div class="dashboard__main">
   

        <div class="dashboard__main__heading main-heading">
            <div class="dashboard-title">
                <h1>
                    Espace  <?= ucwords($_SESSION["user"]["role"]) ?> 
                </h1>
                
               <?php if($_SESSION['user']['role'] == 'btoc' OR  
               $_SESSION['user']['role'] == 'btob'){
                   ?>
                    <p>
                    Content de vous revoir <span> <?= $fullname ?></span>, </p> 
                   <p> Propriétaire d'un volume de points fidélité Fineblock
                     convertissable  en 
                    cashback via le crypto actif TFBK sur <a href="https://www.exchangetfbk.com/" class="link">www.exchangeTFBK.com</a>
                    </p>
                <?php
               } 
               if ($_SESSION['user']['role'] == 'admin'){
                   ?>
                    <p>
                    Content de vous revoir <span> <?= $fullname ?></span>, 
                    que souhaitez vous faire ?
                </p>
                <?php
               } ?>
            </div>

               
                    <?php  if ($_SESSION['user']['role'] === "admin"){  ?>
                        <div class="dashboard-infos">
                              <p class="dashboard-infos__info"><strong>Stock initial:</strong> <span> <?php echo number_format(($initial_quantity), 0, ',', ' ') ?> </p><br>
                              <p class="dashboard-infos__info"><strong>Volume distribué:</strong> <span><?php echo  number_format(($totalTfbk), 0, ',', ' ') ; ?></span> </p><br>
                              <p class="dashboard-infos__info"><strong>Valeur estimable:</strong> <span><?php echo  $marketcap .' €'?></span> </p><br>
                              <p class="dashboard-infos__info"><strong>Solde disponible:</strong> <span> <?php echo  number_format(($final_quantity), 0, ',', ' ') ; ?></span></p><br>
                              </div>
                              <?php } ?>
                
        </div>

        <div class="dashboard__main__background long-background">

        <?php
            if ($_SESSION['user']['role'] === "admin"){
                ?> <div class="boxes">
                <div class="boxes__item">
                        <strong> <?php echo number_format($totalTfbk  , 0, ',', ' '); ?> </strong>
                                <p>Points fidélité distribué</p>
                        </div>  

                <div class="boxes__item">
                    <strong><?php echo $numberOfBtob;  ?></strong> <br>
                    <p>Adhérants professionnels</p>
                </div>

                <div class="boxes__item">
                    <strong><?php echo $numberOfBtoc; ?></strong> <br>
                    <p>Adhérants particuliers</p>
                </div>
             
            </div>
            <?php  } ?>

    <?php if (($_SESSION['user']['role'] === "btob") ||
        ($_SESSION['user']['role'] === "btoc")){?>
            <div class="boxes">
                    <div class="boxes__item">
                            <strong><?php echo number_format($total_quantity, 2, ',', ' '); ?> <br>
                            <span> points Fineblock</span> </strong>
                            <p>Stock personnel</p>
                    </div>

                    <span>
                        x
                    </span>

                    <div class="boxes__item">
                        <strong>
                            <?= number_format($marketcap, 4, ',', ' '). " €"; ?>
                            </strong> <br>
                        <p>Cours du jours estimable</p>
                    </div>

                    <span>
                        =
                    </span>

                    <div class="boxes__item">
                            <?php
                                   $value = $marketcap*$total_quantity;
                                   $value_rounded= number_format($value, 0, ',', ' ');
                            ?>


                        <strong><?php echo "$value_rounded €" ?></strong> <br>
                        <p>Valeur globale convertible en TFBK</p>
                    </div>
            </div>
    <?php } ?>      
        </div>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>