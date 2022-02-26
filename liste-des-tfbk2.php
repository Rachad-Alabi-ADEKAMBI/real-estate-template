<?php session_start(); 

if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}

require_once 'traitements/db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php  include 'meta.php'; ?>

   <title>Fineblock - Liste des professionnels</title>
</head>

<body>

<?php include 'header.php'; ?>

<div class="dashboard">
    <div class="dashboard__menu">
        <?php include 'menu-du-tableau-de-bord.php'; ?>
    </div>

    <div class="dashboard__main">
        <div class="dashboard__main__heading">
            <div class="dashboard-title">
            <label for="" class="" id="open">
                <i class="fas fa-ellipsis-v"></i>
                </label>
                
                <h1>
                    Liste des TFBK
                </h1>
                
                <p>
                    La liste des tfbk<br>
                </p> <br>
            </div>
        </div>

        <div class="dashboard__main__background">
            </div>

            <div class="list_customer">
                <?php
                                    //on determine sur quelle page on se trouve
                if (isset($_GET['page']) && !empty($_GET['page'])){
                    $currentPage = (int) strip_tags($_GET['page']);

                }else{
                    $currentPage = 1;
                }

                //on determine le nombre de clients total

                $sql= "SELECT COUNT(id) AS nb_customers 
                FROM tfbk_history_customers
                WHERE operation_name != 'transfert entre adherants'";

                $query = $pdo->prepare($sql);

                $query->execute();

                $numberOfPages = $query->fetch();


                $nbcustomers = (int) $numberOfPages['nb_customers'];

                //on détermine le nombre de clients par pages
                $parPage = 2;

                //On calcule le nombre total de pages
                $pages = ceil($nbcustomers / $parPage);

                //Calcul du premier client
                $premier = ($currentPage * $parPage) - $parPage; 

                $query = $pdo->prepare('SELECT date_of_operation,
                receiver_name, receiver_id
                FROM tfbk_history_customers
                WHERE operation_name != "transfert entre adherants"
                ORDER BY date_of_operation DESC
                LIMIT :premier, :parpage');

                $query->bindValue(':premier', $premier,  PDO::PARAM_INT);
                $query->bindValue(':parpage', $parPage, PDO::PARAM_INT);

                $query->execute();

                $articles = $query->fetchAll();

                $query->closeCursor();


                ?>
                    <div class="results">
                                <table>
                                    <tr>
                                        <th>Date</th>
                                        <th>Nom de l'adhérant</th>
                                        <th>Volume global</th>
                                    </tr>
                                    
                                        <?php
                                                foreach($articles as $article){
                                                    $getQuantity = $pdo->prepare("SELECT id FROM tfbk 
                                                    WHERE fk_owner_id = ?");

                                                    $getQuantity->execute(array($article['receiver_id']));

                                                    $row_count = $getQuantity->rowCount();
                                                    $row_count_formated = number_format($row_count, 0, ',', ' ');
                                                    $getQuantity->closeCursor();
                                                    ?>
                                                        <tr>
                                                            <td><?= $article['date_of_operation'] ?></td>
                                                            <td><a href="details-tfbk-adherant.php?id= <?= $article['receiver_id'] ?>">
                                                            <?php echo "{$article['receiver_name']} " ?>
                                                            </a></td>
                                                            <td><?= $row_count_formated ?></td>
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
                <?php



                /*
                                    $req = $pdo->query('SELECT users.id, btoc.last_name,  btoc.first_name,
                                        btoc.date_of_payment
                                    FROM users
                                    INNER JOIN btoc
                                        ON btoc.user_id = users.id
                                    ORDER BY last_name ASC;');

                                    echo "<table border='1'>";
                                    echo"<tr><td>Nom et Prenom</td><td>Volume global</td><td>Date d'adhésion</td><td>Id de l'adhérant </td></tr>\n";
                                    

                                    while ($datas = $req->fetch()){ 
                                        $getQuantity = $pdo->prepare("SELECT id FROM tfbk 
                                        WHERE fk_owner_id = ?");
                                    
                                    $getQuantity->execute(array($datas['id']));
                                    
                            $row_count = $getQuantity->rowCount();
                            $row_count_formated = number_format($row_count, 0, ',', ' ');

                                        echo"<tr><td>"?><a href="fiche-particuliers.php?id= <?= $datas['id'] ?>"> 
                                        <?php echo "{$datas['last_name']} {$datas['first_name']} "?> 
                                        </a> <?php echo" </td><td>$row_count_formated</td><td> {$datas['date_of_payment']} </td>
                                            <td> {$datas['id']} </td></tr>\n";

                                        
                                        }

                                        echo "</table>";
                                    $req->closeCursor();
                                    */
                                    ?> 
                            </div>
            </div>
    </div>
</div>
    <?php include 'footer.php'; ?>
    <script src="public/js/script.js" ></script>
</body>
</html>