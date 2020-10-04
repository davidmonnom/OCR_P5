<div class="header" style="height:150px;"></div>
<div class="container">
    <h1 class="pageTitle">Liste des posts :</h1>      
    <div class="row">
    <?php foreach($postsList as $item){ if($item->isVerified()){?>
            <div class="col-lg-4 postItem">
                <h4 class='title'>
                    <?php
                        $postContent = htmlspecialchars($item->title());
                        if (strlen($postContent) >= 50){
                            $postContent = substr($postContent, 0, 50)."...";
                        }
                        echo htmlspecialchars($postContent);
                    ?>
                </h4>
                <em class="modifyDate"><?php if($item->modifyDate() != null){ echo htmlspecialchars($item->modifyDate()->format('Y-m-d H:i:s'));}else{echo htmlspecialchars($item->creationDate());} ?></em>
                <p class="subject">
                    <?php
                        $postContent = htmlspecialchars($item->subject());
                        if (strlen($postContent) >= 250){
                            $postContent = substr($postContent, 0, 250)."...";
                        }
                        echo htmlspecialchars($postContent);
                    ?>
                </p>
                <a class="linkPosts" href="/posts/<?php echo $item->id() ?>">Voir le posts</a>
            </div>
    <?php }} ?>
    <div>
<div>