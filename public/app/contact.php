<?php require_once('../../server/server.php');?>
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

                <div class="row">

                    <div class="header-content">
                        <div class="title">
                            <h1 id="title">Contact</h1>
                            <div class="divider">
                                <hr>
                            </div>
                        </div>


                        <section class="col-md-3 content-wrapper">
                        </section>

                        <div class="col-md-6 content-wrapper">
                            <div class="suggestion-form content-container">
                                <div class="content-title">
                                    <h1>Contactez-nous !</h1>
                                </div>
                                <h4>Des suggestions ? Des bugs ? Des idées ? Des problèmes ? D'autres questions ? Nous
                                    sommes à votre écoute !</h4>
                                <form action="#" method="post">

                                    <label for="object">Sujet</label>
                                    <input required type="text" name="object">

                                    <label for="message">Votre message</label>
                                    <textarea required id="message" name="message" placeholder="Votre message.."
                                        style="width : 90%; height:100px"></textarea>

                                    <input type="submit" value="Envoyer" class="btn btn-primary" name="suggestion">
                                    <?php
                                        if (isset($_REQUEST['suggestion']))  {
    
                                            //Email information
                                            $admin_email = "yachef.h@gmail.com";
                                            $subject = $_POST['object'];
                                            $message = $_POST['message'];
                                            //send email
                                                if(mail($admin_email, "Contact de Immotool : ".$subject,"Pseudo : ".$_SESSION['username']. " Message : ". $message)){

                                                //Email response
                                                echo "Votre message a été envoyé, merci !";
                                                }
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