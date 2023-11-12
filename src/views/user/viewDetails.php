<?php
if (isset($user))
    echo '<p>Current user login : ' . $user->login . '</p>';
else
    echo '<p>No one is connected !</p>';
?>
<a href="?controller=Connection&action=logOut">Log out</a>
