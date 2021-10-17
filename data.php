<!DOCTYPE html>
<!--
    Cosmix by TEMPLATE STOCK
    templatestock.co @templatestock
    Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->

<html lang="en">
<?php
session_start();
$regValue = $_GET['regName'];
$tmp = shell_exec("python check.py $regValue");
$tmp2=shell_exec("python plot.py");
echo "<pre>$tmp</pre>";
echo "<img src='ab.png' >";
?>
