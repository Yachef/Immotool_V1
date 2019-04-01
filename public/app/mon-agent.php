<?php require_once('../../server/server.php');?>
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


    <!-- FONTS  -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="../../css/style-app.css">
    <link rel="stylesheet" href="../../css/style-results.css">

    <!-- JS -->
    <script src="../../js/utils.js"></script>
    <script src="../../js/script-app.js"></script>
</head>

<body>

    <section id="content" class="container-fluid">
        <div class="row">
            <?php require("header.php"); ?>

            <section id="inside-content">

                <div class="row">

                    <div class="header-content">
                        <div class="title">
                            <h1 id="title">Mon Agent</h1>
                            <div class="divider">
                                <hr>
                            </div>
                        </div>


                        <section class="col-md-3 content-wrapper">
                        </section>

                        <div class="col-md-6 content-wrapper">
                            <div class="agent-form content-container">
                                <div class="content-title">
                                    <h1>Vous recherchez un bien ? </h1>
                                </div>
                                <h4>Remplissez ce formulaire pour être contacté par un agent partenaire qui vous
                                    proposera des biens !</h4>
                                <form action="action_page.php" method="posts">
                                    <h2>Vos informations personnelles</h2>
                                    <label for="nom">Nom</label>
                                    <input required type="text" name="name">

                                    <label for="prenom">Prénom</label>
                                    <input required type="text" name="prenom">

                                    <label for="tel">Numéro de téléphone</label>
                                    <input required type="text" name="tel">

                                    <h2>Votre recherche</h2>
                                    <label for="ville-bien">Ville</label>
                                    <input required type="text" name="ville-bien">

                                    <label for="budget">Budget</label>
                                    <input required type="text" name="budget">

                                    <label for="message">Votre bien</label>
                                    <textarea required name="message" placeholder="Appartement ? Maison ? Studio ? F2 ? Localisation ? Pour étudiants ? Décrivez votre bien idéal ! "
                                        style="width : 90%; height:100px"></textarea>

                                    <input type="submit" value="Envoyer" class="btn btn-primary" name="suggestion">

                                </form>
                            </div>
                        </div>



                    </div>
            </section>
        </div>
    </section>

</body>

</html>