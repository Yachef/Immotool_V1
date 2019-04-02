<?php require_once('../../server/server.php');?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
  <title>Immotool - Votre conseiller immobilier 100% gratuit !</title>

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

    <link rel="shortcut icon" href="../../docs/imgs/logo-IMMOTOOL.png" type="image/x-icon" /> <!-- Favicon /-->

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
                            <h1 id="title">Mes Visites</h1>
                            <div class="divider">
                                <hr>
                            </div>
                        </div>


                        <section class="col-md-3 content-wrapper">
                        </section>

                        <div class="col-md-6 content-wrapper">
                        <div class="suggestion-form content-container">
                            <div class = "content-title"><h1>A venir !</h1></div>                            
                            <h4>Vous trouverez prochainement dans cette section :</h4>
                            <h5> - Une ToDo List pour ne rien oublier lorsque vous réaliserez vos visites !</h5>
                            <h5> - Un outil de comparaison de vos visites pour vous aider dans vos choix !</h5>
                        </div>
                    </div>



                    </div>
            </section>
        </div>
    </section>

</body>

</html>