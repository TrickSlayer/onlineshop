<x-layout>
    <x-slot name="main">

        <p>Try the scrollbar in the div</p>

        <div id="chat" class="w-32 h-64 overflow-scroll">
         {{-- style="border:1px solid black;width:200px;height:100px;overflow:scroll;"> --}}
            <ul>
                @foreach ($messages as $message)
                    {{ $message }}
                @endforeach
            </ul>
        </div>

        <p>Scrolled <span id="span">0</span> times.</p>

    </x-slot>

    <x-slot name="footer">
        <script>
            // $(document).ready(function() {
            //     $("#chatBox").scrollTop($("#chatBox")[0].scrollHeight);

            //     $('#chatBox').scroll(function() {

            //         if ($('#chatBox').scrollTop() == 0) {

            //             // Do Ajax call to get more messages and prepend them
            //             // To the inner div
            //             // How you paginate them will be the tricky part though
            //             // You'll likely have to send the ID of the last message, to retrieve 5-10 'before' that 

            //             // $.ajax({
            //             //     url: 'getmessages.php',
            //             //     data: {
            //             //         idoflastmessage: id
            //             //     }, // This line shows sending the data.  How you get it is up to you
            //             //     dataType: 'html',
            //             //     success: function(data) {
            //             //         $('.inner').prepend(data);
            //             //         $('#chatBox').scrollTop(
            //             //         30); // Scroll alittle way down, to allow user to scroll more
            //             //     };
            //             // });
            //         }
            //     });
            // });

            $(document).ready(function() {
                $("#chat").scrollTop($("#chat")[0].scrollHeight);

                $("#chat").scroll(function() {
                    $("#span").text($('#chat').scrollTop());

                    if($('#chat').scrollTop() == 0){
                        alert("top");
                    }
                });
            });
        </script>
    </x-slot>

</x-layout>
