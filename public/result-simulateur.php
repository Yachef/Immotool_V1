<?php 
    require_once('../server/server.php');
    require_once('../server/functions.php');
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
    <link rel="stylesheet" href="../css/style-results.css">

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
                            <h1 id="title">Resultats</h1>
                            <div class = "return"><a href = "simulateur.php"><h2>Revenir au simulateur</h2></a></div>
                        </div>
                       <div class = "divider"><hr></div>
                    </div>

                    <section class = "col-md-3 content-wrapper">
                    </section>


                    <section id = "rendement" class = "col-md-6 content-wrapper">
                        <div class = "content-container">
                            <div class = "content-title"><h1>Rendement</h1></div>
                            <div class = "centerize">
                                <h2>Rendement Brut <span class ="firstYear">(1ère année)</span></h2>
                                <h2 class ="number-result"><?php echo round($_SESSION['rendementBrut']*100,2)."%" ?></h2>
                                <h2>Rendement Net (avant imp&ocirc;ts) <span class ="firstYear">(1ère année)</span></h2>
                                <h2 class ="number-result"><?php echo round($_SESSION['rendementNet']*100,2)."%" ?></h2>
                            </div>

                        </div>
                    </section>


                    <section class = "col-md-3 content-wrapper">
                    </section>

                    <section id = "location-vide" class = "col-md-6 content-wrapper">

                        <div class = "centerize"><h1>Location Vide</h1></div>

                        <div id = "regimeReel" class = "content-container">
                            <div class = "content-title"><h1>Regime R&eacute;el</h1></div>
                            <div class = "centerize">
                                <h2>Cash Flow Net Net/mois <span class ="firstYear">(1ère année)</span></h2>
                                <h2 class ="number-result <?php echo colorNumber($_SESSION['cashflowR'])?>"><?php echo round($_SESSION['cashflowR'],2)."€" ?></h2>
                                <h2>Imp&ocirc;ts Fonciers <span class ="firstYear">(1ère année)</span></h2>
                                <h2 class ="number-result <?php echo colorNumber($_SESSION['impotsFoncierR'])?>"><?php echo round($_SESSION['impotsFoncierR'],2)."€" ?></h2>
                                <a href="#"><h3 class = "details">Voir les détails</h3></a>
                            </div>
                        </div>

                        <div id = "regimeMicroFoncier" class = "content-container">
                            <div class = "content-title"><h1>Regime Micro Foncier</h1></div>
                            <div class = "centerize">
                                <h2>Cash Flow Net Net/mois <span class ="firstYear">(1ère année)</span></h2>
                                <h2 class ="number-result <?php echo colorNumber($_SESSION['cashflowmF'])?>"><?php echo round($_SESSION['cashflowmF'],2)."€" ?></h2>
                                <h2>Imp&ocirc;ts Fonciers <span class ="firstYear">(1ère année)</span></h2>
                                <h2 class ="number-result <?php echo colorNumber($_SESSION['impotsFonciermF'])?>"><?php echo round($_SESSION['impotsFonciermF'],2)."€" ?></h2>
                                <a href="microFoncier.php" target="_blank"><h3 class = "details">Voir les détails</h3></a>
                            </div>
                        </div>

                    </section>

                    <section id = "location-meublee" class = "col-md-6 content-wrapper">

                        <div class = "centerize"><h1>Location Meubl&eacute;e</h1></div>

                        <div id = "regimeReelSimplifie" class = "content-container">
                            <div class = "content-title"><h1>Regime LMNP au r&eacute;el simplifi&eacute;</h1></div>
                            <div class = "centerize">
                                <h2>Cash Flow Net Net /mois <span class ="firstYear">(1ère année)</span></h2>
                                <h2 class ="number-result <?php echo colorNumber($_SESSION['cashflowBIC'])?>"><?php echo round($_SESSION['cashflowBIC'],2)."€" ?></h2>
                                <h2>Imp&ocirc;ts Fonciers <span class ="firstYear">(1ère année)</span></h2>
                                <h2 class ="number-result <?php echo colorNumber($_SESSION['impotsFoncierBIC'])?>"><?php echo round($_SESSION['impotsFoncierBIC'],2)."€" ?></h2>
                                <a href="#"><h3 class = "details">Voir les détails</h3></a>

                            </div>
                        </div>

                        <div id = "regimeMicroBic" class = "content-container">
                            <div class = "content-title"><h1>Regime LMNP Micro BIC</h1></div>
                            <div class = "centerize">
                                <h2>Cash Flow Net Net /mois <span class ="firstYear">(1ère année)</span></h2>
                                <h2 class ="number-result <?php echo colorNumber($_SESSION['cashflowLMNPm'])?>"><?php echo round($_SESSION['cashflowLMNPm'],2)."€" ?></h2>
                                <h2>Impôts Fonciers <span class ="firstYear">(1ère année)</span></h2>
                                <h2 class ="number-result <?php echo colorNumber($_SESSION['impotsFoncierLMNPm'])?>"><?php echo round($_SESSION['impotsFoncierLMNPm'],2)."€" ?></h2>
                                <a href="#"><h3 class = "details">Voir les détails</h3></a>
                            </div>
                        </div>

                    </section>

                    <section id = "tableauRecapitulatif" class ="col-md-12 content-wrapper">
                        <div class ="content-container">
                            <div class = "content-title"><h1>Tableau Récapitulatif</h1></div>
                            <br>
                            <table class = "blueTable">
                                <thead>
                                <tr>
                                    <th class = "centerize" style = "width = 20%;">Année\Régime</th>
                                    <th class = "centerize" style = "width = 20%;">R&eacute;el</th>
                                    <th class = "centerize" style = "width = 20%;">Micro Foncier</th>
                                    <th class = "centerize" style = "width = 20%;">LMNP r&eacute;el</th>
                                    <th class = "centerize" style = "width = 20%;">LMNP Micro Bic</th>
                                </tr>
                                </thead>
                                <tbody>
                                
                                    <?php
                                        $i =0;
                                        while($i<30){
                                            echo "<tr>";
                                            echo "<td>".($i)."</td>";
                                            echo "<td class =". colorNumber($_SESSION['tabcashflowR'][$i]).">".round($_SESSION['tabcashflowR'][$i],2)."€"."</td>";
                                            echo "<td class =". colorNumber($_SESSION['tabcashflowmF'][$i]).">".round($_SESSION['tabcashflowmF'][$i],2)."€"."</td>";
                                            echo "<td class =". colorNumber($_SESSION['tabcashflowBIC'][$i]).">".round($_SESSION['tabcashflowBIC'][$i],2)."€"."</td>";
                                            echo "<td class =". colorNumber($_SESSION['tabcashflowLMNPm'][$i]).">".round($_SESSION['tabcashflowLMNPm'][$i],2)."€"."</td>";
                                            echo "</tr>";
                                            $i++;
                                        }
                                    ?>

                                </tbody>
                                </tr>
                                </table>
                        </div>
                    </section>

                </div>

            </section>
        </div>
    </section>

</body>
</html>


            