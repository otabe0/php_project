<?php
    $fh = fopen("./mission_1-2.txt", "a");

    fwrite($fh, "hello world");
    fclose($fh);

?>
