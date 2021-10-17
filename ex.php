
<?php 
    $item='bangalore';
    $tmp = shell_exec("python testscriptphp.py $item");
    echo "<pre>$tmp</pre>";

?>