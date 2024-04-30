<?php
    include('connectBDD.php');
    $o=0;
    $list=$bdd->query("SELECT * FROM publication LIMIT $o,1");
    while($data=$list->fetch()){
        $daty=date_create($data[5]);
        $daty1=date_create(date('Y-m-d'));
        $jours=date_diff($daty1,$daty)->format('%R%a');
        if($jours<0){
            $list=$bdd->query("DELETE FROM `projet`.`publication` WHERE `publication`.`uid` = $data[0] LIMIT 1");
        }
        $o++;
        $list=$bdd->query("SELECT * FROM publication LIMIT $o,1");
    }
?>