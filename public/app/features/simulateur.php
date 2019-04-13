<?php require('../../../server/server.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once('../base/head.php');?>
    </head>
    <body>
        <section id="content" class="container-fluid">
            <div class="row">
                <?php require("../base/header.php"); ?>
                <section id="inside-content">
                    <?php if($_SESSION['popup']){
                    require_once("../base/popup.php");
                    }
                    ?>
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
                                <?php require('../../../server/errors.php');?>
                                <div id="fraisdachat" class="form-container">
                                    <div>
                                        <button style="float:right;display:inline-block;"
                                        type = "submit" class="btn btn-warning button" id="deleteData" name="deleteData">Effacer les
                                        champs</button>
                                        <h2 style="display:inline-block">Frais d'Achat</h2>
                                    </div>
                                    
                                    <label for="prix">Prix du bien (frais d'agence inclus) <div
                                        class="fas fa-question-circle element-info" href="#" target=_blank>
                                        <div class="infobulle">Prix du bien incluant les frais d'agence et de notaire</div>
                                    </div></label>
                                    <input type="number" min=0 name="prix" placeholder="100 000" required
                                    value=<?php if(isset($_SESSION['prix'])){echo $_SESSION['prix'];} ?>> €<br>

                                    <label for="fraisNotaire">Frais de Notaire <div
                                        class="fas fa-question-circle element-info" href="#" target=_blank>
                                        <div class="infobulle">Frais de notaire relatifs à l'achat de votre bien</div>
                                    </div></label>
                                    <input type="number" min=0 name="fraisNotaire" placeholder="1 000" required
                                    value=<?php if(isset($_SESSION['fraisNotaire'])){echo $_SESSION['fraisNotaire'];} ?>> €<br>
                                    
                                    <label for="travaux">Travaux (TTC) <div class="fas fa-question-circle element-info"
                                        href="#" target=_blank>
                                        <div class="infobulle">Coût des travaux toutes taxes comprises</div>
                                    </div></label>
                                    <input type="number" min=0 name="travaux" placeholder="3000" required
                                    value=<?php if(isset($_SESSION['travaux'])){echo $_SESSION['travaux'];} ?>> €<br>
                                    
                                    <label for="fraisDossiers">Frais de dossier bancaires <div
                                        class="fas fa-question-circle element-info" href="#" target=_blank>
                                        <div class="infobulle">Frais de dossier lors de la demande de prêt. <a target = _blank href = "https://www.pretto.fr/pret-immobilier/frais-de-dossier/">Plus d'info</a></div>
                                    </div></label>
                                    <input type="number" min=0 name="fraisDossiers" placeholder="950" required
                                    value=<?php if(isset($_SESSION['fraisDossiers'])){echo $_SESSION['fraisDossiers'];} ?>>
                                    €<br>
                                    
                                    <label for="mobilier">Prix du mobilier <span style = "color:red;">(si location meublée)</span> <div
                                    class="fas fa-question-circle element-info" href="#" target=_blank>
                                    <div class="infobulle">Canapé, cuisine, lits,armoires,...</div>
                                </div></label>
                                <input type="number" min=0 name="mobilier" placeholder="2000"
                                value=<?php if(!empty($_POST['mobilier'])){echo $_SESSION['mobilier'];}  ?>> €<br>
                            </div>
                            <div id="emprunt" class="form-container">
                                <h2>Emprunt Bancaire</h2>
                                
                                <label for="apport">Apport Personnel <div class="fas fa-question-circle element-info"
                                    href="#" target=_blank>
                                    <div class="infobulle">La somme d'argent que vous comptez investir par vos propres moyens (donc sans prêt)</div>
                                </div></label>
                                <input type="number" min=0 name="apport" placeholder="0" required
                                value=<?php if(isset($_SESSION['apport'])){echo $_SESSION['apport'];}  ?>> €<br>

                                <label for="questionEmprunt">Comptez-vous faire un emprunt bancaire ? </label>
                                <select id = "questionEmprunt" name="questionEmprunt" required>
                                    <option value="">Choisir</option>
                                    <option <?php if(isset($_SESSION['questionEmprunt']) && $_SESSION['questionEmprunt'] == "oui"){echo " selected ";} ?>value="oui">Oui</option>
                                    <option <?php if(isset($_SESSION['questionEmprunt']) && $_SESSION['questionEmprunt'] == "non"){echo " selected ";} ?>value="non">Non</option>
                                </select><br>
                                
                                <div id = "faitEmprunt" class = "hidden">
                                    <label for="taux">Taux d'intérêt annuel (en %) <div
                                        class="fas fa-question-circle element-info" href="#" target=_blank>
                                        <div class="infobulle">Taux d'intérêt de votre prêt immobilier <a href = "https://www.meilleurtaux.com/credit-immobilier/barometre-des-taux.html" target = _blank>Plus d'info</a></div>
                                    </div></label>
                                    <input type="number" min=0 name="taux" placeholder="0.50" step="any" required
                                    value=<?php if(isset($_SESSION['taux'])){echo ($_SESSION['taux']*100);}  ?>> %<br>
                                    
                                    <label for="dureeEmprunt">Durée de l'emprunt (en années) <div
                                        class="fas fa-question-circle element-info" href="#" target=_blank>
                                        <div class="infobulle">Durée de remboursement de votre prêt bancaire</div>
                                    </div></label>
                                    <input type="number" min=0 name="dureeEmprunt" placeholder="10" required
                                    value=<?php if(isset($_SESSION['dureeEmprunt'])){echo $_SESSION['dureeEmprunt'];}  ?>>
                                    an<br>
                                    
                                    <label for="assuranceCredit">Taux d'assurance crédit <div
                                        class="fas fa-question-circle element-info" href="#" target=_blank>
                                        <div class="infobulle">Taux d'assurance crédit de votre prêt immobilier <a href = "https://reassurez-moi.fr/guide/cout-assurance-pret-immobilier" target = _blank>Plus d'info</a></div>
                                    </div></label>
                                    <input type="number" min=0 name="assuranceCredit" placeholder="0.77" required step="any"
                                    value=<?php if(isset($_SESSION['assuranceCredit'])){echo ($_SESSION['assuranceCredit']*100);} ?>>
                                    %<br>
                                </div>
                            </div>
                            <div id="impots" class="form-container">
                                <h2>Impôts</h2>
                                
                                <label for="revenus">Revenus nets / an <div class="fas fa-question-circle element-info"
                                    href="#" target=_blank>
                                    <div class="infobulle">Sources de revenus non locatives (salaire par exemple)</div>
                                </div></label>
                                <input type="number" min=0 name="revenus" placeholder="30 000" required
                                value=<?php if(isset($_SESSION['revenus'])){echo $_SESSION['revenus'];}  ?>> €<br>
                                
                                <label for="situationMaritale">Situation Maritale</label>
                                <select name="situationMaritale" required>
                                    <option value = "">Choisir</option>
                                    <option value="marie" <?php if(isset($_SESSION['situationMaritale']) && $_SESSION['situationMaritale'] == "marie") {echo " selected ";} ?>>Marié(e) ou Pacsé(e)</option>
                                    <option value="veuf" <?php if(isset($_SESSION['situationMaritale']) && $_SESSION['situationMaritale'] == "veuf") {echo " selected ";} ?>>Veuf(ve)</option>
                                    <option value="seul" <?php if(isset($_SESSION['situationMaritale']) && $_SESSION['situationMaritale'] == "seul") {echo " selected ";} ?>>Seul</option>
                                    <option value="concubin"<?php if(isset($_SESSION['situationMaritale']) && $_SESSION['situationMaritale'] == "concubin") {echo " selected ";} ?>>Concubin(e)</option>
                                </select><br>
                                
                                <label for="personnesCharge">Nombre de personnes à charge <div
                                    class="fas fa-question-circle element-info" href="#" target=_blank>
                                    <div class="infobulle">Exemple : enfants à votre charge</div>
                                </div></label>
                                <input type="number" min=0 name="personnesCharge" placeholder="1" required
                                value=<?php if(isset($_SESSION['personnesCharge'])){echo $_SESSION['personnesCharge'];} ?>><br>
                            </div>
                            <div id="recettes" class="form-container">
                                <h2>Recettes Locatives</h2>
                                
                                <label for="loyer">Loyer mensuel (charges comprises) <div
                                    class="fas fa-question-circle element-info" href="#" target=_blank>
                                    <div class="infobulle">Loyer mensuel attendu par votre investissement, charges comprises</div>
                                </div></label>
                                <input type="number" min=0 name="loyer" placeholder="500" required
                                value=<?php if(isset($_SESSION['loyer'])){echo $_SESSION['loyer'];}  ?>> €<br>
                                
                                <label for="vacances">Vacances locatives (en %) <div
                                    class="fas fa-question-circle element-info" href="#" target=_blank>
                                    <div class="infobulle">Durée durant laquelle vous prévoyez que votre bien sera inoccupé</div>
                                </div></label>
                                <input type="number" min=0 name="vacances" placeholder="10" required step="any"
                                value=<?php if(isset($_SESSION['vacances'])){echo ($_SESSION['vacances']*100);}  ?>> %<br>
                                
                                <label for="autresRecettes">Autres recettes locatives / an <div
                                    class="fas fa-question-circle element-info" href="#" target=_blank>
                                    <div class="infobulle">Autres recettes locatives anuelles</div>
                                </div></label>
                                <input type="number" min=0 name="autresRecettes" placeholder="0" required
                                value=<?php if(isset($_SESSION['autresRecettes'])){echo $_SESSION['autresRecettes'];}  ?>>
                                €<br>
                            </div>
                            <div id="charges" class="form-container">
                                <h2>Charges</h2>
                                
                                <label for="taxeFonciere">Taxe Foncière</label>
                                <input type="number" min=0 name="taxeFonciere" placeholder="950" required
                                value=<?php if(isset($_SESSION['taxeFonciere'])){echo $_SESSION['taxeFonciere'];}  ?>>
                                €<br>
                                
                                <label for="reparations">Réparations / an (prévisions) <div
                                    class="fas fa-question-circle element-info" href="#" target=_blank>
                                    <div class="infobulle">Coût des réparations annuelles </div>
                                </div></label>
                                <input type="number" min=0 name="reparations" placeholder="100" required
                                value=<?php if(isset($_SESSION['reparations'])){echo $_SESSION['reparations'];}  ?>>
                                €<br>
                                
                                <label for="chargescopro">Charges de copropriétés / an</label>
                                <input type="number" min=0 name="chargesCopro" placeholder="1000" required
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
</body>
</html>

<!-- <label for="surface">Surface du bien (en m²) <div
    class="fas fa-question-circle element-info" href="#" target=_blank>
    <div class="infobulle">Surface totale du bien en m²</div>
</div></label>
<input type="number" min=0 name="surface" placeholder="100"
value="<?php //if(isset($_SESSION['surface'])){echo $_SESSION['surface'];} ?>"> m²
<br> -->

<!-- <label for="ville">Ville du bien <div class="fas fa-question-circle element-info"
    href="#" target=_blank>
    <div class="infobulle">Ville du bien que vous simulez</div>
</div></label>
<input type="text" required name="ville" placeholder="Paris"
value=<?php // if(isset($_SESSION['ville'])){echo $_SESSION['ville'];}  ?>><br> -->