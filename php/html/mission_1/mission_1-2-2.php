<?php
    $fh = fopen("./mission_1-2.txt", "w");

    fwrite($fh, "hello world");
    fclose($fh);

?>
