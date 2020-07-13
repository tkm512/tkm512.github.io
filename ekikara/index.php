<?php

//デフォルトのソート項目名
$sort = "point";

$list = file_get_contents("form.csv");
$list = mb_convert_encoding($list, "UTF-8", "sjis");
$list = explode("\n",$list);
$list = array_filter($list);

$result = array();
$num = 0;
foreach($list as $l){
    $l = explode(",",$l);
    if($num == 0){
        $nameList = $l;
    }else{
        $i=0;
        foreach($l as $item){
             //改行削除
            $nameList[$i] = str_replace(array("\r", "\n"), '', $nameList[$i]);
            $item = str_replace(array("\r", "\n"), '', $item);

            $result[$num][$nameList[$i]] = $item;
            $i++;
        }
    }
    $amounts = array();
    foreach ($result as $v) $amounts[] = $v[$sort];
    array_multisort($amounts, SORT_DESC, SORT_NUMERIC, $result);

    $num++;
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CSV検索フォームサンプル</title>
<link rel="stylesheet" href="style.css?<? echo date("His"); ?>" type="text/css" />
<link rel="stylesheet" href="form.css?<? echo date("His"); ?>" type="text/css" />
<link rel="stylesheet" href="reset.css" type="text/css" />
<link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">

<!-- OGP設定 -->
<meta property="og:title" content="CSV検索フォームサンプル" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://www.codelink.co.jp/web/searchform/" />
<meta property="og:image" content="http://www.codelink.co.jp/images/logo.png" />
<meta property="og:site_name" content="株式会社コードリンク公式サイト" />
<meta property="og:description" content="CSV検索フォームサンプルページ" />
<meta property="fb:admins" content="1271418167" />
<meta name="twitter:card" content="summary" />

</head>

<body>

<div id="wrapper">

<?php
    include "html_form.php";
    include "html_result.php";
    include "html_form.php";
?>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
<script src="./jquery.mixitup.min.js"></script>

<script>
$(function(){
	$('.searchResultList').mixItUp();
});
</script>


</body>
</html>