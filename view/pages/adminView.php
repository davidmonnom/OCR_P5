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
                    ?>
                    <tr id='post_<?= intval($post->id()); ?>'>
                        <td><?= intval($key); ?></td>
                        <td><?= intval($post->id()); ?></td>
                        <td><?= htmlspecialchars($post->subject()); ?></td>
                        <td><?= htmlspecialchars($user->username()); ?></td>
                        <td><?= $post->creationDate()->format('Y-m-d H:i:s'); ?></td>
                        <td><button value='<?= intval($post->id()); ?>'class='btn btn-sm btn-outline-secondary btnAdmin deletePost'>Supprimer</button><button value='<?= intval($post->id()); ?>' class='btn btn-sm btn-outline-secondary btnAdmin validePost'>Valider</button></td>
                    </tr> 
                  <?php  } ?>
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
                    ?>
                        <tr id='user_<?= intval($user->id()); ?>'>
                            <td><?= intval($key) ?></td>
                            <td><?= intval($user->id()); ?></td>
                            <td><?= htmlspecialchars($user->lastname()); ?></td>
                            <td><?= htmlspecialchars($user->firstname()); ?></td>
                            <td><?= htmlspecialchars($user->username()); ?></td>
                            <td><?= $user->creationDate()->format('Y-m-d H:i:s'); ?></td>
                            <?php  if(!$user->isAdmin()){echo "<td><button value=".intval($user->id())." class='btn btn-sm btn-outline-secondary btnAdmin deleteUser'>Supprimer</button></td>"; }else{echo "<td>!! Admin !!</td>";} ?>
                        </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>