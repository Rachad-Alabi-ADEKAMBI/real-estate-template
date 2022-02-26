<?php
//On se connecte à la bdd pour récupérer les éléments à afficher
// il s'agit de la date et de la valeur du jour
include 'traitements/db.php';
$graph = $pdo->prepare("SELECT date_of_operation, marketcap FROM tfbk_history_admin LIMIT 5");
$graph->execute();


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChartJS</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous">
</head>
<body>

    <div class="graph">
        <canvas id="myChart"></canvas>
        <p class="graph_text">
            Valeur en Avril 2021
                (0.00005 € )
        </p>
    </div>

    <script>
        Chart.defaults.global.title.display = true;
        Chart.defaults.global.title.text = 'pas de titre';
    </script>

  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" crossorigin="anonymous"></script>

    <script>
        var ctx = document.querySelector("#myChart").getContext('2d');

        var chart = new Chart(ctx, {

            type: "line",
            data: {
                //on récupère les dates
                // c'est ici que les dates doivent s'afficher dynamiquement
                //là ils sont écrit  à la main
                labels: ['16/01', '19/01', '22/01', '24/01', '29/01'],
                datasets: [{
                    label: 'Evolution du cours des points fidélité FINEBLOCK en €',
                      borderColor: 'rgb(255, 99, 132)',

                       // c'est ici que les valeurs (marketcap) doivent s'afficher dynamiquement
                //là ils sont écrit  à la main aussi
                    data: [159, '160', '173', '178', '180'],
                        }]
                     },
                    options: {
                       

                        elements: {
                            point: {
                                radius: 5,
                                backgroundColor: 'green'
                            }
                        }
                    }
        })

        

    </script>


<style>
      .graph{
        width: 400px;
        margin: 15px auto;
    }
    .graph_text{
        text-align: center;
        margin: 5px auto;
        color: red;
        font-weight: bold;
    }

    @media screen and (min-width: 350px) and (max-width: 576px)  {
        .graph{
            margin: 50px auto 90px auto;
            width: 340px;
        }
    }
</style>

</body>
</html>
