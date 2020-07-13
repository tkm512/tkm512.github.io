<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>検索結果</title>
<link rel="stylesheet" href="style.css?<? echo date("His"); ?>" type="text/css" />
<link rel="stylesheet" href="form.css?<? echo date("His"); ?>" type="text/css" />
<link rel="stylesheet" href="reset.css" type="text/css" />
<link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
</head>

<body>

<div id="wrapper">

<?php
$count = count($result);
if(count($result) == 0){
    echo '<div class="searchResultLine">結果は0件です。検索条件を変更してください。</div>';
}else{
    echo '<div class="searchResultLine">検索結果は' . $count . '件です。</div>';
}

include "html_result.php";
include "html_form.php";

?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
<script src="./jquery.mixitup.min.js"></script>

<script>
$(function(){
	$('.searchResultList').mixItUp();
});
$(function(){
    //selectedをつける処理
    <?php
    if($search){
        foreach($search as $name => $val){
            if($val != ""){
                if(is_array($val)){
                    $val = implode('","', $val);
                    echo "$('[name=\"" . $name . "[]\"]').val([\"" . $val . "\"]);\n";
                }else{
                    echo "$('[name=\"" . $name . "\"]').val([\"" . $val . "\"]);\n";
                }
            }
        }
    }
    ?>
});
</script>

</div>


</body>
</html>