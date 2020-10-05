<div class="container">
    <div class="postBody">
            <?php
                // Show the post
                echo('<h1 class="pageTitle" style="margin-bottom: 30px;" >' . htmlspecialchars($post->title()) . '</h1>');
                echo('<em>Le : ' . $post->creationDate()->format('d/m/Y H:i:s') . '</em><strong> par ' . $needed_users[$post->idUser()]->username() . '</strong>');
                if(isset($_SESSION["user"])){ if($_SESSION["user"]->isAdmin()){echo("<button href='' id='deleteButton' value=".htmlspecialchars($post->id())." class='deletePost buttonPostDelete linkPosts'>  Supprimer</button>");} if(intval($post->idUser()) == intval($_SESSION["user"]->id()) || $_SESSION["user"]->isAdmin()){ echo("<a href='/posts/modify/".htmlspecialchars($post->id())."' class='modifyPost buttonPostDelete linkPosts'>Modifier</a>");}}
                echo('<p style="margin-top: 15px" class="postDescription">' . nl2br(htmlspecialchars($post->description())) . '</p>');
                // Show the edit date if exists
                if($post->modifyDate() != null){echo ('Dernière modification : '. $post->modifyDate()->format('d/m/Y H:i:s'));}
            ?>
        </div>
        <div class="card-shape-right colorRandom flex-auto d-none d-md-block" style="width: 100%; height: 6px; margin-top: 25px; background-color: #7FCBFF; border-radius: 5px;"></div>
        <div class="commentBody">
            <?php
                // Show the comment form
                foreach($commentsList as $item){ if($item->isVerified()){?>
                    <div class="commentItem">
                        <span class="commentInfo"><?= "Le ".$item->creationDate()->format('d/m/Y H:i:s')." par ".$needed_users[$item->idUser()]->username(); ?></span>
                        <p class="commmentDescription"><?= nl2br(htmlspecialchars($item->description())); ?></p>
                    </div>
            <?php }} ?>
        <form action="" id='newComment' value="<?= htmlspecialchars($post->id()); ?>" method="post">
            <div class="container">
                <label for="comment"><h5>Ajouter un commentaire</h5></label><br/>
                <textarea id="comment" name="comment" class="post_blog_area" cols="40" rows="5" required></textarea><br/><br/>
                <p id="ajaxReponse" style="font-weight:bold;"></p>
                <button type="submit" class=" btn btn-sm btn-outline-secondary">Créer</button>
            </div>
        </form>
    </div>

    
</div>