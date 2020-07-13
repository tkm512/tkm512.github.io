// 2) CSVから２次元配列に変換
function csv2Array(str) {
  var csvData = [];
  var lines = str.split("\n");
  for (var i = 1; i < 21; ++i) {
    var cells = lines[i].split(",");
    csvData.push(cells);
  }
  return csvData;
}

function drawBarChart(data) {
  // 3)chart.jsのdataset用の配列を用意
  var tmpLabel1 = [], tmpLabel2 = [], tmpData1 = [];
  for (var row in data) {
    tmpLabel1.push(data[row][0])
    tmpLabel2.push(data[row][1])
    tmpData1.push(data[row][2])
  };

  // 4)chart.jsで描画
  var ctx = document.getElementById("myChart").getContext("2d");
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: tmpLabel1
      datasets: [
        { label: "乗車人員", data: tmpData1, backgroundColor: "blue" }
      ]
    }
  });
}

function main() {
  // 1) ajaxでCSVファイルをロード
  var req = new XMLHttpRequest();
  var filePath = './csv/tokyometro.csv';
  req.open("GET", filePath, true);
  req.onload = function() {
    // 2) CSVデータ変換の呼び出し
    data = csv2Array(req.responseText);
    // 3) chart.jsデータ準備、4) chart.js描画の呼び出し
    drawBarChart(data);
  }
  req.send(null);
}

main();