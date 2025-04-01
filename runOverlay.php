<?php

$input = "C:/Users/wawong/Desktop/em";
$label = "C:/Users/wawong/Desktop/Willy_l_membrane/subtraction/membrane_only";
$output = "C:/Users/wawong/Desktop/Willy_l_membrane/subtraction/overlay_output";

$files = scandir($input);
foreach($files as $file)
{
    $name = str_replace("slice0", "", $file);
    $sindex = str_replace(".png", "", $name);
    $index = intval($sindex);
    
    if($index == 0)
        continue;
    
    echo "\nIndex:".$index;
    
    $cmd = "python C:/Users/wawong/Desktop/Willy_l_membrane/subtraction/runOverlay.py ".$input."/".$file.
            " ".$label."/Segmented_".$sindex.".png ".$output."/Overlay_".$sindex.".png";
    
    echo "\n".$cmd;
    shell_exec($cmd);
}