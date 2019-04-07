<?php require_once('../../server/server.php');?>
<!DOCTYPE html>
<html>
<head>
<?php require_once('head.php');?>
</head>

<body>
    
    <section id ="content" class = "container-fluid">
        <div class="row">
        <?php require("header.php"); ?>

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
                            <div class = "content-title"><h1>Régime Réel simplifié (location meublée)</h1></div>
                            <div class = "centerize">
                                <h2>Rendement Net Net <span class ="firstYear">(1ère année)</span></h2>
                                <h2 class ="number-result"><?php echo round($_SESSION['rendementNetNetBIC']*100,2)."%" ?></h2>
                                <h2>Cash Flow Net Net / mois <span class ="firstYear">(1ère année)</span></h2>
                                <h2 class ="number-result <?php echo colorNumber($_SESSION['cashflowBIC'])?>"><?php echo round($_SESSION['cashflowBIC'],2)."€" ?></h2>
                                <h2>Impôts Fonciers <span class ="firstYear">(1ère année)</span></h2>
                                <h2 class ="number-result"><?php echo round($_SESSION['tabimpotsFoncierBIC'][0],2)."€" ?></h2>
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
                                    <th class = "centerize" style = "width = 20%;">Amortissement</th>                                    
                                </tr>
                                </thead>
                                <tbody>
                                
                                    <?php
                                        $i =0;
                                        while($i<30){
                                            echo "<tr>";
                                            echo "<td>".($i+1)."</td>";
                                            echo "<td class =". colorNumber($_SESSION['tabRendementNetNetBIC'][$i]).">".round($_SESSION['tabRendementNetNetBIC'][$i]*100,2)."%"."</td>";
                                            echo "<td class =". colorNumber($_SESSION['tabcashflowBIC'][$i]).">".round($_SESSION['tabcashflowBIC'][$i],2)."€"."</td>";
                                            echo "<td>".round($_SESSION['tabimpotsFoncierBIC'][$i],2)."€"."</td>";
                                            echo "<td>".round($_SESSION['tabAmortissement'][$i],2)."€"."</td>";
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