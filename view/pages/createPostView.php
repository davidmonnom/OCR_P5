<div class="container">
    <h1 class="pageTitle">Nouveau posts</h1>
    <p>Créer votre post</p>
    <form action="" id='newPostForm' method="post">
        <h5 class="subTitleForm" for="title">Titre</h5><br/>
        <input id="title" type="text" placeholder="Sujet" name="title" required><br/>
        <h5 class="subTitleForm" for="subject">Sujet</h5><br/>
        <textarea id="subject" name="subject" cols="35" rows="4"></textarea><br/>
        <h5 class="subTitleForm" for="description">Description</h5><br/>
        <textarea id="description" name="description" cols="40" rows="5"></textarea><br/>
        <button type="submit" class="btn btn-sm btn-outline-secondary" style="margin-top: 15px;">Créer</button> <span style="font-weight: bold;" class="responseMessage"></span>
    </form>
</div>