<form id="userRegister">
	<div class="container">
		<h1 class="pageTitle">S'enregistrer</h1>
		<p>Entrez vos informations afin de vous enregistrer.</p>
		<hr>
		<label for="Pseudo"><b>Pseudo</b></label>
		<input type="text" id="username" placeholder="Pseudo" name="username" required>
		<label for="firstname"><b>Nom</b></label>
		<input type="text" id="firstname" placeholder="Nom" name="firstname" required>
		<label for="lastname"><b>Prénom</b></label>
		<input type="text" placeholder="Prénom" id="lastname" name="lastname" required>
		<label for="password"><b>Mot de passe</b></label>
		<input type="password" id="password" placeholder="Mot de passe" name="password"required>
		<hr>
		<button type="submit" class="btn btn-sm btn-outline-secondary">S'enregistrer</button> <span style="font-weight: bold;" class="responseMessage"></span>
	</div>
</form>
<div class="container signin">
	<p>Vous avez déjà un compte? <a href="/user/login">Se connecter</a>.</p>
</div>