<html>
    <head>
        
        <title>Le ou La ?</title>
        
        <meta http-equiv="Content-Language" content="fr-FR" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="author" content="Sboune, Wacuta" />
        <meta name="decription" content="Le ou La WiFi ? Le ou La nems ?... Votez ce qui vous semble le plus juste." />
        <meta name="keywords" content="Le, ou, La, vote, communautaire" />
        <meta name="viewport" content="width=device-width, user-scalable=no" />
        
        <link rel="stylesheet" type="text/css" href="{{ url('/css/font.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">

        <script src="http://code.jquery.com/jquery-2.2.1.min.js"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>

    </head>

    <body>
        <div class="flex flex-center search">
            <div class="container">
                <div class="titre">
                    <span class="le">Le</span>	ou	<span class="la">La</span> 
                    @isset($mot)
                        {{ $mot }}
                    @endisset
                    ?
                </div>

                @if(!@isset($mot))
                <form>
                    <input id="search" type="text" name="word" autocomplete="off">
                    <div class="suggestion"></div>
                </form>
                @else
                <div class="btn" id="btndiv">
                    <button class="btn-le" id="addLe">Le</button>
                    <button class="btn-la" id="addLa">La</button>
                </div>
                @endif
            </div>
        </div>
        <div class="result">
            <div id="chart">
            </div>
        </div>

    </body>

    <script src="{{ url('/js/script.js') }}"></script>
    <script>
    $(function () {
        $(document).ready(function () {

            $('#addLe').click(function(){
                var chart = $('#chart').highcharts();
                var val1 = chart.series[0].data[0].y+1;
                var val2 = chart.series[0].data[1].y;
                chart.series[0].setData([val1, val2]);
                console.log("Le: " + val1 + "; La: " +val2);
            });

            $('#addLa').click(function(){
                var chart = $('#chart').highcharts();
                var val1 = chart.series[0].data[0].y;
                var val2 = chart.series[0].data[1].y+1;
                chart.series[0].setData([val1, val2]);
                console.log("Le: " + val1 + "; La: " +val2);
            });


            // Build the chart
            $('#chart').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Résultat'
                },
                tooltip: {
                    pointFormat: '<b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false
                        },
                        showInLegend: true
                    }
                },
                series: [{
                    name: 'Valeur',
                    colorByPoint: true,
                    data: [{
                        name: 'Le',
                        y: 0,
                        color: "#6DBCDB"
                    }, {
                        name: 'La',
                        y: 0,
                        color: "#FC4349"
                    }]
                }]
            });



        });
    });

    </script>

</html>