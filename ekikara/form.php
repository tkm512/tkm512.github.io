<?php
$search = $_POST;
if(!$search) exit;

$list = file_get_contents("form.csv");
$list = mb_convert_encoding($list, "UTF-8", "sjis");
$list = explode("\n",$list);
$list = array_filter($list);


$itemList = array();
$num = 0;
foreach($list as $l){
    $l = explode(",",$l);

    if($num == 0){
        if($l != "") $nameList = $l;
    }else{
        $i=0;
        foreach($l as $item){
             //改行削除
            $nameList[$i] = str_replace(array("\r", "\n"), '', $nameList[$i]);
            $item = str_replace(array("\r", "\n"), '', $item);
            
            // $itemList[$nameList[$i]][] = $item;
            $itemList[$num][$nameList[$i]] = $item;
            $i++;
        }
    }
    $num++;
}

//var_dump($itemList);

$result = array();
foreach($itemList as $item){
    $judge = true;
    foreach($item as $name => $val){
        if(isset($search[$name]) && $search[$name] != ""){
            if(is_array($search[$name]) || strpos($val, ";") !== false){ //selectbox判定
                $val = explode(";",$val);
                $selectJudge = true;
                if(!is_array($search[$name])){
                    $searchArray = array($search[$name]);
                }else{
                    $searchArray = $search[$name];
                }
                foreach($searchArray as $sVal) if(!in_array($sVal,$val)) $selectJudge = false;
                if($selectJudge == false) $judge = false;
            }else{ //通常のマッチング判定
                if($val != $search[$name]) $judge = false;
            }
        }
    }
    if($judge == true) $result[] = $item;
}
//var_dump(count($result));
// var_dump($result);

//デフォルトのソート
$amounts = array();
foreach ($result as $v) $amounts[] = $v['point'];
array_multisort($amounts, SORT_DESC, SORT_NUMERIC, $result);

include "result.php";
?>


