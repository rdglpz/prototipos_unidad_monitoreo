 window.onload = function () {
                var dataLength = 0;
                var data = []; 
                $.getJSON("scripts/php/consultaParametros.php", function (result) {
                    dataLength = result.length;
                    for (var i = 0; i < dataLength; i++) {
                        data.push({
                            x: parseFloat(result[i].valorx),
                            y: parseFloat(result[i].valory)
                        });
                    }
                    ;
                    chart.render();
                });
                var chart = new CanvasJS.Chart("chart", {
                    title: {
                        text: "Temperatura",


                    },
                    axisX: {
                        title: "Identificador"

                    },
                    axisY: {
                        title: "Temperatura",
                    },
                    data: [{type: "line", dataPoints: data}],
                });
            }