<div class="container">
    <div class="commentList">
        <?php
            foreach($commentsList as $comment){
                if ($comment->isVerified()) continue;


            }
        ?>
    </div>
    <div class="postList">
        <?php
            foreach($postsList as $post){
                if ($post->isVerified()) continue;

                
            }

        ?>
    </div>
</div>