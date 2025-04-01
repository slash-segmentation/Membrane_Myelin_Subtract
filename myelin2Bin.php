<?php

$inputFolder = "C:/Users/wawong/Desktop/Willy_l_membrane/willy_prediction2/1fm";
$output = "C:/Users/wawong/Desktop/Willy_l_membrane/subtraction/myelin_bin";

$files = scandir($inputFolder);
foreach($files as $file)
{
    if(strcmp($file,".")==0 || strcmp($file,"..")==0)
    {
        continue;
    }
    
    //$cmd = "magick.exe ".$all_membrane_folder."/".$file." -negate ".$output."/".$file;
    $cmd = "magick.exe ".$inputFolder."/".$file." -threshold 50% ".$output."/".$file;
    echo "\n".$cmd;
    shell_exec($cmd);
}

