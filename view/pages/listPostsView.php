<div class="container">
    <h1 class="pageTitle">Liste des posts :</h1>      
    <div class="row mb-2">
    <?php foreach($postsList as $item){ if($item->isVerified()){?>
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