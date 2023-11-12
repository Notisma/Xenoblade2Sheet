<h3>My Blades</h3>
<ul>
    <?php
    foreach ($userBlades as $b)
        echo "<li>$b->bladeName</li>";
    ?>
</ul>

<h3>Other Blades</h3>
<ul>
    <?php
    foreach ($nonUserBlades as $b)
        echo "<li>$b->name (<a href='?controller=TeamBuilder&action=addBladeToUser&blade=$b->name'>obtenue?</a>)</li>";
    ?>
</ul>
