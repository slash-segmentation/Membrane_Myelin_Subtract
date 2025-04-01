<?php


$all_membrane_folder = "C:/Users/wawong/Desktop/Willy_l_membrane/willy_predict/1fm";
$output = "C:/Users/wawong/Desktop/Willy_l_membrane/subtraction/all_membrane_bin";

$files = scandir($all_membrane_folder);
foreach($files as $file)
{
    if(strcmp($file,".")==0 || strcmp($file,"..")==0)
    {
        continue;
    }
    
    //$cmd = "magick.exe ".$all_membrane_folder."/".$file." -negate ".$output."/".$file;
    $cmd = "magick.exe ".$all_membrane_folder."/".$file." -threshold 50% ".$output."/".$file;
    echo "\n".$cmd;
    shell_exec($cmd);
}