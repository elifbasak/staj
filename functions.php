<?php


function userAdd(){
    $param_value = request("par");
     runCommand(sudo().'-u postgres createuser '.$param_value.' 2>&1');
    
}






function getTable(){


    $output =runCommand('PGPASSWORD=1 psql -c "SELECT usename from pg_catalog.pg_user" -h localhost -U postgres -A');
     $array =[];

    $fetch =explode("\n",$output);
    foreach($fetch as $line){

    $array[]=[
        
        "name"=> $line
    ];
}
   // dd($fetch[1] );
    return view('table',[
        "value"=>$array,
       
        "title"=>[
            "kullanıcıAdı"
        ],

        "display"=>[
            "name"
        ]
        



]);
        
}

function getTable2(){


    $output =runCommand('PGPASSWORD=1 psql -c "SELECT datname from pg_database" -h localhost -U postgres -A');
     $array =[];

    $fetch =explode("\n",$output);
    foreach($fetch as $line){

    $array[]=[
        
        "name"=> $line
    ];
}
   // dd($fetch[1] );
    return view('table',[
        "value"=>$array,
       
        "title"=>[
            "DataBaseAdı"
        ],

        "display"=>[
            "name"
        ]
        



]);
        
}


function dataBaseAdd(){
    $param_value = request("par");
    $output = runCommand(sudo().'-u postgres createdb '.$param_value.' 2>&1');
  
    return respond($output);
}

?>