<?php

$pass = "123123";
//save this hash to database
$passwordhash = password_hash($pass, PASSWORD_DEFAULT);

echo $passwordhash;

$success = password_verify($pass, '$2y$10$.48/vqh6mAImOh11ZffBNuFSFNrTyrwFMLHS2/80y6ZdZa.dX7G4y');
echo "<br>".$success;

?>