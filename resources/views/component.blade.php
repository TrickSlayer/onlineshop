<x-logged>
    <x-slot name="title">
        trick
    </x-slot>

    <x-slot name="main">
        <iframe src="https://maps.google.com/maps?q=Ha+Noi&output=embed" width="100%" height="800" id="iframe">
        </iframe>
        <script>
            $('#iframe').on("load", function() {
                const iframe = document.getElementById("iframe");
                const doc = iframe.contentWindow.document;
                console.log(doc);
            });
        </script>
    </x-slot>
</x-logged>
