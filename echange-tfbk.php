<?php session_start(); 

require_once 'traitements/db.php'; 

if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php  include 'meta.php'; ?>

<title>Fineblock - Conversion</title>
</head>

<body>

<?php include 'header.php';
include 'menu.php'; 
?>

<div class="dashboard">
    <div class="dashboard__menu">
        <?php include 'menu-du-tableau-de-bord.php'; ?>
    </div>

    <div class="dashboard__main">
        <div class="dashboard__main__heading dashboard-main">
            <div class="dashboard-title">
                
                <h1>
                   Gestion de votre portefeuille
                </h1>

               
            </div>
        </div>

        <div class="dashboard__main__background">
                <div class="exchange">
                    <div class="exchange__links">
                        
                        <a href="#1">
                            Créer son wallet Solana
                        </a>
<!--
                        <a href="#1">
                            Formulaire récupération adresse
                        </a>

                        <a href="#3">
                            Envoyer et recevoir des TFBK
                        </a>
-->
                    </div>
                    
                    <div class="exchange__content">
                    <div class="wallet" id="2"> 
                            <h2>
                            Créer son wallet Solana 
                            </h2>
                            <span>Tuto vidéo: </span> <a href="https://www.loom.com/share/9cc6df4050834b2189aef823fef4dcf1">Cliquez ici</a> <br>

                            <span>
                                Tuto écrit:
                            </span>

                            <ul>
                                <li>
                                1 ) Télécharger l’extension phantom : <a href="https://chrome.google.com/webstore/detail/phantom/](https://chrome.google.com/webstore/detail/phantom/bfnaelmomeimhlpmgjnjophhpkkoljpa">
                                        en cliquant ici
                                        </a>

                                (fonctionne avec Chrome, Brave, Firefox & Edge)   </li>

                                <li>
                                    2 ) Ajouter l’extension et la
                                     mettre dans la barre d’extension en cliquant sur la pièce de puzzle en haut à droite de votre navigateur. <br>
                                     <img src="https://youngtech.notion.site/image/https%3A%2F%2Fs3-us-west-2.amazonaws.com%2Fsecure.notion-static.com%2F0f41890a-cac4-4d25-b72f-c6f2439c68c8%2FExtension_phantom.png?table=block&id=c9c5b818-20e6-4d22-9096-921dccc16d4c&spaceId=2c46ffe4-e6fa-483f-b845-f6355fa61ec0&width=620&userId=&cache=v2" alt="">

                                </li>

                                <li>
                                    3) Ouvrir l’extension et appuyer sur “Create a wallet”. 
                                </li>

                                    4) Créer un mot de passe sécurisé pour un accès rapide au portefeuille
                                </li>

                                <li>
                                🎉🎉 Félicitations !! Vous venez de créer un portefeuille 
                                sécurisé sur lequel vous pourrez recevoir des Solanas et
                                 des jetons issus de la blockchain Solana, comme le TFBK.
                                </li>
                            </ul>

                            <h2>
                            Comment connaitre son adresse de portefeuille Solana. 
                            </h2>

                            <ul>
                                <li>
                                1 ) Copier l’adresse de votre wallet phantom en cliquant en haut de votre wallet: <br>
                                <img src="https://youngtech.notion.site/image/https%3A%2F%2Fs3-us-west-2.amazonaws.com%2Fsecure.notion-static.com%2F324f15a0-cc5f-4cf1-beba-64770b755131%2FCapture_decran_2022-01-11_a_15.07.35.png?table=block&id=ef23ca83-7d3e-4e6c-a6ca-2943144dfcad&spaceId=2c46ffe4-e6fa-483f-b845-f6355fa61ec0&width=290&userId=&cache=v2" alt="">
                                </li>

                                <li>
                                2 ) Envoyer cette adresse aux personnes qui souhaitent
                                 vous envoyer des TFBK ou des Solana.

                                 <br>
                                 🎉🎉 Félicitations, vous êtes prêts à recevoir des jetons solana !
                                </li>
                            </ul>
                        </div>

<!--
                        <div class="formulaire" id="2">
                            <img src="https://notion-emojis.s3-us-west-2.amazonaws.com/prod/svg-twitter/23ef-fe0f.svg" alt="">
                            <form action="" class="form">
                                <h2 class="form__title">
                                    Formulaire récupération adresse
                                </h2> <br>

                                <label for="zip-adress" class="form__label"> 
                                    Nom et prénoms: <br>
                                    <input type="text" name="zip_adress" 
                                        id="zip_adress" required >
                                </label> <br>

                                <label for="zip-adress" class="form__label"> 
                                    Adresse mail: <br>
                                    <input type="text" name="zip_adress" 
                                        id="zip_adress" required >
                                </label><br>

                                <label for="zip-adress" class="form__label"> 
                                    Adresse Solana <br>
                                    <input type="text" name="zip_adress" 
                                        id="zip_adress" required >
                                </label> <br>

                                <label for="zip-adress" class="form__label"> 
                                    Volume de TFBK à envoyer: <br>
                                    <input type="text" name="zip_adress" 
                                        id="zip_adress" required >
                                </label> <br>

                                <button type="" class="form__button">
                                    Valider
                                </button>

                            </form>
                        </div>

                       
                        <div class="wallet" id="3">
                            <img src="https://notion-emojis.s3-us-west-2.amazonaws.com/prod/svg-twitter/1f4ee.svg" alt="">

                            <h2>
                            Envoyer/recevoir des TFBK
                            </h2>

                            <ul>
                               
                                <li>
                                1 ) Demander à la personne à qui vous souhaitez envoyer des TFBK son adresse Solana. 
                                        Votre interlocuteur aura une adresse pour chaque blockchain qu’il utilise (BTC, ETH,SOL...), veillez à ce qu’il vous envoie une adresse Solana, sinon cela ne fonctionnera pas et les jeton envoyé seront perdu. 
                                </li>

                                <li>
                                2 ) Cliquer sur “Send” ou “Envoyer”  <br>
                                <img src="https://youngtech.notion.site/image/https%3A%2F%2Fs3-us-west-2.amazonaws.com%2Fsecure.notion-static.com%2F167031f5-cb87-4248-84a1-b00ed69d4c6b%2FWhatsApp_Image_2022-01-06_at_11.34.53.jpeg?table=block&id=7fa4dad2-cd2c-4a57-84ef-c9a2a1985b13&spaceId=2c46ffe4-e6fa-483f-b845-f6355fa61ec0&width=380&userId=&cache=v2" alt="">
                                </li>

                                <li>
                                3 ) Sélectionner le jeton à envoyer <br>
                                <img src="https://youngtech.notion.site/image/https%3A%2F%2Fs3-us-west-2.amazonaws.com%2Fsecure.notion-static.com%2F4b65cfed-f5ad-48ea-80a6-f20c47bfed2d%2FWhatsApp_Image_2022-01-06_at_11.35.47.jpeg?table=block&id=aa736988-7c37-4923-b15f-09e33780dc29&spaceId=2c46ffe4-e6fa-483f-b845-f6355fa61ec0&width=380&userId=&cache=v2" alt="">
                                </li>

                                <li>
                                4 ) Entrer l’adresse à laquelle vous souhaitez
                                 envoyer les jetons puis sélectionner la quantité
                                  à envoyer puis cliquer sur suivant. <br>
                                  Sur cet exemple, 10 jetons seront envoyés. <br>
                                  <img src="https://youngtech.notion.site/image/https%3A%2F%2Fs3-us-west-2.amazonaws.com%2Fsecure.notion-static.com%2F25fe4cfc-d4b4-495b-b9e0-c4f6bbd8f4b3%2FWhatsApp_Image_2022-01-06_at_11.38.43.jpeg?table=block&id=d9ae0a34-8212-4ede-ae0f-e951aaec908a&spaceId=2c46ffe4-e6fa-483f-b845-f6355fa61ec0&width=480&userId=&cache=v2" alt="">
                                </li>

                                <li>
                                5 ) Appuyer sur “Envoyer” pour confirmer l’envoi <br>
                                <img src="https://youngtech.notion.site/image/https%3A%2F%2Fs3-us-west-2.amazonaws.com%2Fsecure.notion-static.com%2Fd3f691ac-ea41-4dc9-af35-4eaf93d9b5e2%2FWhatsApp_Image_2022-01-06_at_11.39.53.jpeg?table=block&id=0233e2c3-dfc3-4336-bb34-7b001ccd9b1a&spaceId=2c46ffe4-e6fa-483f-b845-f6355fa61ec0&width=480&userId=&cache=v2" alt="">
                                <br>
                                🎉🎉 Félicitations, vous savez maintenant comment envoyer des jetons solana !
                                </li>
                            </ul>

                                <h3>
                                Tuto écrit : Recevoir des TFBK
                                </h3>

                            <ul>
                                <li>
                                1 ) Copier l’adresse de votre wallet phantom 
                                en cliquant en haut de votre wallet <br>

                                <img src="https://youngtech.notion.site/image/https%3A%2F%2Fs3-us-west-2.amazonaws.com%2Fsecure.notion-static.com%2F324f15a0-cc5f-4cf1-beba-64770b755131%2FCapture_decran_2022-01-11_a_15.07.35.png?table=block&id=d341c79d-19d9-42b6-94af-41b67c1a0b8f&spaceId=2c46ffe4-e6fa-483f-b845-f6355fa61ec0&width=290&userId=&cache=v2" alt="">
                                </li>

                                <li>
                                2 ) Envoyer cette adresse aux personnes qui souhaitent vous envoyer des TFBK
                                </li>
                            </ul>
                        </div>
                        -->
                    </div>  
                </div>
        </div>
    </div>
</div>
    <?php include 'footer.php'; ?>
    <script src="public/js/script.js" ></script>
</body>
</html>