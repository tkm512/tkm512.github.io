// 2) CSVから２次元配列に変換
function csv2Array(str) {
  var csvData = [];
  var lines = str.split("\n");
  for (var i = 0; i < lines.length; ++i) {
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
      labels: tmpLabel1,
      datasets: [
        { label: "乗車人員（人）", data: tmpData1, backgroundColor: "green" }
      ]
    },
  options: {
    responsive: true,
    legend: {
      display: false
           },
    title: {
        display: true,
        text: 'JR北海道（札幌市内）乗車人員ランキング'
    },
            scales: {                                  //軸設定
                yAxes: [{                              //y軸設定
                    display: true,                     //表示設定
                    scaleLabel: {                      //軸ラベル設定
                       display: true,                  //表示設定
                       labelString: '乗車人員（人）',  //ラベル
                       fontSize: 18                    //フォントサイズ（表題）
                    },
                    ticks: {                            //最大値最小値の設定
                        min: 0,                         //最小値
                        max: 110000,                    //最大値
                        fontSize: 18,                   //フォントサイズ
                        stepSize: 10000                 //軸間隔
                    },
                }],
                xAxes: [{                               //x軸設定
                    display: true,                      //表示設定
                    barPercentage: 0.8,                 //棒グラフ幅
                    categoryPercentage: 0.8,            //棒グラフ幅
                    scaleLabel: {                       //軸ラベル設定
                       display: true,                   //表示設定
                       labelString: '駅名',             //ラベル
                       fontSize: 18                     //フォントサイズ（表題）
                    },
                    ticks: {
                        fontSize: 6                     //フォントサイズ
                    },
                }],
            }
  }
  });
}

function main() {
  // 1) ajaxでCSVファイルをロード
  var req = new XMLHttpRequest();
  var filePath = './csv/r1jrhsapporocity_sort.csv';
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