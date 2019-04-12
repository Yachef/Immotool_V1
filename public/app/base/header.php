<section id= "navigation-bar">
    <div id = "logo">
        <a href = "#"><p>immotool</p></a>
    </div>
    <div id = "menu"><a>Menu</a></div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" href="../features/home.php"><i class="fas fa-home menu-icon fa-fw"></i><span class = "menu-txt">Tableau de Bord</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../features/simulateur.php"><i class="fas fa-cogs menu-icon fa-fw"></i><span class = "menu-txt">Simulateur</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../features/mon-agent.php"><i class="fas fa-user-tie menu-icon fa-fw"></i><span class = "menu-txt">Mon Agent</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../features/mes-visites.php"><i class="fas fa-walking menu-icon fa-fw"></i><span class = "menu-txt">Mes Visites</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../features/contact.php"><i class="fas fa-envelope menu-icon fa-fw"></i><span class = "menu-txt">Contact</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../features/parametres.php"><i class="fas fa-cog menu-icon fa-fw"></i><span class = "menu-txt">Param&egrave;tres</span></a>
        </li>
    </ul>  
</section>

<section id = "white-band" class = "container-fluid">
        <div id = "main-menu-icon">
                <a><i class="fa fa-bars" aria-hidden="true"></i></a>
        </div>
        <div id = "account">
        <?php if(isset($_SESSION['connected'])) : ?>
            <a href="#"><img src="../../../docs/imgs/user-account.png" alt="" id = "img-account"></a>
            <div id = account-layer>
                <a href = "../features/parametres.php"><p><i class="fas fa-cog parameters"></i> Param&egrave;tres</p></a>
                <a href='../../index.php?logout=1'><p><i class="fas fa-power-off deconnexion"></i> Deconnexion</p></a>
            </div>
        <?php else: ?>
            <div id="sinscrire">
            <a href="../../site/register.php?login=1">S'inscrire</a>
            <br>
            <a href="../../site/register.php" style = "color:red;">Se connecter</a>
            </div>
        <?php endif ?>
        </div>
</section>