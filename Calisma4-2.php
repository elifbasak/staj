<?php

$klasor=$_GET['parametre']; 

$çıktı = shell_exec('ls -d -la /'.$klasor.'*/');
$list= explode( "\n" ,$çıktı);
$pos = strpos($list[0], "/");
$diziBoyut=count($list);

?>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</head>
<table class="table table-bordered">
  <thead>
    <tr>
     
      <th scope="col">#</th>
      <th scope="col">İsim</th>
      <th scope="col">Olusturma Tarihi</th>
      <th scope="col">İslem</th>
    </tr>
    
  </thead>

  <tbody>
  <?php for($i=0;$i<$diziBoyut-1;$i++){ 

    $pos = strpos($list[$i], "/");
    $olusturmaTarihi= (substr($list[$i],$pos-14,13));
$isim=(substr($list[$i],$pos ));
?>
    <tr>
      <th scope="row">#</th>
      <td><?php echo $isim ?></td>
      <td> <?php echo $olusturmaTarihi ?> </td>
      <td>
          <a href="Calisma4-2.php?parametre=<?php echo $isim ?>">Görüntüle </a>
</td>
    </tr>
    <?php } ?>
    
  </tbody>
</table> 
</html>

