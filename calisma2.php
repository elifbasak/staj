<?php

$dosya=[ [ 
"isim" => "gorevler.pdf",
"degistirilmeTarihi" => "19/01/2020 18:10",
"olusturmaTarihi" => "17/01/2020 18:10"
],
[ 
  "isim" =>"gorevler2.pdf",
  "degistirilmeTarihi"=> "13/01/2020 11:51",
  "olusturmaTarihi"=> "14/01/2020 09:33"

]];
$diziBoyut=count($dosya);


?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    </head>
    <body>
    <?php  for ($i = 0; $i < $diziBoyut ;$i++) { ?>

    
<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action ">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1"><?php echo $dosya[$i]["isim"];?></h5>
      <small> "degistirilmeTarihi: "<?php echo $dosya[$i]["degistirilmeTarihi"];?></small>
    </div>
    <p class="mb-1">"olusturmaTarihi: "<?php echo $dosya[$i]["olusturmaTarihi"];?></p>
    
  </a>
  </div>
  </body>
  <?php
    }
    ?></html>