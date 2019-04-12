<?php 
require_once('../../../server/server.php');
if(!isset($_SESSION['connected'])){
        $_SESSION['popup'] = true;
}
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
                            <h1 id="title">Mes Visites</h1>
                            <div class="divider">
                                <hr>
                            </div>
                        </div>


                        <section class="col-md-3 content-wrapper">
                        </section>

                        <div class="col-md-6 content-wrapper">
                        <div class="suggestion-form content-container">
                            <div class = "content-title"><h1>A venir !</h1></div>                            
                            <h4>Vous trouverez prochainement dans cette section :</h4>
                            <h5> - Une ToDo List pour ne rien oublier lorsque vous réaliserez vos visites !</h5>
                            <h5> - Un outil de comparaison de vos visites pour vous aider dans vos choix !</h5>
                        </div>
                    </div>



                    </div>
            </section>
        </div>
    </section>

</body>

</html>