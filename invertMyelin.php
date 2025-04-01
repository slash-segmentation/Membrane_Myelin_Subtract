<?php

$inputFolder ="C:/Users/wawong/Desktop/Willy_l_membrane/subtraction/myelin_bin";
$output = "C:/Users/wawong/Desktop/Willy_l_membrane/subtraction/myelin_inverted";

$files = scandir($inputFolder);
foreach($files as $file)
{
    if(strcmp($file,".")==0 || strcmp($file,"..")==0)
    {
        continue;
    }
    
    $cmd = "magick.exe ".$inputFolder."/".$file." -negate ".$output."/".$file;
    echo "\n".$cmd;
    shell_exec($cmd);
}

