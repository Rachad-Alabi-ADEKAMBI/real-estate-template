<?php session_start(); 


?>

<!DOCTYPE html>
<html lang="en">
<head>

   <?php  include 'meta.php'; ?>

   <title>Fares Immobilier - Accueil</title>
</head>

<body>
    <?php include 'header.php';  ?>
        

        <div class="visits">
        <?php
if(file_exists('compteur_visites.txt'))
{
        $compteur_f = fopen('compteur_visites.txt', 'r+');
        $compte = fgets($compteur_f);
}
else
{
        $compteur_f = fopen('compteur_visites.txt', 'a+');
        $compte = 0;
}
if(!isset($_SESSION['compteur_de_visite']))
{
        $_SESSION['compteur_de_visite'] = 'visite';
        $compte++;
        fseek($compteur_f, 0);
        fputs($compteur_f, $compte);
}

$compte_Formated=number_format($compte, 0, ',', ' ');

fclose($compteur_f);number_format($compte, 
0, ',', ' ');
echo '<strong>'.$compte_Formated.'</strong> visites depuis le 03/11/21';
?>
        </div>

    <div class="heading">
        <h1 class="heading__title">
            Fares Immobilier
        </h1>

        <p class="heading__subtitle">
                Trouvez l'appartement de vos rêves
            </p>

        <div class="heading__search">
            <ul>
                <li>
                    <div class="icon">
                    <i class="fas fa-building"></i>
                    </div>

                    Bureaux
                </li>

                <li>
                    <div class="icon">
                    <i class="fas fa-home"></i>
                    </div>

                   Maisons
                </li>

                <li>
                    <div class="icon">
                    <i class="fas fa-warehouse"></i>
                    </div>

                    Magasins
                </li>
                <li>
                    <div class="icon">
                    <i class="fas fa-utensils"></i>
                    </div>

                    Restaurants
                </li>

                <li>
                    <div class="icon">
                    <i class="fas fa-house-user"></i>
                    </div>

                    Studios
                </li>

                <li>
                    <div class="icon">
                    <i class="fas fa-building"></i>
                    </div>

                    Batiments
                </li>
            </ul>

            <div class="heading__search__bar">
                <form action="" method="POST" class='form'>
                    <input type="text" name="keyword" placeholder="Que cherchez vous ?">
                    <button>
                        Rechercher
                    </button>
                </form>
            </div>

            
        </div>
    </div>

    <!--partners start-->
    <section id="" class="">
		<div class="container">
			<div class="row partners">
				<div class="col-lg-4 col-md-12 partners__text ">
                        <h2 class="partners__text__title title">
                            Nos partenaires
                        </h2>

                        <p class="partners__text__subtitle subtitle">
                            Accédez à des centaines d'annonces actualisées à
                            chaque heure
                        </p>
 
                        <p class="partners__text__text text">
                            Des annonces de nos sites partenaires sont régulièrement 
                            mises à jour. Faites votre choix et envoyez-nous un message pour finaliser
                        </p>
                </div>

                <div class="col-lg-8 col-md-12 partners__images">
                    <img src="https://img.phonandroid.com/2019/12/leboncoin-arnaque-sms.jpg" alt="">
                    <img src="data:image/png;base64,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" alt="">
                    <img src="data:image/png;base64,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" alt="">
                
                    <img src="https://img.phonandroid.com/2019/12/leboncoin-arnaque-sms.jpg" alt="">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAkFBMVEXgADT////gADLfACbgAC/fACTeABz/+fvfAC3fACreABffACPeAB7fACnfACHxoq785+z74ufeABHdAADukJ7hADfyqrX63eP519340tnzs732xs3nVWzoWnH98fTwm6jzsrzreovqcYT2yM/iHUXvlKLsgZH1vcbmSGLpan7tiJfoY3jjK03mTWbkNVThDTz3BNYCAAAHdUlEQVR4nO2aiXLiOBCGsSwLWdjC3Ec4wn0G3v/tVrbVwsZsdnbjbHan/q9qKsGIRn23lGk0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAPD3kFGG/9P7+DbkfPNm2Cz/byoyxrj599cLxcjLSKLv31RtsFCL4H69Xu9hJHTMP13rN3MN3/4/GrKgtTp07L4X4/f9VXyyml/zhd4y+Nd2+EW4WHpPdD5RMVzbRafw39vjl+CDzrOC3ugTDQOyx/bTYP7vwHRSUdCbave2DONYFutP9JavaQbPVYlxszbk1WLFSpRF8+dV2TtxjfGhh1UFvXPeCJgv7rPVfn/ZCt9tTCQv/cxiIT/W+/36GEQF5zLZElGrqDSXVvQgE30V1lIsT2vJpJCzfX0pwAYvFPRm6S5Yi+8ogJOzsNtmrOLnlFCtJvTpw42qrNFjPhwvysI/jPAg7Nue4y12mmffZi0nPjbpj1/pW7+EfyYdLnd2397mq/PwbTQw4pnaFfeVXDPbN/ix7OdcE3UpqbFU9vH5SbvcfOZ58cHiZhzGb/mL5iH/OlWTgi6rvK2fJgGXod+KhFGQs5FXonnPrBrvi362CornUG+nIcwHTyJy7jycPD268kZ4Kj051NZshY3DZrccFYxVCtAkM6vL28HjA+pQUePIjYgXDjQeU3GleJucDsotq75mG5Ei55KKTI2rezum+SLsG4uuW6x31bUb0VDPnsqVOfU21adz6YIpp75KI5w9D7KQWEHfPm0Oz0sywrCVBqSdfSaulFIGpdt/eIfFFHad/cdxRh567wkK86LoqVaPmGlODofaCk1DTx+C110q865gvgntt7rWbWOjFNsW1M1xvlpGqnunjc7oU5ueL7nsWr0SFZKJtPaDnv1sR8W0jfejEpGuTcGiA8yXbm3noqQYZaEbzvJXC5EenezaVfgsoZ8ujj/sqzW1oTsvrlr0zqRqKlraytwUVKJZ9GJk+BLlMnhW2X6UrRF5vWSNh4Y+5dyR/N0aFrfMNFnAmqKT56u0Vur0bCDnicak1VCRjz8b+v8ZTD3iNPXaNi4avBUY9OChoaayGZKlacbJ+yOLbBBerK82+Za1jYrD3arU1ZloTi+HpeU1q0iHBeuc2I0BybKdYW2Q5qHqkMfo43bLaU9rPJziHc/kHZ9zqSl9T/bLFlb0kFxrE7L9LUcyn5f62ZXran/L7K/N9Em/U0eWF6tJPl66kccdspLV8TbfWc82e6/GYFPRejYv1t9zJGNqXmjOYyFeziJe33+UFXdJ49u+YgfxcGV9pLavROx7L5uktyTL3b7rSBb6BdvedPPlNubycfy9kK3J34d8EA/a+cuNEO9VCQfVfTnneCcqwXHNhfQBE0f33Ssyf7NEYrowKWCzrvG4l+rnThWUT1pWp6Kp4JS1ZdELZrP2s8uFLxNKUpEKfdLzi6RdWNiJq0ktmZG/bfV3L7uVSB/PFOPWV4tuUBItbDGrb+B+BRV077LKf45E5WxOQTYmW7vamYetGwh07pS3aZKq3Ew2u6uSj0se0zxL0LS7q/sONr0hdS/cCWFru29TVe4pArtk45oFabhLyzx7jGq5C0VX+YOBOQhHfhbWLo99VpZLXVQ2aoWx2yBIp0ATMoGiOp90aRvnruSmmckw9oNsnnPNrzlQIofCchH5Mu5Sml6ssw+nuzLKOXWot3jLblgQ7W4otzUXmnQEayaTw3u731+600tfu1l1Or/dPmaX9b7ffk+97TQ0cTrJGVBBSfbzPf0+UsIdFZLD/hZFtka6wd07XKzo83I6CKmp1naytzydyawzNBOvSnrqCCYqj2+Vy9b0IQ9KnX3xtt+qLFG7L272vHvLTrvjukupevV1R/kYrwvkY5qoNOzwRWffm+EneG4Wo3Wa1u4SpKi/imwJKN9ufR1XJYrMg3R8rqqe/5XC1UqnuKie8PvGE/GtGgcjc0phonr/PBE07Z7jejUsnQ1zxtesXPNtZX92JH6eVIzi5cOJ1zylx0i6OStLN+/we8V6Q02mntVdSu/DclveXJQdVbgsb9ub2CGGiXNp1+bMxNSqYI8hi9MgyJ80B9fVe0GjVAj3n4bv8Y3sUbzdqknFltDXy3k5nL5Nh/25FIULwui+OoyTJBlNDu3VUQs3Efv+qf1m3umMN8P+LPNsHJ3eJ+bJZHjKJp9GbIewvuahVts+GSW/adaN1XTiRAdGtDz3DbvLdxwsGJdxoHWkW758uk+MtVAGEQVx6WKBhUEksje0L+lRtla07LmYCpI9Mwp7wKeLgaroOBveao7Rb4RpG6R2eg1ohKjvBu2HYb7V6CO9q9CKikvt7e7HIB+aAjVst4fuBvibDvA/QfTyGmRS90z2g7hJukgn/F2yMCU+Vi5C2jXeY/8XkHJXHM9Gu/tvpmD+F/L5ftluL/vrIxP+76ZfBjPDhMF/9Z8XAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAPDn/AFsPXWGOmiAZwAAAABJRU5ErkJggg==" alt="">
                    <img src="data:image/png;base64,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" alt="">
                
                </div>
            </div>
        </div>
    </section>
    <!-- partners end-->

        <!--properties start-->
        <section id="" class="grey" >
            <div class="container">
                <div class="row ">
                    <div class="col-lg-12 col-md-12 properties-section">
                        <h2 class="properties-section__title title ">
                            Annonces recommandées
                        </h2>

                        <p class="properties-section__subtitle subtitle">
                            Dernières annonces mises en avant
                        </p>   

                                <div class="properties-section__buttons">
                                    <button class="properties-section__buttons__btn">
                                        Acheter
                                    </button>

                                    <button class="properties-section__buttons__btn">
                                        Vendre
                                    </button>

                                    <button class="properties-section__buttons__btn">
                                        Louer
                                    </button>
                                </div>

                        <div class="properties-section__items">
                            <div class="item">
                                    <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" alt="" class="item__img">  
                                    
                                    <p class="item__status">
                                    A vendre
                                    </p>

                                    <p class="item__like">

                                    </p>

                                    <p class="item__save">

                                    </p>

                                <div class="item__price">
                                    20 500 €/mois
                                </div>

                                <h3 class="item__title">
                                        Nouvel appartement  
                                </h3>

                                <p class="item__location">
                                <i class="fas fa-map-marker-alt"></i>
                                    Poughkeepsie, France
                                </p>
                                <p class="item__type">
                                    Type: Bureaux
                                </p>

                                <div class="item__elmts">
                                    <div class="item__elmts__elmt">
                                    <i class="fas fa-bed"></i> Lits: 3
                                    </div>
                                    <div class="item__elmts_elmt">
                                    <i class="fas fa-sink"></i> Douches: 3
                                    </div>

                                    <div class="item__elmts_elmt">
                                    <i class="fas fa-parking"></i> Parking: Oui
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                    <img src="https://images.unsplash.com/photo-1565183997392-2f6f122e5912?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1yZWxhdGVkfDR8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="" class="item__img">  
                                    
                                    <p class="item__status">
                                    A louer
                                    </p>

                                    <p class="item__like">

                                    </p>

                                    <p class="item__save">

                                    </p>

                                <div class="item__price">
                                     33 500 €/mois
                                </div>

                                <h3 class="item__title">
                                        Countryside Modern Lake  
                                </h3>

                                <p class="item__location">
                                <i class="fas fa-map-marker-alt"></i>
                                    Poughkeepsie, France
                                </p>
                                <p class="item__type">
                                    Type: Bureaux
                                </p>

                                <div class="item__elmts">
                                    <div class="item__elmts__elmt">
                                    <i class="fas fa-bed"></i> Lits: 3
                                    </div>
                                    <div class="item__elmts_elmt">
                                    <i class="fas fa-sink"></i> Douches: 3
                                    </div>

                                    <div class="item__elmts_elmt">
                                    <i class="fas fa-parking"></i> Parking: Oui
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                    <img src="https://images.unsplash.com/photo-1516455590571-18256e5bb9ff?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1yZWxhdGVkfDd8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="" class="item__img">  
                                    
                                    <p class="item__status">
                                    A vendre
                                    </p>

                                    <p class="item__like">

                                    </p>

                                    <p class="item__save">

                                    </p>

                                <div class="item__price">
                                     10 500 €/mois
                                </div>

                                <h3 class="item__title">
                                        Appartement de luxe  
                                </h3>

                                <p class="item__location">
                                <i class="fas fa-map-marker-alt"></i>
                                    Poughkeepsie, France
                                </p>
                                <p class="item__type">
                                    Type: Bureaux
                                </p>

                                <div class="item__elmts">
                                    <div class="item__elmts__elmt">
                                    <i class="fas fa-bed"></i> Lits: 3
                                    </div>
                                    <div class="item__elmts_elmt">
                                    <i class="fas fa-sink"></i> Douches: 3
                                    </div>

                                    <div class="item__elmts_elmt">
                                    <i class="fas fa-parking"></i> Parking: Oui
                                    </div>
                                </div>
                            </div>                    
                    </div>
                </div>
            </div>
        </section>
    <!-- properties end-->


    <!--  -->
    <section id="" class="">
		<div class="container">
			<div class="row about-section">
				<div class="col-lg-8 col-md-12 about-section__video">
                        
                </div>

                <div class="col-lg-4 col-md-12 about-section__video">
                        
                </div>
            </div> 
        </div> 
    </section>
    <!--    -->

      <!--  -->
      <section id="" class="abt" >
		<div class="container">
			<div class="row about-section">
				<div class="col-lg-6 col-md-12 about-section__video">
                <h2 class="about-section__title title pt-1">
                    Présentation vidéo
                </h2>
                <iframe width="350" height="220" src="https://www.youtube.com/embed/oYSt_ETGvlo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              
                </div>

                <div class="col-lg-6 col-md-12 about-section__text">
                    <h2 class="abt-section__title title mt-1"> 
                        Pourquoi choisir Fares Immobilier ?
                    </h2>

                    <p class="abt-section__subtitle subtitle">
                        Les experts dont vous avez besoin dans votre démarche
                    </p>

                    <p class="abt-section__text1">
                        Inscrivez vous en tant que vendeur, acheteur ou propriétaire. Depuis 
                        votre tableau de bord vous pourrez entre autres: 
                    </p>

                    <ul>
                        <li> <i class="fas fa-check"></i> Déposer des annonces de location/ventes</li>
                        <li> <i class="fas fa-check"></i>
                            Déposer des dossier de location
                        </li>
                        <li><i class="fas fa-check"></i> Mettre en place un plan de fianancement
                             et d'aqcquisition</li>
                        <li> <i class="fas fa-check"></i>
                            Accéder à nos formations
                        </li>
                        <li> <i class="fas fa-check"></i> Et bien plus ...</li>
                    </ul>

                    <button class="abt-section__btn button">
                        Je m'inscris
                    </button>
                </div>
            </div> 
        </div> 
    </section>
    <!--    -->

        <!--properties start-->
        <section id="" class="grey" >
            <div class="container">
                <div class="row ">
                    <div class="col-lg-12 col-md-12 properties-section">
                        <h2 class="properties-section__title title ">
                            Annonces les plus vues
                        </h2>

                        <p class="properties-section__subtitle subtitle">
                            Dernières annonces mises en avant
                        </p>   

                                <div class="properties-section__buttons">
                                    <button class="properties-section__buttons__btn">
                                        Acheter
                                    </button>

                                    <button class="properties-section__buttons__btn">
                                        Vendre
                                    </button>

                                    <button class="properties-section__buttons__btn">
                                        Louer
                                    </button>
                                </div>

                        <div class="properties-section__items">
                            <div class="item">
                                    <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" alt="" class="item__img">  
                                    
                                    <p class="item__status">
                                    A vendre
                                    </p>

                                    <p class="item__like">

                                    </p>

                                    <p class="item__save">

                                    </p>

                                <div class="item__price">
                                    20 500 €/mois
                                </div>

                                <h3 class="item__title">
                                        Nouvel appartement  
                                </h3>

                                <p class="item__location">
                                <i class="fas fa-map-marker-alt"></i>
                                    Poughkeepsie, France
                                </p>
                                <p class="item__type">
                                    Type: Bureaux
                                </p>

                                <div class="item__elmts">
                                    <div class="item__elmts__elmt">
                                    <i class="fas fa-bed"></i> Lits: 3
                                    </div>
                                    <div class="item__elmts_elmt">
                                    <i class="fas fa-sink"></i> Douches: 3
                                    </div>

                                    <div class="item__elmts_elmt">
                                    <i class="fas fa-parking"></i> Parking: Oui
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                    <img src="https://images.unsplash.com/photo-1565183997392-2f6f122e5912?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1yZWxhdGVkfDR8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="" class="item__img">  
                                    
                                    <p class="item__status">
                                    A louer
                                    </p>

                                    <p class="item__like">

                                    </p>

                                    <p class="item__save">

                                    </p>

                                <div class="item__price">
                                     33 500 €/mois
                                </div>

                                <h3 class="item__title">
                                        Countryside Modern Lake  
                                </h3>

                                <p class="item__location">
                                <i class="fas fa-map-marker-alt"></i>
                                    Poughkeepsie, France
                                </p>
                                <p class="item__type">
                                    Type: Bureaux
                                </p>

                                <div class="item__elmts">
                                    <div class="item__elmts__elmt">
                                    <i class="fas fa-bed"></i> Lits: 3
                                    </div>
                                    <div class="item__elmts_elmt">
                                    <i class="fas fa-sink"></i> Douches: 3
                                    </div>

                                    <div class="item__elmts_elmt">
                                    <i class="fas fa-parking"></i> Parking: Oui
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                    <img src="https://images.unsplash.com/photo-1516455590571-18256e5bb9ff?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1yZWxhdGVkfDd8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="" class="item__img">  
                                    
                                    <p class="item__status">
                                    A vendre
                                    </p>

                                    <p class="item__like">

                                    </p>

                                    <p class="item__save">

                                    </p>

                                <div class="item__price">
                                     10 500 €/mois
                                </div>

                                <h3 class="item__title">
                                        Appartement de luxe  
                                </h3>

                                <p class="item__location">
                                <i class="fas fa-map-marker-alt"></i>
                                    Poughkeepsie, France
                                </p>
                                <p class="item__type">
                                    Type: Bureaux
                                </p>

                                <div class="item__elmts">
                                    <div class="item__elmts__elmt">
                                    <i class="fas fa-bed"></i> Lits: 3
                                    </div>
                                    <div class="item__elmts_elmt">
                                    <i class="fas fa-sink"></i> Douches: 3
                                    </div>

                                    <div class="item__elmts_elmt">
                                    <i class="fas fa-parking"></i> Parking: Oui
                                    </div>
                                </div>
                            </div>                    
                    </div>
                </div>
            </div>
        </section>
    <!-- properties end-->

    <!-- agents start  -->
    <section id="" class=" mt-5">
		<div class="container">
			<div class="row about-section">
				<div class="col-lg-12 col-md-12 agents  ">
                        <h2 class="agents__title title mx-auto">
                            Nos vendeurs les mieux notés
                        </h2>

                        <p class="agents__subtitle subtitle">
                            Accédez en un clic aux annonces de nos vendeurs certifiés
                        </p>

                        <div class="agents__items">
                            <div class="agent">
                                <img src="https://www.radiustheme.com/demo/wordpress/themes/homlisti/wp-content/uploads/2021/09/agent-3.png" alt="" class="agent__picture">
                                <h4 class="agent__title">
                                    Andrew Garfield
                                </h4>

                                <p class="agent__score">
                                    +12 votes positifs
                                </p>

                                <button>
                                    Voir annonces
                                </button>
                            </div>

                            <div class="agent">
                                <img src="https://www.radiustheme.com/demo/wordpress/themes/homlisti/wp-content/uploads/2021/09/agent-3.png" alt="" class="agent__picture">
                                <h4 class="agent__title">
                                    Andrew Garfield
                                </h4>

                                <p class="agent__score">
                                    +12 votes positifs
                                </p>

                                <button>
                                    Voir Annonces
                                </button>
                            </div>

                            <div class="agent">
                                <img src="https://www.radiustheme.com/demo/wordpress/themes/homlisti/wp-content/uploads/2021/09/agent-3.png" alt="" class="agent__picture">
                                <h4 class="agent__title">
                                    Andrew Garfield
                                </h4>

                                <p class="agent__score">
                                    +12 votes positifs
                                </p>

                                <button>
                                    Voir Annonces
                                </button>
                            </div>

                            <div class="agent">
                                <img src="https://www.radiustheme.com/demo/wordpress/themes/homlisti/wp-content/uploads/2021/09/agent-3.png" alt="" class="agent__picture">
                                <h4 class="agent__title">
                                    Andrew Garfield
                                </h4>

                                <p class="agent__score">
                                    +12 votes positifs
                                </p>

                                <button>
                                    Voir Annonces
                                </button>
                            </div>
                        </div> <br>

                       
                </div>
            </div> 
        </div> 
    </section>
    <!--    -->


     <!-- testimony start  
     <section id="" class="mt-5">
		<div class="">
			<div class="row about-section">
				<div class="col-lg-12 col-md-12 testimony ">
                        <h2 class="testimony__title">
                            Clients satisfaits
                        </h2>

                        <p class="testimony__subtitle">
                            Qu'en disent nos clients ?
                        </p>

                        <div class="testimony__boxes">
                                <div class="testimony___boxes__item">

                                </div>
                        </div>

                       
                </div>
            </div> 
        </div> 
    </section>
        -->
    
        <?php include 'footer.php'; ?>
    <script src="public/js/script.js" ></script>
    
    
</body>
</html>
