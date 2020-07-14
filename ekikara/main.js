window.onload = function(){
var msec = (new Date()).getTime();
new Ajax.Request("./csv/shibuya.csv", {
method: "get",
parameters: "cache="+msec,
onSuccess:function(httpObj){
var text = httpObj.responseText;
var LF = String.fromCharCode(10);
var tabText = text.split(LF);
var tbl = "<table border='1'>";
for (var i=0; i<tabText.length-1; i++){
if(i == 0){
tbl += "<td>"+"駅名"+"</td>";
tbl += "<td>"+"路線名"+"</td>";
tbl += "<td>"+"所要時間(分)"+"</td>";
tbl += "<td>"+"停車種別"+"</td>";
}
var cText = tabText[i].split(",");
tbl += "<tr>";
for (var j=0; j<cText.length-1; j++){
tbl += "<td>"+cText[j+1]+"</td>";
}
tbl +="</tr>";
}
tbl += "</table>";
$("tableData").innerHTML = tbl;
},
onFailure:function(httpObj){
$("tableData").innerHTML = "エラーで読み込めませんでした";
}
});
}

function onButtonClick() {
target = document.getElementById("output");
var all = document.getElementById("target1") ;
var metro = document.getElementById("target2") ;
var tokyu = document.getElementById("target3") ;
var keio = document.getElementById("target4") ;
var jr = document.getElementById("target5") ;
var cond1 = "";
var cond2 = "";


if ( document.forms.id_form1.id_textBox1.value == "" ) {
	cond1 = 999
}else{
	cond1 = parseInt(document.forms.id_form1.id_textBox1.value);
}


if ( all.checked ) {
	if ( document.forms.id_form1.id_textBox1.value == "" ) {
		//表示コメントなし
		target.innerText = "";
	}else{
		target.innerText = "渋谷駅から" + document.forms.id_form1.id_textBox1.value + "分圏内の駅を検索しました";
	}
}
if ( metro.checked ) {
	cond2 = "メトロ";
	if ( document.forms.id_form1.id_textBox1.value == "" ) {
		target.innerText = "東京メトロの駅の所要時間を表示します";
	}else{
		target.innerText = "東京メトロで渋谷駅から" + document.forms.id_form1.id_textBox1.value + "分圏内の駅を検索しました";
	}
}
if ( tokyu.checked ) {
	cond2 = "東急";
	if ( document.forms.id_form1.id_textBox1.value == "" ) {
		target.innerText = "東急線の駅の所要時間を表示します";
	}else{
		target.innerText = "東急線で渋谷駅から" + document.forms.id_form1.id_textBox1.value + "分圏内の駅を検索しました";
	}
}
if ( keio.checked ) {
	cond2 = "京王";
	if ( document.forms.id_form1.id_textBox1.value == "" ) {
		target.innerText = "京王線の駅の所要時間を表示します";
	}else{
		target.innerText = "京王線で渋谷駅から" + document.forms.id_form1.id_textBox1.value + "分圏内の駅を検索しました";
	}
}
if ( jr.checked ) {
	cond2 = "JR";
	if ( document.forms.id_form1.id_textBox1.value == "" ) {
		target.innerText = "JR線の駅の所要時間を表示します";
	}else{
		target.innerText = "JR線で渋谷駅から" + document.forms.id_form1.id_textBox1.value + "分圏内の駅を検索しました";
	}
}

  var msec = (new Date()).getTime();
new Ajax.Request("./csv/shibuya.csv", {
method: "get",
parameters: "cache="+msec,
onSuccess:function(httpObj){
var text = httpObj.responseText;
var LF = String.fromCharCode(10);
var tabText = text.split(LF);
var tbl = "<table border='1'>";
for (var i=0; i<tabText.length-1; i++){
if(i == 0){
tbl += "<td>"+"駅名"+"</td>";
tbl += "<td>"+"路線名"+"</td>";
tbl += "<td>"+"所要時間(分)"+"</td>";
tbl += "<td>"+"停車種別"+"</td>";
}
var cText = tabText[i].split(",");
//tbl += "<tr>";
if ( all.checked ) {
	if(cText[3]<=cond1) {
		tbl += "<tr>";
	}
}else{
	if(cText[3]<=cond1 && cText[0]==cond2) {
		tbl += "<tr>";
	}
}


for (var j=0; j<cText.length-1; j++){

if ( all.checked ) {
	if(cText[3]<=cond1) {
		tbl += "<td>"+cText[j+1]+"</td>";
	}
}else{
	if(cText[3]<=cond1 && cText[0]==cond2) {
		tbl += "<td>"+cText[j+1]+"</td>";
	}
}


}
tbl +="</tr>";
}
tbl += "</table>";
$("tableData").innerHTML = tbl;
},
onFailure:function(httpObj){
$("tableData").innerHTML = "エラーで読み込めませんでした";
}
});
}