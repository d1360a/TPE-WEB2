<h1>Password hasheada</h1>

<?php

$password = 'admin';
echo password_hash($password, PASSWORD_BCRYPT);;

?>