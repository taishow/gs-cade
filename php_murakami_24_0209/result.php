<?php

if(isset($_GET["mychoise"])){
$mychoise = htmlspecialchars($_GET["mychoise"], ENT_QUOTES, 'UTF-8');

$janken = array(
    "グー",
    "チョキ",
    "パー"
);

$cpu = $janken[array_rand($janken)];

if($mychoise === "グー" && $cpu === "チョキ"){
    $result = "勝ち";
    $img_url = "img/w.jpeg";
}
elseif($mychoise === "チョキ" && $cpu === "パー"){
    $result = "勝ち";
    $img_url = "img/w.jpeg";
}
elseif($mychoise === "パー" && $cpu === "グー"){
    $result = "勝ち";
    $img_url = "img/w.jpeg";
}
elseif($mychoise === $cpu){
    $result = "引き分け";
    $img_url = "img/d.jpeg";
}
else{
    $result = "負け";
    $img_url = "img/l.jpeg";
}
}

?>
 
 <!DOCTYPE html>
 <html lang="ja">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
 </head>
 <body>
 <p>
    CPU：<?php echo $cpu; ?><br>
    CPU：<?php echo $cpu; ?><br>
    結果：<?php echo $result; ?><br>
    <img src=<?php echo $img_url; ?>><br>
</p>
 </body>
 </html>