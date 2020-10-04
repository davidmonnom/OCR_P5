<div class="header" style="height:150px;"></div>
<form action="" method="post" id="userLogin">
	<div class="container">
		<h1 class="pageTitle">Se connecter</h1>
		<p>Entrez vos identifiants.</p>
		<hr>
		<label for="username"><b>Nom d'utilisateur</b></label>
		<input id="username" type="text" placeholder="Pseudo" name="username" required>
		<label for="password"><b>Mot de passe</b></label>
		<input id="password" type="password" placeholder="Mot de passe" name="password"required>
		<hr>
		<button type="submit" class="btn_login login_now btn btn-primary">Se connecter</button> <span style="font-weight: bold;" class="responseMessage"></span>
		<p id="reponse_login" style="font-weight: bold; color: red;"></p>
	</div>

	<div class="container signin">
		<p>Vous n'avez pas de compte ?<a href="/user/register"> S'enregistrer</a>.</p>
	</div>
</form>