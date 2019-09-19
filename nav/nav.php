<header class="">
    <div class="text-center mb-4 mt-3">
        <a href="accueil"><img class="resize" src="../assets/img/logoe_FIS.png" alt="Image finesse"></a>
    </div>
    <nav class="d-flex justify-content-center">
        <div class="navbar navbar-expand-sm navbar-light">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="bg-white hidden">&#9776</span>
  </button>
            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav">
                    <li class="nav-item active mr-5 ml-5">
                        <a class="nav-link" href="galerie">Galerie</a>
                    </li>
                    <li class="nav-item active mr-5 ml-5">
                        <a class="nav-link" href="boutique">Shop</a>
                    </li>
                    <li class="nav-item active ml-5 mr-5">
                        <a class="nav-link" href="contact">Contact</a>
                    </li>
                    <li class="nav-item active ml-5 mr-5">
                        <a class="nav-link" href="FAQ">FAQ</a>
                    </li>
                    <?php if (!isset($_SESSION['id'])): ?>
                        <li class="nav-item active ml-5 mr-5">
                            <a class="nav-link" href="connexion">Connexion</a>
                        </li>
                    <?php endif; ?>
                        <?php if (isset($_SESSION['id'])): ?>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle"
                                type="button" id="dropdownMenu1" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            Espace membre
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <?php if (isset($_SESSION['superuser']) && $_SESSION['superuser'] == 1): ?>
                                <li class="nav-item active ml-5 mr-5">
                                    <a class="nav-link" href="admin/">Administration</a>
                                </li>
                            <?php endif; ?>
                                <?php if (isset($_SESSION['id'])): ?>
                                <li class="nav-item active ml-5 mr-5">
                                    <a class="nav-link" href="profil">Modifier son profil</a>
                                </li>
                            <?php endif; ?>
                            <?php if (isset($_SESSION['id'])): ?>
                                <li class="nav-item active ml-5 mr-5">
                                    <a class="nav-link" href="deconnection">Déconnexion</a>
                                </li>
                            <?php endif; ?>
                                <?php endif; ?>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
</header>
