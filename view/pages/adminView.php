<div class="container">
    <div class="commentList">

    <p>Les commentaires non vérifiés :</p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Sujet</th>
                <th scope="col">Username</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($commentsList as $key => $comment){
                    echo("w");
                    $user = $usersList[$comment->idUser()];
                    if (!$user) continue;

                    $comment_id = $comment->id();
                    $comment_subject = $comment->subject();
                    $comment_username = $user->username();
                    $comment_date = $comment->creationDate()->format('Y-m-d H:i:s');

                    echo("<tr>");
                        echo("<td>$key</td>");
                        echo("<td>$comment_id</td>");
                        echo("<td>$comment_subject</td>");
                        echo("<td>$comment_username</td>");
                        echo("<td>$comment_date</td>");
                        echo("<td></td>");
                    echo("</tr>");
                }
            ?>
        </tbody>
    </table>

    </div>
    <div class="postList">
        <p>Les posts non vérifiés :</p>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Sujet</th>
                    <th scope="col">Username</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($postsList as $key => $post){
                        $user = $usersList[$post->idUser()];
                        if (!$user) continue;

                        $post_id = $post->id();
                        $post_subject = $post->subject();
                        $post_username = $user->username();
                        $post_date = $post->creationDate()->format('Y-m-d H:i:s');

                        echo("<tr>");
                            echo("<td>$key</td>");
                            echo("<td>$post_id</td>");
                            echo("<td>$post_subject</td>");
                            echo("<td>$post_username</td>");
                            echo("<td>$post_date</td>");
                            echo("<td></td>");
                        echo("</tr>");
                    }
                ?>
            </tbody>
        </table>

    </div>
</div>