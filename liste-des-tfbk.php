<?php session_start(); 

require_once 'traitements/db.php'; 

include 'traitements/traitement-liste-des-tfbk.php';

$user_id = $_SESSION['user']['id'];

if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php  include 'meta.php'; ?>

<title>Fineblock - Liste des TFBK</title>
</head>

<body>

<?php include 'header.php'; 
?>

<div class="dashboard">
    <div class="dashboard__menu">
        <?php include 'menu-du-tableau-de-bord.php'; ?>
    </div>

    <div class="dashboard__main">
        <div class="dashboard__main__heading dashboard-main">
            <div class="dashboard-title">
                <h1>
                    Liste des TFBK
                </h1>
            </div>
        </div>

        <div class="dashboard__main__background">
                            <div class="list_customer">

                                <div class="results">
                                            <table>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Nom de l'adhérant</th>
                                                    <th>Volume global</th>
                                                    <th>Volume acheté</th>
                                                </tr>
                                                    <?php
                                                            foreach($articles as $article){
                                                                $getQuantity = $pdo->prepare("SELECT total_quantity FROM users 
                                                                WHERE id = ?");

                                                                $getQuantity->execute(array($article['receiver_id']));

                                                                while ($data = $getQuantity->fetch())
                                                                    {
                                                                        $total_quantity = $data['total_quantity'];
                                                                    }

                                                                $row_count_formated = number_format($total_quantity, 0, ',', ' ');
                                                                $getQuantity->closeCursor();
                                                                ?>
                                                                    <tr>
                                                                        <td><?= $article['date_of_operation'] ?></td>
                                                                        <td><a href="details-tfbk-adherant.php?id= <?= $article['receiver_id'] ?> &amp; name= <?= $article['receiver_name'] ?> ">
                                                                        <?php echo "{$article['receiver_name']} " ?>
                                                                        </a></td>
                                                                        <td><?= $row_count_formated ?></td>
                                                                        <td><?= number_format($article['quantity'], 4, ',', ' ') ?></td>
                                                                    </tr>
                                                                <?php

                                                            }
                                                    ?>
                                            </table>
                                            <ul class="pagination">
                                                    <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?> ">
                                                        <a href="liste-des-tfbk.php?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                                                    </li>
                                                    
                                                    <?php   for ($page = 1; $page <= $pages; $page++): ?>

                                                        <li class="page-item <?= ($currentPage == $page) ? "active": "" ?> ">
                                                            <a href="liste-des-tfbk.php?page=<?= $page ?>" class="page-link"> <?= $page ?></a>
                                                        </li>
                                                
                                                    <?php endfor ?>
                                                    <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?> ">
                                                        <a href="liste-des-tfbk.php?page=<?= $currentPage + 1 ?>"  class="page-link">Suivante</a>
                                                    </li>
                                                </ul>
                                               
                                </div>
                            </div>
                    </div>
        </div>
</div>
    <?php include 'footer.php'; ?>
    <script src="public/js/script.js" ></script>
</body>
</html>