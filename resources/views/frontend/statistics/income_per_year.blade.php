@include('frontend.common.head')
<div class="wrapper" role="main">
  <!--client list section start-->
  <div class="menu_main statistics_main income_main">
    <div class="menu_auto">
      <div class="menu_inner">
        <div class="home_header clearfix">
          <div class="home_header_left">

          </div>
          <div class="home_header_right">
            <div class="home_header_menu">
              <ul>
                <li><a class="all_buttons" href="{{route('menu')}}">Menu</a>
                    <span>Espace Statisque</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
        @include('frontend.common.header_logo')
        <div class="statistics_content">
          <div class="statistics_list">
            <ul>
              <li>
                <div class="statistics_list_text">
                  <span>Revenus par an / mois</span>
                  <a href="{{route('tech.statistics')}}"></a>
                </div>
              </li>
            </ul>
          </div>

          <div class="income_chart_main">

            <div id="income_per_year_chart"></div>


          </div>
        </div>
      </div>
    </div>
  </div>
  <!--client list section end-->
</div>

</body>
</html>
<script>
    let perYearData = @json($result);
    let yearArray = [];
    let amountArray = [];
    for (let y =0; y < perYearData.length; y++) {
        let single = perYearData[y];
        yearArray.push(single.year);
        amountArray.push(single.total_amount);

    }

    Highcharts.chart('income_per_year_chart', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Revenus par an'
        },
        xAxis: {
            categories: yearArray
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
            series: {
                cursor: 'pointer',
                point: {
                    events: {
                        click: function() {
                           window.location = '../statistics/per_month/'+this.category;
                        }
                    }
                }
            }
        },
        series: [{
            name: 'Revenus',
            data: amountArray

        },

        ]
    });
</script>