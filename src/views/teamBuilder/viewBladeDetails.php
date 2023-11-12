<h2><?= $ublade->bladeName ?></h2>
<h3>Bonded driver :</h3>
<form action='?controller=TeamBuilder&action=changeBondedDriver&ublade_id=<?= $ublade->id ?>' method='post'>
    <?php
    foreach ((new \XC2S\Model\Repository\DriverRepo())->getIdList() as $driver) {
        echo "
            <input type='radio' id='driver_id' name='new_driver' value='$driver'";
        if ($ublade->bondedDriver === $driver) echo ' checked';
        echo ">
            <label for='driver_id'>$driver</label>
        ";
    }
    ?>
    <button type="submit">Submit</button>
</form>
