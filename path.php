<?php
function listFolderFiles($dir){
    $ffs = scandir($dir);
    $i = 0;
    $list = array();
    foreach ( $ffs as $ff ){
        if ( $ff != '.' && $ff != '..' ){
            if ( strlen($ff)>= 5 ) {
                if ( substr($ff, -4) == '.php' ) {
                    $list[] = $ff;
//echo dirname($ff) . $ff . "<br/>";
                    echo $dir.'/'.$ff.'<br/>';
                }
            }
            if( is_dir($dir.'/'.$ff) )
                listFolderFiles($dir.'/'.$ff);
        }
    }
    return $list;
}

$files = array();
$files = listFolderFiles(dirname(__FILE__));


