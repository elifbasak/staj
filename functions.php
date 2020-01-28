<?php

function getRootTable(){


    $output=trim(runCommand('ls -d -la /*/ | awk \'{print $6 " " $7 " "$8 "-" $9} \''));
$array =[];
foreach(explode("\n",$output)as $line){
    $fetch =explode('-',$line);
    $array[]=[
        "date"=> $fetch[0],
        "name"=> $fetch[1]
    ];
}
    return view('table',[
            "value"=>$array,
           
            "title"=>[
                "Dosya Adı", "Degistirme Tarihi"
            ],

            "display"=>[
                "name","date"
            ],

            "onclick" => "getDetail"


    ]);
        
}
function getTable(){


    $output=trim(runCommand('ls -d -la  | awk \'{print $6 " " $7 " "$8 "-" $9} \''));
$array =[];
foreach(explode("\n",$output)as $line){
    $fetch =explode('-',$line);
    $array[]=[
        "date"=> $fetch[0],
        "name"=> $fetch[1]
    ];
}
    return view('table',[
            "value"=>$array,
           
            "title"=>[
                "Dosya Adı", "Degistirme Tarihi"
            ],

            "display"=>[
                "name","date"
            ],

            "onclick" => "getDetail"


    ]);
        
}

?>