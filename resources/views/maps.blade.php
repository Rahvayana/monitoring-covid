<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
<link href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" rel="stylesheet" />
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