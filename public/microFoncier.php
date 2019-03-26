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
                        <h1 id="title">Détails</h1>
                        <div class = "return"><a href = "result-simulateur.php"><h2>Revenir au simulateur</h2></a></div>
                    </div>
                <div class = "divider"><hr></div>
                </div>
                
                
                <section class = "col-md-3 content-wrapper">
                </section>

                <section id = "rendement" class = "col-md-6 content-wrapper">
                    <div class = "content-container">
                        <div class = "content-title"><h1>Régime Micro Foncier</h1></div>
                        <div class = "centerize">
                            <h2>Rendement Net Net <span class ="firstYear">(1ère année)</span></h2>
                            <h2 class ="number-result"><?php echo round($_SESSION['rendementNetNetmF']*100,2)."%" ?></h2>
                            <h2>Cash Flow Net Net / mois <span class ="firstYear">(1ère année)</span></h2>
                            <h2 class ="number-result"><?php echo round($_SESSION['cashflowmF'],2)."€" ?></h2>
                            <h2>Taux Marginal d'Imposition <span class ="firstYear">(1ère année)</span></h2>
                            <h2 class ="number-result"><?php echo round($_SESSION['rendementNet']*100,2)."%" ?></h2>
                            <h2>Impôts Fonciers <span class ="firstYear">(1ère année)</span></h2>
                            <h2 class ="number-result"><?php echo round($_SESSION['rendementNet']*100,2)."%" ?></h2>
                        </div>

                    </div>
                </section>

                <section class = "col-md-3 content-wrapper">
                </section>

















                </div>
            </section>        
        </div>
    </section>

</body>
</html>