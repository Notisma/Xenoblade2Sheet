<form method="POST">
    <?= $htmlDriver ?>
    <?= $htmlWeaponClass ?>
    <?= $htmlReaction ?>
    <input type="submit" name="submitBtn" value="Submit">
</form>

<form method="POST">
    <input type="submit" name="resetBtn" value="Reset">
</form>

<?php if (isset($_POST['submitBtn']))
    \XC2S\Controllers\ControllerDriverCombo::displayList(); ?>

