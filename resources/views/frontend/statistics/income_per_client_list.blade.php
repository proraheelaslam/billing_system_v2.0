
<div id="income_per_client_chart"></div>
<script>
    var clientData = @json($result);
    var clientNameArr = [];
    var amountArray = [];
    for (let i =0; i < clientData.length; i++) {
        let single = clientData[i];
        clientNameArr.push(single.name);
        amountArray.push(parseFloat(single.total_amount));

    }

    console.log(clientNameArr)
    console.log(amountArray)
    Highcharts.chart('income_per_client_chart', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Revenus par client'
        },
        xAxis: {
            categories: clientNameArr,
            crosshair: true
        },
        yAxis: {
            title: {
                text: 'Revenus'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} €</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            },

        },
        series: [{
            name: 'Revenus',
            data: amountArray
        }
        ]
    });
</script>