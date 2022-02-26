<?php session_start(); 
//include 'traitements/resultats-jeu-concours'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'meta.php'; ?>
        
    <title>Fineblock - Trophées de l'EBE</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="game">
            <div class="game__heading">
                <div class="game__heading__content">
                    <h1 class="game__heading__content__title">
                        Qui veut enrichir son EBE par 10 ?
                    </h1>

                    <p class="game__heading__content__text1">
                        Oui son seuil de rentabilité, ses bénéfices ! 
                        Grâce à une FINETECH innovante.
                    </p>

                    <p class="game__heading__content__text2">
                        Jeu concours gratuit sans obligation d'achat, 
                        reservé à toutes les entreprises adhérantes à Fineblock ayant un numéro 
                        de siret, de l'entreprise individuelle à 
                        l'entreprise cotée, en passant par les TPE, les 
                        PME, les PMI et les ETI.
                    </p>

                   <div class="game__heading__content__buttons">
                   <button class="registration-btn" >
                        <a href="offres-professionnels-mensuelles.php">
                            Inscription
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </button> 

                    <button class="results-btn" onclick="visible()" id="show">
                            Classement
                            <i class="fas fa-arrow-right"></i>
                    </button>
                   </div>  <br>

                   <audio
                                controls style="width: 200px; margin: auto"
                                src="public/audio/audio-ebe.wav">
                            </audio>
                </div>
            </div> <br>
          

            
            <div class="box" id="box">
                <a href="jeu-concours.php"class="form__close" >
                    <i class="fas fa-times"></i>
                </a>

                <div class="box__elements">
                <button>
                       <a href="#ei">
                       Entreprise individuelle
                       </a>
                   </button>

                   <button  onclick="no_result()">
                       TPE
                   </button>

                   <button>
                      <a href="#pme">
                          PME
                      </a>
                   </button>

                   <button  onclick="no_result()">
                       PMI
                   </button>

                   <button  onclick="no_result()">
                       ETI
                   </button>

                   <button  onclick="no_result()">
                       Entreprise cotée
                   </button>

                   
                </div>

            <div class="box__content">
                <section class="section" id=''>   
                        <div class="section__title">
                            Classement global
                        </div>

                       
                        <table>
                            <tr>
                                <th>
                                    #
                                </th>

                                <th>
                                    Entreprise
                                </th>

                                <th>
                                    Filière
                                </th>

                                <th>
                                    EBE en %
                                </th>
                            </tr>
                        
                           
                        
                            <tr>
                                <td>
                                   1
                                </td>

                                <td>
                                    Fineblock
                                </td>

                                <td>
                                Entreprise individuelle
                                </td>
                                <td>
                                    77,70
                                <td>
                            </tr>

                            <tr>
                                <td>
                                   2
                                </td>

                                <td>
                                Caraïbes développement
                                </td>

                                <td>
                                    PME
                                </td>
                                <td>
                                    50
                                <td>
                            </tr>

                            <tr>
                                <td>
                                    3
                                    </td>

                                    <td>
                                    Hcv Peniel
                                    </td>

                                    <td>
                                    PME
                                </td>
                                    <td>
                                        48,10
                                    <td>
                                </tr>

                           
                        </table>
                </section>

                <section class="section result" id='ei' >
                        <div class="section__title">
                            Entreprise individuelle
                        </div>

                       
                        <table>
                            <tr>
                                <th>
                                    #
                                </th>

                                <th>
                                    Entreprise
                                </th>

                                <th>
                                    EBE en %
                                </th>
                            </tr>
                        
                           
                        
                            <tr>
                                <td>
                                   1
                                </td>

                                <td>
                                    Fineblock
                                </td>

                                <td>
                                    77,70
                                <td>
                            </tr>

                           
                        </table>
                </section>

                <section class="section result" id='pme'>
                            <div class="section__title">
                                PME
                            </div>

                        

                            <table>
                                <tr>
                                    <th>
                                        #
                                    </th>

                                    <th>
                                        Entreprise
                                    </th>

                                    <th>
                                        EBE en %
                                    </th>
                                </tr>
                                
                            
                            
                                <tr>
                                    <td>
                                    1
                                    </td>

                                    <td>
                                    Caraïbes développement
                                    </td>
                                    <td>
                                        50
                                    <td>
                                </tr>

                                <tr>
                                <td>
                                    2
                                    </td>

                                    <td>
                                    Hcv Peniel
                                    </td>
                                    <td>
                                        48,10
                                    <td>
                                </tr>

                                
                            </table>
                </section>
            </div>
                    
        </div>       
           

            <div class="game__rules1" >
                <div class="game__rules1__image">
                       <img src="public/images/image-jeu.jpeg" style="width: 100%; height: 100%;">
                </div>

                <div class="game__rules1__text" >
                        <h3>L'important est le résultat</h3> <br>
                        <p>
                            Oui le résultat comptable, l’EBE 
                            déterminant la rentabilité de 
                            votre Entreprise aux fins de créer 
                            de l’attractivité, l’intérêt de 
                            vos associés, banquiers ou 
                            actionnaires des multinationales. <br>
                            <span style="font-weight: bold;"> 
                                1 000 Entreprises recevront 25 à 100 points par mois.
                            </span> <br>
                            Exemple : Une TPE réalisant un C.A h.t de 150 K€ avec une marge de 25 % brut d’impôts, sera de 37,50 K€, mais en 
                            capitalisant des points fidélité Fineblock, prenant de la valeur à chaque instant, le résultat sera donc de 150 K€ supplémentaire. <br>
                            
                            Inscription du ratio directement depuis votre espace client
                        </p>  
                        
                        <img src="public/images/specimenjeu.png" alt="">
                         
                </div>
            </div>

            <div class="game__payment">
                <div class="game__payment__content">
                    <h2>
                        Modalités :
                    </h2>

                    <p>
                        Chaque participant recevra un ID 
                        dès validation de l’adresse mail 
                        communiquée lors de sa pré-inscription.
                    </p>

                    <ul>
                        <li>
                            <img src="public/images/jeu2.png" alt="jeu-concours fineblock">
                        </li>

                        <li>
                        <img src="public/images/jeu3.png" alt="jeu-concours fineblock">
                        </li>

                        <li>
                        <img src="public/images/jeu4.png" alt="jeu-concours fineblock">
                        </li>

                        <li>
                        <img src="public/images/jeu5.png" alt="jeu-concours fineblock">
                        </li>
                    </ul>

                    
                </div>
            </div>

            <div class="game__bonus">
                <div class="game__bonus__content">
                    <h2>
                        Points bonus :
                    </h2>

                    <p>
                        Des points bonus seront 
                        attribués afin de départager les 
                        éventuels exæquos, selon la date 
                        d’inscription.
                    </p> 
                    
                    <p>
                        La 1ére Entreprise de chaque catégorie du mois, recevra un volume correspondant en %.
                    </p> <br>

                    <img src="public/images/jeu1.png" alt="jeu-concours fineblock">
                </div>
            </div>

            <div class="game__conditions">
                <div class="game__conditions__content">
                    <h2>
                        Conditions de validation :
                    </h2>
    
                    <div class="text">
                        <p>
                            Chaque Entreprise participante doit obligatoirement 
                            fournir toutes ses informations légales ainsi que 
                            l’élément comptable mentionnant l’EBE délivré par 
                            son Expert-Comptable, conformément à la 
                            réglementation et <span>au plus tard le vendredi 
                                30 Juin 2023 à minuit.</span> <br><br> Dès lors 
                                l’accès à la base de données sera fermé et la 
                                publication des 50 résultats par catégorie sera
                                 publiée directement sur le mail de tous 
                                 les candidats, le vendredi 29 juillet 2023. <br> 
                                 <br> L’intégralité des résultats est publiée
                                  instantanément au fur et à mesure que les
                                   Entreprises qui intègre tous les mois, 
                                   leurs EBE brut par catégorie.
                                   Les gagnants ainsi que tous les participants qui le souhaitent
                                    et le confirmant avant le 31 août 2023; seront invités
                                     à la remise des prix à Paris, sur ce même e-mail, 
                                     en précisant son ID reçu lors de l’inscription. <br> <br><span>Une question ?</span> : jeu-concours-TFBK-2021@fineblock.eu
                        </p>
    
                        <p>
                           <strong>
                               Les Trophées de l'EBE 2022 Francophone (Europe, Afrique de l'Ouest)
                           </strong> <br>
                           Depuis votre espace client Professionnel et
                            en attendant votre situation comptable officielle, 
                            vous pourrez incrémenter votre EBE brut (C.A – charges) 
                            au rythme qui vous convient, car cela crée de 
                            l’attractivité sur votre Entreprise et 
                            c’est une manière de communiquer votre 
                            performance, sachant que toutes les Entreprises
                             bénéficiant d’une adhésion payante, pourront 
                             mettre leur logo dans la page partenaire avec
                              géolocalisation. <br> <br> La publication
                               globale de tous les EBE est publiée en permanence
                                en page d’accueil de la manière suivante avec un
                                 seul mot d’ordre « seul le résultat compte » <br>
                                  <br> Classement par ordre décroissant
                                   (du plus grand au plus petit) par : <br> Le 
                                   % de variation acceptable est de 5%
                                    de la moyenne des 5 derniers mois, à
                                     défaut d’un écart plus important,
                                      l’Entreprise produisant un
                                       EBE officiel (comptable) différent 
                                       lui sera attribuée une pénalité de 5%, la déclassant automatiquement. (moyenne de la période comparé à l’EBE officiel)
                        </p>
                    </div>
                </div>
                
            </div>

            <div class="game__infos">
                <div class="game__infos__content">
                    <h2>
                        La pertinence du résultat prime sur l'action concurrentielle.
                    </h2>

                    <p>
                        La pertinence du résultat prime sur l'action concurrentielle.
                    </p>

                    <p>
                        Cet exemple montre la capacité d’une PME à faire mieux qu’une ETI ayant beaucoup plus de ressources, mais la mise à jour mensuelle peut évidemment changer la donne. Rendez-vous tous les mois pour incrémenter votre EBE brut (C.A-charges) depuis votre espace client.
                    </p>                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>

    <script>
        let email = document.getElementById("EMAIL");

let box = document.getElementById("box");

let show = document.getElementById("show");


function invisible(){
   // box.classList.add("visible");
    box.style.setProperty("visibility", "hidden");
    box.style.setProperty("opacity", "0");
}

function visible(){
   // box.classList.add("visible");
    box.style.setProperty("visibility", "visible");
    box.style.setProperty("opacity", "1");
}

function no_result(){
   alert("Aucun résultat")
}

function msg(){
    console.log("ok");
}







    </script>

</body>
</html>