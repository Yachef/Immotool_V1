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
    <meta charset=UTF-8">
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
                            <h1 id="title">Simulateur</h1>
                        </div>
                       <div class = "divider"><hr></div>
                    </div>
                  

                    <section id = "form" class = "content-wrapper">
                        <div class="content-container">
                        <h1>RESULTATS :</h1>
                        <?php
                          echo "fraisNotaire ".$_SESSION['fraisNotaire'];
                          echo "<br>";
                          echo "totalCoutAchat ".$_SESSION['totalCoutAchat'];
                          echo "<br>";
                          echo "<br>";

                          echo "montantPret ".$_SESSION['montantPret'];
                          echo "<br>";
                          echo "mensualitesHorsAssurance ".$_SESSION['mensualitesHorsAssurance'];
                          echo "<br>";
                          echo "mensualitesTotales ". $_SESSION['mensualitesTotales'];
                          echo "<br>";
                          echo "remboursementAnnuel". $_SESSION['remboursementAnnuel'];
                          echo "<br>";
                          echo "interetEmprunt1ereAnnee ". $_SESSION['interetEmprunt1ereAnnee'];
                          echo "<br>";
                          echo "coutTotalCredit ". $_SESSION['coutTotalCredit'];
                          echo "<br>";
                          echo "<br>";

                          echo "TMI ".$_SESSION['TMI'];
                          echo "<br>";
                          echo "<br>";

                          echo "totalRecettesAnuelles ".$_SESSION['totalRecettesAnuelles'] ;
                          echo "<br>";
                          echo "<br>";
                          
                          echo "assuranceCredit ".$_SESSION['assuranceCredit'];
                          echo "<br>";
                          echo "totalChargesAnnuelles ".$_SESSION['totalChargesAnnuelles'];
                          echo "<br>";
                          echo "<br>";
                          ?>
                          <h1>Retour Sur Investissement </h1>
                          <?php

                          echo "Rendement Brut ".$_SESSION['rendementBrut'];
                          echo "<br>";
                          echo "Rendement Net". $_SESSION['rendementNet'];
                          echo "<br>";
                          echo "<br>";


                          echo "régime Micro BIC (LMNP) ".$_SESSION['regimeMicroBic'];
                          echo "<br>";
                          echo "impotsFoncierLMNP Micro Bic ".$_SESSION['impotsFoncierLMNPm'];
                          echo "<br>";
                          echo "cashflowLMNPm Micro Bic ".$_SESSION['cashflowLMNPm'];
                          echo "<br>";
                          echo "<br>";

                          ?>
                          <h1>Régime Micro Foncier en location nue</h1>
                          <?php 
                          echo "<br>";
                          echo "Abattement de 30% ". $_SESSION['abattementmF'];
                          echo "<br>";
                          echo "Revenu Foncier Imposable ".$_SESSION['revenusFonciersImposablesmF'];
                          echo "<br>";
                          echo "Revenu Global Imposable ".$_SESSION['revenuGlobalmF'];
                          echo "<br>";
                          echo "Tranche Marginale d'imposition ".$_SESSION['newTMImF'];
                          echo "<br>";
                          echo "Impots Foncier ". $_SESSION['impotsFonciermF'];
                          echo "<br>";
                          echo "Revenus Net ".$_SESSION['revenus']; 
                          echo "<br>";
                          echo "cashflow ".$_SESSION['cashflowmF'];
                          echo "<br>";
                          echo "<br>";
                            ?>
                          <h1>Régime Réel (location vide)</h1>
                          <?php
                          echo "<br>";
                          // echo "Recettes moins charges financières ". $_SESSION['recettesMoinsCharges'];
                          // echo "<br>";
                          // echo "Recettes moins charges dont travaux ".$_SESSION['recettesMoinsChargesDontTravaux'];
                          // echo "<br>";
                          // echo "Revenus Fonciers Imposable ".$_SESSION['revenusFonciersImposablesR'];
                          // echo "<br>";
                          // echo "Revenu Global Imposable ".$_SESSION['revenuGlobalR'];
                          // echo "<br>";
                          // echo "Tranche Marginale d'imposition ".$_SESSION['newTMIR'];
                          echo "<br>";
                          echo "Impots Foncier ". $_SESSION['impotsFoncierR'];
                          echo "<br>";
                          echo "Revenus Net ".$_SESSION['revenus']; 
                          echo "<br>";
                          echo "cashflow ".$_SESSION['cashflowR'];
                          echo "<br>";

                          ?>
                          
                          <h1>Régime Micro BIC en location meublée</h1>
                          <?php
                          echo "<br>";
                          echo "Accès au micro-BIC ? ". $_SESSION['LMNPm'];
                          echo "<br>";
                          echo "Abattement de 50% ".$_SESSION['abattementLMNPm'];
                          echo "<br>";
                          echo "Revenus Fonciers Imposable ".$_SESSION['revenusFonciersImposablesLMNPm'];
                          echo "<br>";
                          echo "Revenu Global Imposable ".$_SESSION['revenuGlobalLMNPm'];
                          echo "<br>";
                          echo "Tranche Marginale d'imposition ".$_SESSION['newTMILMNPm'];
                          echo "<br>";
                          echo "Impots Foncier ". $_SESSION['impotsFoncierLMNPm'];
                          echo "<br>";
                          echo "Revenus Net ".$_SESSION['revenus']; 
                          echo "<br>";
                          echo "cashflow ".$_SESSION['cashflowLMNPm'];
                          echo "<br>";
                          ?>

                          <h1>Régime Réel simplifié en location meublée</h1>
                          <?php
                          // echo "<br>";
                          // echo "Part du foncier ". $_SESSION['PartDuFoncier'];
                          // echo "<br>";
                          // echo "Amortissement du mobilier (sur 10ans) ".$_SESSION['amortissementMobilier'];
                          // echo "<br>";
                          // echo "Amortissement des travaux (sur 10ans) ".$_SESSION['amortissementTravaux'];
                          // echo "<br>";
                          // echo "Amortissement de l'immobilier (sur 30 ans) ".$_SESSION['amortissementImmobilier'];
                          // echo "<br>";
                          // echo "Charges générées par l'amortissement ".$_SESSION['chargesAmortissement'];
                          // echo "<br>";
                          // echo "Recettes moins charges financières ".$_SESSION['recettesMoinsCharges'];
                          // echo "<br>";
                          // echo "  moins charges non financières ".$_SESSION['moinsChargesNonFinancieres'];
                          // echo "<br>";
                          // echo "  moins charges d'amortissement ".$_SESSION['moinsChargesAmortissement'];
                          // echo "<br>";
                          // echo "Revenu Foncier Imposable ".$_SESSION['revenusFonciersImposablesBIC'];
                          // echo "<br>";
                          // echo "Revenu Global Imposable ".$_SESSION['revenuGlobalBIC'];
                          // echo "<br>";
                          // echo "Tranche Marginale d'imposition ".$_SESSION['newTMIBIC'];
                          echo "<br>";
                          echo "Impots Foncier ". $_SESSION['impotsFoncierBIC'];
                          echo "<br>";
                          echo "Revenus Net ".$_SESSION['revenus']; 
                          echo "<br>";
                          echo "cashflow ".$_SESSION['cashflowBIC'];
                          echo "<br>";
                          echo "<br>";
                          ?>
                        </div>
                    </section>

                </div>

            </section>
        </div>
    </section>

</body>
</html>


            