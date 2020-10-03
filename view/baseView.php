<html>
    <head>
        <link href="https://fludy.net/assets/css/style.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="https://fludy.net/assets/js/script.js" type="text/javascript"></script>
    </head>
    <body>
    <section class="navbar">
        <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
            <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/posts">Liste des posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/posts/create">Publier un post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="mx-auto order-0">
                <a class="navbar-brand mx-auto" href="index.php">Mon Blog</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="index.php?action=logout">Se déconnecter</a>
                                    <a class="dropdown-item" href="index.php?action=moderation">Moderation</a>
                                    <a class="dropdown-item" href="index.php?action=administration">Administration</a>
                                    <a class="dropdown-item" href="index.php?action=moderation">Moderation</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/user/login">Se connecter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/user/register">S'enregistrer</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </section>
        <section class="header">
            
        </section>
        <section class="content">
            <?php
                echo($pageContent);
            ?>
        </section>
        <section class="footer">

        </section>
    </body>
</html>