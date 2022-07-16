<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fortawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/styles/tailwind.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/styles/tailwind.css') }}" />
    <title>{{ isset($title) ? $title : 'Online shop' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/icon.png') }}" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/49dcd2e6d5.js" crossorigin="anonymous"></script>
    <!-- Leaflet css  -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />
    <!-- Leaflet js  -->
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>
    <script src="{{ asset('data/point.js') }}"></script>
    <script src="{{ asset('data/line.js') }}"></script>
    <script src="{{ asset('data/polygon.js') }}"></script>
</head>

<body>

    <div id="map" class="w-full h-screen">
        <div class="absolute w-full bottom-1 bg-white rounded flex justify-center">
            <div class="leaflet-control">
                <p class="w-80 text-center bg-white rounded border-2" id="coordinate"></p>
            </div>
        </div>
    </div>

    <footer>
        <script>
            var map = L.map("map").setView([21.028333, 105.853333], 13);

            // ===============================================================================================
            //                                      List Layers
            // ===============================================================================================
            base = L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            });

            googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
                maxZoom: 20,
                subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
            }).addTo(map);

            googleHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
                maxZoom: 20,
                subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
            });

            googleSat = L.tileLayer('http://{s}.google.com/vt?lyrs=s&x={x}&y={y}&z={z}', {
                maxZoom: 20,
                subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
            });

            googleTerrain = L.tileLayer('http://{s}.google.com/vt?lyrs=p&x={x}&y={y}&z={z}', {
                maxZoom: 20,
                subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
            });

            // var nexrad = L.tileLayer.wms("http://mesonet.agron.iastate.edu/cgi-bin/wms/nexrad/n0r.cgi", {
            //     layers: 'nexrad-n0r-900913',
            //     format: 'image/png',
            //     transparent: true,
            //     attribution: "Weather data © 2012 IEM Nexrad"
            // });

            //Icon maker
            var myIcon = L.icon({
                iconUrl: '{{ asset('assets/img/maker.png') }}',
                iconSize: [25, 40],
            });

            // ===============================================================================================
            //                                         List makers
            // ===============================================================================================

            var maker = L.marker([21.028333, 105.853333], {
                icon: myIcon,
                draggeble: true
            }).addTo(map);

            var popup = maker.bindPopup("Location :" + maker.getLatLng()).openPopup();
            console.log(maker.toGeoJSON());

            // var maker1 = L.marker([21.028333, 106.853333], {
            //     icon: myIcon,
            //     draggeble : true
            // });

            // ===============================================================================================
            //                                      Layers Control
            // ===============================================================================================

            var layers = {
                "Base": base,
                "Google Street": googleStreets,
                "Google Terrain": googleTerrain,
                "Google Hybrid": googleHybrid,
                "Google Satellite": googleSat,
            };

            var markers = {
                "maker": maker,
                // "maker1" : maker1

                //Effect
                // "Weather" : nexrad
            }

            L.control.layers(layers, markers, {
                collapsed: false
            }).addTo(map);

            // ===============================================================================================
            //                                      Layers Control
            // ===============================================================================================

            // L.geoJSON(pointJson).addTo(map);
            // L.geoJSON(lineJson).addTo(map);
            // L.geoJSON(polygonJson, {
            //     onEachFeatures: function(feature, layer) {
            //         layer.bindPopup("<b>Name: </b> " + feature.properties.name)
            //     }
            // }).addTo(map);

            // ===============================================================================================
            //                                      Leaflet events
            // ===============================================================================================

            map.on("mousemove", function(e) {
                $("#coordinate").html('Lat: ' + e.latlng.lat + '  Lng:' + e.latlng.lng);
            })
        </script>

        <script src="{{ asset('js/url.js') }}"></script>
    </footer>

</body>
