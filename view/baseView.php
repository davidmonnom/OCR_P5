<html>
    <head>
        <link href="https://fludy.net/assets/css/style.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="https://fludy.net/assets/js/script.js" type="text/javascript"></script>
    </head>
    <body>
		<section class="navbarSection">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<a class="navbar-brand" href="/">MVC</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="/">Accueil</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/posts">Liste des posts</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/posts/create">Créer un post</a>
						</li>
					</ul>
					<ul class="navbar-nav">
						<?php if(is_null($user)){ ?>
						<li class="nav-item">
							<a class="nav-link" href="/user/login">Se connecter</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/user/register">S'enregistrer</a>
						</li>
						<?php }else{ ?>
						<li class="nav-item">
							<a class="nav-link" href="">Connecté via <?= $user["userName"] ?></a>
						</li>
						<?php } ?>
					</ul>
				</div>
			</nav>
        </section>
        <section class="contentSection">
            <?php
                echo($pageContent);
            ?>
        </section>
        <section class="footerSection">

        </section>
    </body>
</html>