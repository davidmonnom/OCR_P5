<div class="container">

    <?php
        // Show the post
        echo('<h4>' . $post->title() . '</h4>');
        echo('<p>' . htmlspecialchars($post->description()) . '</p>');

        // Show the edit date if exists
        if($post->modifyDate()){ 
            echo('<em>Dernière modification: ' . $post->modifyDate()->format('d/m/Y H:i:s') . "</em>");
        }

        // Show the comment form
    ?>

    
</div>