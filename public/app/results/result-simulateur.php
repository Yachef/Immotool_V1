<?php require_once('../../../server/server.php');?>
<!DOCTYPE html>
<html>
<head>
<?php require_once('../base/head.php');?>
</head>

<body>
    
    <section id ="content" class = "container-fluid">
        <div class="row">
        <?php require("../base/header.php"); ?>
            <section id = "inside-content">

                <div class="row">

                    <div class = "header-content">
                        <div class="title">
                            <h1 id="title">Resultats</h1>
                            <div class = "return"><a href = "../features/simulateur.php"><h2>Revenir au simulateur</h2></a></div>
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
                                <h2>Cash Flow Net Net /mois <span class ="firstYear">(1ère année)</span></h2>
                                <h2 class ="number-result <?php echo colorNumber($_SESSION['cashflowR'])?>"><?php echo round($_SESSION['cashflowR'],2)."€" ?></h2>
                                <h2>Imp&ocirc;ts Fonciers <span class ="firstYear">(1ère année)</span></h2>
                                <h2 class ="number-result <?php echo colorNumber($_SESSION['impotsFoncierR'])?>"><?php echo round($_SESSION['impotsFoncierR'],2)."€" ?></h2>
                                <a href="reel.php"><h3 class = "details">Voir les détails</h3></a>
                            </div>
                        </div>

                        <div id = "regimeMicroFoncier" class = "content-container">
                            <div class = "content-title"><h1>Regime Micro Foncier</h1></div>
                            <div class = "centerize">
                                <?php if($_SESSION['microFoncier']): ?>
                                <h2>Cash Flow Net Net /mois <span class ="firstYear">(1ère année)</span></h2>
                                <h2 class ="number-result <?php echo colorNumber($_SESSION['cashflowmF'])?>"><?php echo round($_SESSION['cashflowmF'],2)."€" ?></h2>
                                <h2>Imp&ocirc;ts Fonciers <span class ="firstYear">(1ère année)</span></h2>
                                <h2 class ="number-result <?php echo colorNumber($_SESSION['impotsFonciermF'])?>"><?php echo round($_SESSION['impotsFonciermF'],2)."€" ?></h2>
                                <a href="microFoncier.php"><h3 class = "details">Voir les détails</h3></a>
                                <?php else: ?>
                                <h2 style = "color:red;">Le régime ne s'applique pas !</h2>
                                <p>(Recettes locatives annuelles > 15000€)</p>
                                <?php endif ?>
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
                                <a href="reel_LMNP.php"><h3 class = "details">Voir les détails</h3></a>

                            </div>
                        </div>

                        <div id = "regimeMicroBic" class = "content-container">
                            <div class = "content-title"><h1>Regime LMNP Micro BIC</h1></div>
                            <div class = "centerize">
                                <?php if($_SESSION['LMNPm']): ?>
                                <h2>Cash Flow Net Net /mois <span class ="firstYear">(1ère année)</span></h2>
                                <h2 class ="number-result <?php echo colorNumber($_SESSION['cashflowLMNPm'])?>"><?php echo round($_SESSION['cashflowLMNPm'],2)."€" ?></h2>
                                <h2>Impôts Fonciers <span class ="firstYear">(1ère année)</span></h2>
                                <h2 class ="number-result <?php echo colorNumber($_SESSION['impotsFoncierLMNPm'])?>"><?php echo round($_SESSION['impotsFoncierLMNPm'],2)."€" ?></h2>
                                <a href="microBIC.php"><h3 class = "details">Voir les détails</h3></a>
                                <?php else: ?>
                                <h2 style = "color:red;">Le régime ne s'applique pas !</h2>
                                <p>(Recettes locatives annuelles > 32900€)</p>
                                <?php endif ?>
                            </div>
                        </div>

                    </section>

                    <section class ="col-md-12 content-wrapper tableauRecapitulatif">
                        <div class ="content-container">
                            <div class = "content-title"><h1>Tableau des Cash Flow par mois</h1></div>
                            <br>
                            <table class = "blueTable">
                                <thead>
                                <tr>
                                    <th class = "centerize" style = "width = 20%;">Année\Régime</th>
                                    <th class = "centerize" style = "width = 20%;">R&eacute;el</th>
                                    <th class = "centerize" style = "width = 20%;">LMNP r&eacute;el</th>
                                    <?php if($_SESSION["LMNPm"]): ?><th class = "centerize" style = "width = 20%;">LMNP Micro Bic</th> <?php endif ?>
                                    <?php if($_SESSION["microFoncier"]): ?><th class = "centerize" style = "width = 20%;">Micro Foncier</th> <?php endif ?>
                                </tr>
                                </thead>
                                <tbody>
                                
                                    <?php
                                        $i =0;
                                        while($i<30){
                                            echo "<tr>";
                                            echo "<td>".($i+1)."</td>";
                                            echo "<td class =". colorNumber($_SESSION['tabcashflowR'][$i]).">".round($_SESSION['tabcashflowR'][$i],2)."€"."</td>";
                                            echo "<td class =". colorNumber($_SESSION['tabcashflowBIC'][$i]).">".round($_SESSION['tabcashflowBIC'][$i],2)."€"."</td>";
                                            if($_SESSION["LMNPm"]){
                                                echo "<td class =". colorNumber($_SESSION['tabcashflowLMNPm'][$i]).">".round($_SESSION['tabcashflowLMNPm'][$i],2)."€"."</td>";
                                            }else{
                                                echo "<td></td>";
                                            }
                                            if($_SESSION['microFoncier']){
                                                echo "<td class =". colorNumber($_SESSION['tabcashflowmF'][$i]).">".round($_SESSION['tabcashflowmF'][$i],2)."€"."</td>";
                                            }else{
                                                echo "<td></td>";
                                            }   
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

            