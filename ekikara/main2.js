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
var cText = tabText[i].split(",");
tbl += "<tr>";
for (var j=0; j<cText.length-1; j++){
if(cText[1]<=20){
tbl += "<td>"+cText[j+1]+"</td>";
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