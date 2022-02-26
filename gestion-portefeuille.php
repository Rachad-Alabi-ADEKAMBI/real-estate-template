<?php session_start(); 

if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php  include 'meta.php'; ?>

<title>Fineblock - Gestion portefeuille</title>
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
        <div class="dashboard__main__heading dashboard-main short-heading">
            <div class="dashboard-title">
                
                <h1>
                   Gestion de votre portefeuille
                </h1> <br>
            </div>
        </div>

        <div class="dashboard__main__background ">
            <div class="account">
                <div class="account__top">
                    <div class="left">
                        <h2 class="">
                        Envoyer des TFBK 
                        </h2>
                    </div>

                    <div class="right">
                        <p>
                        Vous n'avez pas de Wallet, 
                        l'équipe technique le crée pour vous, pour 49 € h.t
                        </p>
                        <button>
                            <a href="paypal-wallet.php">
                            Créer mon wallet
                            </a>
                        </button>
                    </div>
                </div>
                  <br>

                <ol>
                    <li>
                    Demander à la personne à qui vous souhaitez envoyer
                     des TFBK son adresse Solana. Votre interlocuteur 
                     aura une adresse pour chaque blockchain qu’il 
                     utilise (BTC, ETH,SOL...), veillez à ce qu’il vous
                      envoie une adresse Solana, sinon cela ne fonctionnera
                       pas et les jeton envoyé seront perdu. 
                        </li>

                    <li>
                    Cliquer sur “Send” ou “Envoyer” <br>
                    <img src="https://youngtech.notion.site/image/https%3A%2F%2Fs3-us-west-2.amazonaws.com%2Fsecure.notion-static.com%2F167031f5-cb87-4248-84a1-b00ed69d4c6b%2FWhatsApp_Image_2022-01-06_at_11.34.53.jpeg?table=block&id=7fa4dad2-cd2c-4a57-84ef-c9a2a1985b13&spaceId=2c46ffe4-e6fa-483f-b845-f6355fa61ec0&width=380&userId=&cache=v2" alt="">
                    </li>

                    <li>
                    Sélectionner le jeton à envoyer  <br>
                    <img src="https://youngtech.notion.site/image/https%3A%2F%2Fs3-us-west-2.amazonaws.com%2Fsecure.notion-static.com%2F4b65cfed-f5ad-48ea-80a6-f20c47bfed2d%2FWhatsApp_Image_2022-01-06_at_11.35.47.jpeg?table=block&id=aa736988-7c37-4923-b15f-09e33780dc29&spaceId=2c46ffe4-e6fa-483f-b845-f6355fa61ec0&width=380&userId=&cache=v2" alt="">
                    </li>

                    <li>
                    Entrer l’adresse à laquelle vous souhaitez envoyer les jetons puis sélectionner la quantité à envoyer puis cliquer sur suivant.
                        Sur cet exemple, 10 jetons seront envoyés. <br>
                        <img src="https://youngtech.notion.site/image/https%3A%2F%2Fs3-us-west-2.amazonaws.com%2Fsecure.notion-static.com%2F25fe4cfc-d4b4-495b-b9e0-c4f6bbd8f4b3%2FWhatsApp_Image_2022-01-06_at_11.38.43.jpeg?table=block&id=d9ae0a34-8212-4ede-ae0f-e951aaec908a&spaceId=2c46ffe4-e6fa-483f-b845-f6355fa61ec0&width=480&userId=&cache=v2" alt="">  
                    </li>

                    <li>
                    Appuyer sur “Envoyer” pour confirmer l’envoi <br>
                    <img src="https://youngtech.notion.site/image/https%3A%2F%2Fs3-us-west-2.amazonaws.com%2Fsecure.notion-static.com%2Fd3f691ac-ea41-4dc9-af35-4eaf93d9b5e2%2FWhatsApp_Image_2022-01-06_at_11.39.53.jpeg?table=block&id=0233e2c3-dfc3-4336-bb34-7b001ccd9b1a&spaceId=2c46ffe4-e6fa-483f-b845-f6355fa61ec0&width=480&userId=&cache=v2" alt="">  <br>
                    🎉🎉 Félicitations, vous savez maintenant comment
                     envoyer des jetons solana ! 
            
                </li>
                </ol>

                <h2 class="account__title">
                Tuto écrit : Recevoir des TFBK 
                </h2>

                <ol>
                    <li>
                    Copier l’adresse de votre wallet phantom en cliquant en
                     haut de votre wallet  <br>
                     <img src="https://youngtech.notion.site/image/https%3A%2F%2Fs3-us-west-2.amazonaws.com%2Fsecure.notion-static.com%2F324f15a0-cc5f-4cf1-beba-64770b755131%2FCapture_decran_2022-01-11_a_15.07.35.png?table=block&id=d341c79d-19d9-42b6-94af-41b67c1a0b8f&spaceId=2c46ffe4-e6fa-483f-b845-f6355fa61ec0&width=290&userId=&cache=v2" alt="">
                    </li>

                    <li>
                    Envoyer cette adresse aux personnes qui souhaitent vous envoyer des TFBK 
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
    <?php include 'footer.php'; ?>
    <script src="public/js/script.js" ></script>
</body>
</html>