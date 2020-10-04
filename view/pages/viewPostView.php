<div class="header" style="height:150px;"></div>
<div class="container">

    <?php
        // Show the post
        echo('<h1 class="pageTitle">' . htmlspecialchars($post->title()) . '</h1>');
        echo('<em>Le : ' . $post->creationDate()->format('d/m/Y H:i:s') . '</em><strong> par ' . htmlspecialchars($user->username()) . '</strong>');
        if($_SESSION["user"]->isAdmin()){echo("<button href='' id='deleteButton' value=".htmlspecialchars($post->id())." class='deletePost buttonPostDelete linkPosts'>  Supprimer</button>");} if(intval($post->idUser()) == intval($_SESSION["user"]->id()) || $_SESSION["user"]->isAdmin()){ echo("<a href='/posts/modify/".htmlspecialchars($post->id())."' class='modifyPost buttonPostDelete linkPosts'>Modifier</a>");}
        echo('<p class="postDescription">' . htmlspecialchars($post->description()) . '</p>');
        // Show the edit date if exists
        if($post->modifyDate() != null){echo ('Dernière modification : '. $post->modifyDate()->format('d/m/Y H:i:s'));}

        // Show the comment form
        echo $post->idUser();
        echo $_SESSION["user"]->id();
    ?>

    
</div>