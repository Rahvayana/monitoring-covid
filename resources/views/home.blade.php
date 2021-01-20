@extends('layouts.app')
@section('style')
<style>
    #mapid {
    height: 500px; 
    min-width: 310px; 
    max-width: 100%; 
    margin: 0 auto; 
}
.loading {
    margin-top: 10em;
    text-align: center;
    color: gray;
}

</style>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                    <i class="nc-icon nc-ambulance text-success"></i>
                    </div>
                </div>
                <div class="col-7 col-md-8">
                    <div class="numbers">
                    <p class="card-category">Positif</p>
                    <p class="card-title">{{$suspect_indo[0]['positif']}}<p>
                    </div>
                </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                <i class="fa fa-calendar-o"></i>
                {{date('d-m-Y',strtotime("-1 days"))}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                    <i class="nc-icon nc-satisfied text-success"></i>
                    </div>
                </div>
                <div class="col-7 col-md-8">
                    <div class="numbers">
                    <p class="card-category">Sembuh</p>
                    <p class="card-title">{{$suspect_indo[0]['sembuh']}}<p>
                    </div>
                </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                <i class="fa fa-calendar-o"></i>
                {{date('d-m-Y',strtotime("-1 days"))}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                    <i class="nc-icon nc-sound-wave text-success"></i>
                    </div>
                </div>
                <div class="col-7 col-md-8">
                    <div class="numbers">
                    <p class="card-category">Meninggal</p>
                    <p class="card-title">{{$suspect_indo[0]['meninggal']}}<p>
                    </div>
                </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                <i class="fa fa-calendar-o"></i>
                    {{date('d-m-Y',strtotime("-1 days"))}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
      <figure class="highcharts-figure">
        <div id="container2"></div>
      </figure>
    </div>
  </div>   
  <div class="row">
    <div class="col-md-12">
      <figure class="highcharts-figure">
        <div id="container3"></div>
      </figure>
    </div>
  </div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-chart">
            <div class="card-body">
            <figure class="highcharts-figure">
                <div id="container4"></div>
            </figure>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-chart">
            <div class="card-body">
            <figure class="highcharts-figure">
                <div id="container5"></div>
            </figure>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-chart">
            <div class="card-body">
            <figure class="highcharts-figure">
                <div id="container6"></div>
            </figure>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-chart">
            <div class="card-body">
                <table class="table table-bordered table-hover display compact custom" cellspacing="0" width="100%" id="laravel_datatable">
                    <thead>
                       <tr>
                          <!--<th>FID</th>-->
                          <th>Provinsi</th>
                          <th>Positif</th>
                          <th>Sembuh</th>
                          <th>Meninggal</th>
                       </tr>
                    </thead>
                 </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                <i class="nc-icon nc-map-big mr-1"></i>
                Peta Kasus Sembuh Tiap Provinsi
                </h4>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div id="mapid" style="width: 100%; height: 400px;"></div>
            </div><!-- /.card-body -->
        </div>
    </div>
</div>

@endsection
@section('script')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/maps/modules/map.js"></script>
<script src="https://code.highcharts.com/mapdata/custom/world.js"></script>
<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
<script src="https://code.highcharts.com/mapdata/countries/id/id-all.js"></script>
<!-- DataTables -->
<script src="/admin-lte/datatables/jquery.dataTables.min.js"></script>
<script src="/admin-lte/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/admin-lte/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/admin-lte/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
    $(document).ready( function () {
        Highcharts.getJSON('http://monitoring-covid-19.herokuapp.com/highmap', function (data) {
        // Highcharts.getJSON('http://127.0.0.1:8000/highmap', function (data) {
            // Make codes uppercase to match the map data
            // Instantiate the map
            Highcharts.mapChart('mapid', {

                chart: {
                    map: 'countries/id/id-all',
                    borderWidth: 1
                },

                colors: ['#4ef542', 'rgba(19,64,117,0.2)', 'rgba(19,64,117,0.4)',
                'rgba(19,64,117,0.5)', 'rgba(19,64,117,0.6)', 'rgba(19,64,117,0.8)', 'rgba(19,64,117,1)'],

            title: {
                text: 'Population density by country (/km²)'
            },

            mapNavigation: {
                enabled: true
            },

            legend: {
                title: {
                    text: 'Individuals per km²',
                    style: {
                        color: ( // theme
                            Highcharts.defaultOptions &&
                            Highcharts.defaultOptions.legend &&
                            Highcharts.defaultOptions.legend.title &&
                            Highcharts.defaultOptions.legend.title.style &&
                            Highcharts.defaultOptions.legend.title.style.color
                        ) || 'black'
                    }
                },
                align: 'left',
                verticalAlign: 'bottom',
                floating: true,
                layout: 'vertical',
                valueDecimals: 0,
                backgroundColor: ( // theme
                    Highcharts.defaultOptions &&
                    Highcharts.defaultOptions.legend &&
                    Highcharts.defaultOptions.legend.backgroundColor
                ) || 'rgba(255, 255, 255, 0.85)',
                symbolRadius: 0,
                symbolHeight: 14
            },

            colorAxis: {
                type: 'logarithmic',
                minColor: '#7aff7d',
                maxColor: '#000022',
                stops: [
                    [0, '#66ff73'],
                    [0.1, '#40f54f'],
                    [0.2, '#27f538'],
                    [0.3, '#ffff63'],
                    [0.4, '#f7f740'],
                    [0.5, '#ffff00'],
                    [0.6, '#ff6969'],
                    [0.7, '#fc4747'],
                    [0.8, '#fa2525'],
                    [1, '#ff0000']
                ]
            },

                series: [{
                    animation: {
                        duration: 1000
                    },
                    data: data,
                    joinBy: ['hc-key', 'code'],
                    dataLabels: {
                        enabled: true,
                        color: '#FFFFFF',
                        format: '{point.provinsi}'
                    },
                    name: 'Jumlah Positif',
                    tooltip: {
                        pointFormat: '{point.provinsi}: {point.value} Positif'
                    }
                }]
            });
            });

    $('#laravel_datatable').DataTable({
        processing: true,
            serverSide: true,
            ajax: "{{ url('https://immense-chamber-80308.herokuapp.com/coronas-list') }}",
            order: [[ 1 , "desc" ]], 
            columns: [
                    //{ data: 'attributes.FID'},
                    { data: 'attributes.Provinsi' },
                    { data: 'attributes.Kasus_Posi' },
                    { data: 'attributes.Kasus_Semb' },
                    { data: 'attributes.Kasus_Meni'}
                ],
                "dom": '<"topcustom"fr>t<"bottomcustom"ip>'
    });

        $.ajax({
        type: "GET",
        url: '/provincechart/',
        success: function(response){
          console.log(response)
            // Create the chart
            Highcharts.chart('container2', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: '5 Besar Kasus Per Provinsi Terbesar'
                },
                xAxis: {
                    categories: response.data.nama_provinsi,
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Jumlah'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
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
                        pointWidth: 20
                    }
                },
                series: [
                  {
                    name: 'Jumlah Kasus',
                    data: response.data.jumlah_kasus,
                },
                  {
                    name: 'Jumlah Kematian',
                    data: response.data.jumlah_mati,
                },
                  {
                    name: 'Jumlah Sembuh',
                    data: response.data.jumlah_sembuh,
                },
                ]
            });
        },
        error: function (data) {
                console.log(data);
          }
      });
    $.ajax({
        type: "GET",
        url: '/provinceLowestChart/',
        success: function(response){
          console.log(response)
            // Create the chart
            Highcharts.chart('container3', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: '5 Besar Kasus Per Provinsi Terkecil'
                },
                xAxis: {
                    categories: response.data.nama_provinsi,
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Jumlah'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
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
                        pointWidth: 20
                    }
                },
                series: [
                  {
                    name: 'Jumlah Kasus',
                    data: response.data.jumlah_kasus,
                },
                  {
                    name: 'Jumlah Kematian',
                    data: response.data.jumlah_mati,
                },
                  {
                    name: 'Jumlah Sembuh',
                    data: response.data.jumlah_sembuh,
                },
                ]
            });
        },
        error: function (data) {
                console.log(data);
          }
      });
        $.ajax({
            type: "GET",
            url: '/movingAvg/',
            success: function(response){
            console.log(response)
                // Create the chart
                Highcharts.chart('container4', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Grafik Moving Average 7 Hari (Sembuh)'
                },
                subtitle: {
                    text: 'Source: apicovid19indonesia'
                },
                xAxis: {
                    categories: response.data.tanggal
                },
                yAxis: {
                    title: {
                        text: 'Jumlah Orang'
                    }
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: false
                    }
                },
                series: [{
                    name: 'Sembuh',
                    data: response.data.sembuh
                }]
            });
            },
            error: function (data) {
                    console.log(data);
            }
        });
        $.ajax({
        type: "GET",
        url: '/movingAvg/',
        success: function(response){
          console.log(response)
            // Create the chart
            Highcharts.chart('container5', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Grafik Moving Average 7 Hari (Positif)'
            },
            subtitle: {
                text: 'Source: apicovid19indonesia'
            },
            xAxis: {
                categories: response.data.tanggal
            },
            yAxis: {
                title: {
                    text: 'Jumlah Orang'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                name: 'Positif',
                data: response.data.positif
            }]
        });
        },
        error: function (data) {
                console.log(data);
          }
        });
      $.ajax({
        type: "GET",
        url: '/movingAvg/',
        success: function(response){
          console.log(response)
            // Create the chart
            Highcharts.chart('container6', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Grafik Moving Average 7 Hari (Meninggal)'
            },
            subtitle: {
                text: 'Source: apicovid19indonesia'
            },
            xAxis: {
                categories: response.data.tanggal
            },
            yAxis: {
                title: {
                    text: 'Jumlah Orang'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                name: 'Meninggal',
                data: response.data.meninggal
            }]
        });
        },
        error: function (data) {
                console.log(data);
          }
      });
    });
</script>
@endsection
