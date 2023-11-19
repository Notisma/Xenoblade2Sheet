<h2>Bienvenue dans le teambuilder !</h2>

<h3>Blade Manager</h3>
<a href="?controller=Blade&action=displayBladeManager">Modifier ses lames</a>

<h3>Teams</h3>
<a href="?controller=TeamBuilder&action=displayTeams">Gérer ses équipes</a>

<p>new team form :</p>
<form action="?controller=TeamBuilder&action=createTeam" method="post">
    <label for="nom_id">Nom de l'équipe : </label>
    <input type="text" id="nom_id" name="teamLabel" required maxlength="50">
    <button type="submit">Créer</button>
</form>
