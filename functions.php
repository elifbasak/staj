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
        "menu"=> [
            "Sil"=> [
                "target"=> "delete_log_archive",
                "icon"=>"fa-trash"
            ],
            "Geri Yükle"=> [
                "target"=> "restore_log_archive",
                "icon"=>"fa-window-restore"
            ]
            ],

        "onclick" => "getTable"

    ]);
        
}
function getTable(){
    $param_value = request("paramaters");

    $output=trim(runCommand('ls -d -la '.$param_value.'*/ | awk \'{print $6 " " $7 " "$8 "-" $9} \''));
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
            "menu"=> [
                "Sil"=> [
                    "target"=> "delete_log_archive",
                    "icon"=>"fa-trash"
                ],
                "Geri Yükle"=> [
                    "target"=> "restore_log_archive",
                    "icon"=>"fa-window-restore"
                ]
                ],

            "onclick" => "getTable"


    ]);
        
}
function klasor(){
    $param_value = request("par");
    runCommand('mkdir /home/linux/'.$param_value);
    return respond("Klasör başarıyla eklendi");
}

function getTableGeriDon(){
    $param_value=trim(runCommand('cd ..'));
    $output=trim(runCommand('ls -d -la '.$param_value.'*/ | awk \'{print $6 " " $7 " "$8 "-" $9} \''));
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
            "menu"=> [
                "Sil"=> [
                    "target"=> "delete_log_archive",
                    "icon"=>"fa-trash"
                ],
                "Geri Yükle"=> [
                    "target"=> "restore_log_archive",
                    "icon"=>"fa-window-restore"
                ]
                ],

            "onclick" => "getTable"


    ]);
        
}




?>