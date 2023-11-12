<?php
if (isset($user))
    echo '<p>Current user login : ' . $user->login . '</p>
        <a href="?controller=Connection&action=logOut">Log out</a>';
else
    echo '<p>No one is connected !</p>';
