<?php 
    require_once('../server/server.php');
    if (isset($_GET['logout'])) {
        unset($_SESSION['connected']);
        session_destroy();
        unset($_SESSION['username']);
        header("location: index.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <!-- BOOTSTRAP -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    

    <!-- FONTS  -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/style-app.css">

    <!-- JS -->
    <script src = "../js/utils.js"></script>
    <script src = "../js/script-app.js"></script>
</head>

<body>
    
    <section id ="content" class = "container-fluid">
        <div class="row">
        <?php require("header.php"); ?>
            

            <section id = "inside-content">

                <div class="row">
                    <div class = "header-content">
                        <div class="title">
                            <h1 id="title">Tableau de Bord</h1>
                        </div>
                       <div class = "divider"><hr></div>

                    </div>


                    <div class = "col-md-6 content-wrapper">
                        <div id="news" class = "content-container">
                            <div class = "content-title"><h1>Nouveaut&eacute;s</h1></div>
                            <h4>- Cr&eacute;ation du site WEB !</h4>
                            <h4>- Ajout des premiers onglets, &agrave; savoir :</h4>
                            <ul>
                                <li>&#x25CF;    Simulateur rapide et pr&eacute;cis</li>
                                <li>&#x25CF;    Outil de mise en relation avec les promoteurs immobiliers</li>
                                <li>&#x25CF;    Formulaire de contact</li>
                            </ul>
                            <h4>- Cr&eacute;ation du syst&egrave;me de connection ! </h4>
                            <h4>- A venir : </h4>
                            <ul>
                                <li>&#x25CF;    Outil complet de gestion de visites ! </li>
                                <li>&#x25CF;    Onglet de Formation gratuite en investissement immobilier ! </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-6 content-wrapper">
                        <div class="suggestion-form content-container">
                            <div class = "content-title"><h1>Donnez votre avis !</h1></div>                            
                            <h4>N'h&eacute;sitez pas &agrave; nous informer des bugs et am&eacute;liorations possibles ! Nous ferons tout pour y rem&eacute;dier !</h4>
                            <form action="action_page.php">

                                    <label for="mail">Votre adresse mail (obligatoire)</label>
                                    <input type="text" id="mail" name="firstname" placeholder="dupont@exemple.com">
                                
                                    <label for="message">Votre message</label>
                                    <textarea id="message" name="message" placeholder="Votre message.." style="width : 90%; height:100px"></textarea>

                                    <input  type="submit" value="Envoyer" class = "btn btn-primary">
                                
                            </form>                            
                        </div>
                    </div>

                    <div class = "col-md-12 content-wrapper">
                        <div id="simulateur" class = "content-container">
                            <div class = "content-title"><h1>Simulateur</h1></div>
                            <div class="row">
                                <div class="col-md-6" id = "simulateur-description">
                                    <h4>Devenez un investisseur intelligent</h4>
                                    <h4>Calcul de cashflow</h4>
                                    <h4>Simulation de vos impots</h4>
                                    <h4>Pr&eacute;visions sur 30 ans</h4>
                                    <h4>Un outil &agrave; la fois simple et complet</h4>
                                </div>
                                <div class="col-md-6" id = "simulateur-img">
                                        <i class="fas fa-cogs"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class = "col-md-12 content-wrapper">
                        <div id="mon-agent" class = "content-container">
                            <div class = "content-title"><h1>Mon Agent</h1></div>
                            <div class="row">
                                <div class="col-md-6" id = "mon-agent-img">
                                    <i class="fas fa-user-tie"></i>
                                </div>
                                <div class="col-md-6" id = "mon-agent-description">
                                    <h4>Trouvez un bien qui vous convient</h4>
                                    <h4>Nous vous mettons en relation avec un agent</h4>
                                    <h4>Un professionnel de l'immobilier, &agrave; votre service !</h4>
                                    <h4>Pour acheter ou vendre ? Il vous accompagnera !</h4>
                                    <h4>Un outil de mise en relation efficace !</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class = "col-md-12 content-wrapper">
                            <div id="mes-visites" class = "content-container" style = "text-align: center;">
                                <div class = "content-title"><h1>Mes Visites</h1></div>
                                <h4>A venir !</h4>
                                <img class = "img-fluid" src="../docs/imgs/visite-appartement.jpg" alt="outil-visite-appartement">
                            </div> 
                        </div>

                </div>
            </section>
        </div>
    </section>

</body>
</html>