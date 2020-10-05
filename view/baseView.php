<html>
    <head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://fludy.net/assets/css/style.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="https://fludy.net/assets/js/script.js" type="text/javascript"></script>
    </head>
    <body>
		<div class="container">
			<header class="blog-header py-3">
				<div class="row flex-nowrap justify-content-between align-items-center">
					<div class="col-4 pt-1">
						<a class="text-muted" target="_blank" href="/assets/pdf/myCV.pdf">Curriculum Vitae</a>
					</div>
					<div class="col-4 text-center">
						<a class="blog-header-logo colorRandomText" href="">MVC</a>
					</div>
					<div class="col-4 d-flex justify-content-end align-items-center">
						<a class="text-muted" href="/posts">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3"><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
						</a>
						<?php if(is_null($user)){ ?>
							<a class="btn btn-sm btn-outline-secondary" href="/user/login">Se connecter</a>
						<?php }else{ ?>
							<a class="btn btn-sm btn-outline-secondary logoutBtn userLogout" href="">Se déconnecter (<?=$user->userName();?>)</a>
						<?php }?>
					</div>
				</div>
			</header>
			<hr class="ligne">
			<div class="nav-scroller py-1 mb-2">
				<nav class="nav d-flex justify-content-between">
					<a class="p-2 text-muted" href="/">Accueil</a>
					<a class="p-2 text-muted" href="/posts">Posts</a>
					<a class="p-2 text-muted" href="/posts/create">Créer</a>
					<a class="p-2 text-muted" href="/posts/1">Règles</a>
					<a class="p-2 text-muted" href="/user/admin">Administration</a>
					<a class="p-2 text-muted" target="_blank" href="https://fr.wikipedia.org/wiki/Mod%C3%A8le-vue-contr%C3%B4leur#:~:text=Mod%C3%A8le%2Dvue%2Dcontr%C3%B4leur%20ou%20MVC,les%20vues%20et%20les%20contr%C3%B4leurs.">MVC</a>
					<a class="p-2 text-muted" target="_blank" href="https://github.com/davidmonnom/OCR_P5">Github</a>
					<a class="p-2 text-muted" target="_blank" href="https://www.facebook.com/monnom.david/">Facebook</a>
					<a class="p-2 text-muted" target="_blank" href="https://twitter.com/monmdavid">Twitter</a>
					<a class="p-2 text-muted" target="_blank" href="https://app.codacy.com/gh/davidmonnom/OCR_P5/dashboard">Codacy</a>
					<!-- <a class="p-2 text-muted" href="https://getbootstrap.com/docs/4.0/examples/blog/#">Style</a> -->
					<!-- <a class="p-2 text-muted" href="https://getbootstrap.com/docs/4.0/examples/blog/#">Travel</a> -->
				</nav>
			</div>
		</div>
        <section class="contentSection">
            <?php
                echo($pageContent);
            ?>
        </section>
        <section class="footerSection">
		<footer class="footer">
			<div class='footerTop'>
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<h5>Les raccourcis</h5>
							<a href="/" class="shortcutBottom">Accueil</a><br/>
							<a href="/posts" class="shortcutBottom">Liste des posts</a><br/>
							<a href="/posts/create" class="shortcutBottom">Créer un post</a><br/>
						</div>
						<div class="col-lg-6">
							<h5>Réseaux sociaux</h5>
							<a href="https://twitter.com/monmdavid" class="shortcutBottom" target="_blank">Twitter</a><br/>
							<a href="https://github.com/davidmonnom/OCR_P5" class="shortcutBottom"  target="_blank">Github</a><br/>
							<a href="https://www.facebook.com/monnom.david/" class="shortcutBottom"  target="_blank">Facebook</a><br/>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-copyright text-center py-3 footerBottom">
				<?php if(!is_null($user)){ if($user->isAdmin()){ ?>
					<a href="/user/admin" class="shortcutBottom">Administration</a>
				<?php }} ?>
					<span> &bull; </span><a href="/assets/htm/sitemap.htm" class="shortcutBottom">Site Map</a>
			</div>
		</footer>
        </section>
    </body>
</html>