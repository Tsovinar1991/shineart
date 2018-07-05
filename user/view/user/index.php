

<?php
require"../../model/useModel.php";
foreach ($arrUser as $key => $value){
    echo '<hr>';
    foreach ($value as $k => $v) {
        echo '<p>'.$k.'=>'.$v.'</p>';

    }
    echo '<a href="/user/view?id='.$key.'" value ="see user view">see user view</a>';




}
?>