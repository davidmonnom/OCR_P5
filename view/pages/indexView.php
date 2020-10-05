<div class="container">
    <div class="jumbotron p-3 p-md-5 text-white rounded colorRandom">
        <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic">Bienvenue sur mon blog MVC !</h1>
            <p class="lead my-3">Modèle-vue-contrôleur ou MVC est un motif d'architecture logicielle destiné aux interfaces graphiques lancé en 1978.</p>
            <p class="lead mb-0"><a target="_blank" href="https://fr.wikipedia.org/wiki/Mod%C3%A8le-vue-contr%C3%B4leur#:~:text=Mod%C3%A8le%2Dvue%2Dcontr%C3%B4leur%20ou%20MVC,les%20vues%20et%20les%20contr%C3%B4leurs." class="text-white font-weight-bold">En savoir plus...</a></p>
        </div>
    </div>
</div>
<div class="container">
    <h2>Derniers posts :</h2>
    <div class="row mb-2">
    <?php $i = 0; foreach($postsList as $item){ if($item->isVerified() && $i < 2){ $i++; ?>
            <div class="col-lg-6">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 colorRandomText">Posts</strong>
                        <h3 class="mb-0">
                            <a class="text-dark" href="/posts/<?= $item->id(); ?>">
                            <?php
                            $postContent = htmlspecialchars($item->title());
                            if (strlen($postContent) >= 50){
                            $postContent = substr($postContent, 0, 50)."...";
                            }
                            echo htmlspecialchars($postContent);
                            ?>
                            </a>
                        </h3>
                        <div class="mb-1 text-muted"><?= htmlspecialchars($item->creationDate()->format('Y-m-d')); ?></div>
                            <p class="card-text mb-auto" style="text-align: justify;">
                            <?php
                            $postContent = htmlspecialchars($item->subject());
                            if (strlen($postContent) >= 250){
                            $postContent = substr($postContent, 0, 250)."...";
                            }
                            echo htmlspecialchars($postContent);
                            ?>
                            </p>
                            <a class="linkPosts" href="/posts/<?php echo $item->id() ?>">Voir le posts</a>
                        <!-- </div> -->
                        <div class="card-shape-right colorRandom flex-auto d-none d-md-block" style="width: 100%; height: 6px; margin-top: 15px; background-color: #7FCBFF; border-radius: 5px;"></div>
                    </div>
                </div>
            </div>
        <?php }} ?>
        </div>
    </div>
    <main role="main" class="container">
      <div class="row">
        <?php foreach($postsList as $item){ if($item->id() == 1){; ?>
        <div class="col-md-8 blog-main">
          <h3 class="pb-3 mb-4 font-italic border-bottom">
            Un post important
          </h3>

          <div class="blog-post">
            <h2 class="blog-post-title"><?= htmlspecialchars($item->title()); ?></h2>
            <p class="blog-post-meta"><?= $item->creationDate()->format('d/m/Y H:i:s'); ?></p>

            <p><?= nl2br(htmlspecialchars($item->description())); ?></p>
            <?php }} ?>
          </div><!-- /.blog-post -->
        </div><!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar">
            <div class="p-3 mb-3 bg-light rounded">
                <h4 class="font-italic">Contactez-nous</h4>
                <p class="mb-0">Vous avez une proposition pour améliorer notre forum ? Alors n'hésitez pas à nous contacter. Nous sommes ouvert à toutes propositions.</p>
            </div>

            <div class="p-3">
            <h4 class="font-italic">Formulaire :</h4>
                <form action="" id="contactForm" method="post">
                    <label for="name">Nom & prénom</label><br/>
                    <input type="text" id="name" name="firstname"  class="post_blog_area" required><br/>
                    
                    <label for="email">Email</label><br/>
                    <input type="email" id="email" name="lastname"  class="post_blog_area" required><br/>
                    
                    <label for="message">Message</label><br/>
                    <textarea id="message" name="message" class="post_blog_area" required></textarea><br/>
                    
                    <input type="submit" class="btn_login" value="Submit" style="margin-top: 15px;"><p id='reponse_message'></p>
                </form>
            </div>

            <div class="p-3">
                <h4 class="font-italic">Réseaux sociaux</h4>
                <ol class="list-unstyled">
                    <li><a href="https://github.com/davidmonnom/OCR_P5">GitHub</a></li>
                    <li><a href="https://twitter.com/monmdavid">Twitter</a></li>
                    <li><a href="https://www.facebook.com/monnom.david/">Facebook</a></li>
                </ol>
            </div>
        </aside><!-- /.blog-sidebar -->

      </div><!-- /.row -->