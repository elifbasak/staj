<?php


function userAdd(){
    $param_value = request("par");
     runCommand(sudo().'-u postgres createuser '.$param_value.' 2>&1');
     return respond($param_value);
}






function userTable(){

    $username = extensionDb("postgreUsername");
    $password = extensionDb("postgrePassword");
    $output =runCommand('PGPASSWORD='.$password.' psql -c "SELECT usename from pg_catalog.pg_user " -h localhost -U '.$username.' -A | head -n -1 | tail -n +2');
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
            "Kullanıcı Adı"
        ],

        "display"=>[
            "name"
        ],
        "menu"=> [
            "Yetkileri Göster"=> [
                "target"=> "permissionGetJs",
                "icon"=>"fa-book",
                

            ],
            
                "Yetkilendir"=>[
                    "target"=> "yekiVerJS",
                    "icon"=>"fa-pencil-ruler",
                ],
                "Yetki Kaldır"=>[
                    "target"=> "yekiAlJS",
                    "icon"=>"fa-pencil-ruler",
                ]
            

        ]
        



]);
        
}
function getFolder(){
    $username = extensionDb("postgreUsername");
    $password = extensionDb("postgrePassword");

    $output3 = runCommand('PGPASSWORD='.$password.'pg_dump -U '.$username.' -h localhost'.$username.' >  /opt/ilkyedek/'.$username.'-0921200921.sql');
    $output2 = runCommand('ls -ltrh /opt/ilkyedek | awk \'{print $5 "-"$6" " $7" " $8"-"$9}\'');
    $output=[];
    $array=[];
  $tempArray=  (explode("\n",$output2));


  $a=count($tempArray);
//dd($tempArray[2]);
for($i=1;$i<$a;$i++){
    $output[$i-1]=$tempArray[$i];
}
//dd($output[3]);
    foreach($output as $line){
        $fetch =explode('-',$line);
        $array[]=[
            "size"=> $fetch[0],
            "date"=> $fetch[1],
            "name"=> $fetch[2]."-".$fetch[1]
        ];
    }
    return view('table',[
        "value"=>$array,
       
        "title"=>[
            "Dosya Adı", "Boyut","Tarih"
        ],

        "display"=>[
            "name","size","date"
        ]
      

       



]);
        }





function databaseGet(){
    $username = extensionDb("postgreUsername");
    $password = extensionDb("postgrePassword");

    $output =runCommand('PGPASSWORD='.$password.' psql -c "SELECT datname from pg_database" -h localhost -U '.$username.' -A | head -n -1');
    $array =[];

    $fetch =explode("\n",$output);
    foreach($fetch as $line){

    $array[]=[
        
        "name"=> $line
    ];
}

return view('table',[
    "value"=>$array,
   
    "title"=>[
        "İsim"
    ],

    "display"=>[
        "name"
    ],
    "onclick" => "yetkiJs"


   



]);


}

function databaseGet2(){
    $username = extensionDb("postgreUsername");
    $password = extensionDb("postgrePassword");

    $output =runCommand('PGPASSWORD='.$password.' psql -c "SELECT datname from pg_database" -h localhost -U '.$username.' -A | head -n -1');
    $array =[];

    $fetch =explode("\n",$output);
    foreach($fetch as $line){

    $array[]=[
        
        "name"=> $line
    ];
}

return view('table',[
    "value"=>$array,
   
    "title"=>[
        "İsim"
    ],

    "display"=>[
        "name"
    ],
    "onclick" => "yetkiKaldırJs"


   



]);


}
        

    

function databaseTable(){
    $username = extensionDb("postgreUsername");
    $password = extensionDb("postgrePassword");

   // $output =runCommand('PGPASSWORD='.$password.' psql -c "SELECT datname from pg_database" -h localhost -U '.$username.' -A | head -n -1');
   $output = runCommand('PGPASSWORD='.$password.' psql -d postgres -c "\\l" -h localhost -U postgres -A | awk -F"|" \'{ if (NR>2 && $2) print $1 "-" $2 }\'');
   $output2 = runCommand('PGPASSWORD='.$password.' psql -c "SELECT datname,datacl from pg_database " -h localhost -U postgres -A | awk -F"|" \'{ if (NR>1) print $1 "|" $2 }\' | head -n -1');
        // dd($output2);
  $output3=runCommand('PGPASSWORD='.$password.' psql -c " SELECT pg_database.datname as "database_name", pg_size_pretty(pg_database_size(pg_database.datname)) AS size_in_mb FROM pg_database ORDER by size_in_mb DESC" -h localhost -U postgres -A | tail -n +2');
     $array =[];
     $array2=[];
     $fetch=[];
     $fetch2=[];
     $fetch3=[];
     $fetch4=[];
     $fetch5=[];
     $fetch7=[];
   /*  foreach(explode("\n",$output2) as $line){
        $fetch6 =explode('|',$line); 
        $fetch7= explode("=CTc/",$fetch6[1]);
     }
*/
     //dd( $fetch7);
foreach(explode("\n",$output2)as $line){
        $fetch2 =explode('|',$line); 
        $fetch4= explode("=CTc/",$fetch2[1]);
        $fetch3[$fetch2[0]]=[   
            "erisim"=>$fetch2[1]
        ];
}
foreach(explode("\n",$output3)as $line){
    $fetch5 =explode('|',$line); 
    $fetch4[$fetch5[0]]=[   
        "size"=>$fetch5[1]
    ];
}




     foreach(explode("\n",$output)as $key => $line){
        $fetch =explode('-',$line);
        $array[]=array_merge([
            "name"=> $fetch[0],
            "owner"=> $fetch[1]
        ], $fetch3[$fetch[0]],$fetch4[$fetch[0]]);
       
    
}
/*
foreach($array as $line){
    $array[]=array_merge([
        
    ], $fetch4[$fetch[0]]);
}
  */
    return view('table',[
        "value"=>$array,
       
        "title"=>[
            "Veritabanı İsmi","Oluşturan","Erisim","Size"
        ],

        "display"=>[
            "name","owner","erisim","size"
        ],
        "menu"=> [
            "TablolarıGöster"=> [
                "target"=> "showTableJS",
                "icon"=>"fa-trash",
                

            ],
            "yedekle"=> [
                "target"=> "yedekleJs",
                "icon"=>"fa-trash",
                

            ],
            "tablo Ekle"=>[
                "target"=>"tableAddJs",
                "icon"=>"fa-trash",
            ]
            
        ]
        



]);
        
}

/*
function getTable10(){
    $username = extensionDb("postgreUsername");
    $password = extensionDb("postgrePassword");
    $output = runCommand('PGPASSWORD='.$password.' psql -c "SELECT datname,datacl from pg_database " -h localhost -U postgres -A | awk -F"|" \'{ if (NR>1) print $1 "|" $2 }\' | head -n -1');
    $array =[];
    foreach(explode("\n",$output)as $line){
       $fetch =explode('|',$line);
       $array[]=[
           "name"=> $fetch[0],
           "erisim"=> $fetch[1]
       ];
    }
      
    return view('table',[
        "value"=>$array,
       
        "title"=>[
            "DataBaseAdı","Erisim"
        ],

        "display"=>[
            "name","erisim"
        ],
        



]);


}
*/

function yedekle(){
    $username = extensionDb("postgreUsername");
    $password = extensionDb("postgrePassword");
    $name = request("name");
    $output = runCommand('PGPASSWORD='.$password.' pg_dump -U '.$username.' -h localhost '.$name.'  >  /opt/ilkyedek/'.$name.'-0921200922.sql');
    return respond($name);
}

function showTable(){
    $username = extensionDb("postgreUsername");
    $password = extensionDb("postgrePassword");
    $name = request("name");
    $output =  runCommand('PGPASSWORD='.$password.' psql -d '.$name.' -c "SELECT * from pg_tables WHERE schemaname=\'public\'" -h localhost -U postgres -A | awk -F"|" \'{ if (NR>1) print $2 }\'');
    $output2=runCommand('PGPASSWORD='.$password.' psql -d '.$name.' -c "\d+" -h localhost -U postgres -A | awk -F"|" \'{print $2 "|" $5 }\' | head -n -1 | tail -n +3');
    if(($output2=="Did not find any relations.")||($output2=="Hiç bir nesne bulunamadı."))
{
   return  respond($output2,201);
}
    $fetch5=[];
    $fetch4=[];
  //dd($output2);
    $array =[];

    foreach(explode("\n",$output2)as $line){
        $fetch5 =explode('|',$line); 
        $fetch4[$fetch5[0]]=[   
            "size"=>$fetch5[1]
        ];
    }
  
    $fetch =explode("\n",$output);
    foreach($fetch as $line){

        $array[]=array_merge([
            
            "name"=> $line
        ],$fetch4[$line]);

        
    }
    

//dd($array);
    return view('table',[
        "value"=>$array,
       
        "title"=>[
            "Tablo İsmi","Boyut"
        ],

        "display"=>[
            "name","size"
        ],

         "menu"=> [
            "Tablo içeriğini Göster"=> [
                "target"=> "tableContentJs",
                "icon"=>"fa-trash",
                

            ],
            "Explain"=> [
                "target"=> "explainJs",
                "icon"=>"fa-trash",
                

            ],
            
                "Veri Sİl"=>[
                    "target"=>"deleteFromTableJs",
                    "icon"=>"fa-trash",
                ],
          
        ]



]);
  }


 
  function tableContent(){
    $username = extensionDb("postgreUsername");
    $password = extensionDb("postgrePassword");
    $name = request("name");
    $database = request("databaseName");
   //dd($name);
    $output =  runCommand('PGPASSWORD='.$password.' psql -d '.$database.' -c "SELECT * FROM '.$name.'" -h localhost -U postgres -A | awk -F"|" \'{ print $0}\' | head -n -1');

    $headers = explode("|",explode("\n",$output)[0]);
    $array=[];
    foreach(explode("\n",$output)as $line){
        $fetch = explode('|',$line);
        $dizi = [];
        for($i = 0; $i < count($fetch);$i++){
            $dizi[$headers[$i]] = $fetch[$i];
        }
        array_push($array,$dizi);
     }
   
     unset($array[0]);

     return view('table',[
        "value"=>$array,
       
        "title"=>$headers,

        "display"=>$headers,
        "menu"=> [
            "sil"=> [
                "target"=> "deleteFromContentJS",
                "icon"=>"fa-trash",
                

            ],
            ]
     ]);
    }

    function addTableForm()
    {
        $username = extensionDb("postgreUsername");
        $password = extensionDb("postgrePassword");
        $name = request("name");
        $database = request("databaseName");
        $output =  runCommand('PGPASSWORD='.$password.' psql -d '.$database.' -c "SELECT * FROM '.$name.'" -h localhost -U postgres -A | awk -F"|" \'{ print $0}\' | head -n -1');
    
        $headers = explode("|",explode("\n",$output)[0]);
        $array=[];
        foreach(explode("\n",$output)as $line){
            $fetch = explode('|',$line);
            $dizi = [];
            for($i = 0; $i < count($fetch);$i++){
                $dizi[$headers[$i]] = $fetch[$i];
            }
            array_push($array,$dizi);
         }
       
         unset($array[0]);
    
         $inputs = [];
    
         foreach($headers as $header){
             $inputs[$header] = $header.":text";
         }
         return "<form id='tableForm'>".view('inputs', [
             "inputs" => $inputs
         ])."</form>";

                  
        //  $html = "";

        //  foreach($headers as $header){
        //     $html .= "<label>$header</label><input type='text' name='$header'/><br>";
        //      //$inputs[$header] = $header.":text";
        //  }
        //  return "<form id='tableForm'>".$html."</form>";
    }

function addTableInto(){
    $param_value = request("par");
    $password = extensionDb("postgrePassword");

    //$output = runCommand('echo "'PGPASSWORD='.$password.' psql -c "INSERT INTO COMPANY (ID,NAME,AGE,ADDRESS,SALARY,JOIN_DATE) VALUES (8,\'Paul\',32,\'California\', 20000.00,\'2001-07-13\');" -h localhost -U postgres' > /tmp/basak01 ');
    //return respond("PGPASSWORD=".$password." psql -c \"INSERT INTO COMPANY (ID,NAME,AGE,ADDRESS,SALARY,JOIN_DATE) VALUES (75,'Paul',32,'California', 20000.00,'2001-07-13');\" -h localhost -U postgres");
    $output = runCommand("PGPASSWORD=".$password." psql -c \"$param_value\" -h localhost -U postgres");

//    $output = runCommand("PGPASSWORD=".$password." psql -c \"INSERT INTO COMPANY (ID,NAME,AGE,ADDRESS,SALARY,JOIN_DATE) VALUES (75,'Paul',32,'California', 20000.00,'2001-07-13');\" -h localhost -U postgres");

    //$output = runCommand(sudo().'-u postgres createdb '.$param_value.' 2>&1');
    return respond($output);
}

function addTableInto2(){
    $param_value = json_decode(request("data"));
    $password = extensionDb("postgrePassword");
    $firstParam;
    $secondParam;
    $name = request("name");
        $database = request("databaseName");
    foreach($param_value as $line){
        $firstParam .= ",".$line->name;
    }
    $firstParam= substr( $firstParam,1);
    $firstParam= strtoupper($firstParam);
    $name= strtoupper($name);
    foreach($param_value as $line){
        if(is_numeric($line->value))
        $secondParam .= ",".$line->value;
        else if(strpos($line->value, '-') !== false) 
        $secondParam .= ","."'".$line->value."'";
        else
        $secondParam .= ","."'".$line->value."'";
    }
    $secondParam= substr( $secondParam,1);
   // dd("PGPASSWORD=".$password." psql -c \"INSERT INTO ".$name. "(".$firstParam.") VALUES (".$secondParam.");\" -h localhost -U postgres");
   // dd("PGPASSWORD=".$password." psql -c \"INSERT INTO '.$name.' ('.$firstParam.') VALUES ('.$secondParam.');\" -h localhost -U postgres");
    $output = runCommand("PGPASSWORD=".$password." psql -c \"INSERT INTO ".$name. "(".$firstParam.") VALUES (".$secondParam.");\" -h localhost -U postgres");
    //return respond('PGPASSWORD='.$password.' psql -c "INSERT INTO '.$name.' ('.$firstParam.') VALUES ('.$secondParam.');" -h localhost -U postgres');

    return respond($output);
}


    
    /* $data = [
        [
            "ad" => "mert",
            "soyad" => "celen"
        ],
        [
            "ad" => "basak",
            "soyad" => "yildirim"
        ]
     ];

     $basliklar = [
         "İsmi", "Cismi"
     ];

     $goruntulenecek = [
         "ad" , "soyad"
     ];


     return view('table',[
        "value"=>$data,
       
        "title"=>$basliklar,

        "display"=>$goruntulenecek
    
]);
  */

  
  function permissionGet(){
    $username = extensionDb("postgreUsername");
    $password = extensionDb("postgrePassword");
    $name = request("name");
    $database = request("database");
    $output =  runCommand('PGPASSWORD='.$password.' psql -c "SELECT datname,datacl from pg_database WHERE has_database_privilege(\''.$name.'\', datname, \'create\')" -h localhost -U postgres -A | awk -F"|" \'{ if (NR>1) print $1}\' | head -n -1');
   // dd($output);
    $array =[];
    $fetch =explode("\n",$output);
    foreach($fetch as $line){

        if(empty($line)){
            continue;
        }

        $array[]=[
            
            "name"=> $line
        ];
    }


    return view('table',[
        "value"=>$array,
       
        "title"=>[
            "Yetkili Veritabanları"
        ],

        "display"=>[
            "name"
        ]
    
]);
  }
function yetkiVer(){
    $username = extensionDb("postgreUsername");
    $password = extensionDb("postgrePassword");
   $name = request("user");
    $database = request("database");
   
   // dd($name);
   // dd($data);
    $output =runCommand('PGPASSWORD='.$password.' psql -c " GRANT ALL PRIVILEGES ON DATABASE '.$database.' TO '.$name.'" -h localhost -U postgres -A');
    //dd($output);
    return respond("başarılı",200);

}
function yetkiAl(){
    $username = extensionDb("postgreUsername");
    $password = extensionDb("postgrePassword");
   $name = request("user");
    $database = request("database");
   
   // dd($name);
   // dd($data);
    $output =runCommand('PGPASSWORD='.$password.' psql -c " REVOKE ALL ON DATABASE  '.$database.' FROM '.$name.'" -h localhost -U postgres -A');
    //dd($output);
    return respond("başarılı",200);

}
 function packageControl(){

/*
    $checkOperate=runCommand('hostnamectl | tail -n +7');
    $checkOperatingSistemArray=  explode("\n",$checkOperate);
    $checkOperatingSistem=$checkOperatingSistemArray[0];
    $pos = strrpos($checkOperatingSistem, "Ubuntu");

    if( strrpos($checkOperatingSistem, "Ubuntu") !== false){

    

                $output2=trim(runCommand('apt show postgresql'));
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
               $output= trim(runCommand('dpkg --get-selections | grep -v deinstall | awk \'{print $1} \' |  grep \'^postgresql\' | head -1'));
               
            if(strpos($output,'postgresql') !== false)
                return $versiyon;
            else  return respond("paket yüklü değil",201);

            }
            else if( strrpos($checkOperatingSistem, "CentOS") !== false)
            $outputCentos=trim(runCommand('sudo yum list  installed|grep postgresql'));
            $array3= explode("\n",$outputCentos);

            if(strpos($array3[0],'postgresql') !== false)
            return $versiyon;
        else  return respond("paket yüklü değil",201);
            //dd(($versiyon));    
            */
            $checkCentos=runCommand('which yum > /dev/null && echo 1 || echo 0');
            if ($checkCentos=="1"){ 
                $outputCentos=trim(runCommand('yum list installed | grep postgresql'));
                $array3= explode("\n",$outputCentos);
                $versiyonCentos= preg_split('/\s+/', $array3[0]);
              
                if(strpos($array3[0],'postgresql') !== false)
                return   $versiyonCentos[1];
            else  return respond("paket yüklü değil Centos",201);

            }
            $checkApt=runCommand('which apt > /dev/null && echo 1 || echo 0');
           if($checkApt=="1"){

           
                
                $output2=trim(runCommand('apt show postgresql'));
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
               $output= trim(runCommand('dpkg --get-selections | grep -v deinstall | awk \'{print $1} \' |  grep \'^postgresql\' | head -1'));
               
            if(strpos($output,'postgresql') !== false)
                return $versiyon;
            else  return respond("paket yüklü değil",201);

            }

            }
            
 function sizeDatabase(){
$username = extensionDb("postgreUsername");
$password = extensionDb("postgrePassword");

$output =runCommand('PGPASSWORD='.$password.' psql -c " SELECT pg_database.datname as "database_name", pg_size_pretty(pg_database_size(pg_database.datname)) AS size_in_mb FROM pg_database ORDER by size_in_mb DESC" -h localhost -U postgres -A');

  }



 function tableAdd(){
$username = extensionDb("postgreUsername");
$password = extensionDb("postgrePassword");
$tableCreate = request("par");
$databaseName = request("databaseName");
dd('PGPASSWORD='.$password.' psql -d '.$databaseName.' -c "'.$tableCreate.' " -h localhost -U postgres -A');
$output =runCommand('PGPASSWORD='.$password.' psql -d '.$databaseName.' -c "'.$tableCreate.' " -h localhost -U postgres -A');

return respond($output);
}


function explain(){
    $username = extensionDb("postgreUsername");
    $password = extensionDb("postgrePassword");
    $name = request("tableName");
    $database = request("databaseName");
    $output =  runCommand('PGPASSWORD='.$password.' psql -d '.$database.' -c "EXPLAIN SELECT * FROM '.$name.'" -h localhost -U postgres -A |head -n -1 | tail -n +2');
    $array =[];
    $fetch =explode("\n",$output);
    foreach($fetch as $line){

        if(empty($line)){
            continue;
        }

        $array[]=[
            
            "name"=> $line
        ];
    }


    return view('table',[
        "value"=>$array,
       
        "title"=>[
            "QUERY PLAN"
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

function deleteFromTable(){
    $username = extensionDb("postgreUsername");
    $password = extensionDb("postgrePassword");
    $tableName = request("name");
    $databaseName = request("databaseName");
    $id= request("par");
    $tableName= strtoupper($tableName);
    $output =runCommand('PGPASSWORD='.$password.' psql  -d '.$databaseName.' -c "DELETE FROM '.$tableName.' WHERE ID ='.$id.'" -h localhost -U postgres -A');
return respond($output);
}



function deleteFromContent(){
    $username = extensionDb("postgreUsername");
    $password = extensionDb("postgrePassword");
    $databaseName = request("databaseName");
    $tableName = request("name");
    $id= request("id");
    $output =runCommand('PGPASSWORD='.$password.' psql  -d '.$databaseName.' -c "DELETE FROM '.$tableName.' WHERE ID ='.$id.'" -h localhost -U postgres -A');
    return respond($output);
}

?>