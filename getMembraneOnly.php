<?php

$myelin_inverted = "C:/Users/wawong/Desktop/Willy_l_membrane/subtraction/myelin_inverted";
$membrane_bin = "C:/Users/wawong/Desktop/Willy_l_membrane/subtraction/all_membrane_bin";
$output = "C:/Users/wawong/Desktop/Willy_l_membrane/subtraction/membrane_only";

$files = scandir($myelin_inverted);
foreach($files as $file)
{
    if(strcmp($file,".")==0 || strcmp($file,"..")==0)
    {
        continue;
    }
    // all_membranes.png myelin_inverted.png -compose multiply -composite membranes_without_myelin.png
    $cmd = "magick.exe ".$membrane_bin."/".$file."  ".$myelin_inverted."/".$file." -compose multiply -composite ".$output."/".$file;
    echo "\n".$cmd;
    shell_exec($cmd);
}


