<h3>My Blades</h3>
<?php
foreach ($groupedUserBlades as $groupName => $blades) {
    echo "
        <h4>$groupName</h4>
        <ul>
            ";
    foreach ($blades as $blade)
        echo "<li><a href='?controller=TeamBuilder&action=displayBladeDetails&ublade_id=$blade->id'>$blade->bladeName</a></li>";
    echo "
        </ul>
    ";
}
?>

<h3>Other Blades</h3>
<ul>
    <?php
    foreach ($nonUserBlades as $b)
        echo "<li > $b->name(<a href = '?controller=TeamBuilder&action=addBladeToUser&blade=$b->name' > obtenue ?</a >)</li > ";
    ?>
</ul>
