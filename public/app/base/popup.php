<section id = "popup">
    <div class = "inside-popup">
    <h1>Connectez-vous pour accéder à cet onglet</h1>
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
            Pas encore inscrit ? <a href="../../site/register.php?login=1">S'inscrire</a>
        </p>
    </form>
    </div>
</section>
