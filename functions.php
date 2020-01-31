<?php

function getRootTable(){

    $output2=trim(runCommand('apt show postgresql-12'));
   // dd($output2);
  
    $array2= explode("\n",$output2);
   // dd($array2[0]);
   // dd($array2[1]);
    $pos = strrpos($array2[1], ":");
    $pos2=strrpos($array2[1], "Version:");
    if(trim($pos2)!="0"){
        return respond("paket yüklü değil",201);
    }
    $versiyon=substr($array2[1],$pos+1 );
   $output= trim(runCommand('dpkg --get-selections | grep -v deinstall | awk \'{print $1} \' |  grep \'^postgresql-12$\''));
   
if($output=="postgresql-12")
    return $versiyon;
else  return respond("paket yüklü değil",201);
//dd(($versiyon));

    
        
}


?>