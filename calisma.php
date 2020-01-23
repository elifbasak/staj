<?php
$dosya=[ 
"isim" => "gorevler.pdf",
"degistirmeTarihi" => "19/01/2020 18:10",
"olusturmaTarihi" => "17/01/2020 18:10"
];
$dizi=array_keys($dosya);
$diziBoyut=count($dizi);
for ($i = 0; $i <= $diziBoyut ;$i++) {
    printf($dizi[$i]);
    printf("<br>");
}

