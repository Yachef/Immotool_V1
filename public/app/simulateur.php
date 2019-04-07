<?php require('../../server/server.php');
if(isset($_REQUEST['deleteData'])){
resetData();
header('location: simulateur.php');
}
if(isset($_REQUEST['simulation'])){
    saveData();
    calcul();
    if(isset($_SESSION['connected'])){ // Bien
        storeToDB($_SESSION['username'],$_POST['ville'],$_POST['surface'],$_POST['prix']);
        header('Location: result-simulateur.php');
        unset($_REQUEST['simulation']);
    }else{
        $_SESSION['popup'] = true;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once('head.php');?>
    </head>
    <body>
        <section id="content" class="container-fluid">
            <div class="row">
                <?php require("header.php"); ?>
                <section id="inside-content">
                    <?php if($_SESSION['popup']) : ?>
                    <section id = "popup">
                        <div class = "inside-popup">
                        <h1>Connectez-vous pour voir les résultats !</h1>
                        <form method="post">
                            <?php //include('errors.php'); ?>
                            <div class="input-group">
                                <label><h2>Identifiant</h2></label>
                                <input type="text" name="username" >
                            </div>
                            <div class="input-group">
                                <label><h2>Mot de passe</h2></label>
                                <input type="password" name="password">
                            </div>
                            <div class="input-group">
                                <button type="submit" class="btn btn-lg" name="login_user_via_popup">Connexion</button>
                            </div>
                            <p>
                                Pas encore inscrit ? <a href="../site/register.php?login=1">S'inscrire</a>
                            </p>
                        </form>
                        </div>
                    </section>
                    <?php echo "<script>console.log(".$_SESSION['surface'].");</script><br>"?>
                    <?php endif ?>
                    <div class="row">
                        <div class="header-content">
                            <div class="title">
                                <h1 id="title">Simulateur</h1>
                            </div>
                            <div class="divider">
                                <hr>
                            </div>
                        </div>
                        <section id="form" class="content-wrapper">
                            <form class="content-container" method="post">
                                <div id="fraisdachat" class="form-container">
                                    <div>
                                        <button style="float:right;display:inline-block;"
                                        type = "submit" class="btn btn-warning button" id="deleteData" name="deleteData">Effacer les
                                        champs</button>
                                        <h2 style="display:inline-block">Frais d'Achat</h2>
                                    </div>
                                    <label for="surface">Surface du bien (en m²) <div
                                        class="fas fa-question-circle element-info" href="#" target=_blank>
                                        <div class="infobulle">Surface totale du bien en m²</div>
                                    </div></label>
                                    <input type="number" name="surface" placeholder="100" required
                                    value="<?php if(isset($_SESSION['surface'])){echo $_SESSION['surface'];} ?>"> m²
                                    <br>
                                    <label for="prix">Prix du bien (frais d'agence inclus) <div
                                        class="fas fa-question-circle element-info" href="#" target=_blank>
                                        <div class="infobulle">Prix du bien incluant les frais d'agence et de notaire</div>
                                    </div></label>
                                    <input type="number" name="prix" placeholder="100 000" required
                                    value=<?php if(isset($_SESSION['prix'])){echo $_SESSION['prix'];} ?>> €<br>
                                    <label for="travaux">Travaux (TTC) <div class="fas fa-question-circle element-info"
                                        href="#" target=_blank>
                                        <div class="infobulle">Coût des travaux toutes taxes comprises</div>
                                    </div></label>
                                    <input type="number" name="travaux" placeholder="3000" required
                                    value=<?php if(isset($_SESSION['travaux'])){echo $_SESSION['travaux'];} ?>> €<br>
                                    <label for="fraisDossiers">Frais de dossier bancaires <div
                                        class="fas fa-question-circle element-info" href="#" target=_blank>
                                        <div class="infobulle">Frais de dossier lors de la demande de prêt. <a target = _blank href = "https://www.pretto.fr/pret-immobilier/frais-de-dossier/">Plus d'info</a></div>
                                    </div></label>
                                    <input type="number" name="fraisDossiers" placeholder="950" required
                                    value=<?php if(isset($_SESSION['fraisDossiers'])){echo $_SESSION['fraisDossiers'];} ?>>
                                    €<br>
                                    <label for="mobilier">Prix du mobilier (si location meublée) <div
                                        class="fas fa-question-circle element-info" href="#" target=_blank>
                                        <div class="infobulle">Canapé, Cuisine, lits,armoires,...</div>
                                    </div></label>
                                    <input type="number" name="mobilier" placeholder="2000" required
                                    value=<?php if(isset($_SESSION['mobilier'])){echo $_SESSION['mobilier'];}  ?>> €<br>
                                    <label for="ville">Ville du bien <div class="fas fa-question-circle element-info"
                                        href="#" target=_blank>
                                        <div class="infobulle">Ville du bien que vous simulez</div>
                                    </div></label>
                                    <input type="text" required name="ville" placeholder="Paris"
                                    value=<?php if(isset($_SESSION['ville'])){echo $_SESSION['ville'];}  ?>><br>
                                </div>
                                <div id="emprunt" class="form-container">
                                    <h2>Emprunt Bancaire</h2>
                                    <label for="apport">Apport Personnel <div class="fas fa-question-circle element-info"
                                        href="#" target=_blank>
                                        <div class="infobulle">La somme d'argent que vous comptez investir par vos propres moyens (donc sans prêt)</div>
                                    </div></label>
                                    <input type="number" name="apport" placeholder="0" required
                                    value=<?php if(isset($_SESSION['apport'])){echo $_SESSION['apport'];}  ?>> €<br>
                                    <label for="taux">Taux d'intérêt annuel (en %) <div
                                        class="fas fa-question-circle element-info" href="#" target=_blank>
                                        <div class="infobulle">Taux d'intérêt de votre prêt immobilier <a href = "https://www.meilleurtaux.com/credit-immobilier/barometre-des-taux.html" target = _blank>Plus d'info</a></div>
                                    </div></label>
                                    <input type="number" name="taux" placeholder="0.50" step="any" required
                                    value=<?php if(isset($_SESSION['taux'])){echo ($_SESSION['taux']*100);}  ?>> %<br>
                                    <label for="dureeEmprunt">Durée de l'emprunt (en années) <div
                                        class="fas fa-question-circle element-info" href="#" target=_blank>
                                        <div class="infobulle">Durée de remboursement de votre prêt bancaire</div>
                                    </div></label>
                                    <input type="number" name="dureeEmprunt" placeholder="10" max="30" required
                                    value=<?php if(isset($_SESSION['dureeEmprunt'])){echo $_SESSION['dureeEmprunt'];}  ?>>
                                    an<br>
                                    <label for="assuranceCredit">Taux d'assurance crédit <div
                                        class="fas fa-question-circle element-info" href="#" target=_blank>
                                        <div class="infobulle">Taux d'assurance crédit de votre prêt immobilier <a href = "https://reassurez-moi.fr/guide/cout-assurance-pret-immobilier" target = _blank>Plus d'info</a></div>
                                    </div></label>
                                    <input type="number" name="assuranceCredit" placeholder="0.77" required step="any"
                                    value=<?php if(isset($_SESSION['assuranceCredit'])){echo ($_SESSION['assuranceCredit']*100);} ?>>
                                    %<br>
                                </div>
                                <div id="impots" class="form-container">
                                    <h2>Impôts</h2>
                                    <label for="revenus">Revenus nets / an <div class="fas fa-question-circle element-info"
                                        href="#" target=_blank>
                                        <div class="infobulle">Sources de revenus non locatives (salaire par exemple)</div>
                                    </div></label>
                                    <input type="number" name="revenus" placeholder="30 000" required
                                    value=<?php if(isset($_SESSION['revenus'])){echo $_SESSION['revenus'];}  ?>> €<br>
                                    <label for="situationMaritale">Situation Maritale</label>
                                    <select name="situationMaritale">
                                        <option value="marie">Marié(e) ou Pacsé(e)</option>
                                        <option value="veuf">Veuf(ve)</option>
                                        <option value="seul">Seul</option>
                                        <option value="concubin">Concubin(e)</option>
                                    </select><br>
                                    <label for="personnesCharge">Nombre de personnes à charge <div
                                        class="fas fa-question-circle element-info" href="#" target=_blank>
                                        <div class="infobulle">Exemple : enfants à votre charge</div>
                                    </div></label>
                                    <input type="number" name="personnesCharge" placeholder="1" required
                                    value=<?php if(isset($_SESSION['personnesCharge'])){echo $_SESSION['personnesCharge'];} ?>><br>
                                </div>
                                <div id="recettes" class="form-container">
                                    <h2>Recettes Locatives</h2>
                                    <label for="loyer">Loyer mensuel (charges comprises) <div
                                        class="fas fa-question-circle element-info" href="#" target=_blank>
                                        <div class="infobulle">Loyer mensuel attendu par votre investissement, charges comprises</div>
                                    </div></label>
                                    <input type="number" name="loyer" placeholder="500" required
                                    value=<?php if(isset($_SESSION['loyer'])){echo $_SESSION['loyer'];}  ?>> €<br>
                                    <label for="vacances">Vacances locatives (en %) <div
                                        class="fas fa-question-circle element-info" href="#" target=_blank>
                                        <div class="infobulle">Durée durant laquelle vous prévoyez que votre bien sera inoccupé</div>
                                    </div></label>
                                    <input type="number" name="vacances" placeholder="10" required step="any"
                                    value=<?php if(isset($_SESSION['vacances'])){echo ($_SESSION['vacances']*100);}  ?>> %<br>
                                    <label for="autresRecettes">Autres recettes locatives / an <div
                                        class="fas fa-question-circle element-info" href="#" target=_blank>
                                        <div class="infobulle">Autres recettes locatives anuelles</div>
                                    </div></label>
                                    <input type="number" name="autresRecettes" placeholder="0" required
                                    value=<?php if(isset($_SESSION['autresRecettes'])){echo $_SESSION['autresRecettes'];}  ?>>
                                    €<br>
                                </div>
                                <div id="charges" class="form-container">
                                    <h2>Charges</h2>
                                    <label for="taxeFonciere">Taxe Foncière</label>
                                    <input type="number" name="taxeFonciere" placeholder="950" required
                                    value=<?php if(isset($_SESSION['taxeFonciere'])){echo $_SESSION['taxeFonciere'];}  ?>>
                                    €<br>
                                    <label for="reparations">Réparations / an (prévisions) <div
                                        class="fas fa-question-circle element-info" href="#" target=_blank>
                                        <div class="infobulle">Coût des réparations annuelles </div>
                                    </div></label>
                                    <input type="number" name="reparations" placeholder="100" required
                                    value=<?php if(isset($_SESSION['reparations'])){echo $_SESSION['reparations'];}  ?>>
                                    €<br>
                                    <label for="chargescopro">Charges de copropriétés / an</label>
                                    <input type="number" name="chargesCopro" placeholder="1000" required
                                    value=<?php if(isset($_SESSION['chargesCopro'])){echo $_SESSION['chargesCopro'];}  ?>>
                                    €<br>
                                </div>
                                <button type="submit" class="btn btn-warning button" name="simulation">Calculer</button>
                            </form>
                        </section>
                    </div>
                </section>
            </div>
        </section>
        <script>
        </script>
    </body>
</html>