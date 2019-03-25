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
    <link rel="stylesheet" href="../css/style-simulateur.css">

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
                        <form class="content-container" action="#" method="post">
                            <div id="fraisdachat" class = "form-container">
                            <h2>Frais d'Achat</h2>
                            <label for="surface">Surface du bien (en m²)</label>
                            <input type="number" name="surface" value="<?php if(isset($_SESSION['surface'])){echo $_SESSION['surface'];} ?>" required> € <br>
                            <label for="prix">Prix du bien (frais d'agence inclus)</label>
                            <input type="number" name="prix" value=<?php if(isset($_SESSION['prix'])){echo $_SESSION['prix'];} ?>  > €<br>

                            <label for="travaux">Travaux (TTC)</label>
                            <input type="number" name="travaux" value=<?php if(isset($_SESSION['travaux'])){echo $_SESSION['travaux'];} ?> > €<br>

                            <label for="fraisDossiers">Frais de dossier bancaires</label>
                            <input type="number" name="fraisDossiers" value=<?php if(isset($_SESSION['fraisDossiers'])){echo $_SESSION['fraisDossiers'];} ?> > €<br>

                            <label for="mobilier">Prix du mobilier (si location meublée)</label>
                            <input type="number" name="mobilier" value=<?php if(isset($_SESSION['mobilier'])){echo $_SESSION['mobilier'];}  ?> > €<br>
                            </div>

                            <div id="emprunt" class = "form-container">
                            <h2>Emprunt Bancaire</h2>
                            <label for="apport">Apport Personnel</label>
                            <input type="number" name="apport" value=<?php if(isset($_SESSION['apport'])){echo $_SESSION['apport'];}  ?> > €<br>

                            <label for="taux">Taux d'intérêt annuel (en %)</label>
                            <input type="number" name="taux" value=<?php if(isset($_POST['taux'])){echo $_POST['taux'];}  ?> > %<br>

                            <label for="dureeEmprunt">Durée de l'emprunt (en années)</label>
                            <input type="number" name="dureeEmprunt" value=<?php if(isset($_SESSION['dureeEmprunt'])){echo $_SESSION['dureeEmprunt'];}  ?> > an<br>

                            <label for="assuranceCredit">Assurance crédit</label>
                            <input type="number" name="assuranceCredit" value=<?php if(isset($_POST['assuranceCredit'])){echo $_POST['assuranceCredit'];} ?> > %<br>
                            </div>

                            <div id="impots" class = "form-container">
                            <h2>Impôts</h2>
                            <label for="revenus">Revenus nets / an</label>
                            <input type="number" name="revenus" value = <?php if(isset($_SESSION['revenus'])){echo $_SESSION['revenus'];}  ?> > €<br>

                            <label for="situationMaritale">Situation Maritale</label>
                            <select name="situationMaritale">
                            <option value="marie">Marié(e) ou Pacsé(e)</option>
                            <option value="veuf">Veuf(ve)</option>
                            <option value="seul">Seul</option>
                            <option value="concubin">Concubin(e)</option>
                            </select><br>

                            <label for="personnesCharge">Nombre de personnes à charge</label>
                            <input type="number" name="personnesCharge" value=<?php if(isset($_POST['personnesCharge'])){echo $_POST['personnesCharge'];} ?> ><br>

                            </div>

                            <div id="recettes" class = "form-container">
                            <h2>Recettes Locatives</h2>
                            <label for="loyer">Loyer mensuel (charges comprises)</label>
                            <input type="number" name="loyer" value=<?php if(isset($_SESSION['loyer'])){echo $_SESSION['loyer'];}  ?> > €<br>

                            <label for="vacances">Vacances locatives (en %)</label>
                            <input type="number" name="vacances" value=<?php if(isset($_POST['vacances'])){echo $_POST['vacances'];}  ?> > %<br>

                            <label for="autresRecettes">Autres recettes / an</label>
                            <input type="number" name="autresRecettes" value=<?php if(isset($_SESSION['autresRecettes'])){echo $_SESSION['autresRecettes'];}  ?> > €<br>

                            </div>

                            <div id="charges" class = "form-container">
                            <h2>Charges</h2>
                            <label for="taxeFonciere">Taxe Foncière</label>
                            <input type="number" name="taxeFonciere" value=<?php if(isset($_SESSION['taxeFonciere'])){echo $_SESSION['taxeFonciere'];}  ?> > €<br>

                            <label for="reparations">Réparations / an (prévisions)</label>
                            <input type="number" name="reparations" value=<?php if(isset($_SESSION['reparations'])){echo $_SESSION['reparations'];}  ?> > €<br>

                            <label for="chargescopro">Charges de copropriétés / an</label>
                            <input type="number" name="chargesCopro" value=<?php if(isset($_SESSION['chargesCopro'])){echo $_SESSION['chargesCopro'];}  ?> > €<br>
                            </div>

                            <!-- <input type="submit" class = "btn btn-warning button" name="simulation" value ="Calculer"> -->
                            <button type="submit" class = "btn btn-warning button" name="simulation">Calculer</button>
                        </form>
                    </section>

                </div>

            </section>
        </div>
    </section>

</body>
</html>