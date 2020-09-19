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
                  <a href="{{route('tech.per_year')}}"></a>
                </div>
              </li>
            </ul>
          </div>


          <div class="income_chart_main">

            <div id="income_per_month_chart"></div>

            <div class="income_compare_btn">
              <a class="all_buttons" href="{{route('tech.compare_income',$year)}}">Comparer revenus mensuel aux autres annees</a>
            </div>
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
    let monthArr = [];
    let perMonthyData = @json($result);
    let year = @json($year);
    let monthlyArray = [];
    let monthNumber = 1;
    for (let m = 1; m <= 12; m++) {
        let res = perMonthyData.find(d => d.month === m);
        if (res != undefined) {
            monthNumber = res.total_amount;
        }else {
            monthNumber = 0;
        }
        monthlyArray.push(monthNumber);
    }

    Highcharts.chart('income_per_month_chart', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Revenus par mois annee '+year
        },
        xAxis: {
            categories: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ],
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
            data: monthlyArray

        },

        ]
    });
</script>