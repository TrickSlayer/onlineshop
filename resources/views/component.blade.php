<x-layout>
    <x-slot name="title">
        trick
    </x-slot>

    <x-slot name="main">
        <p>Click the button to get your coordinates.</p>

        <button onclick="getLocation()">Try It</button>

        <p id="demo"></p>

        <script>
            var x = document.getElementById("demo");

            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                } else {
                    console.log("Geolocation is not supported by this browser.");
                    x.innerHTML = "Geolocation is not supported by this browser.";
                }
            }

            function showPosition(position) {
                console.log("Geolocation");
                x.innerHTML = "Latitude: " + position.coords.latitude +
                    "<br>Longitude: " + position.coords.longitude;
                console.log("Latitude: " + position.coords.latitude +
                    "<br>Longitude: " + position.coords.longitude);
            }
        </script>
    </x-slot>
</x-layout>
