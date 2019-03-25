<?php
function calcul(){

    // FRAIS D'ACQUISITION
    $_SESSION['fraisNotaire'] = calculFraisNotaire($_SESSION['prix']);
    $_SESSION['totalCoutAchat'] = $_SESSION['prix'] + $_SESSION['travaux'] + $_SESSION['fraisDossiers'] + $_SESSION['mobilier'] + $_SESSION['fraisNotaire'];
  
    // RECETTES LOCATIVES
    $_SESSION['totalRecettesAnuelles'] = $_SESSION['loyer']*12*(1-$_SESSION['vacances'])+$_SESSION['autresRecettes'];
  
    //FINANCEMENT
    $_SESSION['montantPret'] = $_SESSION['totalCoutAchat'] - $_SESSION['apport'];
    $_SESSION['mensualitesHorsAssurance'] = -PMT($_SESSION['taux']/12,$_SESSION['dureeEmprunt']*12,$_SESSION['montantPret'],0,0);
    $_SESSION['mensualitesTotales'] = $_SESSION['mensualitesHorsAssurance']+($_SESSION['assuranceCredit'] * $_SESSION['montantPret']/12);
    $_SESSION['remboursementAnnuel'] = $_SESSION['mensualitesTotales'] * 12;
    $_SESSION['interetEmprunt1ereAnnee'] = -CUMIPMT($_SESSION['taux']/12,$_SESSION['dureeEmprunt']*12,$_SESSION['montantPret'],1,12,0);
    $_SESSION['tabInteretEmprunt'] = tabInteretEmprunt($_SESSION['taux'],$_SESSION['dureeEmprunt'],$_SESSION['montantPret']);
    $_SESSION['coutTotalCredit'] = ($_SESSION['mensualitesHorsAssurance']*12 + $_SESSION['assuranceCredit']*$_SESSION['montantPret'])*$_SESSION['dureeEmprunt'] - $_SESSION['montantPret'];
  
  
    //FISCALITE
    $_SESSION['TMI'] = TMI($_SESSION['revenus']);
  
  
    // CHARGES DEDUCTIBLES
    $_SESSION['montantAssuranceCredit'] = $_SESSION['montantPret'] * $_SESSION['assuranceCredit'];
    $_SESSION['totalChargesAnnuelles'] = $_SESSION['taxeFonciere'] + $_SESSION['montantAssuranceCredit'] + $_SESSION['reparations'] + $_SESSION['chargesCopro'];
  
  
    // ROI
    $_SESSION['rendementBrut'] = $_SESSION['totalRecettesAnuelles']/$_SESSION['totalCoutAchat'];
    $_SESSION['rendementNet'] = ($_SESSION['totalRecettesAnuelles'] -$_SESSION['totalChargesAnnuelles'])/$_SESSION['totalCoutAchat'];
    $_SESSION['revenusNetFoncier'] = $_SESSION['totalRecettesAnuelles'] - $_SESSION['remboursementAnnuel'] - $_SESSION['totalChargesAnnuelles'];
    
    // LOCATION NUE
    microFoncier();
    reel();

    //LMNP
    microBic();
    reel_LMNP();
  
    // TEST
    for($k=0; $k<$_SESSION['dureeEmprunt'];$k++){
      $_SESSION['arrayTest'][] = -CUMIPMT($_SESSION['taux'],$_SESSION['dureeEmprunt'],$_SESSION['montantPret'],$k+1,$k+2,0);
    }
  
}
// LOCATION NUE
function microFoncier(){
    /*REGIME MICRO FONCIER */
    $_SESSION['microFoncier'] = ($_SESSION['totalRecettesAnuelles']<15000) ? true : false;
    if($_SESSION['microFoncier']){
      $_SESSION['abattementmF'] = $_SESSION['totalRecettesAnuelles']*0.3;
      $_SESSION['revenusFonciersImposablesmF'] = $_SESSION['totalRecettesAnuelles']*0.7;
      $_SESSION['revenuGlobalmF'] = $_SESSION['revenusFonciersImposablesmF'] + 0.9 * $_SESSION['revenus']; 
      $_SESSION['newTMImF'] = TMI($_SESSION['revenuGlobalmF']);
      $_SESSION['tabImpotsFonciersmF'] = tabImpotsFonciers($_SESSION['revenusFonciersImposablesmF'],$_SESSION['revenuGlobalmF'],$_SESSION['personnesCharge'],$_SESSION['situationMaritale']);
      $_SESSION['impotsFonciermF'] = $_SESSION['tabImpotsFonciersmF'][0];
      $_SESSION['regimeMicroFoncier'] = ( $_SESSION['totalRecettesAnuelles'] - $_SESSION['totalChargesAnnuelles'] - $_SESSION['impotsFonciermF'] ) / $_SESSION['totalCoutAchat'];
      $_SESSION['cashflowmF'] = cashFlow($_SESSION['totalRecettesAnuelles'],$_SESSION['mensualitesTotales'],$_SESSION['totalChargesAnnuelles'],$_SESSION['tabImpotsFonciersmF'])[0];
    }
}

function reel(){
    /* REGIME REEL */
    // $_SESSION['recettesMoinsCharges'] = $_SESSION['totalRecettesAnuelles'] - $_SESSION['interetEmprunt1ereAnnee'];
    // $_SESSION['recettesMoinsChargesDontTravaux'] = $_SESSION['recettesMoinsCharges'] - $_SESSION['travaux'] - $_SESSION['totalChargesAnnuelles'];
    // $_SESSION['deficitFoncierR'] = ($_SESSION['recettesMoinsChargesDontTravaux'] < 0) ?  - $_SESSION['recettesMoinsChargesDontTravaux'] : 0;
    // $_SESSION['revenusFonciersImposablesR'] = $_SESSION['recettesMoinsChargesDontTravaux']>0 ? $_SESSION['recettesMoinsChargesDontTravaux'] : 0;
    // $_SESSION['revenuGlobalR'] = $_SESSION['revenus']*0.9 +$_SESSION['revenusFonciersImposablesR'];
    // $_SESSION['newTMIR'] = TMI($_SESSION['revenuGlobalR']);
    $_SESSION['impotsFoncierR'] = tabImpotsFonciersR($_SESSION['travaux'],$_SESSION['revenus'],$_SESSION['totalChargesAnnuelles'],$_SESSION['tabInteretEmprunt'],$_SESSION['totalRecettesAnuelles'],$_SESSION['personnesCharge'],$_SESSION['situationMaritale'])[0];
    $_SESSION['regimeReel'] = ( $_SESSION['totalRecettesAnuelles'] - $_SESSION['totalChargesAnnuelles'] - $_SESSION['impotsFoncierR'] ) / $_SESSION['totalCoutAchat'];
    $_SESSION['cashflowR'] = cashFlow($_SESSION['totalRecettesAnuelles'],$_SESSION['mensualitesTotales'],$_SESSION['totalChargesAnnuelles'],$_SESSION['impotsFoncierR'])[0];
}

  //LMNP
function microBic(){
  /* REGIME MICRO BIC LMNP */
  $_SESSION['LMNPm'] = ($_SESSION['totalRecettesAnuelles']<32900) ? true : false;
  if($_SESSION['LMNPm']){
    $_SESSION['abattementLMNPm'] = 0.5 * $_SESSION['totalRecettesAnuelles'];
    $_SESSION['revenusFonciersImposablesLMNPm'] = $_SESSION['abattementLMNPm'];
    $_SESSION['revenuGlobalLMNPm'] = $_SESSION['revenus']*0.9 +$_SESSION['revenusFonciersImposablesLMNPm'];
    $_SESSION['newTMILMNPm'] = TMI($_SESSION['revenuGlobalLMNPm']);
    $_SESSION['tabImpotsFonciersLMNPm'] = tabImpotsFonciers($_SESSION['revenusFonciersImposablesLMNPm'],$_SESSION['revenuGlobalLMNPm'],$_SESSION['personnesCharge'],$_SESSION['situationMaritale']);
    $_SESSION['impotsFoncierLMNPm'] = $_SESSION['tabImpotsFonciersLMNPm'][0];
    $_SESSION['regimeMicroBic'] =( $_SESSION['totalRecettesAnuelles'] - $_SESSION['totalChargesAnnuelles'] - $_SESSION['impotsFoncierLMNPm'] ) / $_SESSION['totalCoutAchat'];
    $_SESSION['cashflowLMNPm'] = cashFlow($_SESSION['totalRecettesAnuelles'],$_SESSION['mensualitesTotales'],$_SESSION['totalChargesAnnuelles'],$_SESSION['tabImpotsFonciersLMNPm'])[0];
  }
}

function reel_LMNP(){
    /* REGIME  BIC */
    // $_SESSION['PartDuFoncier'] = $_SESSION['prix'] * 0.1;
    // $_SESSION['amortissementMobilier'] = $_SESSION['mobilier']/10;
    // $_SESSION['amortissementTravaux'] = $_SESSION['travaux']/10;
    // $_SESSION['amortissementImmobilier'] = ($_SESSION['prix'] - $_SESSION['PartDuFoncier'])/30;
    // $_SESSION['chargesAmortissement'] = $_SESSION['amortissementMobilier'] + $_SESSION['amortissementTravaux'] + $_SESSION['amortissementImmobilier'];
    // $_SESSION['moinsChargesNonFinancieres'] = $_SESSION['recettesMoinsCharges'] > 0 ? $_SESSION['recettesMoinsCharges'] - $_SESSION['totalChargesAnnuelles'] : 0 - $_SESSION['totalChargesAnnuelles'];
    // $_SESSION['moinsChargesAmortissement'] = $_SESSION['moinsChargesNonFinancieres'] > 0 ? (($_SESSION['moinsChargesNonFinancieres'] >= $_SESSION['chargesAmortissement']) ? $_SESSION['moinsChargesNonFinancieres'] - $_SESSION['chargesAmortissement'] : 0) : 0;
    // $_SESSION['revenusFonciersImposablesBIC'] = $_SESSION['moinsChargesAmortissement'] >0 ? $_SESSION['moinsChargesAmortissement'] : 0;
    // $_SESSION['revenuGlobalBIC'] = $_SESSION['revenus'] * 0.9 + $_SESSION['revenusFonciersImposablesBIC'];
    // $_SESSION['newTMIBIC'] = TMI($_SESSION['revenuGlobalBIC']);
    $_SESSION['impotsFoncierBIC'] = tabimpotsFonciersBIC($_SESSION['mobilier'],$_SESSION['prix'],$_SESSION['travaux'],$_SESSION['fraisNotaire'],$_SESSION['revenus'],$_SESSION['totalChargesAnnuelles'],$_SESSION['tabInteretEmprunt'],$_SESSION['totalRecettesAnuelles'],$_SESSION['personnesCharge'],$_SESSION['situationMaritale'])[0];
    $_SESSION['regimeBIC'] = ( $_SESSION['totalRecettesAnuelles'] - $_SESSION['totalChargesAnnuelles'] - $_SESSION['impotsFoncierBIC'] ) / $_SESSION['totalCoutAchat'];
    $_SESSION['cashflowBIC'] = cashFlow($_SESSION['totalRecettesAnuelles'],$_SESSION['mensualitesTotales'],$_SESSION['totalChargesAnnuelles'],$_SESSION['impotsFoncierBIC'])[0];
}






?>