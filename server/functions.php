<?php
// require_once('server.php');

function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
  }
  
function PMT($rate, $periods, $present, $future, $type) {

  $future = $future || 0;
  $type = $type || 0;
  $result;
  if ($rate === 0) {
    $result = ($present + $future) / $periods;
  } else {
    $term = pow(1 + $rate, $periods);
    if ($type === 1) {
      $result = ($future * $rate / ($term - 1) + $present * $rate / (1 - 1 / $term)) / (1 + $rate);
    } else {
      $result = $future * $rate / ($term - 1) + $present * $rate / (1 - 1 / $term);
    }
  }
  return -$result;
};
function IPMT($rate,$period,$periods,$present,$future,$type) {
  // Credits: algorithm inspired by Apache OpenOffice

  // Initialize type
  $type = (gettype($type) === 'undefined') ? 0 : $type;

  // Compute payment
  $payment = PMT($rate, $periods, $present, $future, $type);
  
  // Compute interest
  if ($period === 1) {
    if ($type === 1) {
      $interest = 0;
    } else {
      $interest = -$present;
    }
  } else {
    if ($type === 1) {
      $interest = FV($rate, $period - 2, $payment, $present, 1) - $payment;
    } else {
      $interest = FV($rate, $period - 1, $payment, $present, 0);
    }
  }
  
  // Return interest
  return $interest * $rate;
}

function FV($rate, $periods, $payment, $value, $type) {
  $term = pow(1 + $rate, $periods);
  $result = $value * $term + $payment * ($term - 1) / $rate;
  return -$result;
};

function calculFraisNotaire($prix){
  if($prix>60000){
    $x = 0.00825*$prix+ 411.25;
  }else if($prix>17001 and $prix<60000){
    $x = 0.011 * $prix +246.25;
  }else if($prix>6500 and$prix<17001){
    $x = 0.0165*$prix + 152.75;
  }else {
    $x = 0.04;
  }
  return 0.0509*$prix + $x * 1.196+1000+0.001*$prix;
};



function CUMIPMT($rate, $periods, $value, $start, $end, $type) {

  // Compute cumulative $interest
  $payment = PMT($rate, $periods, $value, 0, $type);
  $interest = 0;

  if ($start == 1) {
    if ($type == 0) {
      $interest = -$value;
      $start++;
    }
  }
  $tab = array($interest);
  for ($i = $start; $i <= $end; $i++) {
    if ($type == 1) {
      $interest += FV($rate, $i - 2, $payment, $value, 1) - $payment;
    } else {
      $interest += FV($rate, $i - 1, $payment, $value, 0);
    }
    array_push($tab,$interest);
  }
  $interest *= $rate;

  return $interest;
};

function saveData(){
    $_SESSION['surface'] = $_POST['surface'];
    $_SESSION['prix'] = $_POST['prix'];
    $_SESSION['travaux'] = $_POST['travaux'];
    $_SESSION['fraisDossiers'] = $_POST['fraisDossiers'];
    $_SESSION['mobilier'] = $_POST['mobilier'];
  
    $_SESSION['apport'] = $_POST['apport'];
    $_SESSION['assuranceCredit'] = $_POST['assuranceCredit']/100;
    $_SESSION['taux'] = $_POST['taux']/100;
    $_SESSION['dureeEmprunt'] = $_POST['dureeEmprunt'];
  
    $_SESSION['revenus'] = $_POST['revenus'];
    // $_SESSION['partsFiscales'] = $_POST['partsFiscales'];
    $_SESSION['loyer'] = $_POST['loyer'];
    $_SESSION['vacances'] = $_POST['vacances']/100;
    $_SESSION['autresRecettes']= $_POST['autresRecettes'];
  
    $_SESSION['taxeFonciere'] = $_POST['taxeFonciere'];
    $_SESSION['reparations'] = $_POST['reparations'];
    $_SESSION['chargesCopro'] = $_POST['chargesCopro'];

    $_SESSION['situationMaritale'] = $_POST['situationMaritale'];
    $_SESSION['personnesCharge'] = $_POST['personnesCharge'];
    // $_SESSION['ville'] = $_POST['ville'];
  
};
function resetData(){
  unset($_SESSION['surface']);
  unset($_SESSION['prix']);
  unset($_SESSION['travaux']);
  unset($_SESSION['fraisDossiers']);
  unset($_SESSION['mobilier']);

  unset($_SESSION['apport']);
  unset($_SESSION['assuranceCredit']);
  unset($_SESSION['taux']);
  unset($_SESSION['dureeEmprunt']);

  $_SESSION['revenus'] ="";
  // $_SESSION['partsFiscales'] = $_POST['partsFiscales'];
  unset($_SESSION['loyer']);
  unset($_SESSION['vacances']);

  unset($_SESSION['autresRecettes']);
  unset($_SESSION['taxeFonciere']);
  unset($_SESSION['reparations']);
  unset($_SESSION['chargesCopro']);

  unset($_SESSION['situationMaritale']);
  unset($_SESSION['personnesCharge']);
  // unset($_SESSION['ville']);
  
}
function connectToDB(){
  try{
    $GLOBALS["db"] = mysqli_connect('localhost', 'yachef', 'yacleboss', 'calculermoncashflow',3306);
    // $GLOBALS["db"] = mysqli_connect("db5000036975.hosting-data.io","dbu73555","F8ma9surnz2y!","dbs31976",3306);
  }
  catch(Exception $e){
    echo "Problème de connexion à la DB :".$e;
  }
}
function storeToDB($username,$ville,$surface,$prix){
  connectToDB();
  $query = "INSERT INTO requests (username, ville, surface, prix) values ('$username', '$ville', '$surface','$prix')";
  mysqli_query($GLOBALS['db'], $query);
  mysqli_close($GLOBALS["db"]);
}

// function resetData(){
//   $_SESSION['loyer'] = $_SESSION['surface'] = $_SESSION['prix'] = $_SESSION['travaux'] = $_SESSION['fraisDossiers'] = $_SESSION['mobilier'] = $_SESSION['apport'] = $_SESSION['taux'] = $_SESSION['dureeEmprunt'] = $_SESSION['assuranceCredit'] = $_SESSION['revenus'] = $_SESSION['vacances'] = $_SESSION['autresRecettes'] = $_SESSION['taxeFonciere'] = $_SESSION['reparations'] = $_SESSION['chargesCopro'] = "yo";
// };


/* CALCUL DE l'IMPOT NET */
function TMI($quotientFamilial){
  if ($quotientFamilial<=9964) {
    return 0;
  }
  elseif ($quotientFamilial>9964 && $quotientFamilial<=27519) {
    return 0.14;
  }
  elseif ($quotientFamilial>27519 && $quotientFamilial<=73779) {
    return 0.30;
  }
  elseif ($quotientFamilial>73779 && $quotientFamilial<=156244) {
    return 0.41;
  }
  else{
    return 0.45;
  }

}

function nbPartsFiscales($situationMaritale, $personnesCharge){
  switch ($situationMaritale):
    case "marie":
        return marieOuPacse($personnesCharge);
        break;
    case "veuf":
        return veuf($personnesCharge);
        break;
    case "seul":
        return seul($personnesCharge);
        break;
    case "concubin":
        return concubin($personnesCharge);
        break;
  endswitch;
}

function marieOuPacse($personnesCharge){
  if($personnesCharge == 0){
      return 2;
  }else if($personnesCharge == 1){
      return 2.5;
  }else if($personnesCharge>1){
      return $personnesCharge +1;
  }else{
      return 0;
  }
}

function veuf($personnesCharge){
  if($personnesCharge == 0){
      return 1;
  }else if($personnesCharge == 1){
      return 2.5;
  }else if($personnesCharge>1){
      return $personnesCharge +1;
  }else{
      return 0;
  }
}

function seul($personnesCharge){
  if($personnesCharge == 0){
      return 1;
  }else if($personnesCharge == 1){
      return 2;
  }else if($personnesCharge>1){
      return $personnesCharge +0.5;
  }else{
      return 0;
  }
}

function concubin($personnesCharge){
  if($personnesCharge == 0){
      return 1;
  }else if($personnesCharge == 1){
      return 1.5;
  }else if($personnesCharge>1){
      return $personnesCharge;
  }else{
      return 0;
  }
}

function quotientFamilial($revenusImposables,$partsFiscales){
  return $revenusImposables / $partsFiscales;
}

function impotsBruts($revenuGlobal,$personnesCharge,$situationMaritale){
  $partsFiscales = nbPartsFiscales($situationMaritale,$personnesCharge);
  $quotientFamilial = quotientFamilial($revenuGlobal,$partsFiscales);
  $TMI = TMI($quotientFamilial);

  if($quotientFamilial>156244){
    return 17555 * 0.14 + 0.30*46260 + 0.41*82465 + ($quotientFamilial - 156244)*0.45;
  }elseif ($quotientFamilial>9964 && $quotientFamilial<=27519) {
    return $partsFiscales * (($quotientFamilial - 9964)*0.14);
  }
  elseif ($quotientFamilial>27519 && $quotientFamilial<=73779) {
    return $partsFiscales * (17555 * 0.14 + ($quotientFamilial - 27519)*0.30);
  }
  elseif ($quotientFamilial>73779 && $quotientFamilial<=156244) {
    return $partsFiscales * (17555 * 0.14 + 0.30*46260 + ($quotientFamilial - 73779)*0.41);
  }

}

function impotsFonciers($revenusFonciersImposables,$revenuGlobal,$personnesCharge,$situationMaritale){
  $partsFiscales = nbPartsFiscales($situationMaritale,$personnesCharge);
  $quotientFamilial = quotientFamilial($revenuGlobal,$partsFiscales);
  $TMI = TMI($quotientFamilial);
  return $revenusFonciersImposables*$TMI + $GLOBALS['prelevementsSociaux'] * $revenusFonciersImposables;
}

/* IMPOTS SUR LES 30 ANS */
// uniquement pour micro foncier et micro bic
function tabImpotsFonciers($revenusFonciersImposables,$revenuGlobal,$personnesCharge,$situationMaritale){
  $partsFiscales = nbPartsFiscales($situationMaritale,$personnesCharge);
  $quotientFamilial = quotientFamilial($revenuGlobal,$partsFiscales);
  $TMI = TMI($quotientFamilial);
  $value = $revenusFonciersImposables*$TMI + $GLOBALS['prelevementsSociaux'] * $revenusFonciersImposables;
  $res = [];
  for($i =0;$i<30;$i++){
    $res[$i] = $value; 
  }
  return $res;
}

function tabInteretEmprunt($taux,$dureeEmprunt,$montantPret){ // Retourne un tableau dont tab[i] représente l'intérêt d'emprunt à payer l'année i
  // $_SESSION['interetEmprunt1ereAnnee'] = -CUMIPMT($_SESSION['taux']/12,$_SESSION['dureeEmprunt']*12,$_SESSION['montantPret'],1,12,0);
  $res = [];
  for($i = 0;$i<30;$i++){
    $res[$i] = -CUMIPMT($taux/12,$dureeEmprunt*12,$montantPret,($i*12)+1,($i+1)*12,0); 
    $res[$i] = ($res[$i] < 0) ?  0 : $res[$i]; 
  }
  return $res;
}

function tabImpotsFonciersR($travaux,$revenus,$chargesAnnuelles,$tabInteretEmprunt,$totalRecettesAnnuelles,$personnesCharge,$situationMaritale){
  $deficitFoncier = 0;
  for($i = 0;$i<30;$i++){
    $travaux = ($i == 0) ? $travaux : 0;
    $recettesMoinsCharges[$i] = $totalRecettesAnnuelles -  $tabInteretEmprunt[$i] - $chargesAnnuelles - $travaux - $deficitFoncier;
    if($recettesMoinsCharges[$i] >= 0){
      $revenusFonciersImposables[$i] = $recettesMoinsCharges[$i];
      $revenuGlobal[$i] = $revenusFonciersImposables[$i] + 0.9 * $revenus; 
      $impotsFonciers[$i] = impotsFonciers($revenusFonciersImposables[$i],$revenuGlobal[$i],$personnesCharge,$situationMaritale);
    }
    else{
    $deficitFoncier = (- $recettesMoinsCharges[$i] > 10700) ? 10700 :  - $recettesMoinsCharges[$i];
    $revenusFonciersImposables[$i] = 0;
    $revenuGlobal[$i] = 0.9 * $revenus;
    $impotsFonciers[$i] = 0;
    } 
  }
  return $impotsFonciers;
}

function tabAmortissement($mobilier,$prixAchat,$travaux,$fraisNotaire){
  for($i = 0; $i<10;$i++){
    // $tabAmortissement[$i] = $mobilier/10 + $travaux/10 + 0.9*$prixAchat/25 +$fraisNotaire/25;
    $tabAmortissement[$i] = $mobilier/10 + $travaux/10 + 0.9*$prixAchat/30;
  }
  for($i = 10;$i<25;$i++){
    // $tabAmortissement[$i] = 0.9*$prixAchat/25 +$fraisNotaire/25;
    $tabAmortissement[$i] = 0.9*$prixAchat/30;
  }
  for($i = 25;$i<30;$i++){
    $tabAmortissement[$i] = 0;
  }
  return $tabAmortissement;
}
function tabImpotsFonciersBIC($mobilier,$prixAchat,$travaux,$fraisNotaire,$revenus,$chargesAnnuelles,$tabInteretEmprunt,$totalRecettesAnnuelles,$personnesCharge,$situationMaritale){
  $chargesAmortissement = tabAmortissement($mobilier,$prixAchat,$travaux,$fraisNotaire);
  $deficitFoncier = 0;
  for($i = 0;$i<30;$i++){
    $recettesMoinsCharges[$i] = recettesMoinsCharges($totalRecettesAnnuelles,$tabInteretEmprunt[$i],$chargesAnnuelles,$chargesAmortissement[$i],$deficitFoncier);
    if($recettesMoinsCharges[$i] >= 0){
      $revenusFonciersImposables[$i] = $recettesMoinsCharges[$i];
      $revenuGlobal[$i] = $revenusFonciersImposables[$i] + 0.9 * $revenus; 
      $impotsFonciers[$i] = impotsFonciers($revenusFonciersImposables[$i],$revenuGlobal[$i],$personnesCharge,$situationMaritale);
    }
    else{
    $deficitFoncier = (- $recettesMoinsCharges[$i] > 10700) ? 10700 : (- $recettesMoinsCharges[$i] - $chargesAmortissement[$i]);
    $revenusFonciersImposables[$i] = 0;
    $revenuGlobal[$i] = 0.9 * $revenus;
    $impotsFonciers[$i] = 0;
    }
  }
  return $impotsFonciers;
}

function recettesMoinsCharges($totalRecettesAnnuelles,$tabInteretEmprunt,$chargesAnnuelles,$chargesAmortissement,$deficitFoncier){
  if($totalRecettesAnnuelles - $tabInteretEmprunt - $chargesAnnuelles<0){
    return $totalRecettesAnnuelles - $tabInteretEmprunt - $chargesAnnuelles - $deficitFoncier;
  }else{
    if($totalRecettesAnnuelles - $tabInteretEmprunt - $chargesAnnuelles - $chargesAmortissement<0){
      return -$deficitFoncier;
    }else{
      return $totalRecettesAnnuelles - $tabInteretEmprunt - $chargesAnnuelles - $deficitFoncier - $chargesAmortissement;
    }
  }
}

/* CASH FLOW SUR LES 30 ANS */
function cashFlow($totalRecettesAnnuelles,$mensualitesTotales,$totalChargesAnnuelles,$tabimpotsFonciers){
  for($i = 0;$i<30;$i++){
    $res[$i] = $totalRecettesAnnuelles/12 - $mensualitesTotales - $totalChargesAnnuelles/12 - $tabimpotsFonciers[$i]/12;
  }
  return $res;
}

function tabRendementNetNet($totalRecettesAnnuelles,$totalChargesAnnuelles,$totalCoutAchat,$tabimpotsFonciers){
  for($i = 0; $i<sizeof($tabimpotsFonciers);$i++){
    $res[$i] = ($totalRecettesAnnuelles - $totalChargesAnnuelles - $tabimpotsFonciers[$i])/$totalCoutAchat;
  }
  return $res;
}

function colorNumber($number){
  if($number>=0){
    return "green";
  }else{
    return "red";
  }
}

function genererChaineAleatoire($longueur){
 $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 $longueurMax = strlen($caracteres);
 $chaineAleatoire = '';
 for ($i = 0; $i < $longueur; $i++)
 {
 $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
 }
 return $chaineAleatoire;
}

function gestionErreurSaisie($post){
  $final_message = array();
  foreach($post as $key => $value){
    if(empty($value)){
      if($value != $_POST['simulation']){
        $message = "Hey you forgot to fill this field: $key";
        array_push($final_message, $message);
      }
    }
  }
  return $final_message;
  // return "test";
}
?>
