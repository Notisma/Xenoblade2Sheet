<h3>My Blades</h3>
<ul>
    <?php
    foreach ($userBlades as $b)
        echo "<li onclick='openPopup_Blade()'>$b->bladeName</li>";
    ?>
</ul>

<h3>Other Blades</h3>
<ul>
    <?php
    foreach ($nonUserBlades as $b)
        echo "<li>$b->name (<a href='?controller=TeamBuilder&action=addBladeToUser&blade=$b->name'>obtenue?</a>)</li>";
    ?>
</ul>


<div id="popupBlade">
    <h1>INFORMATIONS SUR LE CANDIDAT</h1>
    <h4>Retrouvez toutes les informations sur un étudiant et les actions qui y sont associées</h4>
    <div class="detailsEtu">
        <p>HI!</p>
    </div>
    <div class="wrapBoutonsDoc">
        <a href="">
            <button class="boutonDoc">TELECHARGER CV</button>
        </a>
        <a href="">
            <button class="boutonDoc">TELECHARGER LETTRE</button>
        </a>
    </div>

    <div class="wrapActions">
        <a onclick="closePopup_Blade()">
            <button class="boutonAction">RETOUR</button>
        </a>

        <!-- TODO : RELIER A LA BD -->
        <a href="">
            <button class="boutonAction">ASSIGNER</button>
        </a>

    </div>

</div>