<?php
 $id = isset($_POST['id']) ? $_POST['id'] : "false";
 ?>
 <html>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <head>
 <title>駅から検索 for 渋谷</title>
 </head>
<body bgcolor="#FFFFFF">
<h1 style="font-size:14pt">駅から検索 for 渋谷</h1>
<?php
//ファイル名の指定
$file_name = "./csv/shibuya.csv";


//処理の分岐
if($id != "false"){
$fp = fopen($file_name, "a+") or die('読み込みエラー');
//データを$arrayに代入（多元配列）
while(!feof($fp)){
$data = fgets($fp);
$array[] = explode(",", mb_convert_encoding($data, "UTF-8", "auto"));
}
var_dump( $array );
fclose($fp);

//目的のデータの修得
for($i=0; $i<count($array); $i++){
if($array[$i][0] == $id){
$data = $array[$i];
//var_dump( $data );
break;
}
}
}
$data = isset($data) ? $data : "false" ;
?>
<form action="index.php" method="POST">
<input type="text" name="id">
<input type="submit" name="Submit" vale="検 索">
</form>
<?php
if($id != "false"){
if($data == "false" || $id == ""){
echo "条件に一致する駅がありませんでした。";
}else{
echo '▼検索結果';
echo '<hr>';
echo '駅名: '.$data[0].'<br />';
echo '路線: '.$data[1].'<br />';
echo '所要時間: '.$data[2].'<br />';
}
}
?>
</body>
</html>