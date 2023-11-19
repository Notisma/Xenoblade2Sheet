<h3>My Teams</h3>
<ul>
<?php
foreach ($teams as $team) {
    echo "
        <li><a href='?controller=TeamBuilder&action=displayTeamDetails&team=$team->idTeam'>$team->label</a></li>
    ";
}
?>
</ul>
