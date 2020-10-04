<div class="header" style="height:150px;"></div>
<div class="container">
    <h1 class="pageTitle" id="idPost" value="<?= htmlspecialchars($post->id()); ?>">Modifier un posts</h1>
    <p>Modifier votre post</p>
    <form action="" id='modifyPostForm' method="post">
        <label for="title"><b>Titre</b></label><br/>
        <input id="title" type="text" placeholder="Sujet" name="title" value='<?= htmlspecialchars($post->title()); ?>' required><br/>
        <label for="subject"><b>Sujet</b></label><br/>
        <textarea id="subject" name="subject" cols="35" rows="4"><?= htmlspecialchars($post->subject()); ?></textarea><br/>
        <label for="description"><b>Description</b></label><br/>
        <textarea id="description" name="description" cols="40" rows="5"><?= htmlspecialchars($post->description()); ?></textarea><br/>
        <button type="submit" class=" btn_login btn btn-primary" style="margin-top: 15px;">Créer</button> <span style="font-weight: bold;" class="responseMessage"></span>
    </form>
</div>