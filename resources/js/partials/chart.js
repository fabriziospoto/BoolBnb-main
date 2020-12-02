if ($('#myChart').length > 0) {
    let path = location.pathname;
    let id = path.substr(17, path.length - 1);


    /* ajax call per views */
    $.ajax({
        "url": 'http://localhost:8000/api/view/' + id,
        "method": "GET",
        success: function (response) {
            const views = [];
            const dates = [];
            response.forEach(element => {
                views.push(element.views);
                dates.push(element.view_date);
            });
            makeChartView(views, dates);
        },
        'error': function (richiesta, stato, errori) {
            console.log("errore");
        }
    });

    /* ajax call per message */
    $.ajax({
        "url": 'http://localhost:8000/api/message/' + id,
        "method": "GET",
        success: function (response) {

            console.log(response);

            const num_message = [];
            const message_date = [];
            response.forEach(element => {
                num_message.push(element.num_message);
                message_date.push(element.message_date);
            });
            makeChartMessage(num_message, message_date);
        },
        'error': function (richiesta, stato, errori) {
            console.log("errore");
        }
    });

    function makeChartView(y, x) {
        const maxY = Math.max(...y) * 1.2;
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line', //'pie','line','doughnut','radar','polarArea'.'horizontalBar'
            data: {
                labels: x,
                datasets: [{
                    barPercentage: 0.8,
                    categoryPercentage: 0.5,
                    data: y,
                    backgroundColor: 'rgba(255, 99, 132, 0.6)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 2
                }]
            },
            options: {

                title: {
                    display: true,
                    text: 'Visualizzazioni giornaliere',
                    fontSize: 20
                },
                legend: {
                    display: false,
                },
                layout: {
                    padding: {
                        top: 0,
                        right: 50,
                        bottom: 0,
                        left: 50,
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            suggestedMin: 0,
                            suggestedMax: maxY,
                            stepSize: 1
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }]
                }
            }
        });
    }

    /* grafico messages */
    function makeChartMessage(y, x) {
        const maxY = Math.max(...y) * 1.2;
        const ctx = document.getElementById('myChartMessages').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar', //'pie','line','doughnut','radar','polarArea'.'horizontalBar'
            data: {
                labels: x,
                datasets: [{
                    barPercentage: 0.8,
                    categoryPercentage: 0.5,
                    data: y,
                    backgroundColor: 'rgba(255, 99, 132, 0.6)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 2
                }]
            },
            options: {

                title: {
                    display: true,
                    text: 'Messaggi giornalieri',
                    fontSize: 20
                },
                legend: {
                    display: false,
                },
                layout: {
                    padding: {
                        top: 0,
                        right: 50,
                        bottom: 0,
                        left: 50,
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            suggestedMin: 0,
                            suggestedMax: maxY,
                            stepSize: 1
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }]
                }
            }
        });
    }
}
