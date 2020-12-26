@extends('layouts.app')
@section('style')
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
<link href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" rel="stylesheet" />
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
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                <i class="nc-icon nc-map-big mr-1"></i>
                Peta Sebaran Kasus Per Provinsi
                </h4>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div id="mapid" style="width: 100%; height: 400px;"></div>
                <script>
                    var mymap = L.map('mapid').setView([-0.4690016,117.1550653,17], 5);
                
                    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                        maxZoom: 18,
                        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                        id: 'mapbox/dark-v10',
                    }).addTo(mymap);
                    @foreach ($location_indo['features'] as $value) {
                        L.marker(["{{$value['geometry']['y']}}","{{$value['geometry']['x']}}"]).addTo(mymap)
                        .bindPopup("<b>Provinsi : " + "{{$value['attributes']['Provinsi']}}" + "</b><br>" +
                        "Positif : " + "{{$value['attributes']['Kasus_Posi']}}" + "<br>" +
                        "Sembuh : " + "{{$value['attributes']['Kasus_Semb']}}" + "<br>" +
                        "Meninggal : " + "{{$value['attributes']['Kasus_Meni']}}" + "<br>"
                        );
                    }
                    @endforeach
                </script>
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
<script>
    $(document).ready( function () {
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
                name: 'Sembuh',
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
                name: 'Sembuh',
                data: response.data.sembuh
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
