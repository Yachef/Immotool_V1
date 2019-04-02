<?php require_once('../../server/server.php');?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Immotool - Votre conseiller immobilier 100% gratuit !</title>

    <!-- BOOTSTRAP -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="shortcut icon" href="../../docs/imgs/logo-IMMOTOOL.png" type="image/x-icon" /> <!-- Favicon /-->


    <!-- FONTS  -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="../../css/style-app.css">

    <!-- JS -->
    <script src="../../js/utils.js"></script>
    <script src="../../js/script-app.js"></script>
</head>

<body>

    <section id="content" class="container-fluid">
        <div class="row">
            <?php require("header.php"); ?>


            <section id="inside-content">

                <div class="row">
                    <div class="header-content">
                        <div class="title">
                            <h1 id="title">Paramètres</h1>
                        </div>
                        <div class="divider">
                            <hr>
                        </div>

                    </div>

                    <div class="col-md-6 content-wrapper">
                        <div class="suggestion-form content-container">
                            <div class="content-title">
                                <h1>Changez votre adresse mail</h1>
                            </div>
                            <form action="#" method="post">

                                <label for="mail_1">Nouvelle adresse mail</label>
                                <input required type="email" name="mail_1">

                                <label for="mail_2">Répétez la nouvelle adresse mail</label>
                                <input required type="email" name="mail_2" style="margin-bottom : 7px;">


                                <input type="submit" value="Confirmer" class="btn btn-primary" name="changement_mail">
                                <?php
                                        if (isset($_REQUEST['changement_mail']))  {
                                            connectToDB();
                                            $mail_1 = mysqli_real_escape_string($GLOBALS['db'], $_REQUEST['mail_1']);
                                            $mail_2 = mysqli_real_escape_string($GLOBALS['db'], $_REQUEST['mail_2']);
                                            
                                            if ($mail_1 != $mail_2) {
                                                echo "Les deux adresses mail entrées ne correspondent pas";
                                            }else{
                                                $user_check_query = "SELECT * FROM users WHERE email='$mail_1' LIMIT 1";
                                                $result = mysqli_query($GLOBALS['db'], $user_check_query);
                                                $user = mysqli_fetch_assoc($result);
                                                if($user){
                                                    echo "L'adresse mail existe déjà";
                                                }else{
                                                    $username = $_SESSION['username'];
                                                    $query = "UPDATE users SET email='$mail_1' WHERE username='$username'";
                                                    mysqli_query($GLOBALS['db'], $query);
                                                    echo "Adresse mail modifiée";
                                                }
                                            }
                                            mysqli_close($GLOBALS["db"]);
                                        }
                                    ?>

                            </form>
                        </div>
                    </div>

                    <div class="col-md-6 content-wrapper">
                        <div class="suggestion-form content-container">
                            <div class="content-title">
                                <h1>Changez votre mot de passe</h1>
                            </div>
                            <form action="#" method="post">
                                <?php require('../../server/errors.php');?>
                                <label for="pass_1">Nouveau mot de passe</label>
                                <input required type="password" name="pass_1">

                                <label for="mail_2">Répétez le nouveau mot de passe</label>
                                <input required type="password" name="pass_2" style="margin-bottom : 7px;">


                                <input type="submit" value="Confirmer" class="btn btn-primary" name="changement_pass">
                                <?php
                                        if (isset($_REQUEST['changement_pass']))  {
                                            connectToDB();
                                            $password_1 = mysqli_real_escape_string($GLOBALS['db'], $_REQUEST['pass_1']);
                                            $password_2 = mysqli_real_escape_string($GLOBALS['db'], $_REQUEST['pass_2']);
                                            
                                            if ($password_1 != $password_2) {
                                                echo "Les deux mots de passe entrés ne correspondent pas";
                                            }else{
                                                $username = $_SESSION['username'];
                                                $password = md5($password_1);//encrypt the password before saving in the database
                                                $query = "UPDATE users SET password='$password_1' WHERE username='$username'";
                                                mysqli_query($GLOBALS['db'], $query);
                                                echo "Mot de passe modifié";
                                            }
                                            mysqli_close($GLOBALS["db"]);
                                        }
                                    ?>

                            </form>
                        </div>
                    </div>


                </div>
            </section>
        </div>
    </section>

</body>

</html>