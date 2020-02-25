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
                            <h1 id="title">Détails</h1>
                            <div class = "return"><a href = "result-simulateur.php"><h2>Revenir aux résultats</h2></a></div>
                        </div>
                    <div class = "divider"><hr></div>
                    </div>
                    
                    
                    <section class = "col-md-3 content-wrapper">
                    </section>

                    <section id = "rendement" class = "col-md-6 content-wrapper">
                        <div class = "content-container">
                            <div class = "content-title"><h1>Régime Micro Foncier (location nue)</h1></div>
                            <div class = "centerize">
                                <h2>Rendement Net Net <span class ="firstYear">(1ère année)</span></h2>
                                <h2 class ="number-result"><?php echo round($_SESSION['rendementNetNetmF']*100,2)."%" ?></h2>
                                <h2>Cash Flow Net Net / mois <span class ="firstYear">(1ère année)</span></h2>
                                <h2 class ="number-result <?php echo colorNumber($_SESSION['cashflowmF'])?>"><?php echo round($_SESSION['cashflowmF'],2)."€" ?></h2>
                                <h2>Taux Marginal d'Imposition <span class ="firstYear">(1ère année)</span></h2>
                                <h2 class ="number-result"><?php echo round($_SESSION['newTMImF']*100,2)."%" ?></h2>
                                <h2>Impôts Fonciers <span class ="firstYear">(1ère année)</span></h2>
                                <h2 class ="number-result"><?php echo round($_SESSION['tabImpotsFonciersmF'][0],2)."€" ?></h2>
                                <h2>Mensualités Totales du crédit</h2>
                                <h2 class ="number-result"><?php echo round($_SESSION['mensualitesTotales'],2)."€" ?></h2>
                            </div>

                        </div>
                    </section>

                    <section class = "col-md-3 content-wrapper">
                    </section>

                    <section class ="col-md-12 content-wrapper tableauRecapitulatif">
                        <div class ="content-container">
                            <div class = "content-title"><h1>Tableau Récapitulatif</h1></div>
                            <br>
                            <table class = "blueTable">
                                <thead>
                                <tr>
                                    <th class = "centerize" style = "width = 20%;">Année</th>
                                    <th class = "centerize" style = "width = 20%;">Rendement Net Net</th>
                                    <th class = "centerize" style = "width = 20%;">Cash Flow Net Net /mois</th>
                                    <th class = "centerize" style = "width = 20%;">Impôts Fonciers</th>
                                </tr>
                                </thead>
                                <tbody>
                                
                                    <?php
                                        $i =0;
                                        while($i<30){
                                            echo "<tr>";
                                            echo "<td>".($i+1)."</td>";
                                            echo "<td class =". colorNumber($_SESSION['tabRendementNetNetmF'][$i]).">".round($_SESSION['tabRendementNetNetmF'][$i]*100,2)."%"."</td>";
                                            echo "<td class =". colorNumber($_SESSION['tabcashflowmF'][$i]).">".round($_SESSION['tabcashflowmF'][$i],2)."€"."</td>";
                                            echo "<td>".round($_SESSION['tabImpotsFonciersmF'][$i],2)."€"."</td>";
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