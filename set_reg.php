<?php

session_start();

$_SESSION['regName'] = $regValue;

?>

<form method="get" action="get_reg.php">
    <input type="text" name="regName" value="">
    <input type="submit">
</form>