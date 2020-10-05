<div class="container">
    <h1 class="pageTitle">Page d'administration</h1>
    <div class="commentList">
        <h4 class="adminSubTitle">Les commentaires non vérifiés :</h4>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Post</th>
                    <th scope="col">Description</th>
                    <th scope="col">Username</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($commentsList as $key => $comment){
                        $user = $neededUsers[$comment->idUser()];
                        if (!$user) continue;

                        $post = $neededPosts[$comment->idPost()];
                        if(!$post) continue;

                        ?>
                        <tr id="com_<?= htmlspecialchars($comment->id()); ?>">
                            <td><?= $key; ?></td>
                            <td><?= htmlspecialchars($comment->id()); ?></td>
                            <td><?= htmlspecialchars($post->title()); ?></td>
                            <td><?= htmlspecialchars($comment->description()); ?></td>
                            <td><?= htmlspecialchars($user->username()); ?></td>
                            <td><?= $comment->creationDate()->format('Y-m-d H:i:s'); ?></td>
                            <td><button value='<?= htmlspecialchars($comment->id()) ?>'class='btn btn-sm btn-outline-secondary btnAdmin deleteComment'>Supprimer</button><button value='<?= htmlspecialchars($comment->id()) ?>' class='btn btn-sm btn-outline-secondary btnAdmin valideComment'>Valider</button></td>
                        </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
    <div class="postList">
        <h4 class="adminSubTitle">Les posts non vérifiés :</h4>
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
                        $user = $neededUsers[$post->idUser()];
                        if (!$user) continue;

                        $post_id = intval($post->id());
                        $post_subject = htmlspecialchars($post->subject());
                        $post_username = htmlspecialchars($user->username());
                        $post_date = $post->creationDate()->format('Y-m-d H:i:s');

                        echo("<tr id='post_$post_id'>");
                            echo("<td>$key</td>");
                            echo("<td>$post_id</td>");
                            echo("<td>$post_subject</td>");
                            echo("<td>$post_username</td>");
                            echo("<td>$post_date</td>");
                            echo("<td><button value='$post_id'class='btn btn-sm btn-outline-secondary btnAdmin deletePost'>Supprimer</button><button value='$post_id' class='btn btn-sm btn-outline-secondary btnAdmin validePost'>Valider</button></td>");
                        echo("</tr>");
                    }
                ?>
            </tbody>
        </table>

    </div>
    <div class="userList">
        <h4 class="adminSubTitle">La liste des utilisateurs :</h4>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Pseudo</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($usersList as $key => $user){
                        $user_id = intval($user->id());
                        $user_lastname = htmlspecialchars($user->lastname());
                        $user_firstname = htmlspecialchars($user->firstname());
                        $user_username = htmlspecialchars($user->username());
                        $user_creationDate = $user->creationDate()->format('Y-m-d H:i:s');

                        echo("<tr id='user_$user_id'>");
                            echo("<td>$key</td>");
                            echo("<td>$user_id</td>");
                            echo("<td>$user_lastname</td>");
                            echo("<td>$user_firstname</td>");
                            echo("<td>$user_username</td>");
                            echo("<td>$user_creationDate</td>");
                            if(!$user->isAdmin()){echo("<td><button value='$user_id'class='btn btn-sm btn-outline-secondary btnAdmin deleteUser'>Supprimer</button></td>");}else{echo "<td>!! Admin !!</td>";}
                        echo("</tr>");
                    }
                ?>
            </tbody>
        </table>

    </div>
</div>