<?php 
    $_POST = json_decode(file_get_contents('php://input'), true);
    $file = $_POST["filename"];
    copy($file, "bkp/" . $file . date(" M-d-Y h-i-s A") . ".txt");
    file_put_contents($file, $_POST["texta"]);
    echo "ok";
?>
